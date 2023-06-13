<?php
// Arquivo: update.php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Declarando as Variveis com os valores do Front
    $id    = $_POST['id'];
    $nome  = $_POST['nome'];
    $crm   = $_POST['crm'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];

    // atualiza registro no banco de dados
    $query = "UPDATE medico SET nomeMedico = '$nome', crmMedico = '$crm', idadeMedico = '$idade', email = '$email'
    WHERE IdMedico = '$id'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        header("Location: ../front/tabelas/medico.php");
        exit();
    } else {
        // exibe mensagem de erro
        echo "Erro ao atualizar registro: " . mysqli_error($conn);
    }
} else {
    echo "Erro ao atualizar os dados da pessoa.";
}
?>