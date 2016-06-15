<?php
 
/* Medida preventiva para evitar que outros dom�nios sejam remetente da sua mensagem. */
if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
        $emailsender='info@simplewaybrazil.com'; // Substitua essa linha pelo seu e-mail@seudominio
} else {
        $emailsender = "webmaster@" . $_SERVER[HTTP_HOST];
        //    Na linha acima estamos for�ando que o remetente seja 'webmaster@seudominio',
        // Voc� pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
}
 
/* Verifica qual �o sistema operacional do servidor para ajustar o cabe�alho de forma correta.  */
if(PATH_SEPARATOR == ";") $quebra_linha = "\r\n"; //Se for Windows
else $quebra_linha = "\n"; //Se "não for Windows"
 
// Passando os dados obtidos pelo formul�rio para as vari�veis abaixo
$nomeremetente     = $_POST['nomeremetente'];
$emailremetente    = $_POST['emailremetente'];
$emaildestinatario =  'info@simplewaybrazil.com';
$comcopia          = $_POST['comcopia'];
$comcopiaoculta    = $_POST['comcopiaoculta'];
$assunto           = $_POST['assunto'];
$mensagem          = $_POST['mensagem'];
 
 
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '<P>Esse email foi enviado pelo Formul�rio de Contato do Site</P>
<P>Segue os Dados do Cliente:</P>
<p><b>Nome:</b> '.$nomeremetente.'
<p><b>E-mail:</b> '.$emailremetente.'
<p><b>Assunto:</b> '.$assunto.'
<p><b>Mensagem:</b> '.$mensagem.'
<hr>';
 
 
/* Montando o cabeçalho da mensagem */
$headers = "MIME-Version: 1.1" .$quebra_linha;
$headers .= "Content-type: text/html; charset=iso-8859-1" .$quebra_linha;
// Perceba que a linha acima cont�m "text/html", sem essa linha, a mensagem n�o chegar� formatada.
$headers .= "From: " . $emailsender.$quebra_linha;
$headers .= "Cc: " . $comcopia . $quebra_linha;
$headers .= "Bcc: " . $comcopiaoculta . $quebra_linha;
$headers .= "Reply-To: " . $emailremetente . $quebra_linha;
// Note que o e-mail do remetente ser� usado no campo Reply-To (Responder Para)
 
/* Enviando a mensagem */

//� obrigat�rio o uso do par�metro -r (concatena��o do "From na linha de envio"), aqui na Locaweb:

if(!mail($emaildestinatario, $assunto, $mensagemHTML, $headers ,"-r".$emailsender)){ // Se for Postfix
    $headers .= "Return-Path: " . $emailsender . $quebra_linha; // Se "n�o for Postfix"
    mail($emaildestinatario, $assunto, $mensagemHTML, $headers );
}
 
/* Mostrando na tela as informa��es enviadas por e-mail */
echo '<script type="text/javascript">location.href="contato_enviado";</script>';
?>