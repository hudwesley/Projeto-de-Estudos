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
    // verifica se foi iniciada uma sessão
    if (isset($_SESSION["usuario"])) {
        // verifica se o usuário logado é do tipo 1
        if ($_SESSION["tipo"] == 1) {
    ?>
            <div class="sidebar">
                <header>Projeto</header>
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
                            <a class="dropdown-item" href="perfil.php">Perfil</a>
                            <a class="dropdown-item" href="logout.php">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $sql = "SELECT * FROM usuario";
            $dados = $conn->query($sql);
            $totalContas = 0;
            $totalCliente = 0;
            $totalAdm = 0;
            $regTotais = 0;
            $regAdm = 0;
            $regCliente = 0;
            if ($dados->num_rows > 0) {
                while ($exibir = $dados->fetch_assoc()) {
                    if ($exibir["tipo"] == 1 && $exibir["situacao"] == 0) {
                        $regAdm += 1;
                    } elseif ($exibir["tipo"] == 2 && $exibir["situacao"] == 0) {
                        $regCliente += 1;
                    }

                    if ($exibir["tipo"] == 1) {
                        $totalAdm += 1;
                    } elseif ($exibir["tipo"] == 2) {
                        $totalCliente += 1;
                    }
                }
            }
            $regTotais = $regAdm + $regCliente;
            $totalContas = $totalAdm + $totalCliente;
            ?>
            <div class="pendentes">
                <h2>Contas pendentes</h2>
                <table class="table table">
                    <tr style="background: rgb(41, 106, 180); color: whitesmoke;">
                        <th scope="col">Cliente(s)</th>
                        <th scope="col">Administrador(es)</th>
                        <th scope="col">Total</th>
                    </tr>
                    <tr class="table-secondary">
                        <td><?php echo $regCliente ?></td>
                        <td><?php echo $regAdm ?></td>
                        <td scope="row"><?php echo $regTotais ?></td>
                    </tr>
                </table>
            </div>
           
            <div class="pendentes">
                <h2>Total de contas</h2>
                <table class="table table">
                    <tr style="background: rgb(41, 106, 180); color: whitesmoke;">
                        <th scope="col">Cliente(s)</th>
                        <th scope="col">Administrador(es)</th>
                        <th scope="col">Total </th>
                    </tr>
                    <tr class="table-secondary">
                        <td><?php echo $totalCliente ?></td>
                        <td><?php echo $totalAdm ?></td>
                        <td scope="row"><?php echo $totalContas ?></td>
                    </tr>
                </table>
            </div>
        <?php
            // verifica se o usuário logado é do tipo 2
        } elseif ($_SESSION["tipo"] == 2) {
        ?>
            <div class="sidebar">
                <header><i class='fas fa-house-user' style='font-size:24px'></i>Projeto</header>
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
            <a href="#" class="topo"><i style='font-size:24px' class='fas'>&#xf35b;</i></a>
        <?php
        }
        ?>
    <?php
        // se não tiver nenhuma sessão iniciada, redireciona para a tela de login
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
<script>
    jQuery(document).ready(function() {
        // Exibe ou oculta o botão
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > 200) {
                jQuery('.topo').fadeIn(200);
            } else {
                jQuery('.topo').fadeOut(200);
            }
        });

        // Faz animação para subir
        jQuery('.topo').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({
                scrollTop: 0
            }, 300);
        })
    });
</script>

</html>