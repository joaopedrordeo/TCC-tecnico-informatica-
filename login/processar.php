<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Cadastro</title>
    </head>
    <body>
        <?php

        include '../cnn.php';


        $email = $_POST["email"];
        $user = $_POST["user"];
        $senha = $_POST["senha"];
        $criptografada =md5($senha);

        //aqui a inserção no banco de dados
        $inserir = "INSERT INTO personal (id_login, usuario, senha, email) VALUES (NULL, '$user', '$criptografada', '$email');";


        mysqli_query($conexao, $inserir) or die (mysqli_error($conexao));
        mysqli_close($conexao);
        echo "<script>alert('Você foi cadastrado com sucesso. Agora faça login');</script>";
        echo "<script>window.location='login.html';</script>";    


        ?>
    </body>
</html>