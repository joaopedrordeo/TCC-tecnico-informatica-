<?php
session_start();
if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
    echo "<script>alert('Você precisa fazer login.');</script>";
    echo "<script>window.location.href= \"../index.php\";</script>";}
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Cadastrar do aluno</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href='../src/css/bootstrap.min.css' rel='stylesheet'>
        <link href='../src/css/style.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


    </head>

    <body>

        <?php include '../nav.php';?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                        </div>

                        <div class="col-md-6">
                            <div style="margin-top: 15%">
                                <h1 class="display-4" align="center">Cadastrar novo aluno</h1>

                                <div class="shadow p-3 mb-5 bg-white rounded">

                                    <!-- IDENTIFICAÇÃO -->
                                    <form action="cadastrar.php" method="POST" name="formulario">
                                        <div class="form-group">
                                            <b>Nome completo:</b>(Obrigatório)
                                            <input id="nome" type="text" name="nome"  required="true" class="form-control" pattern="[A-Za-zÀ-ú\s]+$" maxlength="150">
                                        </div>



                                        <div class="form-group">
                                            <b>CPF:</b>(Obrigatório)
                                            <input type="text" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" class="form-control" pattern="^(\d{3}\.\d{3}\.\d{3}-\d{2})|(\d{11})$" title="Digite o cpf corretamente com 11 digitos" required="true"/>

                                            <script type="text/javascript">
                                                $("#cpf").mask("000.000.000-00")    ;
                                            </script>

                                            <script language="javascript">
                                                var cpf = $("#cpf"); // verificação doCPF
                                                cpf.blur(function() {   
                                                    $.ajax({ 
                                                        url: 'formCpf.php', 
                                                        type: 'POST', 
                                                        data:{"cpf" : cpf.val()}, 
                                                        success: function(data) { 
                                                          
                                                            data = $.parseJSON(data); 
                                                            $("#resCpf").text(data.cpf);  


                                                            var valorDaDivCPF = $("#cpf").text();  
                                                           
                                                            if(valorDaDivCPF == 'Este CPF já está cadastrado'){
                                                              
                                                                document.getElementById("cadastrar").disabled = true;
                                                            } else {
                                                                
                                                                document.getElementById("cadastrar").disabled = false;
                                                            }

                                                        }
                                                    }); 
                                                }); 

                                            </script> <!-- Função ajax pra verificar o CPF -->
                                        </div>
                                        <?php
                                        $cpf = "<div id='resCpf'    align='center'></div>";
                                        echo $cpf;
                                        ?>




                                        <div class="form-group">
                                            <b>Sexo:</b><br> 
                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="sexo" id="m" value="m" class="custom-control-input">
                                                <label class="custom-control-label" for="m">Masculino</label>
                                            </div>

                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="sexo" id="f" value="f" class="custom-control-input">
                                                <label class="custom-control-label" for="f">Feminino</label>
                                            </div>

                                            <div class="custom-control custom-radio">
                                                <input type="radio" name="sexo" id="o" value="o" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="o">Outro</label>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <b>Estado civil:</b>
                                            <select name='estado_civil' class="custom-select">
                                                <option value="solteiro">Solteiro</option>
                                                <option value="casado">Casado</option>
                                                <option value="sj">Separado Judicialmente</option>
                                                <option value="divorciado">Divorciado</option>
                                                <option value="viuvo">Viúvo</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <b>Escolaridade:</b>
                                            <select name="escolaridade" class="custom-select">
                                                <option value="efi">Ensino Fundamental Incompleto</option>
                                                <option value="efc">Ensino Fundamental Completo</option>
                                                <option value="emi">Ensino Médio Incompleto</option>
                                                <option value="emc" selected>Ensino Médio Completo</option>
                                                <option value="esi">Ensino Superior Incompleto</option>
                                                <option value="esc">Ensino Superior Completo</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <b>Data de nascimento:</b>(Obrigatório)
                                            <div class="input-group">
                                                <input  id="data" type="text"  class="form-control" name="data_nascimento" placeholder="DD/MM/AAAA" required="true" >
                                            </div>
                                            <script type="text/javascript">
                                                $("#data").mask("00/00/0000");
                                            </script>
                                        </div>

                                        <div class="form-group">
                                            <b>Profissão:</b>
                                            <input type="text" name="profissao"  class="form-control" maxlength="200">
                                        </div>
                                        <br>
                                        <!-- ENDEREÇO -->

                                        <div class="form-row">
                                            <div class="col-7">
                                                <b>Endereço:</b>
                                                <input type="text" name="endereco" class="form-control" maxlength="200">
                                            </div>

                                            <div class="col">
                                                <b>Número de residência:</b>
                                                <input type="text" name="numero_end"  class="form-control" pattern="[0-9]+$" required="true" maxlength="5">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-7">
                                                <b>Bairro:</b>
                                                <input type="text" name="bairro"  class="form-control" maxlength="200">
                                            </div>

                                            <div class="col">
                                                <b>CEP:</b>
                                                <input type="text" name="cep" id="cep" class="form-control" pattern="\d{5}-?\d{3}" / maxlength="9" placeholder="XXXXX-XXX">
                                            </div>
                                               <script type="text/javascript">
                                            $("#cep").mask("00000-000");
                                        </script>
                                        </div>
                                        <br>

                                        <!-- CONTATO -->




                                        <div class="form-group">
                                            <b>E-mail:</b>(Obrigatório)
                                            <label class="sr-only" for="email">Email</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="material-icons"> email</i></div>
                                                </div>
                                                <input type="email" name="email" id="email"  class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="true" maxlength="200"> 
                                            </div>    
                                        </div>
                                        <?php
                                        $email = "<div id='resposta' align='center'></div>";
                                        echo $email;
                                        ?>

                                        <script language="javascript">
                                            var email = $("#email"); // verificação do email
                                            email.blur(function() {   
                                                $.ajax({ 
                                                    url: 'formEmail.php', 
                                                    type: 'POST', 
                                                    data:{"email" : email.val()}, 
                                                    success: function(data) { 
                                                      
                                                        data = $.parseJSON(data); 
                                                        $("#resposta").text(data.email);  


                                                        var valorDaDiv = $("#resposta").text();  
                                                      
                                                        if(valorDaDiv == 'Este email já está cadastrado'){
                                                            
                                                            document.getElementById("cadastrar").disabled = true;
                                                        } else {
                                                          
                                                            document.getElementById("cadastrar").disabled = false;
                                                        }
                                                    }


                                                }); 
                                            }); 

                                        </script> <!-- Função ajax pra verificar o email -->









                                        <div class="form-group">

                                            <b>Celular/Telefone: </b>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="material-icons">local_phone</i></div>
                                                </div>
                                                <input id="telefone" id="telefone"type="text" name="fone" placeholder="(DDD) XXXXX-XXXX" class="form-control">
                                            </div>    


                                        </div>

                                        <script type="text/javascript">
                                            $("#telefone").mask("(00) 00000-0000");
                                        </script>


                                        <!-- MEDIDAS -->

                                        <div class="form-group">
                                            <b>Altura:</b>
                                            <input type="text" id="altura" name="altura"  class="form-control"  required="true" pattern="[0-9]{1}\.?[0-9]{1,2}$" placeholder="X.XX">
                                        </div>
                                         <script type="text/javascript">
                                                $("#altura").mask("0.00");
                                            </script>
                                        

                                        <div class="form-group">
                                            <b>Peso:</b>
                                            <input type="text" name="peso"  id="peso" class="form-control" pattern="[0-9]{1,3}\.?[0-9]{1}$" required="true"  placeholder="XXX.X">
                                        </div>
                                          <script type="text/javascript">
                                                $("#peso").mask("000.0");
                                            </script>


                                        <div class="form-group">
                                            <b>Problemas de saúde:</b><br>
                                            <textarea name="pro_saude" class="form-control" rows="3"></textarea>
                                        </div>
                                        <input style="margin-bottom: 10%" type="submit" value="Cadastrar" class="btn btn-success btn-lg btn-block" id="cadastrar" disabled>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
