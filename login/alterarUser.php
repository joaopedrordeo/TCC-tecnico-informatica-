<?php
include '../cnn.php';
session_start();

$user = $_POST['user'];
$id = $_SESSION['id'];


$sql = "UPDATE personal SET Usuario='$user' WHERE Id_login='$id'";
mysqli_query($conexao, $sql) or die ("erro nessa coisa");
mysqli_close($conexao);
// FAZER A INSERÇÃO NOVA DA SESSION USER PRA PODER SER USADAS EM OUTRAS PAGINAS 

$_SESSION["usuario"]= $user;


echo "<script>alert('Seu nome de usuario foi alterado');</script>";
 echo "<script>window.location='editarPersonal.php';</script>";
       


?>