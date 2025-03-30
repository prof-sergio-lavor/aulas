
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>-
    <div class="page">
       <form method="POST" action="login.php" class="formLogin">
            <h1>Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label>nome de usuario</label>
            <input type="text" placeholder="Digite seu usuario" autofocus="true" name="nome_usuario" />
            <label>Senha</label>
            <input type="password" placeholder="Digite sua senha" name="senha" />
            <input type="submit" value="Acessar" class="btn" />
            <a href="cadastro.php">Cadastre-se</a>
        </form>
        <?php 
         include ("restrito/conexao.php");
         session_start();
         if($_SERVER["REQUEST_METHOD"] == "POST"){

       
            $nome_usuario = mysqli_real_escape_string($conexao,$_POST['nome_usuario']);
            $senha = $_POST['senha'];

            $sql = "SELECT * FROM usuarios WHERE nome_usuario = '$nome_usuario'";
            $resultado = mysqli_query($conexao,$sql);
            $usuario = mysqli_fetch_assoc($resultado);

            if($usuario && password_verify($senha, $usuario['senha'])){
                $_SESSION['nome_usuario'] = $nome_usuario;
                header(("location: restrito/index.php"));
                exit();
            } else{
                echo "erro";
            }
        
        }
        ?>
       

    </div>
    
</body>
</html>
