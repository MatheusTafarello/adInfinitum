<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    foreach($_POST['desmatricula'] as $id){
        $conexao= mysqli_connect("127.0.0.1", "root", "", "adinfinitum") or die ("Falha na conexão");
        $delete = "DELETE FROM `matricula` WHERE `id_aluno` = ".$_SESSION["id"]." AND `id_curso` = ".$id."";
        $conexao->query($delete);
        header("Location: perfil.php");
    }
?>