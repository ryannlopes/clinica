<?php
    //Incluindo Conexao
    include("conexao.php");

    //Declarando as Variveis com os valores do Front
    $descricao  = $_POST['descricao'];

    //Inserindo dados no banco via query
    $query = "INSERT INTO especialidade(descricaoEspecialidade) 
    VALUE  ('$descricao')";
    $busca = mysqli_query($conn, $query);
    header("Location: ../front/tabelas/especialidade.php");
?>