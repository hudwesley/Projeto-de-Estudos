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
    <title>Cadastro de Usuario</title>
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
            <header><a href="index.php" style="font-size: 30px;  margin-right: 30px;">PROJETO</a></header>
            <li><a href="index.php#sobre"><i style='font-size:24px' class='far'>&#xf2b9;</i> Sobre</a></li>
            <li><a href="index.php#galeria"><i style="font-size:24px" class="fa">&#xf03e;</i> Galeria</a></li>
            <li><a href="index.php#contato"><i style='font-size:24px' class='fas'>&#xf674;</i> Contato</a></li>
            <li><a href="telaLogin.php"><i style='font-size:24px' class='fas'>&#xf2f5;</i> Login</a></li>
        </ul>
    </div>
    <?php
    if (isset($_SESSION["msg"])) {
        echo $_SESSION["msg"];
        unset($_SESSION["msg"]);
        ?>
        <style>
            .cadastro{
                display: none;
            }
        </style>
        <?php
    }
    ?>
    <center>
        <div class="cadastro">
            <form action="createUsuario.php" method="post">
                <div class="titulo-cad">
                    <h1>Cadastro de Usuário</h1>
                </div>
                <?php if (isset($_SESSION["msg"])) {
                    echo $_SESSION["msg"];
                    unset($_SESSION["msg"]);
                } ?>
                <div class="nome-cad">
                    <label for="nome">Nome</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" required placeholder="Nome" name="nome" required maxlength="45">
                    </div>
                </div>
                <div class="sobrenome-cad">
                    <label for="sobrenome">Sobrenome</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" required placeholder="Sobrenome" name="sobrenome" required maxlength="45">
                    </div>
                </div>

                <div class="telefone-cad">
                    <label for="telefone">Telefone</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" required placeholder="Telefone" name="telefone" required maxlength="14" OnKeyPress="formatar('##-# ####-####', this)">
                    </div>
                </div>

                <div class="email-cad">
                    <label for="email">E-mail</label>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" required required placeholder="E-mail" name="email" required maxlength="45">
                    </div>
                </div>

                <div class="senha-cad">
                    <label for="senha">Senha</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" required placeholder="Senha" name="senha" required maxlength="20">
                    </div>
                </div>

                <div class="tipo">
                    <label for="tipo">Tipo de conta</label>
                    <select name="tipo" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option value="1">Administrador</option>
                        <option value="2">Cliente</option>
                    </select>
                </div>

                <div class="botoes">
                    <button type="submit" class="btn btn-success">Cadastrar</button><br>
                    <button type="reset" class="btn btn-success">Cancelar</button><br>
                </div>
                <?php if (isset($_SESSION["erro"])) {
                    echo $_SESSION["erro"];
                    unset($_SESSION["erro"]);
                }
                ?>
            </form>
        </div>
    </center>
</body>
<script>
    function formatar(mascara, documento) {
        var i = documento.value.length;
        var saida = mascara.substring(0, 1);
        var texto = mascara.substring(i)

        if (texto.substring(0, 1) != saida) {
            documento.value += texto.substring(0, 1);
        }
    }
</script>

</html>