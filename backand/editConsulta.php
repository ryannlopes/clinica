<?php
// Arquivo: update.php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Declarando as Variveis com os valores do Front
    $id = $_POST['id'];
    $paciente = $_POST['paciente'];
    $medico   = $_POST['medico'];
    $data     = $_POST['data'];
    $hora     = $_POST['hora'];

    // atualiza registro no banco de dados
    $query = "UPDATE consulta SET id_paciente = '$paciente', id_medico = '$medico', dataConsulta = '$data', horaConsulta = '$hora' 
    WHERE IdConsulta = '$id'";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        header("Location: ../front/tabelas/consulta.php");
        exit();
    } else {
        // exibe mensagem de erro
        echo "Erro ao atualizar registro: " . mysqli_error($conn);
    }
} else {
    echo "Erro ao atualizar os dados da pessoa.";
}
?>