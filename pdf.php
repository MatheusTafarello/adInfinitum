<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    if(!$_SESSION["logged"]){
        header("Location: login.php");
    }
    require_once "fpdf/fpdf.php";
    
    $pdf = new FPDF("P");
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Image('_imgs/logopdf.png',60,150);
    $pdf->Cell(190,10,utf8_decode('Ad Infinitum'),0,0,"L");
    $pdf->Ln(15);
    $nome = $_SESSION["nome"];
    $user = $_SESSION["user"];
    $email = $_SESSION["email"];
    $data = $_SESSION["data_nascimento"];
    $pdf->SetFont("Arial","I",10);
    $pdf->Cell(50,7,utf8_decode($nome),1,0,"C");
    $pdf->Cell(40,7,utf8_decode($user),1,0,"C");
    $pdf->Cell(40,7,utf8_decode($email),1,0,"C");
    $pdf->Cell(60,7,  utf8_decode($data),1,0,"C");
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $conexao= mysqli_connect("127.0.0.1", "root", "", "adinfinitum") or die ("Falha na conexão");
    $check = " SELECT * FROM `matricula` WHERE id_aluno = '".$_SESSION['id']."' ORDER BY id DESC LIMIT ".$_SESSION['n_matricula']." OFFSET 0";
    $result = $conexao->query($check);

    $n = 0;
    $preco_final = 0;
    while($row = $result->fetch_assoc()) {
            $curso_id = $row["id_curso"];
            $curso = "SELECT * FROM `curso` WHERE id = '".$row["id_curso"]."'";
            $curso_r = $conexao->query($curso);
            $curso_row = $curso_r->fetch_assoc();
            $pdf->Ln();
            $pdf->SetFont('Arial','B',14);
            $pdf->Cell(40, 7, utf8_decode($curso_row["nome"]),0,0,"L");
            $pdf->Ln();
            $pdf->SetFont('Arial','',12);
            $pdf->Cell(20, 7, utf8_decode("R$".$curso_row["preco"].",00"),0,0,"R");
            $pdf->Line(20, 45, 210-20, 45);
            $preco_final += $curso_row["preco"];
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','',15);
    $pdf->Cell(36, 6, utf8_decode("Total a pagar: "),0,0,"C");
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(25, 7, utf8_decode("R$ ".$curso_row["preco"].",00"),0,0,"R");
    
    $pdf->Image('_imgs/cod.jpg',43,250);

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial','',35);
    $pdf->Cell(196, 6, utf8_decode("Bons Estudos!"),0,1,"C");

    $data =  date("Y")."/".date("m")."/".date("d");
    $data1 =  date('Y/m/d', strtotime($data.' + 5 days'));
    $insert = "INSERT INTO boleto (valor, data_compra, data_validade, id_usuario) VALUES ('".$preco_final."', '".$data."', '".$data1."', '".$_SESSION['id']."')";
    $conexao->query($insert);
    $pdf->Output();

    
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ad Infinitum - Boleto</title>
    <link rel="icon" href="_imgs/logo.png" type="image/gif" sizes="16x16">
</head>
<body>
</body>
</html> 

-> POR ALGUM MOTIVO A BIBLIOTECA NÃO FUNCIONA QUANDO EXISTE UM CABECALHO EM HTML ANTES.
POR ISSO EU COLOQUEI NO FINAL, E ASSIM O CABEÇALHO ACABA NÃO FUNCIONANDO. 
-->