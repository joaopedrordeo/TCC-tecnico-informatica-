<?php
include '../cnn.php';
session_start();

$id_ex= $_POST['id_ex'];
$nome_ex= $_POST['edit_nome'];
$carga= $_POST['edit_carga'];
$repeticao= $_POST['edit_repeticao'];
$serie= $_POST['edit_serie'];

$sql= "UPDATE exercicio SET Ex_nome='$nome_ex', Ex_carga='$carga', Ex_serie='$serie', Ex_repeticao='$repeticao' WHERE Id_ex='$id_ex'";

echo $sql;
mysqli_query($conexao, $sql) or die ("Erro na edição do exercicio");
mysqli_close($conexao);
header("location: lancador.php");

?>