<?php
    // Incluindo Conexao
    include("conexao.php");

    // Verificando se o CPF foi enviado
    if(isset($_GET['idUser'])){
        // Declarando as Variáveis com os valores do Front
        $id = mysqli_real_escape_string($conn, $_GET['idUser']);

        // Inserindo dados no banco via query
        $query = "DELETE FROM usuario WHERE idUser  = '$id'";
        $busca = mysqli_query($conn, $query);

        // Verificando se a query foi executada com sucesso
        if($busca){
            header("Location: ../front/tabelas/usuario.php");
        } else {
            echo "Erro ao deletar registro!";
        }
    } else {
        echo "ID não informado!";
    }
?>