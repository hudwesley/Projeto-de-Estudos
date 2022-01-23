<?php
require_once("conexao.php");
if (isset($_GET["idUsuario"])) {
    $idUsuario = $_GET["idUsuario"];

    $sql = "DELETE FROM usuario WHERE idUsuario = $idUsuario";

    try {
        $conn->query($sql);
?>
        <script>
            alert("Usuário excluído com sucesso!");
            window.location = "usuarios.php";
        </script>
<?php
    } catch (Exception $e) {
        echo $e;
    }
}

?>