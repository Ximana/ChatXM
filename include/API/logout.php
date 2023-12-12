<?php

include_once './conexao.php';

if (!empty($_POST['email']) && !empty($_POST['apikey'])) {

    $email_telemovel = $_POST['email'];
    $apikey = $_POST['apikey'];
    $resultado = array();

    $query = "SELECT * FROM usuario WHERE (email = '" . $email_telemovel . "' OR numero_telefone = '" . $email_telemovel . "' AND apikey = '" . $apikey . "')";
    $query = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($query) != 0) {
        $row = mysqli_fetch_assoc($query);

        $sqlUpdate = "update usuario set apikey = '" . $apikey . "' where email = '" . $email_telemovel . "'  ";
        if (mysqli_query($conexao, $sqlUpdate)) {
            echo "Sucesso";
        } else {
            echo "Erro no logout";
        }
    } else {
        echo "Nao autorizado";
    }
} else {
    echo "Todos os campos são necessarios";
}

echo json_encode($resultado, JSON_PRETTY_PRINT);

