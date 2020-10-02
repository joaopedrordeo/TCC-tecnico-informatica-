<?php
include '../cnn.php';
session_start();

$email = $_POST['email'];
$id = $_SESSION['id'];


$sql = "UPDATE personal SET Email='$email' WHERE Id_login='$id'";
mysqli_query($conexao, $sql) or die ("Erro na alteração");
mysqli_close($conexao);
// FAZER A INSERÇÃO NOVA DA SESSION USER PRA PODER SER USADAS EM OUTRAS PAGINAS 

$_SESSION["email"]= $email;


echo "<script>alert('Seu email foi alterado');</script>";
 echo "<script>window.location='editarPersonal.php';</script>";
       


?>