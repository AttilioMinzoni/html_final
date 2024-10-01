<?php require "config.ini"; ?>

<?php

ini_set ("SMTP","sh-pro26.hostgator.com.br");

$nome=$_POST["name"];

$email=$_POST["email"];

$telefone=$_POST["subject"];

$assunto="Solicitar Orçamento";

$mensagem=$_POST["message"];


if ($certo== "1")

{


mail ("$emaildest","$assunto","Nome:$nome\n\n Email: $email\n\n Telefone:$telefone\n\n Mensagem:\n$mensagem\n\n ...::: Recebido do site SMARTSAMU.COM.BR :::...","From:$nome<$email>");

}

// HTML do redirecionameto e se não redirecionar aparece um link

echo "<html><head>";

echo "<meta http-equiv=\"refresh\" content=\"0;url=$redirecionar\">";

echo "<title>Redirecionado ...</title>";

echo "</head><body bgcolor=\"#ffffff\">";

echo "<a href=\"$redirecionar\" target=\"_top\">Voltar Para O Site</a>";

echo "</body></html>";


?>