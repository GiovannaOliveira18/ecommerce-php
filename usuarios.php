<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>EcoLuxo - Usuários</title>
  <link rel="stylesheet" href="styleHeader.css">
  <link rel="stylesheet" href="styleUsuarios.css">
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


    $varSQL = "select * from usuario";
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
          <th>E-mail</th>
          <th>Telefone</th>
          <th>Admin</th>
          <th>Ações</th>
          
        </tr>
      </thead>

      <tbody>
        <?php
        while ($linha = $select->fetch()) {
          echo "<tr>
            <td>" . $linha['nome'] . "</td>
            <td>" . $linha['email'] . "</td>
            <td>" . $linha['telefone'] . "</td>
            <td>" . ($linha['admin'] == 1 ? "Administrador" : "Usuário") . "</td>
            <td>
              <a href='alterarUsuario.php?id_usuario=" . $linha['id_usuario'] . "'> <i class='fa-solid fa-pencil'></i></a>
              <a href='excluirUsuario.php?id_usuario=" . $linha['id_usuario'] . "'> <i class='fa-solid fa-trash'></i> </a>
            </td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <a class="adicionar" href="adicionarUsuario.php">+ Adicionar Usuário</a>

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