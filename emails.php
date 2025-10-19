<?php 
   ini_set ( 'display_errors' , 1); 
   error_reporting (E_ALL);

    include __DIR__.'/PHPMailer/src/PHPMailer.php';
    include __DIR__.'/PHPMailer/src/SMTP.php';

   session_start();
 
  function EnviaEmail ( $pEmailDestino, $pAssunto, $pHtml, 
                        $pUsuario = "ecommerce@efesonet.com", 
                        $pSenha = "u!G8mDRr6PBXkH6", 
                        $pSMTP = "smtp.efesonet.com" )  {    
   try {
     echo "<br>Tentando enviar para $pEmailDestino ...";
     $mail = new PHPMailer(); 
     $mail->IsSMTP(); 
     echo $pUsuario;

     $mail->Host = $pSMTP;
     $mail->SMTPAuth = true;                        
     
     $mail->SMTPSecure = 'tls';                          
     $mail-> SMTPOptions = array ( 'ssl' => array ( 'verificar_peer' => false, 'verify_peer_name' => false,
       'allow_self_signed' => true ) );
      
     $mail->Port = 587;   
      
     $mail->Username = $pUsuario; 
     $mail->Password = $pSenha; 
     $mail->From = $pUsuario; 
     $mail->FromName = "Recuperacao de senhas"; 
  
     $mail->AddAddress($pEmailDestino, "Usuario"); 
     $mail->IsHTML(true); 
     $mail->Subject = $pAssunto; 
     $mail->Body = $pHtml;
     $enviado = $mail->Send();
       
     if (!$enviado) {
        echo "<br>Erro: " . $mail->ErrorInfo;
     } 
     
     return $enviado;         
      
   } catch (PHPMailerException $e) {
     echo $e->errorMessage(); 
   } catch (Exception $e) {
     echo $e->getMessage();
   }      
  }


?>