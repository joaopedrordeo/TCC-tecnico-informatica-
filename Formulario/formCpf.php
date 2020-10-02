<?php
#Verifica se tem um email para pesquisa
if(isset($_POST['cpf'])){ 

    #Recebe o Email Postado
    $cpfPostado = $_POST['cpf'];

    #Conecta banco de dados 
    include '../cnn.php';
    $sql = mysqli_query($conexao, "SELECT * FROM aluno WHERE CPF = '{$cpfPostado}'") or print mysql_error();
mysqli_close($conexao);
    #Se o retorno for maior do que zero, diz que já existe um.
    if(mysqli_num_rows($sql)>0) {
        echo json_encode(array('cpf' => 'Este CPF já está cadastrado'));

    }else {
        echo json_encode(array('cpf' => 'CPF valido'));
    }
}
?>