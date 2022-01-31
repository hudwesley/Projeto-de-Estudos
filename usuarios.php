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
    <title>Lista de Usuários</title>
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
        $idUsuario = $_SESSION["idUsuario"];
        // verifica se o usuário logado é do tipo 1
        if ($_SESSION["tipo"] == 1) {

    ?>
            <div class="sidebar">
                <header><a href="homeLogin.php">PROJETO</a></header>
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
            if (isset($_SESSION["sucesso"])) {
                echo $_SESSION["sucesso"];
                unset($_SESSION["sucesso"]);
            }
            if (isset($_SESSION["erro"])) {
                echo $_SESSION["erro"];
                unset($_SESSION["erro"]);
            }
            ?>
            <table class="table table-light" style="margin-top: 10px">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Situacao</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Excluir</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM usuario WHERE idUsuario != $idUsuario ORDER BY nome";
                $dados = $conn->query($sql);

                if ($dados->num_rows > 0) {
                    while ($exibir = $dados->fetch_assoc()) {
                ?>
                        <tbody>
                            <tr>
                                <th><?php echo $exibir["nome"] ?></th>
                                <td><?php echo $exibir["sobrenome"] ?></td>
                                <td OnKeyPress="formatar('##-# ####-####', this)"><?php echo $exibir["telefone"] ?></td>
                                <td><?php echo $exibir["email"] ?></td>

                                <?php
                                if ($exibir["tipo"] == 1) {
                                ?>
                                    <td>Administrador</td>
                                <?php
                                } elseif ($exibir["tipo"] == 2) {
                                ?>
                                    <td>Cliente</td>
                                <?php
                                }
                                if ($exibir["situacao"] == 1) {
                                ?>
                                    <td>Liberado</td>
                                <?php
                                } elseif ($exibir["situacao"] == 0) {
                                ?>
                                    <td>Bloqueado</td>
                                <?php
                                }
                                ?>
                                <td><a href="#" onclick="editar('<?php echo $exibir["idUsuario"] ?>', '<?php echo $exibir["nome"] ?>')"><i style='font-size:24px' class='fas'>&#xf303;</i></a></td>
                                <td><a href="#" onclick="excluir('<?php echo $exibir["idUsuario"] ?>', '<?php echo $exibir["nome"] ?>')"><i style='font-size:24px' class='fas'>&#xf1f8;</i></a></td>
                            </tr>
                        </tbody>

                <?php }
                } ?>
            </table>
        <?php
            // se o usuário não for do tipo 1, vai negar o acesso a está página
        } else {
        ?>
            <script>
                alert("Permissão negada");
                window.location = "homeLogin.php";
            </script>
        <?php
        }
        // se não tiver nenhuma sessão iniciada, redireciona para a tela de login
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
    function excluir(idUsuario, nome) {
        if (window.confirm("Deseja excluir este usuário ? " + nome)) {
            window.location = "deleteUsuario.php?idUsuario=" + idUsuario;
        }
    }

    function editar(idUsuario, nome) {
        if (window.confirm("Deseja editar este usuário ? " + nome)) {
            window.location = "editarUsuario.php?idUsuario=" + idUsuario;
        }
    }

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