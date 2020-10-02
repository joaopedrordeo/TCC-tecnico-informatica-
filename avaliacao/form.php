<?php
session_start();
if(!isset($_SESSION["usuario"]) || !isset($_SESSION["senha"])){
    echo "<script>alert('Você precisa fazer login.');</script>";
    echo "<script>window.location.href= \"../index.php\";</script>";}?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Cadastrar do aluno</title>
        <link href='../src/css/bootstrap.min.css' rel='stylesheet'>
        <link href='../src/css/style.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!--   <link rel="stylesheet" href="/resources/demos/style.css">  -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class='pt-lg-3'>
                        <div class='float-sm-left'>
                            <div  class='input-group-append'>
                                <p>
                                    <a href='../login/index.php' class='badge badge-info' role='button' aria-pressed='true' title='Pagina Inicial'>
                                        <i class='material-icons'>home</i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div style="margin-top: 10%">
                        <h1 class="display-4" align="center">Questionário de prontidão para atividade física</h1>
                        <hr>
                        <br>

                        <?php
                        include '../cnn.php';
                        
                        $id_ft = $_SESSION["id_ft"]; // pega o id da ficha de treino do cara 

                        $sql = "SELECT * FROM avaliacao WHERE id_ft = '$id_ft'";

                        $resultado = mysqli_query($conexao, $sql);
                        mysqli_close($conexao);
                        if ($resultado ->num_rows>0 ){ // Faz a pesquisa pra ver se ja tem uma avaliação no banco e assim definir se ja vai preencher os radio tornando apenas visualização ou vai pedir pra cadastrar uma nova avaliação 
                            
                            while($row = mysqli_fetch_array($resultado)){ // aqui pega e coloca as respostas dentro de variaveis parar serem comparadas depois
                                
                                $p1 = $row['p1'];
                                $p2 = $row['p2'];
                                $p3 = $row['p3'];
                                $p4 = $row['p4'];
                                $p5 = $row['p5'];
                                $p6 = $row['p6'];
                                $p7 = $row['p7'];
                                $p8 = $row['p8'];
                                $p9 = $row['p9'];
                                $p10 = $row['p10'];
                            } ?>

                        <!-- ---------------------------------------------------------------------------------Pergunta 1 -->
                        <div class="form-group">
                            <label><b>1. </b>Algum médico já disse que você possui algum problema de coração
                                ou pressão arterial, e que somente deveria realizar atividade física 
                                supervisionado por profissionais de saúde?</label>
                            <?php if($p1 == 's'){?>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="p1" id="p1_sim" value="s" class="custom-control-input" checked>
                                <label class="custom-control-label" for="p1_sim">Sim</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="p1" id="p1_nao" value="n" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="p1_nao">Não</label>
                            </div>
                            <?php }else{?>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="p1" id="p1_sim" value="s" class="custom-control-input" disabled >
                                <label class="custom-control-label" for="p1_sim">Sim</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="p1" id="p1_nao" value="n" class="custom-control-input" checked>
                                <label class="custom-control-label" for="p1_nao">Não</label>
                            </div>
                        </div> <?php } ?>
                        <!------------------------------------------------------------------------------------ Pergunta 2 -->
                        <div class="form-group">
                            <label><b>2. </b>Você sente dores no peito quando pratica atividade física?</label> 
                            <?php if($p2 == 's'){?>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="p2" id="p2_sim" value="s" class="custom-control-input" checked>
                                <label class="custom-control-label" for="p2_sim">Sim</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" name="p2" id="p2_nao" value="n" class="custom-control-input" disabled>
                                <label class="custom-control-label" for="p2_nao">Não</label>
                            </div>
                        </div>
                        <?php }else{?>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p2" id="p2_sim" value="s" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p2_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p2" id="p2_nao" value="n" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p2_nao">Não</label>
                        </div>
                    </div> <?php } ?>
                    <!-------------------------------------------------------------------------------------- Pergunta 3 -->
                    <div class="form-group">
                        <label><b>3. </b>No último mês, você sentiu dores no peito ao praticar atividade física?</label>
                        <?php if($p3 == 's'){?> 
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p3" id="p3_sim" value="s" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p3_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p3" id="p3_nao" value="n" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p3_nao">Não</label>
                        </div>
                    </div>
                    <?php }else{?>
                    <div class="custom-control custom-radio">
                        <input type="radio" name="p3" id="p3_sim" value="s" class="custom-control-input" disabled>
                        <label class="custom-control-label" for="p3_sim">Sim</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" name="p3" id="p3_nao" value="n" class="custom-control-input" checked>
                        <label class="custom-control-label" for="p3_nao">Não</label>
                    </div> <?php } ?>
                    <!-------------------------------------------------------------------------------------- Pergunta 4 -->
                    <div class="form-group">
                        <label><b>4. </b>Você apresenta algum desequilíbrio devido à tontura e/ou perda
                            momentânea da consciência?</label> 
                        <?php if($p4 == 's'){?> 
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p4" id="p4_sim" value="s" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p4_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p4" id="p4_nao" value="n" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p4_nao">Não</label>
                        </div>
                        <?php }else{?>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p4" id="p4_sim" value="s" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p4_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p4" id="p4_nao" value="n" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p4_nao">Não</label>
                        </div>
                    </div><?php } ?>
                    <!-------------------------------------------------------------------------------------- Pergunta 5 -->
                    <div class="form-group">
                        <label><b>5. </b>Você possui algum problema ósseo ou articular, que pode ser
                            afetado ou agravado pela atividade física?</label>
                        <?php if($p5 == 's'){?> 
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p5" id="p5_sim" value="s" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p5_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p5" id="p5_nao" value="n" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p5_nao">Não</label>
                        </div>
                        <?php }else{?>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p5" id="p5_sim" value="s" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p5_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p5" id="p5_nao" value="n" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p5_nao">Não</label>
                        </div> 
                    </div><?php } ?>
                    <!-------------------------------------------------------------------------------------- Pergunta 6 -->
                    <div class="form-group">
                        <label><b>6. </b>Você toma atualmente algum tipo de medicação de uso contínuo?</label>
                        <?php if($p6 == 's'){?> 
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p6" id="p6_sim" value="s" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p6_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p6" id="p6_nao" value="n" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p6_nao">Não</label>
                        </div>
                        <?php }else{?>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p6" id="p6_sim" value="s" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p6_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p6" id="p6_nao" value="n" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p6_nao">Não</label>
                        </div>
                    </div><?php } ?>
                    <!-------------------------------------------------------------------------------------- Pergunta 7 -->
                    <div class="form-group">
                        <label><b>7. </b>Você realiza algum tipo de tratamento médico para pressão arterial ou problemas cardíacos </label> 
                        <?php if($p7 == 's'){?> 
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p7" id="p7_sim" value="s" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p7_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p7" id="p7_nao" value="n" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p7_nao">Não</label>
                        </div>
                        <?php }else{?>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p7" id="p7_sim" value="s" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p7_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p7" id="p7_nao" value="n" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p7_nao">Não</label>
                        </div>
                    </div><?php } ?>
                    <!-------------------------------------------------------------------------------------- Pergunta 8 -->
                    <div class="form-group">
                        <label><b>8. </b>Você realiza algum tratamento médico contínuo, que possa ser afetado ou prejudicado com a atividade física?</label> 
                        <?php if($p8 == 's'){?> 
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p8" id="p8_sim" value="s" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p8_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p8" id="p8_nao" value="n" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p8_nao">Não</label>
                        </div>
                        <?php }else{?>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p8" id="p8_sim" value="s" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p8_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p8" id="p8_nao" value="n" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p8_nao">Não</label>
                        </div>
                    </div><?php } ?>
                    <!-------------------------------------------------------------------------------------- Pergunta 9 -->
                    <div class="form-group">
                        <label><b>9. </b>Você já se submeteu a algum tipo de cirurgia, que comprometa de
                            alguma forma a atividade física?</label>
                        <?php if($p9 == 's'){?> 
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p9" id="p9_sim" value="s" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p9_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p9" id="p9_nao" value="n" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p9_nao">Não</label>
                        </div>
                        <?php }else{?>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p9" id="p9_sim" value="s" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p9_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p9" id="p9_nao" value="n" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p9_nao">Não</label>
                        </div>
                    </div><?php } ?>
                    <!-------------------------------------------------------------------------------------- Pergunta 10 -->
                    <div class="form-group">
                        <label><b>10. </b>Sabe de alguma outra razão pela qual a atividade física possa
                            eventualmente comprometer sua saúde?</label> 
                        <?php if($p10 == 's'){?> 
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p10" id="p10_sim" value="s" class="custom-control-input" checked>
                            <label class="custom-control-label" for="p10_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p10" id="p10_nao" value="n" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p10_nao">Não</label>
                        </div>
                        <?php }else{?>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p10" id="p10_sim" value="s" class="custom-control-input" disabled>
                            <label class="custom-control-label" for="p10_sim">Sim</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" name="p10" id="p10_nao" value="n" class="custom-control-input" checked>
                            <label style="margin-bottom: 10%" class="custom-control-label" for="p10_nao">Não</label>
                            
                        </div>
                         <p style=" margin-bottom: 10%; " class='float-sm-right'>Fonte: CREF</p>
                    </div><?php } ?>
                    <!-------------------------------------------------------------------------------------- Fim das perguntas -->
                </div>
            </div>
        </div>
    </body>
</html>



<!------------------------------------------------------------------------ Começo do Else pra começar o cadastro da avaliação -->
<?php }else{ ?>

<form method="POST" action="cadastraForm.php">

    <!-- ---------------------------------------------------------------------------------Pergunta 1 -->
    <div class="form-group">
        <label><b>1. </b>Algum médico já disse que você possui algum problema de coração
            ou pressão arterial, e que somente deveria realizar atividade física 
            supervisionado por profissionais de saúde?</label>

        <div class="custom-control custom-radio">
            <input type="radio" name="p1" id="p1_sim" value="s" class="custom-control-input" >
            <label class="custom-control-label" for="p1_sim">Sim</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" name="p1" id="p1_nao" value="n" class="custom-control-input">
            <label class="custom-control-label" for="p1_nao">Não</label>
        </div>
    </div>


    <!------------------------------------------------------------------------------------ Pergunta 2 -->
    <div class="form-group">
        <label><b>2. </b>Você sente dores no peito quando pratica atividade física?</label> 
        <div class="custom-control custom-radio">
            <input type="radio" name="p2" id="p2_sim" value="s" class="custom-control-input">
            <label class="custom-control-label" for="p2_sim">Sim</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" name="p2" id="p2_nao" value="n" class="custom-control-input">
            <label class="custom-control-label" for="p2_nao">Não</label>
        </div>
    </div>
    <!-------------------------------------------------------------------------------------- Pergunta 3 -->
    <div class="form-group">
        <label><b>3. </b>No último mês, você sentiu dores no peito ao praticar atividade física?</label> 
        <div class="custom-control custom-radio">
            <input type="radio" name="p3" id="p3_sim" value="s" class="custom-control-input">
            <label class="custom-control-label" for="p3_sim">Sim</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" name="p3" id="p3_nao" value="n" class="custom-control-input">
            <label class="custom-control-label" for="p3_nao">Não</label>
        </div>
    </div>

    <!-------------------------------------------------------------------------------------- Pergunta 4 -->
    <div class="form-group">
        <label><b>4. </b>Você apresenta algum desequilíbrio devido à tontura e/ou perda
            momentânea da consciência?</label> 
        <div class="custom-control custom-radio">
            <input type="radio" name="p4" id="p4_sim" value="s" class="custom-control-input">
            <label class="custom-control-label" for="p4_sim">Sim</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" name="p4" id="p4_nao" value="n" class="custom-control-input">
            <label class="custom-control-label" for="p4_nao">Não</label>
        </div>
    </div>

    <!-------------------------------------------------------------------------------------- Pergunta 5 -->
    <div class="form-group">
        <label><b>5. </b>Você possui algum problema ósseo ou articular, que pode ser
            afetado ou agravado pela atividade física?</label>
        <div class="custom-control custom-radio">
            <input type="radio" name="p5" id="p5_sim" value="s" class="custom-control-input">
            <label class="custom-control-label" for="p5_sim">Sim</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" name="p5" id="p5_nao" value="n" class="custom-control-input">
            <label class="custom-control-label" for="p5_nao">Não</label>
        </div>
    </div>

    <!-------------------------------------------------------------------------------------- Pergunta 6 -->
    <div class="form-group">
        <label><b>6. </b>Você toma atualmente algum tipo de medicação de uso contínuo?</label>
        <div class="custom-control custom-radio">
            <input type="radio" name="p6" id="p6_sim" value="s" class="custom-control-input">
            <label class="custom-control-label" for="p6_sim">Sim</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" name="p6" id="p6_nao" value="n" class="custom-control-input">
            <label class="custom-control-label" for="p6_nao">Não</label>
        </div>
    </div>

    <!-------------------------------------------------------------------------------------- Pergunta 7 -->
    <div class="form-group">
        <label><b>7. </b>Você realiza algum tipo de tratamento médico para pressão arterial ou problemas cardíacos </label> 
        <div class="custom-control custom-radio">
            <input type="radio" name="p7" id="p7_sim" value="s" class="custom-control-input">
            <label class="custom-control-label" for="p7_sim">Sim</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" name="p7" id="p7_nao" value="n" class="custom-control-input">
            <label class="custom-control-label" for="p7_nao">Não</label>
        </div>
    </div>


    <!-------------------------------------------------------------------------------------- Pergunta 8 -->
    <div class="form-group">
        <label><b>8. </b>Você realiza algum tratamento médico contínuo, que possa ser afetado ou prejudicado com a atividade física?</label> 
        <div class="custom-control custom-radio">
            <input type="radio" name="p8" id="p8_sim" value="s" class="custom-control-input">
            <label class="custom-control-label" for="p8_sim">Sim</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" name="p8" id="p8_nao" value="n" class="custom-control-input">
            <label class="custom-control-label" for="p8_nao">Não</label>
        </div>
    </div>


    <!-------------------------------------------------------------------------------------- Pergunta 9 -->
    <div class="form-group">
        <label><b>9. </b>Você já se submeteu a algum tipo de cirurgia, que comprometa de
            alguma forma a atividade física?</label>
        <div class="custom-control custom-radio">
            <input type="radio" name="p9" id="p9_sim" value="s" class="custom-control-input">
            <label class="custom-control-label" for="p9_sim">Sim</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" name="p9" id="p9_nao" value="n" class="custom-control-input">
            <label class="custom-control-label" for="p9_nao">Não</label>
        </div>
    </div>


    <!-------------------------------------------------------------------------------------- Pergunta 10 -->
    <div class="form-group">
        <label><b>10. </b>Sabe de alguma outra razão pela qual a atividade física possa
            eventualmente comprometer sua saúde?</label> 
        <div class="custom-control custom-radio">
            <input type="radio" name="p10" id="p10_sim" value="s" class="custom-control-input">
            <label class="custom-control-label" for="p10_sim">Sim</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" name="p10" id="p10_nao" value="n" class="custom-control-input">
            <label class="custom-control-label" for="p10_nao">Não</label>
        </div>
    </div>
    <!-------------------------------------------------------------------------------------- Botão -->
    <input style="margin-bottom: 20%" type="submit" value="Cadastrar" class="btn btn-success btn-lg btn-block" id="cadastrar" >
        <p style=" margin-bottom: 5%; " class='float-sm-right'>Fonte: CREF</p>

</form>
</div>
</div>
<div class="col-md-3">
</div>

</div>
</div>

</body>
</html>

<?php }; ?>












