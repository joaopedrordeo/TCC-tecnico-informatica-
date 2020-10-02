<?php
include '../cnn.php';
$id_ex = $_POST['excluir']; // puxar uma variavel com o id do exerciciO

// FAZER UM DELETE PARA AVALIAÇÃO

$sql_exercicio= "DELETE FROM exercicio WHERE id_ex='$id_ex'";
echo $sql_exercicio;

$excluir_ficha = mysqli_query($conexao, $sql_exercicio) or die ('Nao excluiu o exercicio');
mysqli_close($conexao);
   header("location: lancador.php");
?>