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
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <?php
    // verifica se foi iniciada uma sessão e se o usuário logado é do tipo 1
    if (isset($_SESSION["usuario"]) and $_SESSION["tipo"] == 1) {
    ?>
        <?php
        // verifica se foi setado algum valor para o idUsuario
        if (isset($_GET["idUsuario"])) {
            $idUsuario = $_GET["idUsuario"];

            $sql = "SELECT * FROM usuario WHERE idUsuario = $idUsuario";
            $consulta = $conn->query($sql);
            if ($consulta->num_rows > 0) {


                $dados = $consulta->fetch_assoc();

        ?>
                <a href="usuarios.php" class="voltar"><i style='font-size:30px' class='fas'>&#xf359;</i></a>
                <?php if (isset($_SESSION["sucesso"])) {
                    echo $_SESSION["sucesso"];
                    unset($_SESSION["sucesso"]);
                ?>
                    <style>
                        .voltar {
                            margin-top: 65px;
                            margin-left: 20px;
                        }

                        .cadastro {
                            display: none;
                        }
                    </style>
                <?php
                }
                ?>
                <center>
                    <div class="cadastro">
                        <form action="updateUsuario.php?idUsuario=<?php echo $dados["idUsuario"] ?>" method="post">
                            <div class="titulo-cad">
                                <h1><?php echo $dados["nome"] . " " . $dados["sobrenome"] ?></h1>
                            </div>

                            <div class="nome-cad">
                                <label for="nome">Nome</label>
                                <div class="input-group mb-3">
                                    <input type="text" value="<?php echo $dados["nome"] ?>" required class="form-control" required placeholder="Nome" name="nome" required maxlength="45">
                                </div>
                            </div>
                            <div class="sobrenome-cad">
                                <label for="sobrenome">Sobrenome</label>
                                <div class="input-group mb-3">
                                    <input type="text" value="<?php echo $dados["sobrenome"] ?>" required class="form-control" required placeholder="Sobrenome" name="sobrenome" required maxlength="45">
                                </div>
                            </div>

                            <div class="telefone-cad">
                                <label for="telefone">Telefone</label>
                                <div class="input-group mb-3">
                                    <input type="text" value="<?php echo $dados["telefone"] ?>" required class="form-control" required placeholder="Telefone" name="telefone" required maxlength="14" OnKeyPress="formatar('##-# ####-####', this)">
                                </div>
                            </div>

                            <div class="email-cad">
                                <label for="email">E-mail</label>
                                <div class="input-group mb-3">
                                    <input type="email" value="<?php echo $dados["email"] ?>" required class="form-control" required required placeholder="E-mail" name="email" required maxlength="45">
                                </div>
                            </div>

                            <div class="senha-cad">
                                <label for="senha">Senha</label>
                                <div class="input-group mb-3">
                                    <input type="password" value="<?php echo $dados["senha"] ?>" required class="form-control" required placeholder="Senha" name="senha" required maxlength="20">
                                </div>
                            </div>

                            <div class="tipo">
                                <label for="tipo">Tipo</label>
                                <select name="tipo">
                                    <?php
                                    if ($dados["tipo"] == 1) {
                                    ?>
                                        <option value="<?php echo $dados["tipo"] ?>">Administrador</option>
                                        <option value="2">Cliente</option>
                                    <?php
                                    } elseif ($dados["tipo"]  == 2) {
                                    ?>
                                        <option value="<?php echo $dados["tipo"] ?>">Cliente</option>
                                        <option value="1">Administrador</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="situacao">
                                <label for="situacao">Situação</label>
                                <select name="situacao">
                                    <?php
                                    if ($dados["situacao"] == 1) {
                                    ?>
                                        <option value="<?php echo $dados["situacao"] ?>">Liberado</option>
                                        <option value="0">Bloqueado</option>

                                    <?php
                                    } elseif ($dados["situacao"]  == 0) {
                                    ?>
                                        <option value="<?php echo $dados["situacao"] ?>">Bloqueado</option>
                                        <option value="1">Liberado</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="botoes">
                                <button type="submit" class="btn btn-success">Salvar</button><br>
                            </div>
                        </form>
                    </div>
                </center>

            <?php
                // caso não tenha um usuário com o id passado
            } else {
            ?>
                <a href="usuarios.php" class="voltar" style="margin-top: 70px; margin-left: 20px;"><i style='font-size:30px' class='fas'>&#xf359;</i></a>
                <div class="alert alert-danger" role="alert" style="margin-top: 5px;" >
                    <i style="font-size:24px" class="fas">&#xf058;</i> Nenhum usuário encontrado!
                </div>
            <?php
            }
            // caso o usuário não tenha escolhido um usuário
        } else { ?>
            <script>
                alert("Escolha um usuario primeiro");
                window.location = "usuarios.php";
            </script>
        <?php }
        // caso não tenha iniciado uma sessão
    } else {
        ?>
        <script>
            alert("Permissão negada");
            window.location = "homeLogin.php";
        </script>
    <?php
    } ?>
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
    $('.alert').alert();
</script>


</html>