<?php
// Arquivo: update.php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Declarando as Variveis com os valores do Front
    $id  = $_POST['id'];
    $medico  = $_POST['medico'];
    $especialidade   = $_POST['especialidade'];
    // atualiza registro no banco de dados
    $query = "UPDATE medicoespecialidade SET Id_Medico = '$medico', id_especialidade = '$especialidade'
    WHERE Id = '$id'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        header("Location: ../front/tabelas/medicoespecialidade.php");
        exit();
    } else {
        // exibe mensagem de erro
        echo "Erro ao atualizar registro: " . mysqli_error($conn);
    }
} else {
    echo "Erro ao atualizar os dados da pessoa.";
}
?>