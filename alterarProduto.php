<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>EcoLuxo - Alterar Produto</title>
  <link rel="stylesheet" href="styleFooter.css">
  <link rel="stylesheet" href="styleHeader.css">
  <link rel="stylesheet" href="styleAlterarProduto.css">
 
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
  <div class="wrapper">
    <div class="container">
    <h2>Alterar Produto</h2>

<?php 

include "util.php";
$conn = conecta();

$id_produto = $_GET['id_produto'];

$varSQL = "SELECT * FROM produto WHERE id_produto = :id_produto";
$select = $conn->prepare($varSQL);
$select->bindParam(':id_produto', $id_produto);
$select->execute();

$linha = $select->fetch();

$nome = $linha['nome'];
$descricao = $linha['descricao'];
$tipo = $linha['tipo'];
$valor_unitario = $linha['valor_unitario'];
$quantidade = $linha['qtde_produtos'];
$imagem = $linha['imagem'];
?>

<form action="updateProduto.php" method="post">
  <input type="hidden" name="id_produto" value="<?php echo $id_produto; ?>">

  <label>Nome:</label>
  <input type="text" name="nome" value="<?php echo $nome; ?>">

  <label>Descrição:</label>
  <input type="text" name="descricao" value="<?php echo $descricao; ?>">

  <label>Tipo:</label>
  <input type="text" name="tipo" value="<?php echo $tipo; ?>">

  <label>Valor Unitário:</label>
  <input type="number" name="valor_unitario" value="<?php echo $valor_unitario; ?>" step="0.01">

  <label>Quantidade:</label>
  <input type="number" name="quantidade" value="<?php echo $quantidade; ?>">

  <label>Imagem:</label>
  <input type="file" name="imagem" accept="image/*">

  <button type="submit">Salvar Alterações</button>
</form>
    </div>
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