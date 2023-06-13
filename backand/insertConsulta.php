<?php
    //Incluindo Conexao
    include("conexao.php");

    //Declarando as Variveis com os valores do Front
    $paciente = $_POST['paciente'];
    $medico   = $_POST['medico'];
    $data     = $_POST['data'];
    $hora     = $_POST['hora'];

    //Inserindo dados no banco via query
    $query = "INSERT INTO consulta(id_paciente, id_medico, dataConsulta, horaConsulta) 
    VALUE  ('$paciente', '$medico', '$data','$hora')";
    $busca = mysqli_query($conn, $query);
    header("Location: ../front/tabelas/consulta.php");
?>