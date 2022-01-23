<?php
// incluir o arquivo conexão
include_once("conexao.php");
if (isset($_POST["nome"])) {
    $idUsuario = $_GET["idUsuario"];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tipo = $_POST["tipo"];
    $situacao = $_POST["situacao"];
    

    $sql = "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome', telefone = '$telefone', email = '$email', 
    senha = '$senha', tipo = $tipo, situacao = $situacao WHERE idUsuario = $idUsuario";

    try {
        $conn->query($sql);
?>
        <script>
            alert("Usuário atualizado!");
            window.location = "usuarios.php";
        </script>
<?php
    } catch (Exception $e) {
        echo $e;
    }
}
?>