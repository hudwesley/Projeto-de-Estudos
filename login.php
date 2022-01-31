<?php
require_once("conexao.php");
session_start(); // inicia a sessão

$user = $conn->real_escape_string($_POST["user"]);
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuario WHERE email = '$user' and senha = '$senha'";

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
  $dados = $resultado->fetch_assoc();
  if ($dados["situacao"] == 0) {
    $_SESSION["erro"] = '<div class="alert alert-danger" role="alert">
        Sua conta ainda está em análise!
      </div>';
?>
    <script>
      window.history.back();
    </script>
  <?php
  } elseif ($dados["situacao"] == 1) {


    $_SESSION["usuario"] = $dados["nome"];
    $_SESSION["idUsuario"] = $dados["idUsuario"];
    $_SESSION["tipo"] = $dados["tipo"];
    $_SESSION["situacao"] = $dados["situacao"];
    $_SESSION["email"] = $dados["email"];
    $_SESSION["telefone"] = $dados["telefone"];
    header("location: homeLogin.php");
  }
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