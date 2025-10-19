<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoLuxo - Adicionar Administradores</title>
    <link rel="stylesheet" href="styleAdm.css">
    <link rel="stylesheet" href="styleHeader.css">
    <link rel="stylesheet" href="styleFooter.css">
</head>
<body>
<header>
    <div class="logo">
      <img src="imgsEcomerce/SITE_EcoLuxo.png" alt="Logo EcoLuxo" height="80px">
    </div>

    <?php include "nav.php"; ?>

    <!--<nav>
      <a href="carrinho.php"><i class="fa-solid fa-cart-shopping"></i> Carrinho</a>
      <a href="login.php"><i class="fa-solid fa-user"></i> Login</a>
    </nav>-->

    <div class="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>

  <div class="container">
    <form action="" method="post"><br>
        NOME COMPLETO:<br>
        <input type="text" name="nome"><br>
        USUÁRIO:<br>
        <input type="text" name="usuario"><br>
        SENHA:<br>
        <input type="password" name="senha"><br>
        <input type="submit" value="enviar">
    </form>
  </div>


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
        try {
            include "util.php";
        
            $conn = conecta();

            $nome    = $_POST['nome'];
            $usuario = $_POST['usuario'];

            $senha   =  password_hash($_POST['senha'],PASSWORD_DEFAULT);

            $insert = $conn->prepare("insert into usuario (nome,email,senha,admin) values
                                    (:nome,:usuario,:senha,true)");

            $insert->bindParam(":nome",$nome);
            $insert->bindParam(":usuario",$usuario);
            $insert->bindParam(":senha",$senha);

            if ( $insert->execute() ) {
                echo "<script>alert('Admin $nome criado com sucesso !');</script>";
                header('Location: index.php');
            }
        } catch (Exception $e) {
            echo "<script>alert('Erro ao criar admin: ".$e->getMessage()."');</script>";
        }
    }
    

?>