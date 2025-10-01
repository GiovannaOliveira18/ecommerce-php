<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ECO LUXO</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="styleHeader.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="script.js"></script>

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


  <div class="menu-secundario">
    <a href="QuemSomos.php">Quem somos</a>
  </div>

  <main>

    <section class="produtos-secao">
      <h2>Ecobags personalizadas</h2>

      <div class="produtos-scroll">
        <div class="card">
          <img src="imgsEcomerce/bolsaMec.png" alt="Ecobag Curso Mecânica">
          <p>Ecobag Curso Mecânica</p>
          <span>R$ 25,00</span>
        </div>
        <div class="card">
          <img src="imgsEcomerce/bolsaInf.png" alt="Ecobag Curso Informática">
          <p>Ecobag Curso Informática</p>
          <span>R$ 25,00</span>
        </div>
        <div class="card">
          <img src="imgsEcomerce/bolsaEle.png" alt="Ecobag Curso Eletrônica">
          <p>Ecobag Curso Eletrônica</p>
          <span>R$ 25,00</span>
        </div>
        <div class="card">
          <img src="imgsEcomerce/bolsaSla.png" alt="Ecobag Diversas">
          <p>Ecobag Diversas</p>
          <span>R$ 25,00</span>
        </div>
        <div class="card">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQz5460vtVj_DGjABKX4sFdGW7WFjEWvCJdcQ&s"
            alt="Perfumes">
          <p>Perfume</p>
          <span>R$ 25,00</span>
        </div>
      </div>
    </section>

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