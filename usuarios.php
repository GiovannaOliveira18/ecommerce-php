<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Usuários - Eco Luxo</title>
  <link rel="stylesheet" href="styleHeader.css">
  <link rel="stylesheet" href="style.css">
  <style>
    
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #2e7d32;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }

    thead {
      background: #2e7d32;
      color: #fff;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    

    a {
      text-decoration: none;
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 14px;
      margin-right: 5px;
    }

    a[href*="alterarUsuario"] {
      background: #ffb300;
      color: #fff;
    }

    a[href*="alterarUsuario"]:hover {
      background: #e69500;
    }

    a[href*="excluirUsuario"] {
      background: #e53935;
      color: #fff;
    }

    a[href*="excluirUsuario"]:hover {
      background: #c62828;
    }

    .adicionar {
      display: inline-block;
      margin-top: 20px;
      background: #2e7d32;
      color: #fff;
      padding: 10px 16px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }

    .adicionar:hover {
      background: #1b5e20;
    }
  </style>
</head>
<body>
<header>
    <div class="logo">
      <img src="imgsEcomerce/SITE_EcoLuxo.png" alt="Logo EcoLuxo" height="80px">
    </div>

    <?php 
    // include "nav.php"; 
    include "util.php";
    $conn = conecta();
    

    $varSQL = "select * from usuario";
    $select = $conn->query($varSQL);
    
    ?>

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

  <h2>Lista de Usuários</h2>

   


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
            <td>".$linha['nome']."</td>
            <td>".$linha['email']."</td>
            <td>".$linha['telefone']."</td>
            <td>".($linha['admin'] == 1 ? "Administrador" : "Usuário")."</td>
            <td>
              <a href='alterarUsuario.php?id_usuario=".$linha['id_usuario']."'>Alterar</a>
              <a href='excluirUsuario.php?id_usuario=".$linha['id_usuario']."'>Excluir</a>
            </td>
          </tr>";
        }
      ?>
    </tbody>
  </table>

  <a class="adicionar" href="adicionarUsuario.php">+ Adicionar Usuário</a>
        
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