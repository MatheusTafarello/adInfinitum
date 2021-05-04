<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Infinitum - Confirmação</title>
    <link rel="stylesheet" href="_css/conf.css">
    <link rel="icon" href="_imgs/logo.png" type="image/gif" sizes="16x16">
</head>
    <?php
        error_reporting(E_ERROR | E_PARSE);
        session_start();
        if(!$_SESSION["logged"]){
            header("Location: login.php");
        }
        
    ?>
<body>
    <div class="container">
        <div class="conteudo" style="height: auto">
            <table border="0" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif" width="950px">
                <tr>
                    <td style="border-bottom: 2px solid #333">
                        <img class="logo" src="_imgs/logo.png" alt="" width="70px">
                    </td>
                    <td valign="middle" style="border-bottom: 2px solid #333">
                        <h1 style="margin-left: 24vh">Boleto de Pagamento</h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" height="100px" valign="top" style="padding-top: 20px; font-size: 24px"> 
                    <p style="text-align: center">
                            <?php 
                                echo $_SESSION["user"]."<br>";
                                echo $_SESSION["email"]."<br>";
                                echo $_SESSION["nome"]."<br>";
                            ?>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <span style="font-size: 32px"><b>Cursos matriculados</b></span>
                        <br>
                        <br>
                        <br>
                        <br>
                    </td>
                </tr>
                <?php
                    $conexao= mysqli_connect("127.0.0.1", "root", "", "adinfinitum") or die ("Falha na conexão");
                    $check = " SELECT * FROM `matricula` WHERE id_aluno = '".$_SESSION['id']."' ORDER BY id DESC LIMIT ".$_SESSION['n_matricula']." OFFSET 0";
                    $result = $conexao->query($check);
                    // $n_max =  $_SESSION['n_matricula'];
                    $n = 0;
                    $preco_final = 0;
                    while($row = $result->fetch_assoc()) {
                            $curso_id = $row["id_curso"];
                            $curso = "SELECT * FROM `curso` WHERE id = '".$row["id_curso"]."'";
                            $curso_r = $conexao->query($curso);
                            $curso_row = $curso_r->fetch_assoc();
                            echo "<tr style='font-size: 20px'><td colspan='2' align='left'><b>Nome: </b>".$curso_row["nome"]."<br><br><b>Descrição: </b>".$curso_row["descricao"]."<br><br><b>Categoria: </b>".$curso_row["categoria"]."<br><br><b>Preço: </b>R$ ".number_format($curso_row["preco"], 2, "," , ".")."<br><br><br></td></tr>";
                            $preco_final += $curso_row["preco"]."<br><br>";
                    }
                    
                    echo "<tr style='font-size: 28px' align='left'><td colspan='2'><br><br><b>Preço final:</b> R$ ".number_format($preco_final, 2, "," , ".")."</td></tr>";
                ?>
            </table>
            <tr>
                    <td colspan="2">
                        <a href="pdf.php"><button style="margin-top: 20px; margin-left: 27vw; margin-bottom: 30px;background-image:url(_imgs/bg2.jpg); background-size: contain; box-shadow: 10px 10px 10px -8px black; border: 2px solid rgb(255, 255, 255); color: rgb(245, 245, 245); font-size: 24px; -webkit-border-radius: 8px; -moz-border-radius: 8px; border-radius: 8px; cursor: pointer">Gerar Boleto</button></a>
                    </td>
                </tr>
        </div>
    </div>
</body>
</html>