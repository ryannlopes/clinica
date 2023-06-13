<?php
    //Incluindo Conexao
    include("conexao.php");

    //Declarando as Variveis com os valores do Front
    $nome  = $_POST['nome'];
    $crm   = $_POST['crm'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];

    //Inserindo dados no banco via query
    $query = "INSERT INTO medico(nomeMedico, crmMedico, idadeMedico, email) 
    VALUE  ('$nome', '$crm', '$idade', '$email')";
    $busca = mysqli_query($conn, $query);
    header("Location: ../front/tabelas/medico.php");
?>