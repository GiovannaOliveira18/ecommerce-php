<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoLuxo - Carrinho</title>
    <link rel="stylesheet" href="styleCarrinho.css">
    <link rel="stylesheet" href="styleFooter.css">
    <link rel="stylesheet" href="styleHeader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>

  <header>
    <div class="logo">
      <img src="imgsEcomerce/SITE_EcoLuxo.png" alt="Logo EcoLuxo" height="80px">
    </div>

    <?php include "nav.php"; ?>
    
    <!-- <nav>
      <a href="index.php"><i class="fa-solid fa-house"></i> Home</a>
      <a href="produtos.php"><i class="fa-solid fa-store"></i> Produtos</a>
      <a href="carrinho.php"><i class="fa-solid fa-cart-shopping"></i> Carrinho</a>
      <a href="login.php"><i class="fa-solid fa-user"></i> Login</a>
    </nav> -->

     <div class="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>

  </header>

<div class="menu-secundario">
  <p>PAGUE AQUI SEUS PRODUTOS</p>
</div>

<main>
  <h1>Meu Carrinho</h1>
    <?php
    date_default_timezone_set('America/Sao_Paulo');
      include "util.php";
      $conn = conecta();

      function atualizaGrid($status, $mostrarVazio = true)
      {
          $total = 0;
          if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
                if ($mostrarVazio) {
                    echo "<p>Carrinho vazio.</p>";
                }
            return;
          }

          echo "<table border='1' cellpadding='5' cellspacing='0'>";
          echo "<tr><th></th><th>Nome</th><th>Valor Unitário</th><th>Quantidade</th><th>Subtotal</th><th>Ações</th></tr>";
          
          foreach ($_SESSION['carrinho'] as $id_produto => $item) {
              if (!is_array($item)) continue;
              $sub = $item['valor_unit'] * $item['quant'];
              $total += $sub;
              $img = !empty($item['imagem']) ? "imgsEcomerce/{$item['imagem']}" : "imgsEcomerce/sem-imagem.png";
              echo "<tr>
                      <td><img src='$img' alt=".$item['nome']." height='100'></td>
                      <td>{$item['nome']}</td>
                      <td>R$ " . number_format($item['valor_unit'], 2, ',', '.') . "</td>
                      <td>{$item['quant']}</td>
                      <td>R$ " . number_format($sub, 2, ',', '.') . "</td>";
              if ($status == "CARRINHO") {
                  echo "<td>
                          <a href='?operacao=incluir&id_produto={$id_produto}'><i class='fa-solid fa-plus'></i></a>
                          <a href='?operacao=excluir&id_produto={$id_produto}'><i class='fa-solid fa-minus'></i></a>
                        </td>";
              } else {
                  echo "<td>-</td>";
              }
              echo "</tr>";
          }

          echo "</table>";
          echo "<h3 class='total-carrinho'>Total: R$ " . number_format($total, 2, ',', '.') . "</h3>";


          if (isset($_SESSION['statusConectado']) && $_SESSION['statusConectado'] === true && $total > 0 && $status == "CARRINHO") {
              echo "<a href='?operacao=fechar'>Fechar Carrinho</a>";
          }
          else {
            echo "<p>Você precisa estar logado para finalizar a compra.</p>";
          }
      }

      $operacao = $_GET['operacao'] ?? '';
      $id_produto = $_GET['id_produto'] ?? 0;

      if (isset($_SESSION['carrinho']['status'])) {
          $status = $_SESSION['carrinho']['status'];
      } else {
          $status = "CARRINHO";
      }

      $quantidade = $_SESSION['carrinho'][$id_produto]['quant'] ?? 0;

      if ($operacao == 'incluir' && $id_produto > 0) {
          if ($quantidade == 0) {
              $sql = "SELECT imagem, nome, valor_unitario FROM produto WHERE id_produto = $id_produto";
              $resultado = $conn->query($sql);
              $produto = $resultado->fetch(PDO::FETCH_ASSOC);
              if ($produto) {
                  $_SESSION['carrinho'][$id_produto] = [
                      'nome' => $produto['nome'],
                      'valor_unit' => $produto['valor_unitario'],
                      'imagem' => $produto['imagem'],
                      'quant' => 1
                  ];
              }
          } else {
              $_SESSION['carrinho'][$id_produto]['quant']++;
          }
          atualizaGrid($status);
          header("Location: carrinho.php");
          exit;
      }

      elseif ($operacao == 'excluir' && $id_produto > 0) {
          if ($quantidade > 1) {
              $_SESSION['carrinho'][$id_produto]['quant']--;
          } else {
              unset($_SESSION['carrinho'][$id_produto]);
          }
          atualizaGrid($status);
          header("Location: carrinho.php");
          exit;
      }

      elseif ($operacao == 'fechar') {
          if (!isset($_SESSION['statusConectado']) || $_SESSION['statusConectado'] === false) {
              echo "<p>Você precisa estar logado para fechar o carrinho!</p>";
              atualizaGrid($status);
              exit;
          }

          $status = "reservado";
          $_SESSION['carrinho']['status'] = $status;
          $id_usuario = $_SESSION['id_usuario'] ?? 0;
          $hoje = date("Y-m-d H:i:s");

          $sql = "INSERT INTO compra (status, fk_usuario, data, sessao)
                  VALUES ('$status', '$id_usuario', '$hoje', '" . session_id() . "')";
          $conn->exec($sql);
          $id_compra = $conn->lastInsertId();

          if ($id_compra > 0) {
              foreach ($_SESSION['carrinho'] as $id_produto => $item) {
                  if (!is_array($item)) continue;
                  $valor = $item['valor_unit'];
                  $quant = $item['quant'];
                  $sql = "INSERT INTO compra_produto (fk_compra, fk_produto, valor_unitario, quantidade)
                          VALUES ('$id_compra', '$id_produto', '$valor', '$quant')";
                  $conn->exec($sql);
              }
          }

          echo "<h3>Compra fechada com sucesso!</h3>";
          unset($_SESSION['carrinho']);
          atualizaGrid($status, false);
          echo "<p>Você será redirecionado para a página inicial em 3 segundos...</p>";
          echo "<script>
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 3000);
                </script>";
          exit;
      }

      else {
          atualizaGrid($status);
      }
    ?>
  
</main>
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
