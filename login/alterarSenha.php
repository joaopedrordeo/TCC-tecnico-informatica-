<?php
include '../cnn.php';
session_start();

$id = $_SESSION['id'];
$senha_at_sess = $_SESSION["senha"];
// veio do post
$senha_at = md5($_POST['senha_at']);
$senha_up = md5($_POST['senha_up']);
$senha_up_com = md5($_POST['senha_up_com']);

if($senha_at_sess == $senha_at){
    if ($senha_up == $senha_up_com){


        $sql = "UPDATE personal SET Senha='$senha_up' WHERE Id_login='$id'";
        mysqli_query($conexao, $sql) or die ("erro na conexão");
mysqli_close($conexao);
        $_SESSION["senha"]= $senha_up;

        echo "<script>alert('A senha foi alterada com sucesso');</script>";
        echo "<script>window.location='editarPersonal.php';</script>";


    }else{
        echo "<script>alert('O campo de confirmação da nova senha não corresponde com o anterior. Por favor tente novamente.');</script>";
        echo "<script>window.location='editarPersonal.php';</script>";;
    }
}else{
    echo "<script>alert('Sua senha atual está incorreta. Por favor tente novamente.');</script>";
    echo "<script>window.location='editarPersonal.php';</script>";
}



?>