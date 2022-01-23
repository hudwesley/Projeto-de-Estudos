<?php 
    // incluir o arquivo conexão
    include_once("conexao.php");
    session_start();
    //receber os dados
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tipo = $_POST["tipo"];

    $sql = "INSERT INTO usuario (nome, sobrenome, telefone, email, senha, tipo) VALUES ('$nome', '$sobrenome', '$telefone', '$email', '$senha', $tipo)";

    try{
        $conn->query($sql);
        $_SESSION["msg"] = '<div class="alert alert-info" role="alert">
        Pré cadastro efetuado, um administrador em breve irá validar sua conta!
      </div>';
      ?>
      <script>
          window.location = "cadUser.php";
      </script>
      <?php
    }catch(Exception $e){
        echo $e;
    }
