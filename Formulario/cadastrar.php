<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Novo Aluno</title>
    </head>
    <body>
        <?php
        include '../cnn.php';
        session_start();
        $id= $_SESSION["id"]; 
        $nome = $_POST["nome"];
        $sexo = $_POST["sexo"]; 
        $cpf = $_POST["cpf"];   
        $estado_civil= $_POST["estado_civil"]; 
        $escolaridade = $_POST["escolaridade"];
        $data_nascimento= $_POST["data_nascimento"];
        $data = implode('-', array_reverse(explode('/', "$data_nascimento")));
        $profissao = $_POST["profissao"];
        $endereco = $_POST["endereco"];
        $numero_end = $_POST["numero_end"];
        $bairro = $_POST["bairro"];
        $cep = $_POST["cep"];
        $email = $_POST["email"];
        $fone = $_POST ["fone"];
        $altura = $_POST["altura"];
        $peso = $_POST["peso"];
        $pro_saude = $_POST["pro_saude"]; // text area 


        //aqui a inserção no banco de dadosc
        $inserir = "INSERT INTO aluno (id_aluno, Nome_aluno, sexo, cpf, data_nasc_aluno, estado_civil, escolaridade, profissao, endereco, num_residencia, bairro, cep, email, celular, altura, peso, probl_saude, id_login) VALUES (NULL, '$nome', '$sexo', '$cpf', '$data', '$estado_civil', '$escolaridade', ' $profissao', '$endereco', '$numero_end', '$bairro', '$cep', '$email', '$fone', '$altura', '$peso', '$pro_saude', $id);";
     
        mysqli_query($conexao, $inserir) or die (mysqli_error($conexao));
        // confere qual foi a ultima inserção no banco de dados
        $lastid= mysqli_insert_id($conexao);
        // inseri na tabela da ficha de treino
        $inserir2 = "INSERT INTO ficha_de_treino(Id_ft, Id_Aluno) VALUES (NULL, '$lastid')";
        mysqli_query($conexao, $inserir2); 

        echo "<script>alert('Aluno foi Cadastrado');</script>";
        echo "<script>window.location.href= \"../login/index.php\";</script>";


   
        ?>
    </body>
</html>