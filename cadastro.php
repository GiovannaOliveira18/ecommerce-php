<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Adicionar Usuário - Eco Luxo</title>
  <link rel="stylesheet" href="styleCadastro.css">
  <link rel="stylesheet" href="styleHeader.css">
</head>

<body>
  <div class="container">
    <h2>Cadastro de Usuário</h2>
    
    <form action="" id="CadastroForm" method="post">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required>

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>

      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" required>

      <button type="submit">Enviar</button>
    </form>

    <div class="links">
      <a href="index.php">Página inicial</a>
      <a href="login.php">Login</a>
    </div>
  </div>
</body>
</html>

<?php 
    if ( $_POST ) {
        include "cabecalho.php";
        include "util.php";
        
        $conn = conecta();

        $nome  = $_POST['nome'];
        $email = $_POST['email'];

        $senha = password_hash($_POST['senha'],PASSWORD_DEFAULT);

        $insert = $conn->prepare("insert into usuario (nome,email,senha,admin) values
                                (:nome,:email,:senha,false)");

        $insert->bindParam(":nome",$nome);
        $insert->bindParam(":email",$email);
        $insert->bindParam(":senha",$senha);

        if ( $insert->execute() ) {
            echo "<script>alert('Usuário $nome criado com sucesso !');</script>";

            setcookie('usuario', $_POST['email'], time() + 86400);
            setcookie('senha', base64_encode($_POST['senha']), time() + 86400);

            $_SESSION['statusConectado'] = true;
            $_SESSION['login'] = $nome;
            $_SESSION['admin'] = false;

            header('Location: index.php');
        }
    }
    

?>

