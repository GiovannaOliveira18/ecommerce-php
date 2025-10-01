<?php 
include "util.php";
$conn = conecta();

$id_usuario = $_POST['id_usuario'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$admin = $_POST['admin'];

$varSQL = "update usuario set nome = :nome, email = :email, telefone = :telefone, senha = :senha, admin = :admin where id_usuario = :id_usuario";

$update = $conn->prepare($varSQL);
$update->bindParam(':nome', $nome);
$update->bindParam(':email', $email);
$update->bindParam(':telefone', $telefone);
$update->bindParam(':senha', $senha);
$update->bindParam(':admin', $admin);
$update->bindParam(':id_usuario', $id_usuario);

if ($update->execute() > 0) {

    echo "<br><br>Alterado com sucesso!<br>";
}

header("Location: usuarios.php");
exit;
?>