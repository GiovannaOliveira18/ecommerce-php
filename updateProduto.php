<?php 
    include "util.php";
    $conn = conecta();

    $id_produto = $_POST['id_produto'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $valor_unitario = $_POST['valor_unitario'];
    $quantidade = $_POST['quantidade'];
    $imagem = $_POST['imagem'];
    $imagem = "/" . $imagem;
    $excluido = $_POST['excluido'];

    $varSQL = "update produto set nome = :nome, descricao = :descricao, tipo = :tipo, valor_unitario = :valor_unitario, qtde_produtos = :quantidade, imagem = :imagem, excluido = :excluido where id_produto = :id_produto";

    $update = $conn->prepare($varSQL);
    $update->bindParam(':nome', $nome);
    $update->bindParam(':descricao', $descricao);
    $update->bindParam(':tipo', $tipo);
    $update->bindParam(':valor_unitario', $valor_unitario);
    $update->bindParam(':quantidade', $quantidade);
    $update->bindParam(':imagem', $imagem);
    $update->bindParam(':excluido', $excluido);
    $update->bindParam(':id_produto', $id_produto);

    if ($update->execute() > 0) {
        echo "<script>alert('Alterado com sucesso!');</script>";
    }

    header("Location: produtos.php");
    exit;
?>