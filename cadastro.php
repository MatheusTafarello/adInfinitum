<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Infinitum - Cadastro</title>
    <link rel="stylesheet" href="_css/cadastro.css">
    <link rel="icon" href="_imgs/logo.png" type="image/gif" sizes="16x16">
</head>
<body style="background-image: url(_imgs/bdcad.jpg); background-size: cover;">
    
    <div class="cabecalho"> 
        <img src="_imgs/logo.png" alt="logo"> 
    </div>
    <div class="container">
        <div class="formulario">
            <form action="cadastro.php" method="post" id="login" name="login">
                    <label id="cad" style=" text-shadow: 2px 2px black"> Cadastro! </label>
                    <br>
                    <br>
                    <label for="user" style=" text-shadow: 2px 2px black; color:white">Nome de usuário: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="user" id="user" value="<?php echo isset($_POST['user']) ? $_POST['user'] : '' ?>"></label>
                    <br>
                    <label for="name" style=" text-shadow: 2px 2px black; color:white">Nome Completo: &nbsp;<input type="text" name="name" id="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"></label>
                    <br>
                    <label for="email" style=" text-shadow: 2px 2px black; color:white">E-mail: &nbsp;<input type="email" name="email" id="email" placeholder="exemplo@email.com" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"></label>
                    <br>
                    <label for="senha" style=" text-shadow: 2px 2px black; color:white">Senha: &nbsp;<input type="password" name="senha" id="senha" placeholder="Mínimo 3 caracteres" value="<?php echo isset($_POST['senha']) ? $_POST['senha'] : '' ?>"></label> <br> <label for="senha" style=" text-shadow: 2px 2px black; color:white">Repita sua Senha: &nbsp;<input type="password" name="resenha" id="resenha" value="<?php echo isset($_POST['resenha']) ? $_POST['resenha'] : '' ?>"></label>
                    <br>
                    <label for="b_date" style=" text-shadow: 2px 2px black; color:white">Data de nascimento: &nbsp;<input type="date" name="b_date" id="b_date">
                    <br>
                    <button type="submit" style="margin-top: 20px;">CADASTRAR</button>
            </form>
        </div>
            
            <div style="color: red; margin-top: 80px">
                <?php
                    error_reporting(E_ERROR | E_PARSE);
                    session_start();
                    if(isset($_POST["user"])){
                        $user = $_POST["user"];
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                        $senha = $_POST["senha"];
                        $resenha = $_POST["resenha"];
                        $bdate = $_POST["b_date"];
                        echo $bdate;

                        $conexao= mysqli_connect("127.0.0.1", "root", "", "adinfinitum") or die ("Falha na conexão");
                        $select_user = " SELECT * FROM `usuario` WHERE user = '".$user."'";
                        $select_email = " SELECT * FROM `usuario` WHERE email = '".$email."'";
                        // $return = mysqli_query($conexao, $select)
                        $result_email = $conexao->query($select_email);
                        $result_user = $conexao->query($select_user);

                        if ($result_user->num_rows > 0) {
                            echo "Nome de usuário já cadastrado.";
                        }
                        elseif ($result_email->num_rows > 0) {
                            echo "E-mail já cadastrado.";
                        }
                        elseif(!strpos($name, ' ')){
                            echo "Somente um nome informado<br>";
                        }
                        elseif(!$senha === $resenha){
                            echo "As senhas não coincidem<br>";
                        }
                        elseif(date("Y")-substr($bdate, 0, 4) < 18){
                            echo "É preciso ter mais de 18 anos para entrar na plataforma";
                        }
                        else{
                            $conexao= mysqli_connect("127.0.0.1", "root", "", "adinfinitum") or die ("<bold>Falha na conexão</bold>");
                            $insert = "INSERT INTO usuario (user, nome, email, senha, data_nascimento) VALUES ('".$user."', '".$name."', '".$email."', '".$senha."', '".$bdate."')";
                            mysqli_query($conexao, $insert);
                            header("Location: login.php");
                        }
                    }
                ?>
            </div>
        </div>
</body>
</html>