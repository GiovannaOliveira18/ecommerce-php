<?php
include "util.php";

if ($_POST) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario && $senha) {
        setcookie('usuario', $usuario, time() + 86400);
        setcookie('senha', base64_encode($senha), time() + 86400);
    }

    $conn = conecta();

    $select = $conn->prepare("SELECT id_usuario, nome, senha, admin 
                              FROM usuario 
                              WHERE email = :usuario");

    $select->bindParam(":usuario", $usuario);
    $select->execute();

    $linha = $select->fetch(PDO::FETCH_ASSOC);

    if ($linha && password_verify($senha, $linha['senha'])) {
        $_SESSION['statusConectado'] = true;
        $_SESSION['id_usuario'] = $linha['id_usuario'];
        $_SESSION['admin'] = $linha['admin'];
        $_SESSION['login'] = $linha['nome'];
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['statusConectado'] = false;
        $_SESSION['admin'] = false;
        $_SESSION['login'] = "";
        echo "<script>alert('Usuário ou senha incorreta!!');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoLuxo - Entrar</title>
    <link rel="stylesheet" href="styleLogin.css">
    <link rel="stylesheet" href="styleHeader.css">
    <link rel="stylesheet" href="styleFooter.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="imgsEcomerce/SITE_EcoLuxo.png" alt="Logo EcoLuxo" height="100px">
        </div>
        
    <nav>
      <?php include "nav.php"; ?>
    </nav>

    </header>
    
  <div class="menu-secundario">
    <p>Faça seu Login e volte às compras</p>
  </div>


    <main>

    <div class="login-container">

    
        <div class="login-box">


            <form method="post" action="">
              <h1>Login</h1>

              <div class="input-box">
                  <input name="usuario" type="text" id="usuario" placeholder="Digite seu e-mail">
                  <i class="fa-solid fa-user"></i>
              </div>
               <div class="input-box">
               </div>
               <div class="input-box">
                   <input name="senha" type="password" id="senha" placeholder="Digite sua senha">
                   <i class="fa-solid fa-key"></i>
               </div>
               <div class="senha-link">
               <a href="esqueci.php" class="criar">Esqueci minha senha</a><br>
               </div>

                <button type="submit" class="btn-login" >Entrar</button>
              </form>
            </div>

            <div class="toggle-box">

              <div class="toggle-panel toggle-left">
                <h1>Olá, bem vindo!!</h1>
                <p>Não tem uma conta?</p>
                <a href="cadastro.php" class="registre-btn">REGISTRE-SE</a>

            </div>
        </div>
     </div>

    </main>

    
  <footer class="rodape">
    <div class="footer-container">
      <div class="footer-coluna">
        <h3>ECO LUXO</h3>
        <p>Sua lojinha virtual </p>
      </div>
      <div class="footer-coluna">
        <h4>Institucional</h4>
        <ul>
          <li><a href="QuemSomos.php">Entre em contato</a></li>
          <li><a href="QuemSomos.php">Sobre nós</a></li>
        </ul>
      </div>
      <div class="footer-coluna">
        <h4>Ajuda</h4>
        <ul>
          <li><a href="#">Política de Privacidade</a></li>
        </ul>
      </div>

      <div class="footer-pagamentos">

        <h4>Formas de Pagamento</h4>

        <div class="pagamentos-icones">
          <img src="https://img.icons8.com/color/48/pix.png" alt="Pix" title="Pix" style="width:25px;height:25px;">
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


