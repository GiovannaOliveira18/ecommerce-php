<?php
session_start();
include "util.php";

$conn = conecta();
$mensagem = "";

if ($_POST) {

    $senha1 = $_POST['senha1'] ?? '';
    $senha2 = $_POST['senha2'] ?? '';
    $token  = $_GET['token'] ?? '';
    $email  = $_SESSION['email'] ?? '';

    if (!$senha1 || !$senha2) {
        $mensagem = "Preencha ambos os campos de senha!";
    } elseif ($senha1 !== $senha2) {
        $mensagem = "As senhas não conferem!";
    } else {
     
        $sql = "SELECT senha FROM usuario WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $senha_banco = $stmt->fetchColumn();

        if ($senha_banco === $token) {
            $hash = password_hash($senha1, PASSWORD_DEFAULT);
            $sqlUpdate = "UPDATE usuario SET senha = :senha WHERE email = :email";
            $stmt = $conn->prepare($sqlUpdate);
            $stmt->bindParam(':senha', $hash);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $mensagem = "Senha alterada com sucesso!";
        } else {
            $mensagem = "Token inválido!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoLuxo - Redefinir Senha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 50px;
        }
        form {
            background-color: #fff;
            padding: 25px 35px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        h3 {
            text-align: center;
            color: #196319;
            margin-bottom: 20px;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #196319;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #4CAF50;
        }
        .mensagem {
            text-align: center;
            margin-bottom: 15px;
            color: #d32f2f;
            font-weight: bold;
        }
        .sucesso {
            color: #196319;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #196319;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<form action="" method="post">
    <h3>Redefinir a senha</h3>

    <?php if($mensagem): ?>
        <div class="mensagem <?= $mensagem === 'Senha alterada com sucesso!' ? 'sucesso' : '' ?>">
            <?= $mensagem ?>
        </div>
    <?php endif; ?>

    <label>Senha (6 dígitos)</label>
    <input type="password" name="senha1" maxlength="6" required>

    <label>Redigite a senha</label>
    <input type="password" name="senha2" maxlength="6" required>

    <input type="submit" value="Alterar">

    <a href="login.php">Login</a>
</form>

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
