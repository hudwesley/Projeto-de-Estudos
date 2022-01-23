<?php
require_once("conexao.php");
session_start(); // inicia a sessão

$user = $conn->real_escape_string($_POST["user"]);
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuario WHERE email = '$user' and senha = '$senha' and situacao = 1 ";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
  $dados = $resultado->fetch_assoc();

  $_SESSION["usuario"] = $dados["nome"];
  $_SESSION["idUsuario"] = $dados["idUsuario"];
  $_SESSION["tipo"] = $dados["tipo"];
  $_SESSION["situacao"] = $dados["situacao"];
  $_SESSION["email"] = $dados["email"];
  $_SESSION["telefone"] = $dados["telefone"];

  $_SESSION["sucesso"] = '<div class="alert alert-success" role="alert">
        Login Feito com sucesso!
      </div>';
  header("location: homeLogin.php");
} else {
  $_SESSION["erro"] = '<div class="alert alert-danger" role="alert">
        E-mail ou senha inválidos!
      </div>';
?>
  <script>
    window.history.back();
  </script>
<?php
}

?>