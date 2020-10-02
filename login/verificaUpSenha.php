<?php
session_start();
$id = $_SESSION['id'];
#Verifica se tem um email para pesquisa
if(isset($_POST['senha_at'])){ 

    #Recebe o Email Postado
    $senhaPostada = md5($_POST['senha_at']);

    #Conecta banco de dados 
    include '../cnn.php';
    $sql = mysqli_query($conexao, "SELECT * FROM personal WHERE Senha = '{$senhaPostada}' AND Id_login='$id'") or print mysql_error();
mysqli_close($conexao);
    #Se o retorno for maior do que zero, diz que já existe um.
    if(mysqli_num_rows($sql)>0) {
        echo json_encode(array('senha' => 'Sua senha está correta'));

    }else {
        echo json_encode(array('senha' => 'Sua senha está incorreta'));
    }
}

?>