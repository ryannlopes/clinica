<?php
// Arquivo: update.php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Declarando as Variveis com os valores do Front
    $id = $_POST['id'];
    $descricao  = $_POST['descricao'];

    // atualiza registro no banco de dados
    $query = "UPDATE especialidade SET descricaoEspecialidade = '$descricao'
    WHERE IdEspecialidade = '$id'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        header("Location: ../front/tabelas/especialidade.php");
        exit();
    } else {
        // exibe mensagem de erro
        echo "Erro ao atualizar registro: " . mysqli_error($conn);
    }
} else {
    echo "Erro ao atualizar os dados da pessoa.";
}
?>