 <?php
include '../cnn.php';
session_start();
$id_ft = $_SESSION["id_ft"];

$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];
$p6 = $_POST['p6'];
$p7 = $_POST['p7'];
$p8 = $_POST['p8'];
$p9 = $_POST['p9'];
$p10 = $_POST['p10'];

$sql= "INSERT INTO avaliacao(id_ava, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, id_ft) VALUES ( NUll, '$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$p8', '$p9', '$p10', '$id_ft');";

mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
mysqli_close($conexao);
header('location: ../ficha/lancador.php');
?>