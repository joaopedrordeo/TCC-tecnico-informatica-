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
        <title>Pesquisar aluno</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Responsividade -->
        <link href='../src/css/bootstrap.min.css' rel='stylesheet'>
        <link href='../src/css/style.css' rel='stylesheet'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!--   <link rel="stylesheet" href="/resources/demos/style.css">  -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head>
    <body>
        <?php
        //if(!empty($_GET["pesquisa"])){
        include '../cnn.php';

        $id_login= $_SESSION["id"]; 
        $pesquisa= $_GET['pesquisa'];
        $sql= "SELECT * FROM aluno WHERE id_login='$id_login' and nome_aluno LIKE '%$pesquisa%' ORDER BY Nome_aluno ";
        $resultado = mysqli_query($conexao, $sql);
        mysqli_close($conexao);

        include '../nav.php';


        echo "<div class='container-fluid'>"
            ."<div class='row'>"
            ."<div class='col-md-2'>"
            ."</div>"
            ."<div class='col-md-8'>"
            ."<div style='margin-top: 80px'>"
            ."<h3>Resultado da busca <span class='badge badge-secondary'></span></h3><hr>";



        while($row = mysqli_fetch_array($resultado)){ 

            echo "<div class='shadow p-3 mb-2 bg-white rounded'>";
            echo "<div class='row' >"
                ."<div style='margin-top: 10px;' class='col-sm-1'>";
            echo "<img src='../img/branco.png' alt='Não foi possivel carregar a imagem' class='rounded-circle' width='48px'>"
                ."</div>";



            $id_aluno = $row['Id_Aluno']; 


            echo "<div class='col-sm-4'>"
                ."<b><big>".$nome= $row['Nome_aluno']."</big></b>"; 
            echo "<p>".$email= $row['Email']."</p></div>";
            echo "<div class='col-sm-3'>";
            echo $cel= $row['Celular'];
            echo "<p>".$peso= $row['Peso']."Kg</p></div>";

            echo "<div class='col-sm-4'>";


            // botao da ficha de treino
            echo "<div style='float: right; margin: 0.2222%;'>"
                ."<form action='../Ficha/lancador.php' method='POST'>" 
                ."<input type='hidden' name='id_aluno' value='$id_aluno' />"
                ."<button type='submit' class='btn btn-secondary' title='Ficha de Treino'>"
                ."<i class='material-icons'>assignment</i>"
                ."</button>"
                ."</form>"
                ."</div>"

                // botao do excluir carinha
                ."<div style='float: right; margin: 0.2%;'>"
                ."<button type='submit' class='btn btn-secondary'  title='Excluir'data-toggle='modal' data-target='#exampleModal' id='botao' data-whatever='$id_aluno'> <i class='material-icons'>delete</i>"
                ."</button>"


                ."</div>"

                // botao do editar
                ."<div style='float: right; margin: 0.2%;'>"
                ."<form action='../Formulario/editar.php' method='POST'>"
                ."<input type='hidden' name='id_aluno' value='$id_aluno' />"
                ."<button type='submit' class='btn btn-secondary' title='Editar Dados'><i class='material-icons'>edit</i>"
                ."</button>"
                ."</form>"
                ."</div>"
                ."</div>"
                ."</div>"
                ."</div>";
        }

        ?>
        <div class='col-md-2'>

        </div>
        </div>
    </div>
<!-- The Modal -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tem certeza que quer excluir este aluno?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action='../Formulario/excluir.php' method='POST' name="modalForm" id="modalForm">
                    <input type='hidden' name='excluir' id="id">
                </form>
                <div class="row">
                    <div class="col-sm-12">
                        <div style="float: left;">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    
                    
                        <div  style="float: right;">
                            <button type="button" class="btn btn-danger" onclick="submit()">Excluir</button>
                        </div>
                    </div>
                </div>
                <!--  Parte de baixo do modal -->
               
            </div>
        </div>
    </div>
</div>
</div>

<!-- ------------------------------ AQUI TEMOS O JAVASCRIPT DO MODAL ----------------------------------- --> 
<script>
    function submit(){
        document.modalForm.submit();
        //document.forms['myform'].action = "lancador.php";
        //document.forms['myform'].submit();
    }


    $('#exampleModal').on('show.bs.modal', function (event) {
        console.log('Chegou aqui kkk')
        var button = $(event.relatedTarget) // Botão que acionou o modal
        // chama os data-whatever pra pegar os dados deles e colocar nas variaveis recipient
        var recipient = button.data('whatever')
        var modal = $(this)
        // atribui as variaveis recipients a id para colocar no form
        modal.find('.modal-title').text('Tem certeza que quer excluir este aluno? ID: ' + recipient)
        modal.find('#id').val(recipient)
    })
</script>

</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
-->