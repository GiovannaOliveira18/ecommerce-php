<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoLuxo - Esqueci a senha</title>
    <link rel="stylesheet" href="styleEsqueciSenha.css">
</head>
<body>
    <div class = "container">
     <h3>Insira seu usuário:</h3>
     <form action='' method='post'>  
          <label for = "redEmail">E-mail de Redefinição:</label>
          <input type='text' name='email' required><br> 
                <button type='submit' class="verifica">Prosseguir</button>
     </form>
          <div class="links">
               <a href="index.html">Página inicial</a>
               <a href="login.php">Login</a>
          </div>

          <div class="verifica">
          <?php 
                include "util.php";
                include "emails.php";
        
                if ( $_POST ) {   
                  $conn = conecta();
                  $email = $_POST['email'];
                  $select = $conn->prepare("select nome,senha from usuario where email=:email ");
                  $select->bindParam(':email',$email);
                  $select->execute();
                  $linha = $select->fetch();
                  
                  if ( $linha ) {
                    
                    $token = $linha['senha']; 
                    
                    $nome = $linha['nome'];
                    
                    $seusite = "eq2.ini2a"; 
                    
                    $html="<h4>Redefinir sua senha</h4><br>
                          <b>Olá, $nome!</b>, <br>
                          Clique no link para redefinir sua senha:<br>
                          http://$seusite.projetoscti.com.br/redefinir.php?token=$token<br>
                          <br><b>Caso você não tenha solicitado a redefinição, ignore este e-mail!<b>";
                    
                    $_SESSION["email"] = $email;
        
                    if ( EnviaEmail ( $email, '* Recupere a sua senha !! *', $html ) ) {
                      echo "<br><b>Email enviado com sucesso</b> (verifique sua caixa de spam se nao encontrar)";
                    }   
        
                  } else {
                    echo "<br>Email não cadastrado";
                  }
        
                  echo "<br><br><a href='login.php'>Voltar</a>";
                }
          ?>
        </div>
    </div>
</body>
</html>