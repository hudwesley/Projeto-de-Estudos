<?php
require_once("conexao.php");
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="sidebar">
        <ul>
            <header><a href="index.php" style="font-size: 30px; color: black; margin-right: 30px;">PROJETO</a></header>
            <li><a href="#"><i style='font-size:24px' class='far'>&#xf2b9;</i> Sobre</a></li>
            <li><a href="#"><i style="font-size:24px" class="fa">&#xf03e;</i> Galeria</a></li>
            <li><a href="#"><i style='font-size:24px' class='fas'>&#xf674;</i> Contato</a></li>
            <li><a href="cadUser.php"><i style='font-size:24px' class='fas'>&#xf234;</i> Cadastrar</a></li>
        </ul>
    </div>
    <div class="comp">
        <div class="login">
            <form action="login.php" method="post">
                <div class="titulo">
                    <h2><i style='font-size:100px' class='fas'>&#xf2bd;</i></h2>
                </div>
                <div class="user">
                    <label for="user"><i style='font-size:24px; color: darkorange;' class='fas'>&#xf406;</i> </label>
                    <input type="text" name="user" id="email" required placeholder="E-mail" maxlength="45">
                </div>

                <div class="senha">
                    <label for="senha"><i style='font-size:24px; color: darkorange;' class='fas'>&#xf09c;</i> </label>
                    <input type="password" name="senha" id="senha" required placeholder="********" maxlength="20">
                </div>

                <div class="botoes">
                    <button type="submit" class="btn btn-success">Entrar</button><br>
                </div>
                <?php if (isset($_SESSION["erro"])) {
                    echo $_SESSION["erro"];
                    unset($_SESSION["erro"]);
                }
                ?>
            </form>
        </div>
        <div class="imagem">
            <img src="img/Bem-vindo.png" alt="">
        </div>
    </div>
</body>
</html>