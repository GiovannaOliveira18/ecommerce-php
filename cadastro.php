<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Adicionar Usuário - Eco Luxo</title>
  <link rel="stylesheet" href="styleCadastro.css">
  <link rel="stylesheet" href="styleHeader.css">
</head>

<body>
  <div class="container">
    <h2>Cadastro de Usuário</h2>
    
    <form id="CadastroForm">
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" required>

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" required>

      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" required>

      <button type="submit">Enviar</button>
    </form>

    <div class="links">
      <a href="index.php">Página inicial</a>
      <a href="login.php">Login</a>
    </div>
  </div>
</body>
</html>

