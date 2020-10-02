<?php
#Verifica se tem um email para pesquisa
if(isset($_POST['user'])){ 

    #Recebe o Email Postado
    $userPostado = $_POST['user'];

    #Conecta banco de dados 
    include '../cnn.php';
    $sql = mysqli_query($conexao, "SELECT * FROM personal WHERE Usuario = '{$userPostado}'") or print mysql_error();
mysqli_close($conexao);
    #Se o retorno for maior do que zero, diz que já existe um.
    if(mysqli_num_rows($sql)>0) {
        echo json_encode(array('user' => 'Este nome de usuário já foi usado'));

    }else {
        echo json_encode(array('user' => 'Nome de usuario disponível'));
    }
}

?>