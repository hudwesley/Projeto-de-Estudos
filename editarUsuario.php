<?php
require_once("conexao.php");
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
</head>

<body>
    <a href="usuarios.php">Voltar</a>
    <?php
    if (isset($_GET["idUsuario"])) {
        $idUsuario = $_GET["idUsuario"];

        $sql = "SELECT * FROM usuario WHERE idUsuario = $idUsuario";
        $consulta = $conn->query($sql);
        $dados = $consulta->fetch_assoc();

    ?>
        <center>
            <div class="cadastro">
                <form action="updateUsuario.php?idUsuario=<?php echo $dados["idUsuario"] ?>" method="post">
                    <div class="titulo-cad">
                        <h1><?php echo $dados["nome"] ?></h1>
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
                            <?php
                            } elseif ($dados["tipo"]  == 2) {
                            ?>
                                <option value="<?php echo $dados["tipo"] ?>">Cliente</option>
                            <?php
                            }
                            ?>
                            <option value="1">Administrador</option>
                            <option value="2">Cliente</option>
                        </select>
                    </div>
                    <div class="situacao">
                        <label for="situacao">Situação</label>
                        <select name="situacao">
                            <?php
                            if ($dados["situacao"] == 1) {
                            ?>
                                <option value="<?php echo $dados["situacao"] ?>">Liberado</option>
                            <?php
                            } elseif ($dados["situacao"]  == 0) {
                            ?>
                                <option value="<?php echo $dados["situacao"] ?>">Bloqueado</option>
                            <?php
                            }
                            ?>
                            <option value="0">Bloqueado</option>
                            <option value="1">Liberado</option>
                        </select>
                    </div>

                    <div class="botoes">
                        <button type="submit" class="btn btn-success">Salvar</button><br>
                    </div>
                </form>
            </div>
        </center>
    <?php
    } else { ?>
        <script>
            alert("Escolha um usuario primeiro");
            window.history.back();
        </script>
    <?php } ?>
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