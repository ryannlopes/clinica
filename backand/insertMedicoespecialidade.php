<?php
    //Incluindo Conexao
    include("conexao.php");

    //Declarando as Variveis com os valores do Front
    $medico  = $_POST['medico'];
    $especialidade   = $_POST['especialidade'];

    //Inserindo dados no banco via query
    $query = "INSERT INTO medicoespecialidade(id_medico, id_especialidade) 
    VALUE  ('$medico', '$especialidade')";
    $busca = mysqli_query($conn, $query);
    header("Location: ../front/tabelas/medicoespecialidade.php");
?>