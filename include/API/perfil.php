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
        
        $resultado = array(
                    "estado" => "sucesso", "mensagem" => "Dados pegos com sucesso",
                    "nome" => $row['nome'], "email" => $row['email'], "apikey" => $row['apikey']
                );
        
        
    } else {
        $resultado = array("estado" => "erro", "mensagem" => "Email/Telemovel invalido");
    }
} else {
    $resultado = array("estado" => "erro", "mensagem" => "Todos os campos são necessarios");
}

echo json_encode($resultado, JSON_PRETTY_PRINT);

