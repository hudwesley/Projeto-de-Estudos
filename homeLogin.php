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
    <title>Página Inicial</title>
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
    if (isset($_SESSION["usuario"])) {
        if ($_SESSION["tipo"] == 1) {
    ?>
            <div class="sidebar">
                <header>Projeto Aleatorio</header>
                <ul>
                    <li><a href="#"><i style='font-size:24px' class='far'>&#xf2b9;</i> Agenda</a></li>
                    <li><a href="usuarios.php"><i style='font-size:24px' class='fas'>&#xf500;</i> Usuários</a></li>
                    
                </ul>
                <div class="drop">
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i style='font-size:24px' class='fas'>&#xf2bd;</i> <?php echo $_SESSION["usuario"] ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Perfil</a>
                            <a class="dropdown-item" href="logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        } elseif ($_SESSION["tipo"] == 2) {
        ?>
            <div class="sidebar">
            <header>Projeto Aleatorio</header>
                <ul>
                    <li><a href="#"><i style='font-size:24px' class='far'>&#xf2b9;</i> Agenda</a></li>
                    <li><a href="#"><i style="font-size:24px" class="far">&#xf03e;</i> Galeria</a></li>
                </ul>
                <div class="drop">
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i style='font-size:24px' class='fas'>&#xf2bd;</i> <?php echo $_SESSION["usuario"] ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Perfil</a>
                            <a class="dropdown-item" href="logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    <?php
    } else {
    ?>
        <script>
            alert("Faça Login Primeiro!");
            window.location = "telaLogin.php";
        </script>
    <?php
    }
    ?>
</body>

</html>