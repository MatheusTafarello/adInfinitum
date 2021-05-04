<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Infinitum - Perfil</title>
    <link rel="icon" href="_imgs/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="_css/perfil.css">
</head> 

<style>
@font-face {
    font-family: Poppins;
    src: url(_fonts/Poppins/Poppins-Regular.ttf)

}
</style>

<body style="background-image:url(_imgs/bg2.jpg)">
    <table CELLSPACING=10>
        <tr>
            <td style="background-color: #eee; border: 10px solid darkgrey">
                <img src ="_imgs/profile.png" height="200px" />
            </td>
            <td style="padding: 10px;background-color: #eee; width: 350px; border: 10px solid darkgrey; font-family: Poppins" valign="bottom">
                <?php
                    session_start();
                    if(!$_SESSION["logged"]){
                        header("Location: login.php");
                    }
                    echo "<br><h2>".$_SESSION["user"]."</h2><br>";
                    echo "<h2 style='font-size: 16px; font-family: Poppins'>E-mail:".$_SESSION["email"]."</h2><br>"; 
                ?>
            </td>
            <td valign="top" align="right" style="background-color: #eee; width: 1000px; border: 10px solid darkgrey">
                <img style="float: right" src="_imgs/logo.png" alt="Logo" width="80vw">
                <a href="home.php"><button style="background-image:url(_imgs/bg2.jpg); background-size: contain; box-shadow: 10px 10px 10px -8px black; border: 2px solid rgb(255, 255, 255); color: rgb(245, 245, 245); font-size: 24px; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px; cursor: pointer; width: 100px; height: 40px; float: right; margin-right: 2vw; margin-top: 1vw; padding-left: 10px">Home</button></a>
                
            </td>
        </tr>
        <tr>
            <td colspan="2" valign="top" align="left" style="background-color: #eee; height: 300px; border: 10px solid darkgrey; padding-left: 1vw;  font-family: Poppins">
                <h3>Descrição:</h3>
                <?php
                    $conexao= mysqli_connect("127.0.0.1", "root", "", "adinfinitum") or die ("Falha na conexão");
                    $select = " SELECT * FROM `usuario` WHERE user = '".$_SESSION['user']."'";
                    $result = $conexao->query($select)->fetch_assoc();
                    echo $result["descricao"];
                ?>

                <!-- <a href="mudar.php"><button style="margin-top: 20px; margin-left: 10px">CADASTRAR</button></a> -->
            </td>
            <td rowspan="15" valign="top" align="left" style="background-color: #eee; height: 300px; border: 10px solid darkgrey">
                <form action="desmatricula.php" method="post">
                    <?php
                        $select = " SELECT * FROM `matricula` WHERE id_aluno = '".$_SESSION['id']."'";
                        $result = $conexao->query($select);
                        while($row = $result->fetch_assoc()){
                            $curso = "SELECT * FROM `curso` WHERE id = '".$row["id_curso"]."'";
                            $curso_r = $conexao->query($curso);
                            $curso_row = $curso_r->fetch_assoc();

                            echo "<img style='margin-left:15px; margin-right:5px; float:left; 'width='70px' src='_imgs/".$curso_row['categoria'].".jpg' alt=".$curso_row['categoria']."'><h3 style='margin:15px; font-size: 23px; padding-top: 7px'>".$curso_row["nome"]."<h4 style='font-size: 15px; padding-left: 15px; padding-right: 15px'><br>".$curso_row["descricao"]."<br></h4>";
                            echo "<input style='float: right; height: 20px; width: 30px; margin-top: -95px' type='checkbox' name='desmatricula[]' value='".$curso_row["id"]."'>"."<br><br><br><br>";
                        }
                    ?>
                    <input style="margin-right: 25px; float: right; background-image:url(_imgs/bg2.jpg); background-size: contain; box-shadow: 10px 10px 10px -8px black; border: 2px solid rgb(255, 255, 255); color: rgb(245, 245, 245); font-size: 24px; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px; cursor: pointer; width: 170px; height: 60px" type="submit" name="submit" value="Desmatricular">
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="2" valign="top" align="left" style="background-color: #eee; height: 100px;  border: 10px solid darkgrey">
                <span style="font-family: Poppins"> Mudar descrição:</span>
                <form action="descricao.php" method="post">
                    <textarea rows = "4" cols = "60" name = "descricao" style="margin-left:10px; width:560px"></textarea><br>
                <input type = "submit" value = "Enviar" style=" background-image:url(_imgs/bg2.jpg); background-size: contain; box-shadow: 10px 10px 10px -8px black; border: 2px solid rgb(255, 255, 255); color: rgb(245, 245, 245); font-size: 24px; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px; cursor: pointer; width: 100px; height: 40p; margin-left: 30vw; margin-top: 10px"/>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>