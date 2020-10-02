<?php
#Verifica se tem um email para pesquisa
if(isset($_POST['email'])){ 

    #Recebe o Email Postado
    $emailPostado = $_POST['email'];

    #Conecta banco de dados 
    include '../cnn.php';
    $sql = mysqli_query($conexao, "SELECT * FROM personal WHERE Email = '{$emailPostado}'") or print mysql_error();
mysqli_close($conexao);
    #Se o retorno for maior do que zero, diz que já existe um.
    if(mysqli_num_rows($sql)>0) {
        echo json_encode(array('email' => 'Este email já está cadastrado'));

    }else {
        echo json_encode(array('email' => 'E-mail valido'));
    }
}

?>