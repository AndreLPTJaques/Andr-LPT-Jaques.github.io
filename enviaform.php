<?php
// Verifique se os campos estão preenchidos e recebendo valores
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);

if (!$nome || !$email || !$mensagem) {
    echo "Preencha todos os campos corretamente.";
    exit;
}

$para = "andreluisptj@gmail.com";
$assunto = "Coleta de dados";

// Formata o corpo do e-mail
$corpo = "Nome: $nome\n";
$corpo .= "E-mail: $email\n";
$corpo .= "Mensagem: $mensagem\n";

// Cabeçalhos de e-mail (corrigidos)
$cabecalhos = "From: andreluisptj@gmail.com\r\n";
$cabecalhos .= "Reply-To: $email\r\n";
$cabecalhos .= "X-Mailer: PHP/" . phpversion();

// Envia o e-mail e trata possíveis erros
if (mail($para, $assunto, $corpo, $cabecalhos)) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "Erro ao enviar o e-mail. Verifique as configurações do servidor de e-mail.";
}
?>
