<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Infinitum - Home</title>
    <link rel="icon" href="_imgs/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="_css/home.css">
</head>

<style>
@font-face {
    font-family: Poppins;
    src: url(_fonts/Poppins/Poppins-Regular.ttf)
}

@font-face {
    font-family: "Jackport College NVC";
    src: url(_fonts/JackportCollegeNcv-1MZe.ttf) format(TrueTypeFont)
}

html,
body {
    padding: 0;
    margin: 0;
    background-color: #fff;
    background-image: url(_imgs/bg.jpg);
}

.polling_message {
    color: rgb(0, 0, 0);
    float: left;
    margin-right: 2%;
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

.container {
    width: 100vw;
    height: 100px;
    background-color: rgb(255, 255, 255);
    border-bottom: rgb(212, 212, 212) solid 2px;
    border-top: rgb(153, 153, 153) dashed 1px;
}

a {
    text-decoration: none;
    color: rgb(0, 0, 0);
}

li {
    list-style-type: none;
}

table td,
table th {
    border: 2px solid rgb(221, 221, 221);
}

button {
    margin-left: 1.5vw;
    font-size: 14px;
    font-family: Poppins;
    border: black 1px solid;
    background-color: white;
}

</style>


<body>
    <div class="container" style="position: relative; z-index: 10">
        <div class="menu">
            <img src="_imgs/logo.png" alt="Logo" height="80px" style="margin-top: 10px; margin-left: 45px; margin-right:45px; -webkit-filter: drop-shadow(px 0px 10px #000); filter: drop-shadow(0px 0px 5px #000); cursor:pointer">
            <span style="font-family:'Verdana'; font-size: 85px; color: #222;text-shadow: 2px 2px 1px black">Ad Infinitum</span> &emsp;&emsp;&emsp;
            <a href="catalogo.php">
                <img src ="_imgs/categorias.png" height="20px" style="margin-left: 34vw; position:relative; top: 0.32vw">
                <span style="color: black; font-family: Poppins"> <b style="color: #333">Catálogo</b></span> 
            </a>
            <a href="perfil.php">
                <div> 
                    <img style="margin-left:92vw; position:relative; top:-3vw; box-shadow: 10px 10px 10px -8px; border-radius: 50%"
                    <?php
                        session_start();
                        if(!$_SESSION["logged"]){
                            header("Location: login.php");
                        }
                        // echo "<span style='font-family: Poppins;'><b>".ucwords($_SESSION["user"])."</b></span style='font-family: Poppins> - ".$_SESSION["email"];
                    ?>
                        <img src="_imgs/profile.png" alt="" height="50px" style="border: 1px solid black">
                </div>
                        <a href="logout.php" style="margin-left: 97vw; position:relative; top: -6vw">
                            <span style="color: black; font-family: Poppins"> 
                            <b style="color: #333">Sair</b>
                            </span>
                        </a>
            </a>
    <div class="view_port" style="position: relative; top:-5.3vw; z-index: -1; height: 5px; background-color: #eee; border-bottom: 2px #ccc solid; color: black">
        <div class="polling_message"></div>
        <div class="cylon_eye"></div>
    </div>
            <div style="margin-top: 30px; margin-left: 120px; color: black; margin-right: 20px; font-size: 22px">
        <?php
            echo "<b style='font-size: 18px; font-family: Poppins; color: white; position: relative; left: 73vw; top: -6vw'>Bem-vindo(a) de volta, ".$_SESSION["user"]."</b>";
        ?>
            <ul class="side-categories" style="display:none; font-family: Poppins;position:absolute; z-index: 3">
                <div style="margin-left: 470px; background-color: #eee; width: 200px;border-radius: 25px; z-index: 4;">
                    <li>&emsp;</li>
                    <li><a href=""> &emsp;Cosmologia</li></a>
                    <hr color="#fff">
                    <li><a href=""> &emsp;História do Direito</li></a>
                    <hr color="#fff">
                    <li><a href=""> &emsp;Aristóteles</li></a>
                    <hr color="#fff">
                    <li><a href=""> &emsp;O Enigma Quântico</li></a>
                    <hr color="#fff">
                    <li><a href=""> &emsp;Simbolismo</li></a>
                    <li>&emsp;</li>
                </div>
            </ul>
        </div>
    </div>
        <b style="font-size: 26px; line-height: 50px; font-size: 22px; font-family: Poppins; position: relative; left: 3vw; top: -5vw; color: white">Confira nossos cursos acessando o catálogo! <br><br> Aprenda algo novo hoje!</b>
        <b style="font-size: 18px; font-family: Poppins; position: relative; left: -2vw; color: white"> Recomendações: </b><br>
        <br>

        <?php
            error_reporting(E_ERROR | E_PARSE);
            $conexao= mysqli_connect("127.0.0.1", "root", "", "adinfinitum") or die ("Falha na conexão");
            $select = " SELECT * FROM `curso` WHERE id = '1'";
            $result = $conexao->query($select);
            $dados = $result->fetch_assoc();
            $nome1 = $dados["nome"];
            $preco1 = $dados["preco"];
            $categoria1 = $dados["categoria"];

            $select = " SELECT * FROM `curso` WHERE id = '2'";
            $result = $conexao->query($select);
            $dados = $result->fetch_assoc();
            $nome2 = $dados["nome"];
            $preco2 = $dados["preco"];
            $categoria2 = $dados["categoria"];

            $select = " SELECT * FROM `curso` WHERE id = '3'";
            $result = $conexao->query($select);
            $dados = $result->fetch_assoc();
            $nome3 = $dados["nome"];
            $preco3 = $dados["preco"];
            $categoria3 = $dados["categoria"];

            $select = " SELECT * FROM `curso` WHERE id = '5'";
            $result = $conexao->query($select);
            $dados = $result->fetch_assoc();
            $nome4 = $dados["nome"];
            $preco4 = $dados["preco"];
            $categoria4 = $dados["categoria"];

            $select = " SELECT * FROM `curso` WHERE id = '6'";
            $result = $conexao->query($select);
            $dados = $result->fetch_assoc();
            $nome5 = $dados["nome"];
            $preco5 = $dados["preco"];
            $categoria5 = $dados["categoria"]; 
            ?>

        <table style=" margin-left:1vw; margin-right:1vw; margin-top:-1vw;box-shadow: 0px 0px 4px #333; color: #111; font-family: Prompt; border-color: #eee">
            <tr>
            <td valign="middle" align="center" style="background-color:white; width: 20vw; height: 18vh; cursor:pointer"><?php echo "<img src='_imgs/".$categoria1.".jpg' alt='' width='200px' height='100%'>"?></td>
                <td valign="middle" align="center" style="background-color:white; width: 20vw; height: 18vh; cursor:pointer"><?php echo "<img src='_imgs/".$categoria2.".jpg' alt='' width='200px' height='100%'>"?></td>
                <td valign="middle" align="center" style="background-color:white; width: 20vw; height: 18vh; cursor:pointer"><?php echo "<img src='_imgs/".$categoria3.".jpg' alt='' width='200px' height='100%'>"?></td>
                <td valign="middle" align="center" style="background-color:white; width: 20vw; height: 18vh; cursor:pointer"><?php echo "<img src='_imgs/".$categoria4.".jpg' alt='' width='200px' height='100%'>"?></td>
                <td valign="middle" align="center" style="background-color:white; width: 20vw; height: 18vh; cursor:pointer"><?php echo "<img src='_imgs/".$categoria5.".jpg' alt='' width='200px' height='100%'>"?></td>
            </tr>
            <tr align="center" valign="center">
                <td style="background-color: #eee; max-width: 20vw; height: 8vh;font-size: 20px"><b><?php echo $nome1; ?></b></td>
                <td style="background-color: #eee; max-width: 20vw; height: 8vh;font-size: 20px"><b><?php echo $nome2; ?></b></td>
                <td style="background-color: #eee; max-width: 20vw; height: 8vh;font-size: 20px"><b><?php echo $nome3; ?></b></td>
                <td style="background-color: #eee; max-width: 20vw; height: 8vh;font-size: 20px"><b><?php echo $nome4; ?></b></td>
                <td style="background-color: #eee; max-width: 20vw; height: 8vh;font-size: 20px"><b><?php echo $nome5; ?></b></td>
            </tr>
            <tr align="right" valign="center" style="margin-top: 10px">
                <td style="background-color: #eee; max-width: 20vw; height: 5vh"><span style="float: left; font-size: 14px"> <a href="catalogo.php"><button style="cursor: pointer">Ver no catálogo</button></a></span><span style="color: goldenrod; margin-right: 2vw"><b>R$ <?php echo number_format($preco1, 2, "," , "."); ?></b></span> </td>
                <td style="background-color: #eee; max-width: 20vw; height: 5vh"><span style="float: left; font-size: 14px"> <a href="catalogo.php"><button style="cursor: pointer">Ver no catálogo</button></a></span><span style="color: goldenrod; margin-right: 2vw"><b>R$ <?php echo number_format($preco2, 2, "," , "."); ?></b></span> </td>
                <td style="background-color: #eee; max-width: 20vw; height: 5vh"><span style="float: left; font-size: 14px"> <a href="catalogo.php"><button style="cursor: pointer">Ver no catálogo</button></a></span><span style="color: goldenrod; margin-right: 2vw"><b>R$ <?php echo number_format($preco3, 2, "," , "."); ?></b></span> </td>
                <td style="background-color: #eee; max-width: 20vw; height: 5vh"><span style="float: left; font-size: 14px"> <a href="catalogo.php"><button style="cursor: pointer">Ver no catálogo</button></a></span><span style="color: goldenrod; margin-right: 2vw"><b>R$ <?php echo number_format($preco4, 2, "," , "."); ?></b></span> </td>
                <td style="background-color: #eee; max-width: 20vw; height: 5vh"><span style="float: left; font-size: 14px"> <a href="catalogo.php"><button style="cursor: pointer">Ver no catálogo</button></a></span><span style="color: goldenrod; margin-right: 2vw"><b>R$ <?php echo number_format($preco5, 2, "," , "."); ?></b></span> </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
    
    <footer style="position: fixed; bottom: 0; width: 100%; height: 70px;">
        <hr>  </hr>
        <span style="position: absolute; margin-top: 10px; margin-left: 45vw; font-family: Prompt; color: white; font-weight: bold;">2020 Matheus Tafarello<img src="_imgs/bg2.jpg" style="position: relative; z-index: -1; top: -80vw; left:-50vw; width:120vw; opacity:0.6"> </span>
    </footer>
    <div style="color: white">
    </div>

</body>
</html>