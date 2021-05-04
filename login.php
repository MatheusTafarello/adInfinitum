<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Infinitum - Login</title>
    <link rel="icon" href="_imgs/logo.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="_css/login.css">
</head>

<style>
    @font-face {
    font-family: PoppinsR;
    src: url(../_fonts/Poppins/Poppins-Regular.ttf)
    }
</style>

<body style="background-image: url(_imgs/bg2.jpg); font-family: Poppins; height: max-content">
.
    <div id="logo"> 
        <img src="_imgs/logo.png" alt="logo" style="box-shadow: 10px 10px 10px -8px black; background-repeat: no-repeat; height:7vw; width:7vw; border-radius: 50%; position: relative; left: 45%; top: 2vw"> 
    </div>

    <div class="container" style="height: 10vw">
    <!-- box-shadow: 10px 10px 15px -2px black -->
        <div class="menu" style="padding-left: 1px; text-align: left; font-size: 18px; height: 55vh; width: 60vw; display: inline-block; background-color: rgba(187, 70, 187, 0); color: rgb(194, 194, 194); box-shadow:none; margin-top: -8vw; border: 70px solid transparent; border-left: 120px solid transparent; border-right:120px solid transparent; border-image: url(_imgs/border.png) 15% stretch; padding:1%">
        <div id="background" style="z-index: -1; position: relative; background-image: url(_imgs/background.png); background-position: center; position: relative; top: -3.15vw; left:-6.7vw ;height: 33.04vw; width:73.36vw; border-radius: 25px"> 
            <span id="logi" style="font-size: 45px; position: relative; top: 3vw; left: 5vw; color: rgb(255, 255, 255); text-shadow: 2px 2px black;font-weight: bold;"> Login </span>
            <form action="valogin.php" method="post" id="login" name="login" style="padding: 3vw">
        </div>
        <div id="campos" style="position: relative; z-index: 1; top: -30vw; left: -3.5vw">
                    <br>
                    <label for="user">
                        <input type="text" name="user" id="user" placeholder="Usuário ou E-mail" style="font-family: Poppins; color: rgb(0, 0, 0); font-size: 15px; height: 20px; width: 200px; background: rgb(255, 255, 255); margin-left: 2vw; margin-bottom: 1vw; margin-top: 4vw; box-sizing: content-box; border-top-style: none; border-top-left-radius: 7px; border-left-style: none; border-top-right-radius: 7px; border-right-style: none; border-bottom-left-radius: 7px; border-bottom-right-radius: 7px">
                    </label>
                    <br>
                    <label for="password"> 
                        <input type="password" name="password" id="password" placeholder=" Senha" style="font-family: Poppins; color: rgb(0, 0, 0); font-size: 15px; height: 20px; width: 200px; background: rgb(255, 255, 255); margin-left: 2vw; border-bottom: 0.2vw solid #ff7f11; text-align: left; margin-bottom: 1vw; box-sizing: content-box; border-top-style: none;border-top-left-radius: 7px; border-left-style: none; border-top-right-radius: 7px; border-right-style: none; border-bottom-left-radius: 7px; border-bottom-right-radius: 7px">
                    </label>
                    <br>
        </div>
                    <?php
                        session_start();
                        if(isset($_SESSION["login_error"]) && $_SESSION["login_error"] == 1){
                            echo "<span style='color: red; font-weight: bold; position:relative; top: -30vw; left: -8vw; font-size: 20px; text-shadow: 10px 3px 8px black'> Usuário ou Senha incorretos. </span>";
                        } 
                    ?>
        <button type="submit" id="entrar" style="cursor: pointer;  font-family:Verdana, Geneva, Tahoma, sans-serif; background-color: rgb(240, 48, 137); box-shadow: 10px 10px 10px -8px black; border: 2px solid rgb(255, 255, 255); color: rgb(245, 245, 245); font-size: 24px; float: left; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px; position:relative; top:-37vh">Entrar</button>
        </form>
            <div id="but" style="z-index: 1; top: -11vw; left: -3.5vw"> 
                <a href="cadastro.php"><button id="cadast" style=" position:absolute; top:85vh; left: 62vw; font-family:Verdana, Geneva, Tahoma, sans-serif; font-size: 24px;box-shadow: 10px 10px 10px -8px black; border: 2px solid rgb(255, 255, 255); -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px;font-family: Verdana, Geneva, Tahoma, sans-serif; background-color: rgb(240, 48, 137)">Não tenho uma conta</button></a>
            </div>
    </div>
</body>
</html> 