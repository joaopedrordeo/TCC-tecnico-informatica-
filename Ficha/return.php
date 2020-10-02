<?php
include '../cnn.php';

$id_ft= $_POST['id_ft'];
$ex_nome= $_POST['exercicio'];
$ex_carga= $_POST['carga'];
$ex_repeticao= $_POST['repeticao'];
$ex_serie= $_POST['serie'];
$dia_dom= $_POST['dom'];
$dia_seg= $_POST['seg'];
$dia_ter= $_POST['ter'];
$dia_qua= $_POST['qua'];
$dia_qui= $_POST['qui'];
$dia_sex= $_POST['sex'];
$dia_sab= $_POST['sab'];
if($dia_dom == "on"){
	$sql1= "INSERT INTO exercicio(Id_ex, Ex_nome, Ex_carga, Ex_serie, Ex_repeticao, Ex_dia, Id_ft) VALUES (NULL, '$ex_nome', '$ex_carga', '$ex_repeticao', '$ex_serie', 'Domingo', '$id_ft')";
	mysqli_query($conexao, $sql1) or die (mysqli_error($conexao));
}
if($dia_seg == "on"){
	$sql2= "INSERT INTO exercicio(Id_ex, Ex_nome, Ex_carga, Ex_serie, Ex_repeticao, Ex_dia, Id_ft) VALUES (NULL, '$ex_nome', '$ex_carga', '$ex_repeticao', '$ex_serie', 'Segunda', '$id_ft')";
	mysqli_query($conexao, $sql2) or die (mysqli_error($conexao));
}
if($dia_ter == "on"){
	$sql3= "INSERT INTO exercicio(Id_ex, Ex_nome, Ex_carga, Ex_serie, Ex_repeticao, Ex_dia, Id_ft) VALUES (NULL, '$ex_nome', '$ex_carga', '$ex_repeticao', '$ex_serie', 'Terca', '$id_ft')";
	mysqli_query($conexao, $sql3) or die (mysqli_error($conexao));
}
if($dia_qua == "on"){
	$sql4= "INSERT INTO exercicio(Id_ex, Ex_nome, Ex_carga, Ex_serie, Ex_repeticao, Ex_dia, Id_ft) VALUES (NULL, '$ex_nome', '$ex_carga', '$ex_repeticao', '$ex_serie', 'Quarta', '$id_ft')";
	mysqli_query($conexao, $sql4) or die (mysqli_error($conexao));
}
if($dia_qui == "on"){
	$sql5= "INSERT INTO exercicio(Id_ex, Ex_nome, Ex_carga, Ex_serie, Ex_repeticao, Ex_dia, Id_ft) VALUES (NULL, '$ex_nome', '$ex_carga', '$ex_repeticao', '$ex_serie', 'Quinta', '$id_ft')";
	mysqli_query($conexao, $sql5) or die (mysqli_error($conexao));
}
if($dia_sex == "on"){
	$sql6= "INSERT INTO exercicio(Id_ex, Ex_nome, Ex_carga, Ex_serie, Ex_repeticao, Ex_dia, Id_ft) VALUES (NULL, '$ex_nome', '$ex_carga', '$ex_repeticao', '$ex_serie', 'Sexta', '$id_ft')";
	mysqli_query($conexao, $sql6) or die (mysqli_error($conexao));
}
if($dia_sab == "on"){
	$sql7= "INSERT INTO exercicio(Id_ex, Ex_nome, Ex_carga, Ex_serie, Ex_repeticao, Ex_dia, Id_ft) VALUES (NULL, '$ex_nome', '$ex_carga', '$ex_repeticao', '$ex_serie', 'Sabado', '$id_ft')";
	mysqli_query($conexao, $sql7) or die (mysqli_error($conexao));
}
mysqli_close($conexao);
header("Location: lancador.php");

// ----------------------------------------------------------------



?> 
