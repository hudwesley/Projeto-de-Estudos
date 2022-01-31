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
    <?php
    // verifica se a sesão foi iniciada
    if (isset($_SESSION["usuario"])) {
        // verifica se o tipo da conta é 2
        $idUsuario = $_SESSION["idUsuario"];

        $sql = "SELECT * FROM usuario WHERE idUsuario = $idUsuario";
        $consulta = $conn->query($sql);
        $dados = $consulta->fetch_assoc();

        if ($_SESSION["tipo"] == 1) {
    ?>
            <div class="sidebar">
                <header><a href="homeLogin.php">Projeto</a></header>
                <ul>
                    <li><a href="#"><i style='font-size:24px' class='far'>&#xf2b9;</i> Agenda</a></li>
                    <li><a href="usuarios.php"><i style='font-size:24px' class='fas'>&#xf500;</i> Usuários</a></li>

                </ul>
                <div class="drop">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i style='font-size:24px' class='fas'>&#xf2bd;</i> <?php echo $_SESSION["usuario"] ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Perfil</a>
                            <a class="dropdown-item" href="logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php } elseif ($_SESSION["tipo"] == 2) {
        ?>
            <div class="sidebar">
            <header><a href="homeLogin.php">Projeto</a></header>
                <ul>
                    <li><a href="#"><i style='font-size:24px' class='far'>&#xf2b9;</i> Agenda</a></li>
                    <li><a href="#"><i style="font-size:24px" class="far">&#xf03e;</i> Galeria</a></li>
                </ul>
                <div class="drop">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i style='font-size:24px' class='fas'>&#xf2bd;</i> <?php echo $_SESSION["usuario"] ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="perfil.php">Perfil</a>
                            <a class="dropdown-item" href="logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div> 
        <?php
        } ?>
        <?php
        if (isset($_SESSION["sucesso"])) {
            echo $_SESSION["sucesso"];
            unset($_SESSION["sucesso"]);
        ?>
            <style>
                .cadastro {
                    display: none;
                }
            </style>
        <?php
        }
        ?>
        <div class="titulo">
            <h2><?php echo $dados["nome"] . " " . $dados["sobrenome"] ?></h2>
        </div>
        <div class="perfil">
            <form action="updatePerfil.php?idUsuario=<?php echo $dados["idUsuario"] ?>" method="post">
                <div class="pessoa">
                    <div class="nome">
                        <label for="nome">Nome</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" required placeholder="Nome" name="nome" value="<?php echo $dados["nome"] ?>" required maxlength="45">
                        </div>
                    </div>

                    <div class="sobrenome">
                        <label for="sobrenome">Sobrenome</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" required placeholder="Sobrenome" name="sobrenome" value="<?php echo $dados["sobrenome"] ?>" required maxlength="45">
                        </div>
                    </div>
                </div>

                <div class="complementar">
                    <div class="telefone">
                        <label for="telefone">Telefone</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" required placeholder="Telefone" name="telefone" value="<?php echo $dados["telefone"] ?>" required maxlength="14" OnKeyPress="formatar('##-# ####-####', this)">
                        </div>
                    </div>

                    <div class="tipo">
                        <label for="tipo">Tipo de conta</label>
                        <select name="tipo" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <?php 
                                if($dados["tipo"] == 1){
                                    ?>
                                    <option value="<?php echo $dados["tipo"] ?>">Administrador</option>
                                    <?php
                                }elseif($dados["tipo"] == 2){
                                    ?>
                                    <option value="<?php echo $dados["tipo"] ?>">Cliente</option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="infoLogin">
                    <div class="email">
                        <label for="email">E-mail</label>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" required required placeholder="E-mail" name="email" value="<?php echo $dados["email"] ?>" required maxlength="45">
                        </div>
                    </div>

                    <div class="senha-perfil">
                        <label for="senha">Senha</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" required placeholder="Senha" name="senha" required value="<?php echo $dados["senha"] ?>" maxlength="20">
                        </div>
                    </div>
                </div>

                <div class="botoes">
                    <button type="submit" class="btn btn-success">Salvar</button><br>
                    <button type="reset" class="btn btn-danger">Cancelar</button><br>
                </div>
            </form>
        </div>
    <?php
        // se não for, vai redirecionar para a página inicial
    } else {
    ?>
        <script>
            alert("Faça login primeiro!");
            window.location = "telaLogin.php";
        </script>
    <?php
    }
    ?>
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