<?php
include '../cnn.php';
session_start();
$usuario = $_SESSION["usuario"];
echo '<br>'; 
if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
    header("Location: login.html");	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pagina Inicial</title>
        <link href='../src/css/bootstrap.min.css' rel='stylesheet'>
        <link href='../src/css/style.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">

      <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="navbar-fixed-top.css" rel="stylesheet">

        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    </head>
    <body>
        <?php include 'navIndex.php';?>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3">


                </div>

                <div class="col-md-6">
                    <div class="col-md-15">
                        <div style="margin-top: 25%">
                            <h1 class="display-4" align="center">BSN FIT</h1>
                            <br><br>
                            <form action="pesquisa.php" method="GET" >
                                <div class="input-group mb-3">

                                    <input type="text" class="form-control form-control-lg" placeholder="Pesquise seus alunos cadastrados " name="pesquisa" aria-label="Recipient's username" aria-describedby="button-addon2">

                                    <div class="input-group-append">

                                        <button class="btn btn-outline-info btn-sm" type="submit" id="button-addon2"><i class="material-icons">search</i></button>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <br>

                    <center><a href="../Formulario/htmlCadastrar.php" class="btn btn-info btn-lg " role="button" aria-pressed="true"><i class="material-icons">person_add</i><h6 class="font-weight-light">Novo aluno</h6></a></center>



                </div>

                <div class="col-md-3">


                </div>
            </div>


        </div>
    </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>