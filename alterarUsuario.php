<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuário - Eco Luxo</title>
  <style>
    body {
      margin: 0;
      font-family: "Segoe UI", sans-serif;
      background: #f4f4f9;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

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
  </style>
</head>
<body>
  <div class="container">
    <h2>Editar Usuário</h2>

    <?php 

    include "util.php";
    $conn = conecta();

    $id_usuario = $_GET['id_usuario'];

    $varSQL = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
    $select = $conn->prepare($varSQL);
    $select->bindParam(':id_usuario', $id_usuario);
    $select->execute();

    $linha = $select->fetch();

    $nome = $linha['nome'];
    $email = $linha['email'];
    $telefone = $linha['telefone'];
    $senha = $linha['senha'];
    $admin = $linha['admin'];
    ?>

    <form action="updateUsuario.php" method="post">
      <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">

      <label>Nome:</label>
      <input type="text" name="nome" value="<?php echo $nome; ?>">

      <label>E-mail:</label>
      <input type="email" name="email" value="<?php echo $email; ?>">

      <label>Senha:</label>
      <input type="password" name="senha" value="<?php echo $senha; ?>">

      <label>Admin:</label>
      <select name="admin">
        <option value="0" <?php if($admin == 0) echo "selected"; ?>>Usuário comum</option>
        <option value="1" <?php if($admin == 1) echo "selected"; ?>>Administrador</option>
      </select>

      <button type="submit">Salvar Alterações</button>
    </form>
  </div>
</body>
</html>