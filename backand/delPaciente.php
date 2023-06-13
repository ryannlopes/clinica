<?php
    // Incluindo Conexao
    include("conexao.php");

    // Verificando se o CPF foi enviado
    if(isset($_GET['idPaciente'])){
        // Declarando as Variáveis com os valores do Front
        $id = mysqli_real_escape_string($conn, $_GET['idPaciente']);

        // Inserindo dados no banco via query
        $query = "DELETE FROM Paciente WHERE idPaciente  = '$id'";
        $busca = mysqli_query($conn, $query);

        // Verificando se a query foi executada com sucesso
        if($busca){
            header("Location: ../front/tabelas/Paciente.php");
        } else {
            echo "Erro ao deletar registro!";
        }
    } else {
        echo "ID não informado!";
    }
?>