<!DOCTYPE html>
<?php  
include '../cnn.php';
session_start();
?>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <script language="javascript">
            function failed() {
                alert('Usuario ou senha incorretos, por favor tente novamente ')
                window.location='login.html';
            }

        </script>
    </head>

    <body>
        <?php
        $user = $_POST["user"];
        $senha = md5($_POST["senha"]);


        // aqui vai consultar no banco ID do cara pra depois colocar naS SESSION
        $sql_id = "SELECT * FROM personal WHERE usuario ='$user'";   
        $consulta_id = mysqli_query($conexao, $sql_id ); // tambem o email agora 
      
        
        while($row = mysqli_fetch_array($consulta_id)){   
          
            $_SESSION["id"]= $row['Id_login'];
            $_SESSION["email"]= $row['Email'];
        }
        
        $consulta = mysqli_query($conexao, "SELECT * FROM personal WHERE usuario = '$user' AND senha = '$senha'") or die (mysqli_error($conexao));
        
        // conta o número de linhas que resultam da $consulta    
        $linhas = mysqli_num_rows($consulta);
        if($linhas == 0){
            echo "<script>failed()</script>";
        } else {
            $_SESSION["usuario"]=$_POST["user"];
            $_SESSION["senha"]=$senha;
             header("Location: index.php");
        }
        mysqli_close($conexao);
        ?>
    </body>

</html>