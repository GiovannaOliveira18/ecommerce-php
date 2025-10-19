<?php
include "util.php";
$conn = conecta();

$pastaDestino = "imgsEcomerce/";

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $nomeOriginal = $_FILES['imagem']['name'];
    $tempPath = $_FILES['imagem']['tmp_name'];

    $extensao = pathinfo($nomeOriginal, PATHINFO_EXTENSION);
    $nomeUnico = uniqid('img_', true) . "." . $extensao;

    $caminhoFinal = $pastaDestino . $nomeUnico;

    if (move_uploaded_file($tempPath, $caminhoFinal)) {
        $varSQL = "INSERT INTO produto (nome, descricao, tipo, valor_unitario, qtde_produtos, imagem)
                   VALUES (:nome, :descricao, :tipo, :valor_unitario, :quantidade, :imagem)";

        $insert = $conn->prepare($varSQL);

        $insert->bindParam(':nome', $_POST['nome']);
        $insert->bindParam(':descricao', $_POST['descricao']);
        $insert->bindParam(':tipo', $_POST['tipo']);
        $insert->bindParam(':valor_unitario', $_POST['valor_unitario']);
        $insert->bindParam(':quantidade', $_POST['quantidade']);
        $insert->bindParam(':imagem', $nomeUnico);
        if ($insert->execute()) {
            echo "<script>alert('Incluído com sucesso');</script>";
        } else {
            echo "<script>alert('Erro ao incluir no banco de dados');</script>";
        }

    } else {
        echo "<script>alert('Erro ao mover o arquivo.');</script>";
    }

} else {
    echo "<script>alert('Erro no upload da imagem.');</script>";
}

header("Location: produtos.php");
exit;
?>
