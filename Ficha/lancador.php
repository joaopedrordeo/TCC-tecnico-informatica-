<?php 
include '../cnn.php';
session_start();
if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
    echo "<script>alert('Você precisa fazer login.');</script>";
    echo "<script>window.location.href= \"../index.php\";</script>";}


$id_login= $_SESSION["id"];
if(isset($_POST['id_aluno'])){
    $id_aluno = $_POST['id_aluno'];
    $_SESSION['id_aluno'] = $id_aluno;
}else{
    $id_aluno = $_SESSION['id_aluno'];
}

$sql_ficha = "SELECT id_ft FROM ficha_de_treino WHERE id_Aluno='$id_aluno'"; 
$ficha = mysqli_query($conexao, $sql_ficha) or die ('Falha na pesquisa da ficha de treino');

while($row = mysqli_fetch_array($ficha)){ 
    $id_ficha = $row['id_ft'];
    $_SESSION["id_ft"]= $id_ficha;
}

$id_ft= $_SESSION["id_ft"];

?>
<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href='../src/css/bootstrap.min.css' rel='stylesheet'>
        <link href='../src/css/style.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <title>Ficha de treino</title>
    </head>
    <body>
        <?php include '../nav.php';?>
        <div class="conteiner-fluid">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    
                    <div style="margin-top: 15%">
                        <h1 class="display-4" align="center">Lançador</h1>
                        
                        <div class="shadow p-3 mb-5 bg-white rounded">
                            <form action="return.php" method="POST">
                                <div class="form-row">
                                    <div class="col-md-6" >
                                        <div class="form-group">
                                            <p><b>Nome do exercicio</b></p>
                                            <input type="text" name="exercicio" class="form-control" title="Insira o nome do exercicio" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <p>Carga</p>
                                            <input type="text" name="carga" class="form-control" title="Insira a quantidade de carga" pattern="[0-9]+$">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <p>Repetição</p>
                                            <input type="text" name="repeticao" class="form-control" title="Insira a retição" pattern="[0-9]+$">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <p>Série</p>
                                            <input type="text" name="serie" class="form-control" title="Insira a serie" > 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-10">
                                        <div class="form-group">

                                            <!--  ------------------------------------- Checkbox dos dias da semana -->                                            
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input name="dom"type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Domingo</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input  name="seg" type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Segunda</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input name="ter" type="checkbox" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">Terça</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input  name="qua" type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">Quarta</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input name="qui" type="checkbox" class="custom-control-input" id="customCheck5">
                                                <label class="custom-control-label" for="customCheck5">Quinta</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input name="sex" type="checkbox" class="custom-control-input" id="customCheck6">
                                                <label class="custom-control-label" for="customCheck6">Sexta</label>
                                            </div>
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input  name="sab" type="checkbox" class="custom-control-input" id="customCheck7">
                                                <label class="custom-control-label" for="customCheck7">Sabado</label>
                                            </div>
                                        </div>
                                    </div>
                                    <script> // VERIFICAÇÃO SE TEM UM CHECKBOX MARCADO PARA NAO PODER REGISTRAR UM EXERCICIO SEM DIA
                                        var box = $('#box');
                                        box.blur(function(){
                                            var check1 = $("#customCheck1");
                                            var check2 = $("#customCheck2");
                                            var check3 = $("#customCheck3"); 
                                            var check4 = $("#customCheck4"); 
                                            var check5 = $("#customCheck5"); 
                                            var check6 = $("#customCheck6"); 
                                            var check7 = $("#customCheck7"); 
                                            if (check1.is(":checked") || check2.is(":checked") || check2.is(":checked") || check3.is(":checked") || check3.is(":checked") || check4.is(":checked") || check5.is(":checked") || check6.is(":checked") || check7.is(":checked"))
                                            {
                                               
                                                document.getElementById("cadastrar").disabled = false;
                                            }else{
                                                
                                                document.getElementById("cadastrar").disabled = true;
                                            }
                                        })
                                    </script>



                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="hidden" name="id_ft" value="<?php echo $id_ft;?>">
                                            <button type="submit" id="cadastrar" class="btn btn-success btn-lg btn-block">Cadastrar</button>


                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-10">
                                    </div>
                                    <div class="col-md-2">
                                        <a href='../avaliacao/form.php'> <button type="button" class="btn btn-info btn-lg btn-block">Questionário</button></a>
                                    </div>

                                </div>
                            </form>

                            <br><br> 
                            <h5><center>Ficha de treino</center></h5>
                            <hr>

                            <!-- ---------------------------------------------------------------Navs -------- -->
                            <ul class="nav nav-pills nav-justified" role="tablist" id="tab">
                                <li class="nav-item">
                                    <a class="nav-link" href="#domingo"  id="domingo-tab" data-toggle="tab" role="tab" aria-controls="domingo">Domingo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#segunda" id="segunda-tab" data-toggle="tab" role="tab" aria-controls="segunda">Segunda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#terca"  id="terca-tab" data-toggle="tab" role="tab" aria-controls="terca">Terça</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#quarta"  id="quarta-tab" data-toggle="tab" role="tab" aria-controls="quarta">Quarta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#quinta"  id="quinta-tab" data-toggle="tab" role="tab" aria-controls="quinda">Quinta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#sexta"  id="sexta-tab" data-toggle="tab" role="tab" aria-controls="sexta">Sexta</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#sabado"   id="sabado-tab" data-toggle="tab" role="tab" aria-controls="sabado">Sabado</a>
                                </li>
                            </ul>  
                            <hr>
                            <!------------------------------------------------------Tabs com a tabela e a consulta no banco -->

                            <div class="tab-content" id="tab">
                                <!--------------------------------------------------------------Domingo----------------------->
                                <div class="tab-pane fade" id="domingo"  role="tabpanel" aria-labelledby="domingo-tab" >
                                    <?php
                                    $pesquisa= "SELECT * FROM exercicio where Ex_dia= 'Domingo' and Id_ft='$id_ft'";
                                    $resultado = mysqli_query($conexao, $pesquisa) ;

                                    // Talvez precise colocar a tabela responseiva com aquela div la

                                    echo"<table class='table table-borderless'>"
                                        ."<thead >"
                                        ."<tr>"
                                        ."<th scope='col'><label> Exercicio </label></th>"
                                        ."<th scope='col'><label> Carga </label> </th>"
                                        ."<th scope='col'><label> Série </label></th>"
                                        ."<th scope='col'><label> Repetição </label></th>"
                                        ."<th scope='col'><label> Opções </label></th>"
                                        ."</tr>"
                                        ."</thead>"
                                        ."<tbody>";

                                    while($row = mysqli_fetch_array($resultado)){ 

                                        $id_ex = $row['Id_ex']; // exemplo
                                        $mod_nome = $row['Ex_nome'];
                                        $mod_carga= $row['Ex_carga'];
                                        $mod_repeticao= $row['Ex_repeticao'] ;
                                        $mod_serie= $row['Ex_serie'];

                                        echo "<tr>"
                                            ."<td scope='row'>"."<label id='label'>". $row['Ex_nome']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row['Ex_carga']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>".$row['Ex_serie']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row['Ex_repeticao']."</label>" ."</td>";

                                        // Botão do excluir 

                                        echo "<td scope='row'>"

                                            ."<div style='float right;'>"
                                            ."<button type='button' class='btn btn-secondary'  title='Excluir' data-toggle='modal' data-target='#modalEX' id='botaoEX' data-whatever='$id_ex'>
                                                <i class='material-icons'>delete</i>"
                                            ."</button>"
                                            ."</div>"
                                            ."<td>"; 

                                        echo "<div style='float: center;  margin: 0.2%;' >"
                                            // ."<form action'lancador.php' method='POST' name='myform' id='myform'>"

                                            // Botao que chama o modal e envia os dados

                                            ."<button type='button' class='btn btn-secondary' title='Editar exercicio'  data-toggle='modal' data-target='#exampleModal' id='botao' data-whatever='$id_ex'  data-whatevernome='$mod_nome'  data-whatevercarga='$mod_carga'  data-whateverrepeticao='$mod_repeticao'  data-whateverserie='$mod_serie'><i class='material-icons'>edit</i>"

                                            ."</button>"
                                            // ."</form>"
                                            ."</div>"
                                            ."</div>"
                                            ."</div>";

                                        echo "</div>";
                                        echo "</div>";
                                    }
                                    echo"</tr>"
                                        ."</tbody>"
                                        ."</table>";
                                    echo"</li>";
                                    ?>
                                </div>

                                <!-------------------------------------------------------------------Segunda--------------->
                                <div class="tab-pane fade" id="segunda"  role="tabpanel" aria-labelledby="segunda-tab">
                                    <?php
                                    $pesquisa2= "SELECT * FROM exercicio where Ex_dia= 'Segunda' and Id_ft='$id_ft'"; 
                                    $resultado2 = mysqli_query($conexao, $pesquisa2) ;
                                    echo"<table class='table table-borderless'>"
                                        ."<thead >"
                                        ."<tr>"
                                        ."<th scope='col'><label> Exercicio </label></th>"
                                        ."<th scope='col'><label> Carga </label> </th>"
                                        ."<th scope='col'><label> Série </label></th>"
                                        ."<th scope='col'><label> Repetição </label></th>"
                                        ."<th scope='col'><label> Opções </label></th>"
                                        ."</tr>"
                                        ."</thead>"
                                        ."<tbody>";

                                    while($row2 = mysqli_fetch_array($resultado2)){ 
                                        $id_ex = $row2['Id_ex']; // exemplo
                                        $mod_nome = $row2['Ex_nome'];
                                        $mod_carga= $row2['Ex_carga'];
                                        $mod_repeticao= $row2['Ex_repeticao'] ;
                                        $mod_serie= $row2['Ex_serie'];

                                        echo "<tr>"
                                            ."<td scope='row'>"."<label id='label'>". $row2['Ex_nome']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row2['Ex_carga']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>".$row2['Ex_serie']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row2['Ex_repeticao']."</label>" ."</td>";

                                        // Botão do excluir 

                                        echo "<td scope='row'>"

                                            ."<div style='float center;'>"
                                            ."<button type='button' class='btn btn-secondary'  title='Excluir' data-toggle='modal' data-target='#modalEX' id='botaoEX' data-whatever='$id_ex'>
                                                <i class='material-icons'>delete</i>"
                                            ."</button>"
                                            ."</div>"
                                            ."<td>";

                                        echo "<div style='float: center;  margin: 0.2%;'>"
                                            // Botao que chama o modal e envia os dados
                                            ."<button type='button' class='btn btn-secondary' title='Editar exercicio'  data-toggle='modal' data-target='#exampleModal' id='botao' data-whatever='$id_ex'  data-whatevernome='$mod_nome'  data-whatevercarga='$mod_carga'  data-whateverrepeticao='$mod_repeticao'  data-whateverserie='$mod_serie'><i class='material-icons'>edit</i>"

                                            ."</button>"
                                            ."</div>"
                                            ."</div>"
                                            ."</div>";

                                        echo "</div>";
                                        echo "</div>";

                                    }
                                    echo"</tr>"
                                        ."</tbody>"
                                        ."</table>";
                                    echo"</li>";
                                    ?>
                                </div>
                                <!-------------------------------------------------------------Terça----------------------->
                                <div class="tab-pane fade" id="terca"  role="tabpanel" aria-labelledby="terca-tab">
                                    <?php
                                    $pesquisa3 = "SELECT * FROM exercicio where Ex_dia= 'Terca' and Id_ft='$id_ft'"; 
                                    $resultado3 = mysqli_query($conexao, $pesquisa3) ;
                                    echo"<table class='table table-borderless'>"
                                        ."<thead >"
                                        ."<tr>"
                                        ."<th scope='col'><label> Exercicio </label></th>"
                                        ."<th scope='col'><label> Carga </label> </th>"
                                        ."<th scope='col'><label> Série </label></th>"
                                        ."<th scope='col'><label> Repetição </label></th>"
                                        ."<th scope='col'><label> Opções </label></th>"
                                        ."</tr>"
                                        ."</thead>"
                                        ."<tbody>";

                                    while($row3 = mysqli_fetch_array($resultado3)){ 
                                        $id_ex = $row3['Id_ex']; // exemplo
                                        $mod_nome = $row3['Ex_nome'];
                                        $mod_carga= $row3['Ex_carga'];
                                        $mod_repeticao= $row3['Ex_repeticao'] ;
                                        $mod_serie= $row3['Ex_serie'];

                                        echo "<tr>"
                                            ."<td scope='row'>"."<label id='label'>". $row3['Ex_nome']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row3['Ex_carga']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>".$row3['Ex_serie']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row3['Ex_repeticao']."</label>" ."</td>";

                                        // Botão do excluir 

                                        echo "<td scope='row'>"

                                            ."<div style='float center;'>"
                                            ."<button type='button' class='btn btn-secondary'  title='Excluir' data-toggle='modal' data-target='#modalEX' id='botaoEX' data-whatever='$id_ex'>
                                                <i class='material-icons'>delete</i>"
                                            ."</button>"
                                            ."</div>"
                                            ."<td>";

                                        echo "<div style='float: center;  margin: 0.2%;'>"
                                            // Botao que chama o modal e envia os dados
                                            ."<button type='button' class='btn btn-secondary' title='Editar exercicio'  data-toggle='modal' data-target='#exampleModal' id='botao' data-whatever='$id_ex'  data-whatevernome='$mod_nome'  data-whatevercarga='$mod_carga'  data-whateverrepeticao='$mod_repeticao'  data-whateverserie='$mod_serie'><i class='material-icons'>edit</i>"

                                            ."</button>"
                                            ."</div>"
                                            ."</div>"
                                            ."</div>";

                                        echo "</div>";
                                        echo "</div>";

                                    }
                                    echo"</tr>"
                                        ."</tbody>"
                                        ."</table>";
                                    echo"</li>";
                                    ?>
                                </div>
                                <!---------------------------------------------------------------Quarta----------------------->			
                                <div class="tab-pane fade" id="quarta"  role="tabpanel" aria-labelledby="quarta-tab">
                                    <?php
                                    $pesquisa4 = "SELECT * FROM exercicio where Ex_dia= 'Quarta' and Id_ft='$id_ft'"; 
                                    $resultado4 = mysqli_query($conexao, $pesquisa4) ;
                                    echo"<table class='table table-borderless'>"
                                        ."<thead >"
                                        ."<tr>"
                                        ."<th scope='col'><label> Exercicio </label></th>"
                                        ."<th scope='col'><label> Carga </label> </th>"
                                        ."<th scope='col'><label> Série </label></th>"
                                        ."<th scope='col'><label> Repetição </label></th>"
                                        ."<th scope='col'><label> Opções </label></th>"
                                        ."</tr>"
                                        ."</thead>"
                                        ."<tbody>";

                                    while($row4 = mysqli_fetch_array($resultado4)){ 
                                        $id_ex = $row4['Id_ex']; // exemplo
                                        $mod_nome = $row4['Ex_nome'];
                                        $mod_carga= $row4['Ex_carga'];
                                        $mod_repeticao= $row4['Ex_repeticao'] ;
                                        $mod_serie= $row4['Ex_serie'];

                                        echo "<tr>"
                                            ."<td scope='row'>"."<label id='label'>". $row4['Ex_nome']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row4['Ex_carga']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>".$row4['Ex_serie']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row4['Ex_repeticao']."</label>" ."</td>";

                                        // Botão do excluir 

                                        echo "<td scope='row'>"

                                            ."<div style='float center;'>"
                                            ."<button type='button' class='btn btn-secondary'  title='Excluir' data-toggle='modal' data-target='#modalEX' id='botaoEX' data-whatever='$id_ex'>
                                                <i class='material-icons'>delete</i>"
                                            ."</button>"
                                            ."</div>"
                                            ."<td>";

                                        echo "<div style='float: center;  margin: 0.2%;'>"
                                            // Botao que chama o modal e envia os dados
                                            ."<button type='button' class='btn btn-secondary' title='Editar exercicio'  data-toggle='modal' data-target='#exampleModal' id='botao' data-whatever='$id_ex'  data-whatevernome='$mod_nome'  data-whatevercarga='$mod_carga'  data-whateverrepeticao='$mod_repeticao'  data-whateverserie='$mod_serie'><i class='material-icons'>edit</i>"

                                            ."</button>"
                                            ."</div>"
                                            ."</div>"
                                            ."</div>";

                                        echo "</div>";
                                        echo "</div>";

                                    }
                                    echo"</tr>"
                                        ."</tbody>"
                                        ."</table>";
                                    echo"</li>";
                                    ?>
                                </div>
                                <!----------------------------------------------------------------Quinta----------------------->

                                <div class="tab-pane fade" id="quinta"  role="tabpanel" aria-labelledby="quinta-tab">
                                    <?php
                                    $pesquisa5 = "SELECT * FROM exercicio where Ex_dia= 'Quinta' and Id_ft='$id_ft'"; 
                                    $resultado5 = mysqli_query($conexao, $pesquisa5) ;
                                    echo"<table class='table table-borderless'>"
                                        ."<thead >"
                                        ."<tr>"
                                        ."<th scope='col'><label> Exercicio </label></th>"
                                        ."<th scope='col'><label> Carga </label> </th>"
                                        ."<th scope='col'><label> Série </label></th>"
                                        ."<th scope='col'><label> Repetição </label></th>"
                                        ."<th scope='col'><label> Opções </label></th>"
                                        ."</tr>"
                                        ."</thead>"
                                        ."<tbody>";

                                    while($row5 = mysqli_fetch_array($resultado5)){ 
                                        $id_ex = $row5['Id_ex']; // exemplo
                                        $mod_nome = $row5['Ex_nome'];
                                        $mod_carga= $row5['Ex_carga'];
                                        $mod_repeticao= $row5['Ex_repeticao'] ;
                                        $mod_serie= $row5['Ex_serie'];

                                        echo "<tr>"
                                            ."<td scope='row'>"."<label id='label'>". $row5['Ex_nome']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row5['Ex_carga']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>".$row5['Ex_serie']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row5['Ex_repeticao']."</label>" ."</td>";

                                        // Botão do excluir 

                                        echo "<td scope='row'>"

                                            ."<div style='float center;'>"
                                            ."<button type='button' class='btn btn-secondary'  title='Excluir' data-toggle='modal' data-target='#modalEX' id='botaoEX' data-whatever='$id_ex'>
                                                <i class='material-icons'>delete</i>"
                                            ."</button>"
                                            ."</div>"
                                            ."<td>";

                                        echo "<div style='float: center;  margin: 0.2%;'>"
                                            // Botao que chama o modal e envia os dados
                                            ."<button type='button' class='btn btn-secondary' title='Editar exercicio'  data-toggle='modal' data-target='#exampleModal' id='botao' data-whatever='$id_ex'  data-whatevernome='$mod_nome'  data-whatevercarga='$mod_carga'  data-whateverrepeticao='$mod_repeticao'  data-whateverserie='$mod_serie'><i class='material-icons'>edit</i>"

                                            ."</button>"
                                            ."</div>"
                                            ."</div>"
                                            ."</div>";

                                        echo "</div>";
                                        echo "</div>";

                                    }
                                    echo"</tr>"
                                        ."</tbody>"
                                        ."</table>";
                                    echo"</li>";
                                    ?>
                                </div>
                                <!----------------------------------------------------Sexta------------------------>

                                <div class="tab-pane fade" id="sexta"  role="tabpanel" aria-labelledby="sexta-tab">
                                    <?php
                                    $pesquisa6 = "SELECT * FROM exercicio where Ex_dia= 'Sexta' and Id_ft='$id_ft'"; 
                                    $resultado6 = mysqli_query($conexao, $pesquisa6) ;
                                    echo"<table class='table table-borderless'>"
                                        ."<thead >"
                                        ."<tr>"
                                        ."<th scope='col'><label> Exercicio </label></th>"
                                        ."<th scope='col'><label> Carga </label> </th>"
                                        ."<th scope='col'><label> Série </label></th>"
                                        ."<th scope='col'><label> Repetição </label></th>"
                                        ."<th scope='col'><label> Opções </label></th>"
                                        ."</tr>"
                                        ."</thead>"
                                        ."<tbody>";

                                    while($row6 = mysqli_fetch_array($resultado6)){ 
                                        $id_ex = $row6['Id_ex']; // exemplo
                                        $mod_nome = $row6['Ex_nome'];
                                        $mod_carga= $row6['Ex_carga'];
                                        $mod_repeticao= $row6['Ex_repeticao'] ;
                                        $mod_serie= $row6['Ex_serie'];

                                        echo "<tr>"
                                            ."<td scope='row'>"."<label id='label'>". $row6['Ex_nome']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row6['Ex_carga']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>".$row6['Ex_serie']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row6['Ex_repeticao']."</label>" ."</td>";

                                        // Botão do excluir 

                                        echo "<td scope='row'>"

                                            ."<div style='float center;'>"
                                            ."<button type='button' class='btn btn-secondary'  title='Excluir' data-toggle='modal' data-target='#modalEX' id='botaoEX' data-whatever='$id_ex'>
                                                <i class='material-icons'>delete</i>"
                                            ."</button>"
                                            ."</div>"
                                            ."<td>";

                                        echo "<div style='float: center;  margin: 0.2%;'>"
                                            // Botao que chama o modal e envia os dados
                                            ."<button type='button' class='btn btn-secondary' title='Editar exercicio'  data-toggle='modal' data-target='#exampleModal' id='botao' data-whatever='$id_ex'  data-whatevernome='$mod_nome'  data-whatevercarga='$mod_carga'  data-whateverrepeticao='$mod_repeticao'  data-whateverserie='$mod_serie'><i class='material-icons'>edit</i>"

                                            ."</button>"
                                            ."</div>"
                                            ."</div>"
                                            ."</div>";

                                        echo "</div>";
                                        echo "</div>";

                                    }
                                    echo"</tr>"
                                        ."</tbody>"
                                        ."</table>";
                                    echo"</li>";
                                    ?>
                                </div>
                                <!----------------------------------------------------------------------Sabado----------------------->
                                <div class="tab-pane fade" id="sabado"  role="tabpanel" aria-labelledby="sabado-tab">

                                    <?php
                                    $pesquisa7 = "SELECT * FROM exercicio where Ex_dia= 'Sabado' and Id_ft='$id_ft'"; 
                                    $resultado7 = mysqli_query($conexao, $pesquisa7) ;
                                    echo"<table class='table table-borderless'>"
                                        ."<thead >"
                                        ."<tr>"
                                        ."<th scope='col'><label> Exercicio </label></th>"
                                        ."<th scope='col'><label> Carga </label> </th>"
                                        ."<th scope='col'><label> Série </label></th>"
                                        ."<th scope='col'><label> Repetição </label></th>"
                                        ."<th scope='col'><label> Opções </label></th>"
                                        ."</tr>"
                                        ."</thead>"
                                        ."<tbody>";

                                    while($row7 = mysqli_fetch_array($resultado7)){ 
                                        $id_ex = $row7['Id_ex']; // exemplo
                                        $mod_nome = $row7['Ex_nome'];
                                        $mod_carga= $row7['Ex_carga'];
                                        $mod_repeticao= $row7['Ex_repeticao'] ;
                                        $mod_serie= $row7['Ex_serie'];

                                        echo "<tr>"
                                            ."<td scope='row'>"."<label id='label'>". $row7['Ex_nome']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row7['Ex_carga']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>".$row7['Ex_serie']."</label>" ."</td>"
                                            ."<td scope='row'>"."<label id='label'>". $row7['Ex_repeticao']."</label>" ."</td>";

                                        // Botão do excluir ----------------------------------------------------------

                                        echo "<td scope='row'>"

                                            ."<div style='float center;'>"
                                            ."<button type='button' class='btn btn-secondary'  title='Excluir' data-toggle='modal' data-target='#modalEX' id='botaoEX' data-whatever='$id_ex'>
                                                <i class='material-icons'>delete</i>"
                                            ."</button>"
                                            ."</div>"
                                            ."<td>";

                                        echo "<div style='float: center;  margin: 0.2%;'>"
                                            // Botao que chama o modal e envia os dados
                                            ."<button type='button' class='btn btn-secondary' title='Editar exercicio'  data-toggle='modal' data-target='#exampleModal' id='botao' data-whatever='$id_ex'  data-whatevernome='$mod_nome'  data-whatevercarga='$mod_carga'  data-whateverrepeticao='$mod_repeticao'  data-whateverserie='$mod_serie'><i class='material-icons'>edit</i>"

                                            ."</button>"
                                            ."</div>"
                                            ."</div>"
                                            ."</div>";

                                        echo "</div>";
                                        echo "</div>";

                                    }
                                    echo"</tr>"
                                        ."</tbody>"
                                        ."</table>";
                                    echo"</li>";
                                    ?>
                                </div>
                                <!-- ------------------------------------------------------------------------------------ -->
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </body>


    <!-- MODAL PARA EXCLUIR EXERCICIO -->


    <div class="modal fade" id="modalEX" tabindex="-1" role="dialog" aria-labelledby="modalEXLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Tem certeza que quer excluir este exercicio?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>




                <div class="modal-body">
                    <form action='excluirFicha.php' method='POST' name="modalEX" id="modalEX">
                        <input type='hidden' name='excluir' id="excluirEX">
                    </form>
                    <div style="float: left;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
                    <div style="float: right;">
                        <button type="button" class="btn btn-danger" onclick="submitEX()">Excluir</button>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <!-- ------------------------------ AQUI TEMOS O JAVASCRIPT DO MODAL  DE EXCLUIR EXERCICIO ----------------------------------- --> 
    <script>
        function submitEX(){
            document.modalEX.submit();
        }


        $('#modalEX').on('show.bs.modal', function (event) {
           
            var button = $(event.relatedTarget) // Botão que acionou o modal
            // chama os data-whatever pra pegar os dados deles e colocar nas variaveis recipient
            var recipient = button.data('whatever')
            var modal = $(this)
            // atribui as variaveis recipients a id para colocar no form
            modal.find('.modal-title').text('Tem certeza que quer excluir este exercício? ID: ' + recipient)
            modal.find('#excluirEX').val(recipient)
        })
    </script>









    <!--  MODAL PARA EDITAR EXERCICIO-->


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar exercicio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="edit_ex.php" method="POST" name="modalForm" id="modalForm">
                        <div class="form-group">
                            <label for="nome" class="col-form-label">Nome exercicio:</label>
                            <input type="text" name="edit_nome" class="form-control" id="nome">
                        </div>
                        <div class="form-group">
                            <label for="carga" class="col-form-label">Carga:</label>
                            <input type="text" name="edit_carga" class="form-control" id="carga" pattern="[0-9]+$">
                        </div>
                        <div class="form-group">
                            <label for="repeticao" class="col-form-label">Repeticao:</label>
                            <input type="text" name="edit_repeticao" class="form-control" id="repeticao" pattern="[0-9]$">
                        </div>
                        <div class="form-group">
                            <label for="serie" class="col-form-label">Serie:</label>
                            <input type="text" name="edit_serie" class="form-control" id="serie"  pattern="[0-9]$">
                        </div>
                        <input type="hidden" name="id_ex" id="id">

                    </form>
                </div>
                <!--  Parte de baixo do modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button"  class="btn btn-primary" onclick="submit()">Concluir</button>
                </div>
            </div>
        </div>
    </div>


    <!-- ------------------------------ AQUI TEMOS O JAVASCRIPT DO MODAL DE EDITAR EXERCICIO ----------------------------------- --> 
    <script>
        function submit(){
            document.modalForm.submit();
     
        }


        $('#exampleModal').on('show.bs.modal', function (event) {
            
            var button = $(event.relatedTarget) // Botão que acionou o modal
            // chama os data-whatever pra pegar os dados deles e colocar nas variaveis recipient
            var recipient = button.data('whatever')
            var recipientnome = button.data('whatevernome')
            var recipientcarga = button.data('whatevercarga')
            var recipientrepeticao = button.data('whateverrepeticao')
            var recipientserie = button.data('whateverserie')
            var modal = $(this)
            // atribui as variaveis recipients a id para colocar no form
            modal.find('.modal-title').text('Editar exercicio ' + recipient)
            modal.find('#id').val(recipient)
            modal.find('#nome').val(recipientnome)
            modal.find('#carga').val(recipientcarga)
            modal.find('#repeticao').val(recipientrepeticao)
            modal.find('#serie').val(recipientserie)
        })
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>




