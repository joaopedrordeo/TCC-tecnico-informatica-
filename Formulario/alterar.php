
<?php
include '../cnn.php';
session_start();
$id_login= $_SESSION["id"]; 
$id_aluno = $_POST['id_aluno']; 
$nome = $_POST["nome"];
$sexo = $_POST["sexo"]; 
$cpf = $_POST["cpf"];
$data_nascimento = $_POST["data"];
$data = implode('-', array_reverse(explode('/', "$data_nascimento")));
$estado_civil= $_POST["estado_civil"]; 
$escolaridade = $_POST["escolaridade"];
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

$sql= "UPDATE aluno SET Nome_aluno='$nome', Sexo='$sexo', CPF='$cpf', Data_nasc_aluno='$data', Estado_civil='$estado_civil', Escolaridade='$escolaridade', Profissao='$profissao', Endereco='$endereco', Num_residencia='$numero_end', Bairro='$bairro', CEP='$cep', Email='$email', Celular='$fone', Altura='$altura', Peso='$peso', Probl_saude='$pro_saude', Id_login='$id_login' WHERE Id_Aluno='$id_aluno'"; 


mysqli_query($conexao, $sql) or die ("erro nessa coisa");
mysqli_close($conexao);
echo "<script>alert('Dados alterado');</script>";
echo "<script>window.location.href= \"../login/index.php\";</script>"

?>