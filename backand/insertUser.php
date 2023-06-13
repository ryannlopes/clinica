<?php
    //Incluindo Conexao
    include("conexao.php");

    //Declarando as Variveis com os valores do Front
    $nome   = $_POST['nome'];
    $user  = $_POST['usuario'];
    $senha = $_POST['senha'];

    //Inserindo dados no banco via query
    $query = "INSERT INTO usuario(nomeUser, username, password) VALUE  ('$nome', '$user', '$senha')";
    $busca = mysqli_query($conn, $query);
    header("Location: ../front/login.php");
?>