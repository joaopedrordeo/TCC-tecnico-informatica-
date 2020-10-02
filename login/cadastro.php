<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href='../src/css/bootstrap.min.css' rel='stylesheet'>
        <link href='../animated.css' rel='stylesheet'>
        <link href='../src/css/style.css' rel='stylesheet'> 
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> <!-- Animação -->
        <title>Cadastro</title>
    </head>
    <body>
        <div class="container-fluid" ontouchstart="verifica()" onmouseover="verifica()" >
            <div class="row animated fadeInDown"> <!-- exemplo de animação  -->
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="shadow p-3 mb-5 bg-white rounded" style="margin-top: 130px;">
                        <h1 class="display-4" align="center">Cadastrar</h1>
                        <br>

                        <form action="processar.php"  method="POST">

                            <!--  <div style="margin-bottom:  15px;"> -->
                            <div class="input-group mb-2" >
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">email</i></div>
                                </div>
                                <input type="email" name="email" id="email" placeholder="Insira seu endereço de email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                            </div>
                                <?php
                            $res ="<center><b><div id='resposta'></div></b></center>";
                            echo $res;
                            ?>
                            <!--  </div> -->
                            
                            <div class="input-group mb-2" >
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">person</i></div>
                                </div>
                                <input type="text" id="user" name="user" maxlength="30"  placeholder="Insira um nome de usuário"  class="form-control" >
                            </div>
                            <?php
                            $res2 = "<center><b><div id='res2'></div></b></center>";
                            echo $res2;
                            ?>
                            <div class="input-group mb-2" >
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">lock</i></div>
                                </div>

                                <input type="password" name="senha" id="senha"  placeholder="Insira uma senha" required="true" class="form-control" onblur="verifica()" >
                            </div>
                            <br>

                            <script language="javascript">
                                var email = $("#email"); // verificação do email
                                email.blur(function() {   
                                    $.ajax({ 
                                        url: 'verificaEmail.php', 
                                        type: 'POST', 
                                        data:{"email" : email.val()}, 
                                        success: function(data) { 
                                        
                                            data = $.parseJSON(data); 
                                            $("#resposta").text(data.email);  
                                        }
                                    }); 
                                }); 
                                var user = $("#user");  // Verificação do usuario
                                user.blur(function() { 
                                    $.ajax({ 
                                        url: 'verificaUser.php', 
                                        type: 'POST', 
                                        data:{"user" : user.val()}, 
                                        success: function(data) { 
                                     
                                            data = $.parseJSON(data); 
                                            $("#res2").text(data.user);   
                                        }
                                    });      
                                }); 
                                function verifica(){
                                    // define as respostas da div em variaveis textos javascript
                                    var valorDaDiv = $("#resposta").text();
                                    var valorDaDivUser = $("#res2").text();
                                    // Aqui compara as repostas para se um deles ja estiver cadastrado no banco ele trava o botao 
                                    if(valorDaDiv == 'Este email já está cadastrado' || valorDaDivUser == 'Este nome de usuário já foi usado' ||  valorDaDiv == "" || valorDaDivUser ==""  ){

                                        document.getElementById("cadastrar").disabled = true;


                                    } else {
                                        document.getElementById("cadastrar").disabled = false;

                                    }
                                };

                            </script> <!-- Verificações do ajax dos campos (Cref, Email e Usuario) -->

                            <input id="cadastrar" name="cadastrar" type="submit" value="Cadastrar" class="btn btn-info btn-block"  disabled>

                        </form>


                        <center style="margin: 5%;"><a class="underlineHover" href="login.html">Faça login em vez disso</a></center>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>