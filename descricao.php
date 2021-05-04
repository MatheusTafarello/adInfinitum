<?php
    // descrição do usuário (perfil)
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    $alterar = "UPDATE `usuario` SET `descricao` = '".$_POST['descricao']."' WHERE `usuario`.`id` =".$_SESSION["id"];
    $conexao= mysqli_connect("127.0.0.1", "root", "", "adinfinitum") or die ("Falha na conexão");
    $conexao->query($alterar);
    header("Location: perfil.php");
?>