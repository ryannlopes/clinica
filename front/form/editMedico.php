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
$nome     = $_SESSION["nomeUser"];
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
        <title>Cadastro de Médico</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Cadastro Médico</h3></div>
                                    <div class="card-body">
                                    <?php
                                    include("../../backand/conexao.php");
                                    // Verifica se o id foi enviado via GET
                                    if (isset($_GET['idMedico'])) {
                                        // Protege contra injeção de SQL
                                        $id = mysqli_real_escape_string($conn, $_GET['idMedico']);

                                        // Consulta a Medico com o id informado
                                        $query = "SELECT * FROM Medico WHERE idMedico = '$id'";
                                        $busca = mysqli_query($conn, $query);

                                        // Verifica se a consulta retornou algum resultado
                                        if (mysqli_num_rows($busca) > 0) {
                                            $dados = mysqli_fetch_array($busca);
                                        } else {
                                            echo "Medico não encontrada.";
                                            exit;
                                        }
                                    } else {
                                        echo "id não informado.";
                                        exit;
                                    }
                                    ?>
                                        <form method="post" action="../../backand/editMedico.php">
                                        <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="id" value="<?php echo htmlspecialchars($dados['idMedico']) ?>"/>
                                                        <label for="inputFirstName">ID</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" name="nome" value="<?php echo htmlspecialchars($dados['nomeMedico']) ?>"/>
                                                        <label for="inputFirstName">Nome</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" name="crm" value="<?php echo htmlspecialchars($dados['crmMedico']) ?>"/>
                                                        <label for="inputLastName">CRM</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="text" name="idade" value="<?php echo htmlspecialchars($dados['idadeMedico']) ?>"/>
                                                        <label for="inputPassword">Idade</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="text" name="email" value="<?php echo htmlspecialchars($dados['email']) ?>"/>
                                                        <label for="inputPassword">Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-2 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Editar</button></div>
                                            </div>
                                            <div class="mt-2 mb-0">
                                                <div class="d-grid"><a class="btn btn-warning btn-block" href="../Tabelas/medico.php">Voltar</a></div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
