<?php


//if(!empty($_GET["pesquisa"])){
include '../cnn.php';
session_start();
if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
    echo "<script>alert('Você precisa fazer login.');</script>";
    echo "<script>window.location.href= \"../index.php\";</script>";}



$id_login= $_SESSION["id"]; 

$id_aluno = $_POST['id_aluno']; // aqui a variavel do id aluno para fazer a pesquisa 

$sql= "SELECT * FROM aluno WHERE Id_Aluno='$id_aluno'"; 
$resultado = mysqli_query($conexao, $sql);
mysqli_close($conexao);
while($row = mysqli_fetch_array($resultado)){ // fazer aqui a puxada das variaveis para colocar dedntro dos input
    $nome = $row['Nome_aluno'];
    $cpf= $row['CPF'];
    $data_nascimento = $row['Data_nasc_aluno'];
    $data = implode('/', array_reverse(explode('-', "$data_nascimento")));
    $estado_civil= $row["Estado_civil"]; 
    $escolaridade = $row["Escolaridade"];
    $sexo = $row['Sexo'];
    $profissao = $row["Profissao"];
    $endereco = $row["Endereco"];
    $numero_end = $row["Num_residencia"];
    $bairro = $row["Bairro"];
    $cep = $row["CEP"];
    $email = $row["Email"];
    $fone = $row["Celular"];
    $altura = $row["Altura"];
    $peso = $row["Peso"];
    $pro_saude = $row["Probl_saude"];


}



?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar Aluno</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href='../src/css/bootstrap.min.css' rel='stylesheet'>
        <link href='../src/css/style.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 


        <!--  link do site -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


    </head>
    <body>

        <?php include '../nav.php';?>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div style="margin-top: 15%">
                        <h1 class="display-4" align="center">Editar Aluno</h1>
                        <div class="shadow p-3 mb-5 bg-white rounded">




                            <!-- IDENTIFICAÇÃO -->
                            <form action="alterar.php" method="POST">


                                <div class="form-group">
                                    <b>Nome completo:</b>
                                    <input type="text" name="nome" class="form-control"pattern="[A-Za-zÀ-ú\s]+$" required="true" value="<?php echo $nome?>">
                                </div>

                                <div class="form-group">
                                    <b>CPF:</b>
                                    <input type="text" name="cpf" id="cpf" class="form-control" pattern="^(\d{3}\.\d{3}\.\d{3}-\d{2})|(\d{11})$" value="<?php echo $cpf?>">
                                    <script type="text/javascript">
                                        $("#cpf").mask("000.000.000-00");
                                    </script>

                                </div>
                                <div class="form-group">
                                    <b>Sexo:</b><br> 



                                    <?php switch ($sexo){
    case "m":?>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="sexo" value="m" id="m"  class="custom-control-input" checked>
                                        <label class="custom-control-label" for="m">Masculino</label>

                                    </div> 
                                    <div class="custom-control custom-radio">      
                                        <input type="radio" name="sexo" value="f" id="f"  class="custom-control-input">
                                        <label class="custom-control-label" for="f">Feminino</label>

                                    </div>    
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="sexo" value="o" id="o" class="custom-control-input">
                                        <label class="custom-control-label" for="o">Outro</label>
                                    </div>
                                </div>
                                <?php break;?>

                                <?php	case "f":?>
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="sexo" value="m" id="m" class="custom-control-input">
                                    <label class="custom-control-label" for="m">Masculino</label>

                                </div> 
                                <div class="custom-control custom-radio">      
                                    <input type="radio" name="sexo" value="f" id="f"  class="custom-control-input" checked>
                                    <label class="custom-control-label" for="f">Feminino</label>

                                </div>    
                                <div class="custom-control custom-radio">
                                    <input type="radio" name="sexo" value="o" id="o"  class="custom-control-input">
                                    <label class="custom-control-label" for="o">Outro</label>
                                </div>
                                </div>
                            <?php break;?>

                            <?php	case "o":?>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="sexo" value="m" id="m" class="custom-control-input" >
                                <label class="custom-control-label" for="m">Masculino</label>

                            </div> 
                            <div class="custom-control custom-radio">      
                                <input type="radio" name="sexo" value="f" id="f"  class="custom-control-input">
                                <label class="custom-control-label" for="f">Feminino</label>

                            </div>    
                            <div class="custom-control custom-radio">
                                <input type="radio" name="sexo" value="o" id="o" class="custom-control-input" checked>
                                <label class="custom-control-label" for="o">Outro</label>
                            </div>
                        </div>
                        <?php break;?>
                        <?php default: ?>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="sexo" value="m" id="m"  class="custom-control-input">
                            <label class="custom-control-label" for="m">Masculino</label>

                        </div> 
                        <div class="custom-control custom-radio">      
                            <input type="radio" name="sexo" value="f"  id="f" class="custom-control-input">
                            <label class="custom-control-label" for="f">Feminino</label>

                        </div>    
                        <div class="custom-control custom-radio">
                            <input type="radio" name="sexo" value="o" id="o" class="custom-control-input" checked>
                            <label class="custom-control-label" for="o">Outro</label>
                        </div>
                    </div>
                    <?php }?>


                    <?php 
                    // verificação de qual veio selecionado do banco de dadaos
                    $check0 = $check1 = $check2 = $check3 = $check4 = "";
                    switch ($estado_civil){
                        case "solteiro":{
                            $check0= "selected";
                            break;
                        }
                        case "casado":{
                            $check1= "selected";
                            break;
                        }
                        case "sj":{
                            $check2= "selected";
                            break;
                        }
                        case "divorciado":{
                            $check3= "selected";
                            break;
                        }
                        case "viuvo":{
                            $check4= "selected";
                            break;
                        }
                    }?>

                    <div class="form-group">
                        <b>Estado civil:</b>
                        <select name='estado_civil'  class="custom-select">
                            <option value="solteiro"  <?php echo $check0; ?>>Solteiro(a)</option>
                            <option value="casado"  <?php echo $check1; ?>>Casado(a)</option>
                            <option value="sj"  <?php echo $check2; ?>>Separado Judicialmente</option>
                            <option value="divorciado"  <?php echo $check3; ?>>Divorciado(a)</option>
                            <option value="viuvo"  <?php echo $check4; ?>>Viúvo(a)</option>
                        </select>
                    </div>

                    <?php
                    $esc0 = $esc1 = $esc2 = $esc3 = $esc4 = $esc5 = "";
                    switch ($escolaridade){
                        case "efi":{
                            $esc0= "selected";
                            break;
                        }
                        case "efc":{
                            $esc1= "selected";
                            break;
                        }
                        case "emi":{
                            $esc2= "selected";
                            break;
                        }
                        case "emc":{
                            $esc3= "selected";
                            break;
                        }
                        case "esi":{
                            $esc4= "selected";
                            break;
                        }
                        case "esc":{
                            $esc5= "selected";
                            break;
                        }
                    }?>     
                    <div class="form-group">
                        <label>Escolaridade:</label>
                        <select name="escolaridade" class="custom-select">
                            <option value="efi" <?php echo $esc0; ?>>Ensino Fundamental Incompleto</option>
                            <option value="efc" <?php echo $esc1; ?>>Ensino Fundamental Completo</option>
                            <option value="emi" <?php echo $esc2; ?>>Ensino Médio Incompleto</option>
                            <option value="emc" <?php echo $esc3; ?>>Ensino Médio Completo</option>
                            <option value="esi" <?php echo $esc4; ?>>Ensino Superior Incompleto</option>
                            <option value="esc" <?php echo $esc5; ?>>Ensino Superior Completo</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <b>Data de nascimento:</b>
                        <div class="input-group">
                            <input  id="data" type="text"  class="form-control" name="data" placeholder="DD/MM/AAAA" value="<?php echo $data?>">
                        </div>
                        <script type="text/javascript">
                            $("#data").mask("00/00/0000");
                        </script>
                    </div>






                    <div class="form-group">
                        <b>Profissão:</b>
                        <input type="text" name="profissao"  value="<?php echo $profissao?>" class="form-control">
                    </div>

                    <!-- ENDEREÇO -->

                    <div class="form-row">
                        <div class="col-7">
                            <b>Endereço:</b>
                            <input type="text" name="endereco" class="form-control" value="<?php echo $endereco?>">
                        </div>

                        <div class="col">
                            <b>Número de residência:</b>
                            <input type="text" name="numero_end"  class="form-control" pattern="[0-9]+$" value="<?php echo $numero_end?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-7">
                            <b>Bairro:</b>
                            <input type="text" name="bairro"  class="form-control" value="<?php echo $bairro?>">
                        </div>

                        <div class="col">
                            <b>CEP:</b>
                            <input type="text" name="cep" class="form-control" pattern="\d{5}-?\d{3}"  value="<?php echo $cep?>"/>
                        </div>
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
                            <input type="email" name="email" id="email"  class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="true" maxlength="200" value="<?php echo $email;?>"> 
                        </div>    
                    </div>


                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="material-icons">local_phone</i></div>
                        </div>
                        <input id="telefone" id="telefone"type="text" name="fone" placeholder="(DDD) XXXXX-XXXX" class="form-control"   value="<?php echo $fone;?>">
                    </div>    




                    <script type="text/javascript">
                        $("#telefone").mask("(00) 00000-0000");
                    </script>



                    <!-- MEDIDAS -->

                    <div class="form-group">
                        <b>Altura:</b>
                        <input type="text" id="altura" name="altura"  class="form-control"  required="true" pattern="[0-9]{1}\.?[0-9]{1,2}$" value="<?php echo $altura?>">
                    </div>
                    <script type="text/javascript">
                        $("#altura").mask("0.00");
                    </script>

                    <div class="form-group">
                        <b>Peso:</b>
                        <input   type="text" name="peso"  id="peso" class="form-control" pattern="[0-9]{1,3}\.?[0-9]{1}$" required="true" value="<?php echo $peso?>">
                    </div>
                    <script type="text/javascript">
                        $("#peso").mask("000.0");
                    </script>


                    <div class="form-group">
                        <b>Problemas de saúde:</b><br>
                        <textarea name="pro_saude" class="form-control" rows="3"><?php echo $pro_saude; ?></textarea>
                    </div>
                    <input type="hidden" value="<?php echo $id_aluno;?>" name="id_aluno">
                    <input  style="margin-bottom: 10%"  type="submit" value="Alterar" class="btn btn-success btn-lg btn-block">
                
                    </form>

            
            </div>
        </div>


        </body>
</html>

    
 





