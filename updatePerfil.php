<?php
// incluir o arquivo conexão
include_once("conexao.php");
session_start();
if (isset($_POST["nome"])) {
    $idUsuario = $_GET["idUsuario"];
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tipo = $_POST["tipo"];
    

    $sql = "UPDATE usuario SET nome = '$nome', sobrenome = '$sobrenome', telefone = '$telefone', email = '$email', 
    senha = '$senha', tipo = $tipo WHERE idUsuario = $idUsuario";

    try {
        $conn->query($sql);
        header("location: perfil.php");
        $_SESSION["sucesso"] = '<div class="alert alert-success" role="alert">
        <i style="font-size:24px" class="fas">&#xf058;</i> Usuário atualizado com sucesso!
      </div>';
    } catch (Exception $e) {
        echo $e;
    }
}
