<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Infinitum - Matricula</title>
    <link rel="stylesheet" href="_css/matricula.css">
    <link rel="icon" href="_imgs/logo.png" type="image/gif" sizes="16x16">
</head>
<body>

<style> 
@font-face {
    font-family: Poppins;
    src: url(_fonts/Poppins/Poppins-Regular.ttf)
}

body{
    background-image: url(_imgs/bdmat.jpg);
    height:fit-content
}
</style>

<div id="logo"> 
        <img src="_imgs/logo.png" alt="logo" style="box-shadow: 10px 10px 10px -8px black; background-repeat: no-repeat; height:7vw; width:7vw; border-radius: 50%; position: relative; left: 46%; top: 2vw"> 
    </div>

    <div class="container">
        <div>
    <?php
        error_reporting(E_ERROR | E_PARSE);
        session_start();
        if(!$_SESSION["logged"]){
            header("Location: login.php");
        } 
        $conexao= mysqli_connect("127.0.0.1", "root", "", "adinfinitum") or die ("Falha na conexão");
        
        if(isset($_POST['cursos'])){
            foreach($_POST['cursos'] as $id){
                // echo $id;
                $check = " SELECT * FROM `matricula` WHERE id_aluno = '".$_SESSION['id']."' AND id_curso = '".$id."'";
                $result = $conexao->query($check);
                $row = $result->fetch_assoc();
                if ($result->num_rows > 0) {
                    $result = $conexao->query(" SELECT * FROM `curso` WHERE id ='".$id."'");
                    echo "<br><span style='position: relative; top:-7vw;padding-left: 2vw; padding-top: 2vw; text-align: left; font-family: Poppins; font-size: 16px; height: 55vh; width: 60vw; display: inline-block; background-image: url(_imgs/bg2.jpg); background-position-y:-90px ;color: white; border-top: 2px solid #ccc; border-bottom: 2px solid #ccc; border-left: 2px solid #ccc; border-right: 2px solid #ccc; box-shadow: 10px 10px 15px -2px black; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px'><b style='font-size: 24px'>Atenção!</b><br><br>Usuário já cadastrado no(s) seguinte curso(s): <b>".$result->fetch_assoc()["nome"]."</b></span><br>";
                    echo "<br><br><a href='home.php' style='cursor: pointer; padding: 10px; font-family: Poppins;background-color: rgb(240, 48, 137); box-shadow: 10px 10px 10px -8px black; border: 2px solid rgb(255, 255, 255); color: rgb(245, 245, 245); -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px; font-size: 24px; position:absolute; top: 78%; left: 23%; text-decoration: none '>Entendi</a>";
                break;
                }
                else{

                    $select = " SELECT * FROM `curso` WHERE id ='".$id."'";
                    $result = $conexao->query($select) or die($conexao->error);
                    $row = $result->fetch_assoc();  
                    // echo $row["nome"];
                    
                    $data = date("Y")."-".date("m")."-".date("d");
                    $insert = "INSERT INTO matricula (id_aluno, id_curso, data) VALUES ('".$_SESSION['id']."', '".$id."', '".$data."')";
                    echo $insert;
                    $_SESSION["n_matricula"] = count($_POST["cursos"]);
                    mysqli_query($conexao, $insert);
                    header("Location: confirmacao.php");
                }
            }
        }
        else{
            header("Location: catalogo.php");
        }
    ?>
        </div>
    </div>
</body>
</html>