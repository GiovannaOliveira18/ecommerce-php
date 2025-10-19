<?php
include "util.php";
$conn = conecta();

try {
  $sql = "SELECT id_produto, nome, descricao, tipo, valor_unitario, qtde_produtos, excluido, imagem
            FROM produto ORDER BY id_produto";

  $stmt = $conn->query($sql);
  $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  die("Erro ao buscar produtos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>EcoLuxo - Página Inicial</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="styleHeader.css">
  <link rel="stylesheet" href="styleProduto.css">
  <link rel="stylesheet" href="styleFooter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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
    <p>BEM VINDO A NOSSA LOJINHA !!</p>
  </div>

  <!-- home -->
  <section class="home" id="home">

  <div class="content btn">

  <h3>ECO LUXO</h3>
    <span> PRODUTOS SUSTENTÁVEIS</span>
    <p>Ecobags artesanais e perfumes irresistíveis em um só lugar!
    Ecobags feitas à mão com materiais sustentáveis, cheias de estilo e personalidade. Para completar, fragrâncias leves e marcantes que trazem bem-estar em cada borrifada. Sustentabilidade, beleza e aroma em produtos feitos com carinho.</p>
    <p>✨ Presenteie-se ou surpreenda alguém com essa combinação encantadora de beleza, aroma e sustentabilidade!</p>
 
  </div>
  </section>

      <!-- Diferenciais -->

      <section id="sobre" class="diferenciais">
      <div class="wrap grid-3">
        <div class="feature fade-up">
          <h3>Produção consciente</h3>
          <p> Resistente e cheia de estilo. Perfeita para o dia a dia, 
            ajuda a reduzir o uso de sacos plásticos e cuida do planeta com charme. </p>
        </div>
        <div class="feature fade-up" style="--delay:0.08s">
          <h3>Acabamento premium</h3>
          <p>Produtos feito a mão, pondo a arte do artesanado em ação!!</p>
        </div>
        <div class="feature fade-up" style="--delay:0.16s">
          <h3>Design exclusivo</h3>
          <p>Criações personalizadas — de estampas minimalistas a artes complexas.</p>
        </div>
      </div>
    </section>



  <div class="container" id="prod">

    <h3 class="title"> ECO BAGS </h3>

    <div class="products-container">

      <?php foreach ($produtos as $p):
      if ($p["excluido"] == false) {
        $id_produto = $p['id_produto'];
        $nome = htmlspecialchars($p['nome']);
        $tipo = htmlspecialchars($p['tipo']);
        $valor_unitario = number_format($p['valor_unitario'], 2, ',', '.');
        $imagem = !empty($p['imagem']) ? "imgsEcomerce/" . htmlspecialchars($p['imagem']) : "imgsEcomerce/sem-imagem.png";
      }
      else {
        continue;
      }
      ?>
        <div class="product" data-name="p-<?= $id_produto ?>">
          <img src="<?= $imagem ?>" alt="<?= $nome ?>">
          <h3><?= $nome ?></h3>
          <div class="price">R$ <?= $valor_unitario ?></div>
          <a href="carrinho.php?operacao=incluir&id_produto=<?= $id_produto ?>" class="buy">Comprar</a>
        </div>
      <?php endforeach; ?>

    </div>

    <div class="products-preview">
      <?php foreach ($produtos as $p):
        $id_produto = $p['id_produto'];
        $nome = htmlspecialchars($p['nome']);
        $descricao = htmlspecialchars($p['descricao'] ?? 'Sem descrição disponível');
        $valor_unitario = number_format($p['valor_unitario'], 2, ',', '.');
        $imagem = !empty($p['imagem']) ? "imgsEcomerce/" . htmlspecialchars($p['imagem']) : "imgsEcomerce/sem-imagem.png";
      ?>
        <div class="preview" data-target="p-<?= $id_produto ?>">
          <i class="fas fa-times"></i>
          <img src="<?= $imagem ?>" alt="<?= $nome ?>">
          <h3><?= $nome ?></h3>
          <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
          </div>
          <p><?= $descricao ?></p>
          <div class="price">R$ <?= $valor_unitario ?></div>
          <div class="buttons">
            <a href="carrinho.php?operacao=incluir&id_produto=<?= $id_produto ?>" class="buy">Adicionar ao carrinho</a>
            
          </div>
        </div>
      <?php endforeach; ?>
    </div>
</div>

<!-- Quem Somos -->
<section class="quem-somos">
  <div class="quem-somos-container">
    <div class="quem-somos-texto">
      <h2>Quem Somos Nós</h2>
      <p>
        A ECO LUXO é uma marca dedicada à sustentabilidade e ao estilo.<br> 
        Nossos produtos artesanais unem beleza, consciência ambiental 
        e qualidade excepcional. <br>Cada detalhe é pensado com carinho para 
        proporcionar experiências únicas aos nossos clientes.
      </p>
      <a href="QuemSomos.php" class="btn-saiba-mais">Saiba Mais</a>
    </div>
    <div class="quem-somos-imagem">
      <img src="imgsEcomerce/Blue Retro Earth Day Mascot Character T-Shirt.png" alt="Nossa Marca">
    </div>
  </div>
</section>








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
            <li><a href="PoliticaDePrivacidade.php">Política de Privacidade</a></li>
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


    <script src="script2.js"></script>
</body>

</html>