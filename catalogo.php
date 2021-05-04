<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Infinitum - Catálogo</title>
    <link rel="stylesheet" href="_css/catalogo.css">
    <link rel="icon" href="_imgs/logo.png" type="image/gif" sizes="16x16">
</head>

<style>
@font-face {
    font-family: Poppins;
    src: url(_fonts/Poppins/Poppins-Regular.ttf)
}

@font-face {
    font-family: 'JACKPORT COLLEGE NCT';
    src: local(), url(_fonts/JackportCollegeNcv-1MZe.ttf) format(TrueType)
}

.view_port {
    background-color: rgb(255, 255, 255);
    height: 10px;
    width: 100%;
    overflow: hidden;
}

.cylon_eye {
    background-color: #ff0095;
    background-image: linear-gradient(to right, #ebebebe6 25%, #ffffff1a 50%, #eee 90%);
    color: rgb(0, 0, 0);
    height: 100%;
    width: 20%;
    -webkit-animation: 2s linear 0s infinite alternate move_eye;
    animation: 2s linear 0s infinite alternate move_eye;
}

@-webkit-keyframes move_eye {
    from {
        margin-left: -20%;
    }
    to {
        margin-left: 100%;
    }
}

@keyframes move_eye {
    from {
        margin-left: -20%;
    }
    to {
        margin-left: 100%;
    }
}
</style>

<body style="font-family: Poppins; width: 97vw">
<img src="_imgs/logo.png" alt="Logo" height="80px" style="position:relative; top: 1.5vw; left:2vw; -webkit-filter: drop-shadow(px 0px 10px #000); filter: drop-shadow(0px 0px 5px #000);">
    <span style="font-size: 38px; font-family:'Poppins'; color: #222; text-shadow: 2px 2px 1px black; margin-left: 5vw">Catálogo de Cursos</span>  
    <a href="home.php"><button style="color:#eee; cursor: pointer; font-family:Poppins; font-size:24px; background-image:url(_imgs/bg2.jpg); background-size: contain; border: 2px solid #ccc; width: 100px; height: 40px; padding-left: 10px; margin-left: 85vw; position: relative; top: -2.5vw; border-radius:10px">Home</button></a>
    <hr width="102.2%" style="border: 3px #bbb solid; margin-left: -1vw">

    <div class="view_port" style="position: relative; top:-1vw; z-index: -1; height: 5px; background-color: #eee; border-bottom: 2px #ccc solid; color: black">
        <div class="polling_message"></div>
        <div class="cylon_eye"></div>
    </div>

    <form action="matricula.php" method="post">
        <table CELLSPACING=15 width="90%" style="margin-left: 70px; margin-top: 20px; margin-right: 70px;  border-radius:10px">
            <?php 
                error_reporting(E_ERROR | E_PARSE);
                session_start();
                if(!$_SESSION["logged"]){
                    header("Location: login.php");
                }
                echo "<span style='font-family: Poppins; margin-left: 1vw'><b> Logado como ".ucwords($_SESSION["user"])."</b> - ".$_SESSION["email"]."</span>";

                $conexao= mysqli_connect("127.0.0.1", "root", "", "adinfinitum") or die ("Falha na conexão");
                $select = " SELECT * FROM `curso` WHERE 1";
                $result = $conexao->query($select) or die($conexao->error);
                $count = 0;
                while($row = $result->fetch_assoc()) {
                    switch($count){
                        case 0:
                            echo '<tr style="background-color: #fff; box-shadow: 10px 10px 20px -10px black; "align="center"; valign="middle"><td style="padding-left: 30px; padding-right: 30px; padding-top: 2vw; width:400px"><img width="250px" src="_imgs/'.$row["categoria"].'.jpg" alt='.$row["categoria"].'"><hr><h2>'.$row["nome"].'</h2><hr style="border: 2px #ddd solid"><span style="font-size: 17px; font-family: consolas;">'.$row["descricao"].'</span><hr><input type="checkbox" name="cursos[]" value="'.$row["id"].'"></td>';
                            $count++;
                        break;
                        case 1:
                            echo '<td style="padding-left: 30px; padding-right: 30px; padding-top: 10px"><img width="250px" src="_imgs/'.$row["categoria"].'.jpg" alt='.$row["categoria"].'"><hr><h2>'.$row["nome"].'</h2><hr style="border: 2px #ddd solid"><span style="font-size: 17px; font-family: consolas;">'.$row["descricao"].'</span><hr><input type="checkbox" name="cursos[]" value="'.$row["id"].'"></td>';
                            $count++;
                        break;
                        case 2:
                            echo '<td style="padding-left: 30px; padding-right: 30px; padding-top: 10px"><img width="250px" src="_imgs/'.$row["categoria"].'.jpg" alt='.$row["categoria"].'"><hr><h2>'.$row["nome"].'</h2><hr style="border: 2px #ddd solid"><span style="font-size: 17px; font-family: consolas;">'.$row["descricao"].'</span><hr><input type="checkbox" name="cursos[]" value="'.$row["id"].'"></td></tr>';
                            $count++;
                        break;
                        default:
                            $count = 0;
                    }
                }
            ?>
        </table>
        <br>
        <center><input style="background-color: #eee; border: 1px solid #ccc; box-shadow: 10px 10px 10px -8px black; width: 250px; height: 100px; margin-left:3vw; cursor: pointer; font-family:Poppins; background-image:url(_imgs/bg2.jpg); background-size: contain; border: 2px solid #ccc; border-radius:10px; color:#eee; font-weight: bold; font-size: 28px;" type="submit" name="submit" value="Inscrever-se"></center>
        <br>
    </form>
</body>
</html>