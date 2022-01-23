<?php
    //parâmetros de conexão com BD
    $servername = "127.0.0.1"; //nome ou endereço (ip) do servidor
    $username = "root"; //nome do usuário
    $password = ""; //senha de acesso ao servidor do banco de dados
    $dbname = "barbearia"; //nome do banco de dados

    //criar um objeto de conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    //checar a conexão
        if($conn->connect_error){
        die("Falha na conexão: " . $conn->connect_error);
    }
?>
