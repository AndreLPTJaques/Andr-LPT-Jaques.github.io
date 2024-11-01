<?php

$nome = addcslashes($_POST['nome']);
$email = addcslashes($_POST['emial']);
$telefone = addcslashes($_POST['telefone']);
$mensagem = addcslashes($_POST['mensagem']);

$para = "andreluisptj@gmail.com";
$assunto = "Coleta de dados";

$corpo = "Nome: ".$nome."\n"."E-mail: ".$email."\n"."Telefone: ".$telefone."\n"."Mensagem: ".$mensagem;

$cabeca = " From: andreluisptj@gmail.com"."\n"."Reply-to: ".$email."\n"."X=Mailer:PHP/".phpversion();

if(mail($para,$assunto,$corpo,$cabeca)){
    echo("E-mail enviado com sucesso!");
} else {
    echo("Aconteceu um erro ao enviar o e-mail.");
}

?>