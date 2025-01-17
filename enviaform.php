<?php

// Validação e sanitização dos dados enviados pelo formulário
$nome = htmlspecialchars($_POST['nome'] ?? '');
$email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$telefone = htmlspecialchars($_POST['telefone'] ?? '');
$mensagem = htmlspecialchars($_POST['mensagem'] ?? '');

// Validações básicas para evitar envio de dados vazios
if (empty($nome) || empty($email) || empty($telefone) || empty($mensagem)) {
    echo "Por favor, preencha todos os campos corretamente.";
    exit;
}

// Validação de e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Por favor, insira um e-mail válido.";
    exit;
}

// Configurações do e-mail
$para = "andreluisptj@gmail.com";
$assunto = "Coleta de dados";

$corpo = "Nome: $nome\nE-mail: $email\nTelefone: $telefone\nMensagem: $mensagem";

$cabeca = "From: $email\r\n" .
          "Reply-To: $email\r\n" .
          "X-Mailer: PHP/" . phpversion();

// Envio do e-mail
if (mail($para, $assunto, $corpo, $cabeca)) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Aconteceu um erro ao enviar o e-mail.";
}

?>
