<?php
require_once __DIR__ . '/vendor/autoload.php'; 

// composer require tecnickcom/tcpdf

$pdf = new \TCPDF();


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('LUIZ ROBERTO SARDANHA');
$pdf->SetTitle('Atividade - 3');
$pdf->SetSubject('Atividade 3 da disciplina de Programação Web 2');

$pdf->AddPage();


$html = '
<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        text-align: center;
    }
    h1 {
        font-size: 24px;
        margin-top: 30px;
    }
    h2 {
        font-size: 18px;
        margin-top: 20px;
    }
    .footer {
        position: fixed;
        bottom: 10px;
        left: 0;
        right: 0;
        text-align: center;
        font-size: 25px;  
        color: #555;
    }
    .image {
        margin-top: 20px;
        text-align: center;
    }
    .image img {
        max-width: 200px;
        height: auto;
    }
</style>

<div>
    <h1>Atividade - 3</h1>
    <h2>Atividade 3 da disciplina de Programação Web 2</h2>
    <div class="image">
        <img src="https://i.ytimg.com/vi/bOL3k6PWXVo/maxresdefault.jpg" alt="Imagem Externa" width="200">
    </div>
</div>

<div class="footer">
    <p style="font-size: 20px;">LUIZ ROBERTO SARDANHA</p>
</div>
';

$pdf->writeHTML($html, true, false, true, false, '');

// Gerando o PDF
$pdf->Output('atividade-3.pdf', 'I')
?>
