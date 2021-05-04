<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();

    $user = $_POST["user"];
    $password = $_POST["password"];

    $conexao= mysqli_connect("127.0.0.1", "root", "", "adinfinitum") or die ("Falha na conexão");
    $select = " SELECT * FROM `usuario` WHERE user = '".$user."' AND senha = '".$password."'";
    // $return = mysqli_query($conexao, $select);
    $result = $conexao->query($select);
    $row = $result->fetch_assoc();
    if ($result->num_rows > 0) {
        $_SESSION["login_error"] = FALSE;
        $_SESSION["logged"] = TRUE;
        $_SESSION["user"] = $_POST["user"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["id"] = $row["id"];
        $_SESSION["nome"] = $row["nome"];
        $_SESSION["data_nascimento"] = $row["data_nascimento"];
        header("Location: home.php");

    } else {
        echo "0 results";
        $_SESSION["login_error"] = TRUE;
        $_SESSION["logged"] = FALSE;
        header("Location: login.php");
    }
?>