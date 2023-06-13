<?php
    //Incluindo Conexao
    include("conexao.php");

    //Declarando as Variveis com os valores do Front
    $nome  = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];

    //Inserindo dados no banco via query
    $query = "INSERT INTO paciente(nomePaciente, idadePaciente, email) 
    VALUE  ('$nome', '$idade', '$email')";
    $busca = mysqli_query($conn, $query);
    header("Location: ../front/tabelas/paciente.php");
?>