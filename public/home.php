<?php
    include("../infra/db/connect.php");
    if(!isset($_SESSION["usuario"])){
        header("Location: ../index.php");
        exit();
    }
    
     
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usuario"])){
        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        $sql = "INSERT INTO usuarios (usuario, senha) VALUES ('$$usuario','$$senha')";
        if($conn -> query($sql) === TRUE){
            echo "<script>alert('Usuário Cadastrado com sucesso!')</script>";
        }else{
            echo "<script>alert('Erro Usuário Não Cadastrado!')</script>";
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <?php
        include("../public/component/navbar.php");
    ?>
    <h2>Bem-vindo!</h2>
    <p> Usuário logado: 
        <?php echo $_SESSION["usuario"];?>
    </p>

    <h4>Cadastrar Novo Usuário</h4>
    <form method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha">
        <br>
        <br>
        <button type="submit">Cadastrar</button>
        <br>
        <br>    
        <br>
    </form>


    <form id="id_excluir" method="POST">
        <label for="excluir_conta">Digite o id para excluir a conta</label>
        <br>
        <input type="number" name="id_excluir" id="id">
        <br>
    <button type="submit">Excluir</button>
    </form>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_excluir'])) {
        $id = $_POST['id_excluir'];
        $sql = "DELETE FROM usuarios WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
        echo "Registro deletado com sucesso!";
        } else {
        echo "Erro ao deletar: " . $conn->error;
        }
        $conn->close();
    }
    ?>


    <?php
    include("../public/component/table.php");
    ?>

    <a href="logout.php">Sair</a>
    
</body>
</html>