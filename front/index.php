<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION["username"])) {
    header("Location: login.php"); // Redirecionar para a página de login se não estiver logado
    exit();
}

require("../backand/conexao.php");

// Exibir o nome de usuário na página de dashboard
$username = $_SESSION["username"];
$nome     = $_SESSION["nomeUser"];
// Consulta SQL para verificar as credenciais do usuário
     $query = "SELECT * FROM usuario WHERE username = '$username'";
              $busca = mysqli_query($conn, $query);

              while ($dados = mysqli_fetch_array($busca)) {
                $id = $dados['idUser'];
                $nome = $dados['nomeUser'];
              
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Tabelas', 'Quantidade'],
          ['Pacientes', <?php
          require('../backand/conexao.php');
          $query = "SELECT * FROM paciente";
          $busca = mysqli_query($conn, $query);
          $cont = 0;
          while ($dados = mysqli_fetch_array($busca)) {
            $cont++;
          }
          echo $cont;
          ?>],
          ['Médicos',      <?php
          require('../backand/conexao.php');
          $query = "SELECT * FROM medico";
          $busca = mysqli_query($conn, $query);
          $cont = 0;
          while ($dados = mysqli_fetch_array($busca)) {
            $cont++;
          }
          echo $cont;
          ?>],
          ['Especialidades',  <?php
          require('../backand/conexao.php');
          $query = "SELECT * FROM especialidade";
          $busca = mysqli_query($conn, $query);
          $cont = 0;
          while ($dados = mysqli_fetch_array($busca)) {
            $cont++;
          }
          echo $cont;
          ?>],
          ['Relatório Medico Especialidades', <?php
          require('../backand/conexao.php');
          $query = "SELECT * FROM medicoespecialidade";
          $busca = mysqli_query($conn, $query);
          $cont = 0;
          while ($dados = mysqli_fetch_array($busca)) {
            $cont++;
          }
          echo $cont;
          ?>],
          ['Consultas',    <?php
          require('../backand/conexao.php');
          $query = "SELECT * FROM consulta";
          $busca = mysqli_query($conn, $query);
          $cont = 0;
          while ($dados = mysqli_fetch_array($busca)) {
            $cont++;
          }
          echo $cont;
          ?>],
          ['Usuários',    <?php
          require('../backand/conexao.php');
          $query = "SELECT * FROM usuario";
          $busca = mysqli_query($conn, $query);
          $cont = 0;
          while ($dados = mysqli_fetch_array($busca)) {
            $cont++;
          }
          echo $cont;
          ?>]
        ]);

        var options = {
          title: 'Dados Cadastrados'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
  
          var data = google.visualization.arrayToDataTable([
            ['Tabelas', 'Quantidade'],
            ['Pacientes', <?php
            require('../backand/conexao.php');
            $query = "SELECT * FROM paciente";
            $busca = mysqli_query($conn, $query);
            $cont = 0;
            while ($dados = mysqli_fetch_array($busca)) {
              $cont++;
            }
            echo $cont;
            ?>],
            ['Médicos',      <?php
            require('../backand/conexao.php');
            $query = "SELECT * FROM medico";
            $busca = mysqli_query($conn, $query);
            $cont = 0;
            while ($dados = mysqli_fetch_array($busca)) {
              $cont++;
            }
            echo $cont;
            ?>],
            ['Especialidades',  <?php
            require('../backand/conexao.php');
            $query = "SELECT * FROM especialidade";
            $busca = mysqli_query($conn, $query);
            $cont = 0;
            while ($dados = mysqli_fetch_array($busca)) {
              $cont++;
            }
            echo $cont;
            ?>],
            ['Relatório Medico Especialidades', <?php
            require('../backand/conexao.php');
            $query = "SELECT * FROM medicoespecialidade";
            $busca = mysqli_query($conn, $query);
            $cont = 0;
            while ($dados = mysqli_fetch_array($busca)) {
              $cont++;
            }
            echo $cont;
            ?>],
            ['Consultas',    <?php
            require('../backand/conexao.php');
            $query = "SELECT * FROM consulta";
            $busca = mysqli_query($conn, $query);
            $cont = 0;
            while ($dados = mysqli_fetch_array($busca)) {
              $cont++;
            }
            echo $cont;
            ?>],
            ['Usuários',    <?php
            require('../backand/conexao.php');
            $query = "SELECT * FROM usuario";
            $busca = mysqli_query($conn, $query);
            $cont = 0;
            while ($dados = mysqli_fetch_array($busca)) {
              $cont++;
            }
            echo $cont;
            ?>]
          ]);
  
          var options = {
            title: 'Dados Cadastrados',
            is3D: true
          };
  
          var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
  
          chart.draw(data, options);
        }
      </script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Clinica Saude Plena</a>
            <!-- Sidebar Toggle-->
            <a class="navbar-brand ps-3" href="index.php"><?php echo $nome; }?></a>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./logout.php">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="./Tabelas/paciente.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Paciente
                            </a>
                            <a class="nav-link" href="./Tabelas/medico.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Médico
                            </a>
                            <a class="nav-link" href="./Tabelas/especialidade.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Especialidade
                            </a>
                            <a class="nav-link" href="./Tabelas/medicoespecialidade.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Relátório Médico Especialidade
                            </a>
                            <a class="nav-link" href="./Tabelas/consulta.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Consulta
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Usuário Logado: </div>
                        Camila Oliveira
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Painel Principal</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Pacientes</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./Tabelas/paciente.php">Detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Médicos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./Tabelas/medico.php">Detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Consultas Agendada</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./Tabelas/consulta.php">Detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Usuários</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./Tabelas/usuario.php">Detalhes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Dados Cadastrados
                                    </div>
                                    <div class="card-body"><div id="piechart" style="width: 650px; height: 500px;"></div></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Dados Cadastrados
                                    </div>
                                    <div class="card-body"><div id="piechart2" style="width: 650px; height: 500px;"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Saúde Plena 2023</div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        Sinônimos
    </body>
</html>
