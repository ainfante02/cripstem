
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug =0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'outlook.office365.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'ainfante@isc-bunkerramo.com';                 // SMTP username
    $mail->Password = 'Inicio01';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to 
	
	//Server settings con gmail
    /* $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'arquimedes2122@gmail.com';                 // SMTP username
    $mail->Password = '18617892';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; */                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('soporteorchestra@isc-bunkerramo.com',$_POST['nombre']);
/*     $mail->addAddress($_POST['correo']); */
/* 	$mail->addAddress('oscar.lujan.zevallos@gmail.com'); 
    $mail->addAddress('ventas@cristemp.com');  */
	$mail->addAddress('arquimedes2122@gmail.com'); 

 
	
	

/*     $mail->addReplyTo('info@example.com', 'Information'); */


    //Attachments
   // $mail->addAttachments('isc.jpg','isclogo');         // Add attachments

    //Content
	$coment = ($_POST['comment']);
	$asunto = ($_POST['asunto']);
	$emaile =($_POST['email']);
	$NuTelefono=($_POST['numero']);
	$todos=('Correo Cliente:'.''."$emaile".'<br>'.'Asunto:'.''."$asunto".'<br>'.'Comentarios:'.''."$coment".'<br>'.'Telefono Contacto:'.''."$NuTelefono");
	
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = $todos;
	/*  $mail->Body    .= ($_POST['asunto']);
	  $mail->Body    .= ($_POST['email']); */
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
echo "<script language='javascript'>
alert('Mensaje enviado, muchas gracias.');
window.location.href = 'http://www.cristemp.com';
</script>";
/* 	header('Location: index.html'); 
exit; */

} catch (Exception $e) {
    echo 'Fallo el envio del Correo: ', $mail->ErrorInfo;
	
}


?>


