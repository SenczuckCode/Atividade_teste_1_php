<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "root";
$db = "sistema_lucas_onofre_";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão:");
}else{
    echo ("<p> BD: ok </p>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    
    $sql = "SELECT * FROM usuarios
    WHERE usuario = '$usuario' 
     AND senha = '$senha'";

    $result = $conn-> query($sql);
}
    if ($result->num_rows > 0) {
       $_SESSION["usuario"] = $usuario;

       header("Location: public/home.php");
       exit();  
    } else {
        echo "Usuário ou senha inválidos.";

    }
?>















<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login.php</title>
</head>
<body>
    <h2>Login com PHP</h2>


    <form method="POST">
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha">
        <br>
        <br>
        <button type="submit">Entrar</button>
    </form>
    <?php
   if(isset($erro)){
     echo $erro;

   }

    ?>
</body>
</html>