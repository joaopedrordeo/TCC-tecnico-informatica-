<?php
session_start();
include '../cnn.php';
if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
    echo "<script>alert('Você precisa fazer login.');</script>";
    echo "<script>window.location.href= \"../index.php\";</script>";}


$senha= $_SESSION["senha"];


$id = $_SESSION['id'];
$sql = "SELECT * FROM personal WHERE Id_login='$id'";   
$consulta = mysqli_query($conexao, $sql); 
mysqli_close($conexao);

while($row = mysqli_fetch_array($consulta)){   

    $email = $row['Email'];
    $user = $row['Usuario'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Perfil</title>
        <link href='../src/css/bootstrap.min.css' rel='stylesheet'>
        <link href='../src/css/style.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 


    </head>
    <body>
        <?php include '../nav.php';?>
        <div class="container-fluid" >
            <div class="row" >
                <div class="col-md-4">
                </div>
                <div class="col-md-4" >
                    <div style="margin-top: 30%;">
                        <div class="shadow p-3 mb-5 bg-white rounded">
                            <div style="margin-top: -16%"><center><img src='../img/branco.png' alt='Deu pau' class='rounded-circle' width='120px' ></center></div>
                            <div>
                                <hr>
                            </div>


                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <h5 class="text-info">NOME DE USUARIO:</h5>
                                        <h6><?php echo $user;?></h6>
                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-2">
                                        <div style="margin-top:15px;"> <a class="text-info" data-toggle="collapse" href="#collapseUser" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="material-icons">edit</i></a></div>

                                    </div>
                                </div>
                                <div class="collapse" id="collapseUser">
                                    <div class="card card-body">
                                        <form name="formUser" id="formUser" action="alterarUser.php" method="POST">
                                            <div class="form-group">
                                                <label>Insira um novo nome de usuario:</label>
                                                <input type="text" name="user" id="user" class="form-control" maxlength="30" required="true">
                                                <?php
                                                $res2 = "<div id='resModalUser'align='center'></div>";
                                                echo "<b>".$res2."</b>";
                                                ?>
                                                <p class="text-muted">* Maximo 30 caracteres.</p>
                                                <button type="button" id="salvarUser"  class="btn btn-info"  onclick="verificaUser()">Salvar</button>
                                            </div>
                                        </form>

                                        <script>
                                            var user = $("#user");  // Verificação do usuario
                                            user.blur(function() { 
                                                $.ajax({ 
                                                    url: 'verificaUpUser.php', 
                                                    type: 'POST', 
                                                    data:{"user" : user.val()}, 
                                                    success: function(data) { 

                                                        data = $.parseJSON(data); 
                                                        $("#resModalUser").text(data.user);   
                                                    }
                                                });      
                                            });  

                                            function verificaUser(){

                                                var valorDaDivUser = $("#resModalUser").text();
                                                

                                                if(valorDaDivUser == 'Este nome de usuário já foi usado'){

                                                    alert('Você precisa escolher outro nome de usuario');
                                                } else if (valorDaDivUser =='Nome de usuario disponível') {
                                                    document.formUser.submit();

                                                }}


                                        </script>


                                    </div>

                                </div>
                                <hr>
                            </div> <!-- USER -->


                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <h5 class="text-info">ENDEREÇO DE EMAIL:</h5>
                                        <h6><?php echo $email;?></h6>
                                    </div> 
                                    <div class="col-md-2">


                                    </div>
                                    <div class="col-md-2">
                                        <div style="margin-top:15px;" >
                                            <a  class="text-info"data-toggle="collapse" href="#collapseEmail" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="collapseEmail">
                                    <div class="card card-body">
                                        <form name="formEmail" id="formEmail" action="alterarEmail.php" method="POST">
                                            <div class="form-group">
                                                <label>Insira um novo endereço de email:</label>
                                                <input type="email" name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="true">
                                                <?php
                                                $resEmail = "<div id='resEmail'align='center'></div>";
                                                echo "<b>".$resEmail."</b>";
                                                ?>
                                                <p class="text-muted">* Maximo 100 caracteres.</p>
                                                <button type="button" id="salvarEmail"  class="btn btn-info" onclick="verificaEmail()" >Salvar</button>
                                            </div>
                                        </form>

                                        <script>
                                            var email = $("#email"); // verificação do email
                                            email.blur(function() {   
                                                $.ajax({ 
                                                    url: 'verificaEmail.php', 
                                                    type: 'POST', 
                                                    data:{"email" : email.val()}, 
                                                    success: function(data) { 
                                                   
                                                        data = $.parseJSON(data); 
                                                        $("#resEmail").text(data.email);  
                                                    }
                                                }); 
                                            });

                                            function verificaEmail(){
                                                var valorDaDivEmail = $("#resEmail").text();

                                                if(valorDaDivEmail == 'Este email já está cadastrado'){ 
                                                    alert('Você precisa escolher outro endereço de email');

                                                } else if (valorDaDivEmail == 'E-mail valido') {
                                                    document.formEmail.submit();
                                                }}
                                        </script>
                                    </div>
                                </div>
                                <hr>
                            </div><!--  Email -->
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-8">
                                        <h5 class="text-info">SENHA:</h5>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-2">
                                        <div  style="margin-top:15px;" >
                                            <a  class="text-info" data-toggle="collapse" href="#collapseSenha" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="material-icons">edit</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="collapseSenha">
                                    <div class="card card-body">
                                        <form name="formSenha" id="formSenha" action="alterarSenha.php" method="POST">
                                            <div class="form-group">
                                                <label>Insira sua senha atual:</label>
                                                <input type="password" name="senha_at" id="senha_at" class="form-control" maxlength="32">


                                                <!--  RESPOSTA DO AJAX -->
                                                <?php /*
                                                $resSenha = "<div id='resSenha'align='center'></div>";
                                                echo "<b>".$resSenha."</b>";
                                                */ ?> 


                                                <label>Insira sua nova senha:</label>
                                                <input type="password" name="senha_up" id="senha_up" class="form-control" maxlength="32" required="true">

                                                <label>Comfirme sua nova senha:</label>
                                                <input type="password" name="senha_up_com" id="senha_up_com" class="form-control" maxlength="32" required="true">

                                                <p class="text-muted">* Maximo 32 caracteres.</p>
                                                <button type="submit" id="salvarUser"  class="btn btn-info">Salvar</button>
                                            </div> <!-- Colapse da senha -->
                                        </form>
                                    </div>

                                </div>

                            </div> <!-- Senha -->

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                </div>







                </body>
            </html>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>