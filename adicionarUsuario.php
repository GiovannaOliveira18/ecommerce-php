<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Adicionar Usuário - Eco Luxo</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="styleHeader.css">
  <style>
    /* body {
      margin: 0;
      font-family: "Segoe UI", sans-serif;
      background: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    } */

    .container {
      background: #fff;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      width: 400px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #2e7d32;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      font-weight: bold;
      text-align: left;
      font-size: 14px;
    }

    input, select {
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
    }

    button {
      background: #2e7d32;
      color: #fff;
      border: none;
      padding: 12px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      transition: background 0.3s;
    }

    button:hover {
      background: #1b5e20;
    }

    .links {
      text-align: center;
      margin-top: 20px;
    }

    .links a {
      margin: 0 10px;
      color: #2e7d32;
      text-decoration: none;
      font-size: 14px;
      transition: color 0.3s;
    }

    .links a:hover {
      color: #1b5e20;
    }
  </style>
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
    <h2>Cadastro de Usuário</h2>

    <form action="uploadUsuarios.php" method="post">

      <label for="nome">Nome:</label>

      <input type="text" id="nome" name="nome" required>

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>

      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" required>

      <label for="admin">Tipo:</label>
      <select id="admin" name="admin">
        
        <option value="0">Usuário comum</option>
        <option value="1">Administrador</option>
      </select>

      <button type="submit">Enviar</button>
    </form>

    <div class="links">
      <a href="usuarios.php">Usuários</a>
      <a href="index.php">Página inicial</a>
      <a href="login.php">Login</a>
    </div>
  </div>

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