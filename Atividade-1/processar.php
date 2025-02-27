<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

   
    echo "<h1>Dados Enviados:</h1>";
    echo "<p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>";
    echo "<p><strong>Telefone:</strong> " . htmlspecialchars($telefone) . "</p>";
    echo "<p><strong>E-mail:</strong> " . htmlspecialchars($email) . "</p>";
    echo "<p><strong>Mensagem:</strong> " . nl2br(htmlspecialchars($mensagem)) . "</p>";

   
    echo "<h2>Cabeçalhos da Requisição:</h2>";
    echo "<pre>" . print_r(getallheaders(), true) . "</pre>";

  
    echo "<h2>Método da Requisição:</h2>";
    echo "<p>" . $_SERVER['REQUEST_METHOD'] . "</p>";
}
?>
