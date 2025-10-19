<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>EcoLuxo - Produtos</title>
  <link rel="stylesheet" href="styleHeader.css">
  <link rel="stylesheet" href="styleProd.css">
  <link rel="stylesheet" href="styleFooter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>
  <header>
    <div class="logo">
      <img src="imgsEcomerce/SITE_EcoLuxo.png" alt="Logo EcoLuxo" height="80px">
     
    </div>

    <?php
    include "util.php";
    $conn = conecta();


    $varSQL = "select * from produto";
    $select = $conn->query($varSQL);

    ?>

    <?php include "nav.php"; ?>

  </header>


  <div class="menu-secundario">
    <h3>ENTRADA PERMITIDA SOMENTE PARA ADMINISTRADORES !!</h3>
    <a href="index.php"><i class="fa-solid fa-house"></i>SAIR</a>
  </div>
  <br>

  <h2>Lista de Usuários</h2>

  <div class="container">
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Tipo</th>
          <th>Valor Unitário</th>
          <th>Quantidade</th>
          <th>Imagem</th>
          <th>Ações</th>
        </tr>
      </thead>

      <tbody>
        <!-- <td>" . ($linha['excluido'] == 1 ? "Sim" : "Não") . "</td> -->

        <?php
        while ($linha = $select->fetch()) {
          if (!$linha["excluido"] == 1) {
            echo "<tr>
            <td>" . $linha['nome'] . "</td>
            <td>" . $linha['descricao'] . "</td>
            <td>" . $linha['tipo'] . "</td>
            <td>R$ " . number_format($linha['valor_unitario'], 2, ',', '.') . "</td>
            <td>" . $linha['qtde_produtos'] . "</td>
            <td><img src='imgsEcomerce/" . $linha['imagem'] . "' alt='" . $linha['nome'] . "' height='100'></td>
            <td>
              <a href='alterarProduto.php?id_produto=" . $linha['id_produto'] . "'><i class='fa-solid fa-pencil'></i> </a>
              <a href='excluirProduto.php?id_produto=" . $linha['id_produto'] . "'><i class='fa-solid fa-trash'></i> </a>
            </td>
          </tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>
  <a class="adicionar" href="adicionarProduto.php">+ Adicionar Produto</a>

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