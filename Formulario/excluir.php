<?php
include '../cnn.php';
$id_aluno = $_POST['excluir'];

// TENHO QUE DAR UM JEITO DE EXCLUIR TODDOS OS EXERCICIOS DO CARINHA


$sql_ficha= "DELETE FROM ficha_de_treino WHERE id_aluno='$id_aluno'";


$excluir_ficha = mysqli_query($conexao, $sql_ficha) or die ('Nao excluiu a ficha');


// PORQUE EU TO EXCLUINDO AQUI 

$sql= "DELETE FROM aluno WHERE Id_Aluno ='$id_aluno'";

$excluir= mysqli_query($conexao, $sql) or die ('Não rolou');
mysqli_close($conexao);
echo "<script>alert('Aluno excluido');</script>";
echo "<script>window.location.href= \"../login/index.php\";</script>";




?>