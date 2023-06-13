<?php
    // Incluindo Conexao
    include("conexao.php");

    // Verificando se o CPF foi enviado
    if(isset($_GET['idConsulta'])){
        // Declarando as Variáveis com os valores do Front
        $id = mysqli_real_escape_string($conn, $_GET['idConsulta']);

        // Inserindo dados no banco via query
        $query = "DELETE FROM Consulta WHERE idConsulta  = '$id'";
        $busca = mysqli_query($conn, $query);

        // Verificando se a query foi executada com sucesso
        if($busca){
            header("Location: ../front/tabelas/Consulta.php");
        } else {
            echo "Erro ao deletar registro!";
        }
    } else {
        echo "ID não informado!";
    }
?>