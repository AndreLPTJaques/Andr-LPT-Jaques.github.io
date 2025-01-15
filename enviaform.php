<?php

// Validação dos dados recebidos
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

// Verificar se os dados obrigatórios foram preenchidos
if (!$nome || !$email || !$telefone || !$mensagem) {
    echo "Por favor, preencha todos os campos corretamente.";
    exit;
}

$para = "andreluisptj@gmail.com";
$assunto = "Coleta de dados";

// Corpo do e-mail
$corpo = "Nome: $nome\n";
$corpo .= "E-mail: $email\n";
$corpo .= "Telefone: $telefone\n";
$corpo .= "Mensagem: $mensagem\n";

// Cabeçalhos do e-mail
$cabeca = "From: $para\n";
$cabeca .= "Reply-To: $email\n";
$cabeca .= "X-Mailer: PHP/" . phpversion();
$cabeca .= "Content-Type: text/plain; charset=UTF-8\n";  // Definir o charset corretamente

// Envio do e-mail
if (mail($para, $assunto, $corpo, $cabeca)) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Ocorreu um erro ao enviar o e-mail. Tente novamente mais tarde.";
}
?>
