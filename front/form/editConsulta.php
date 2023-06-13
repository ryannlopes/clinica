<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["username"])) {
    header("Location: ../login.php"); // Redirecionar para a página de login se não estiver logado
    exit();
}

require("../../backand/conexao.php");

// Exibir o nome de usuário na página de dashboard
$username = $_SESSION["username"];
$nome = $_SESSION["nomeUser"];
// Consulta SQL para verificar as credenciais do usuário
$query = "SELECT * FROM usuario WHERE username = '$username'";
$busca = mysqli_query($conn, $query);

while ($dados = mysqli_fetch_array($busca)) {
    $id = $dados['idUser'];
    $nome = $dados['nomeUser'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cadastro de Consulta</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Cadastro Consulta</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    include("../../backand/conexao.php");
                                    // Verifica se o id foi enviado via GET
                                    if (isset($_GET['idConsulta'])) {
                                        // Protege contra injeção de SQL
                                        $id = mysqli_real_escape_string($conn, $_GET['idConsulta']);

                                        // Consulta a Consulta com o id informado
                                        $query = "SELECT * FROM Consulta WHERE idConsulta = '$id'";
                                        $busca = mysqli_query($conn, $query);

                                        // Verifica se a consulta retornou algum resultado
                                        if (mysqli_num_rows($busca) > 0) {
                                            $dados = mysqli_fetch_array($busca);
                                        } else {
                                            echo "Consulta não encontrada.";
                                            exit;
                                        }
                                    } else {
                                        echo "id não informado.";
                                        exit;
                                    }
                                    ?>
                                    <form method="POST" action="../../backand/editConsulta.php">
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="id"  value="<?php echo htmlspecialchars($dados['idConsulta']) ?>"/>
                                                        <label for="inputLastName">ID</label>
                                            </div>
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <?php
                                                    include("../../backand/conexao.php");
                                                    // Verifica se o id foi enviado via GET
                                                    if (isset($_GET['idConsulta'])) {
                                                        // Protege contra injeção de SQL
                                                        $id = mysqli_real_escape_string($conn, $_GET['idConsulta']);
                
                                                        // Consulta a Consulta com o id informado
                                                        $query = "SELECT idConsulta,
                                                        id_paciente,
                                                        id_medico,
                                                        dataConsulta,
                                                        horaConsulta,
                                                        nomePaciente AS paciente,
                                                        nomeMedico AS medico
                                                        FROM consulta
                                                        INNER JOIN paciente ON id_paciente = idPaciente
                                                        INNER JOIN medico ON id_medico = idMedico WHERE idConsulta = '$id'";
                                                        $busca = mysqli_query($conn, $query);
                
                                                        // Verifica se a consulta retornou algum resultado
                                                        if (mysqli_num_rows($busca) > 0) {
                                                            $dados = mysqli_fetch_array($busca);
                                                        } else {
                                                            echo "Consulta não encontrada.";
                                                            exit;
                                                        }
                                                    } else {
                                                        echo "id não informado.";
                                                        exit;
                                                    }
                                                    ?>
                                                    <select class="form-select" id="floatingSelect" name="paciente"aria-label="Floating label select example">
                                                        <option
                                                            value="<?php echo htmlspecialchars($dados['id_paciente']) ?>">
                                                            <?php echo $dados['paciente']; ?></option>
                                                        <?php
                                                        require('../../backand/conexao.php');

                                                        $query = "SELECT * FROM paciente";
                                                        $busca = mysqli_query($conn, $query);

                                                        while ($dados = mysqli_fetch_array($busca)) {
                                                            $id = $dados['idPaciente'];
                                                            ?>
                                                            <option value="<?php echo $dados['idPaciente']; ?>"><?php echo $dados['nomePaciente']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="inputFirstName">Paciente</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <?php
                                                    include("../../backand/conexao.php");
                                                    // Verifica se o id foi enviado via GET
                                                    if (isset($_GET['idConsulta'])) {
                                                        // Protege contra injeção de SQL
                                                        $id = mysqli_real_escape_string($conn, $_GET['idConsulta']);
                
                                                        // Consulta a Consulta com o id informado
                                                        $query = "SELECT idConsulta,
                                                        id_paciente,
                                                        id_medico,
                                                        dataConsulta,
                                                        horaConsulta,
                                                        nomePaciente AS paciente,
                                                        nomeMedico AS medico
                                                        FROM consulta
                                                        INNER JOIN paciente ON id_paciente = idPaciente
                                                        INNER JOIN medico ON id_medico = idMedico WHERE idConsulta = '$id'";
                                                        $busca = mysqli_query($conn, $query);
                
                                                        // Verifica se a consulta retornou algum resultado
                                                        if (mysqli_num_rows($busca) > 0) {
                                                            $dados = mysqli_fetch_array($busca);
                                                        } else {
                                                            echo "Consulta não encontrada.";
                                                            exit;
                                                        }
                                                    } else {
                                                        echo "id não informado.";
                                                        exit;
                                                    }
                                                    ?>
                                                        <select class="form-select" id="floatingSelect" name="medico" aria-label="Floating label select example">
                                                            <option value="<?php echo htmlspecialchars($dados['id_medico']) ?>"><?php echo htmlspecialchars($dados['medico']) ?></option>
                                                        <?php
                                                        require('../../backand/conexao.php');

                                                        $query = "SELECT * FROM Medico";
                                                        $busca = mysqli_query($conn, $query);

                                                        while ($dados = mysqli_fetch_array($busca)) {
                                                            $id = $dados['idMedico'];
                                                            ?>
                                                            <option value="<?php echo $dados['idMedico']; ?>"><?php echo $dados['nomeMedico']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <label for="inputLastName">Medico</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <?php
                                                    include("../../backand/conexao.php");
                                                    // Verifica se o id foi enviado via GET
                                                    if (isset($_GET['idConsulta'])) {
                                                        // Protege contra injeção de SQL
                                                        $id = mysqli_real_escape_string($conn, $_GET['idConsulta']);
                
                                                        // Consulta a Consulta com o id informado
                                                        $query = "SELECT idConsulta,
                                                        id_paciente,
                                                        id_medico,
                                                        dataConsulta,
                                                        horaConsulta,
                                                        nomePaciente AS paciente,
                                                        nomeMedico AS medico
                                                        FROM consulta
                                                        INNER JOIN paciente ON id_paciente = idPaciente
                                                        INNER JOIN medico ON id_medico = idMedico WHERE idConsulta = '$id'";
                                                        $busca = mysqli_query($conn, $query);
                
                                                        // Verifica se a consulta retornou algum resultado
                                                        if (mysqli_num_rows($busca) > 0) {
                                                            $dados = mysqli_fetch_array($busca);
                                                        } else {
                                                            echo "Consulta não encontrada.";
                                                            exit;
                                                        }
                                                    } else {
                                                        echo "id não informado.";
                                                        exit;
                                                    }
                                                    ?>
                                                    <input class="form-control" id="inputPassword" type="date" name="data" value="<?php echo htmlspecialchars($dados['dataConsulta']) ?>"/>
                                                    <label for="inputPassword">Data</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <select class="form-select" id="floatingSelect" name="hora"
                                                        aria-label="Floating label select example">
                                                        <?php
                                                    include("../../backand/conexao.php");
                                                    // Verifica se o id foi enviado via GET
                                                    if (isset($_GET['idConsulta'])) {
                                                        // Protege contra injeção de SQL
                                                        $id = mysqli_real_escape_string($conn, $_GET['idConsulta']);
                
                                                        // Consulta a Consulta com o id informado
                                                        $query = "SELECT idConsulta,
                                                        id_paciente,
                                                        id_medico,
                                                        dataConsulta,
                                                        horaConsulta,
                                                        nomePaciente AS paciente,
                                                        nomeMedico AS medico
                                                        FROM consulta
                                                        INNER JOIN paciente ON id_paciente = idPaciente
                                                        INNER JOIN medico ON id_medico = idMedico WHERE idConsulta = '$id'";
                                                        $busca = mysqli_query($conn, $query);
                
                                                        // Verifica se a consulta retornou algum resultado
                                                        if (mysqli_num_rows($busca) > 0) {
                                                            $dados = mysqli_fetch_array($busca);
                                                        } else {
                                                            echo "Consulta não encontrada.";
                                                            exit;
                                                        }
                                                    } else {
                                                        echo "id não informado.";
                                                        exit;
                                                    }
                                                    ?>
                                                        <option selected value="<?php echo $dados['horaConsulta']; ?>"><?php echo $dados['horaConsulta']; ?></option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="08:30">08:30</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="09:30">09:30</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="16:30">16:30</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="18:00">18:00</option>
                                                    </select>
                                                    <label for="floatingSelect">Selecione a Hora</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2 mb-0">
                                            <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Editar</button></div>
                                        </div>
                                        <div class="mt-2 mb-0">
                                            <div class="d-grid"><a href="../Tabelas/consulta.php"
                                                    class="btn btn-warning btn-block" href="login.html">Voltar</a></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>