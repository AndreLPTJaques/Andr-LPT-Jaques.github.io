<?php

$nome = addcslashes($_POST['nome']);
$email = addcslashes($_POST['email']);
$telefone = isset($_POST['telefone']) ? addcslashes($_POST['telefone']) : ''; // Opcional, se telefone estiver no formulário
$mensagem = addcslashes($_POST['mensagem']);

$para = "andreluisptj@gmail.com";
$assunto = "Coleta de dados";

$corpo = "Nome: ".$nome."\n"."E-mail: ".$email."\n"."Telefone: ".$telefone."\n"."Mensagem: ".$mensagem;

$cabeca = "From: andreluisptj@gmail.com"."\n"."Reply-To: ".$email."\n"."X-Mailer: PHP/".phpversion();

if(mail($para, $assunto, $corpo, $cabeca)){
    echo "E-mail enviado com sucesso!";
} else {
    echo "Aconteceu um erro ao enviar o e-mail.";
}

?>
