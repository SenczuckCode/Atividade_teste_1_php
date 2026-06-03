infra
Dentro do infra foi colocado 2 arquivos o connection.php e o scrpit sql, o connection.php ele foi criado para conectar o banco de dados ao site($conn = new mysqli($host, $user, $pass, $db);)  e o script foi para criar o banco de dados mysql(CREATE DATABASE sistema_simples;) e também já adicionamos um usuário pelo código 
public
no public colocamos a home.php que é nossa tela inicial depois ali adicionamos a função de criar os campos para senha e usuário e também já colocado as condições para verficar se o usuário existe e também adicionamos o include que é um atalho para não precisar ficar iniciando o banco de dados em todo arquivo, colocamos no public também a pasta componente uma pasta que fazemos atalhos por exemplo irei fazer um nav bar em mais que um arquivo inves de ficar compiando faça um atalho 
style: apena modificações visuais da tela mas nada novo
Principais funções:
 $usuario = $_POST["usuario"];
 $senha = $_POST["senha"];
(criação de campos de texto)

 $sql = "SELECT * FROM usuarios 
    WHERE usuario = '$usuario' 
    AND senha = '$senha'";
    (condição para entrar no home.php);

;
    if($resultado -> num_rows > 0) 
        $_SESSION["usuario"] = $usuario;
        header("Location: public/home.php");
        exit();
    }else{
        $erro = "Usuário ou senha inválidos."
      (condições para invalidar caso não houver informações nos campos)
