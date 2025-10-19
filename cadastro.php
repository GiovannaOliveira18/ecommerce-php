<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>EcoLuxo - Cadastrar</title>
  <link rel="stylesheet" href="styleCadastro.css">
  <link rel="stylesheet" href="styleHeader.css">
  <link rel="stylesheet" href="styleFooter.css">
</head>

<header>
  <div class="logo">
    <img src="imgsEcomerce/SITE_EcoLuxo.png" alt="Logo EcoLuxo" height="80px">
  </div>

  <nav>
    <a href="index.html"><i class="fa-solid fa-house"></i> Home</a>
    <a href="Carrinho.html"><i class="fa-solid fa-cart-shopping"></i> Carrinho</a>
    <a href="login.html"><i class="fa-solid fa-user"></i> Login</a>
  </nav>
</header>

<br><br>

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
  <br><br>


    <!-- Footer -->

    <footer class="rodape">
      <div class="footer-container">
        <div class="footer-coluna">
          <h3>ECO LUXO</h3>
          <p>Sua lojinha virtual </p>
        </div>
        <div class="footer-coluna">
          <h4>Institucional</h4>
          <ul>
            <li><a href="QuemSomos.php">Sobre nós</a></li>
          </ul>
        </div>
        <div class="footer-coluna">
          <h4>Ajuda</h4>
          <ul>
            <li><a href="QuemSomos.php" id="contato">Contato</a></li>
            <li><a href="#">Política de Privacidade</a></li>
          </ul>
        </div>

        <div class="footer-pagamentos">

          <h4>Formas de Pagamento</h4>

          <div class="pagamentos-icones">
            <img src="https://cdn-icons-png.flaticon.com/512/639/639365.png" alt="Dinheiro" title="Dinheiro"
              style="width:25px;height:25px;">
          </div>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; 2025 Giovanna, Henrique Hikaru, Guilherme, Jefferson, Renan, Matheus Sgorlon. Todos os direitos
          reservados.</p>
      </div>
    </footer>


</body>
</html>

<?php 
    if ( $_POST ) {
      
      try{
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

      catch(Exception $e)
      {
        echo "<script> alert('Usuário ja criado');
        </script>";
      }

    }
?>

