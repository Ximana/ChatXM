<?php

include_once './conexao.php';

if (!empty($_POST['email']) && !empty($_POST['senha'])) {

    $email_telemovel = $_POST['email'];
    $senha = $_POST['senha'];
    $resultado = array();

    $query = "SELECT * FROM usuario WHERE (email = '" . $email_telemovel . "' OR numero_telefone = '" . $email_telemovel . "')";
    $query = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($query) != 0) {
        $row = mysqli_fetch_assoc($query);
        if ($email_telemovel == $row['email'] OR $email_telemovel == $row['numero_telefone'] AND password_verify($senha, $row['senha'])) {
            try {
                $apikey = bin2hex(random_bytes(23));
            } catch (Exception $exc) {
                $apikey = bin2hex(uniqid($email_telemovel, true));
            }

            $sqlUpdate = "update usuario set apikey = '" . $apikey . "' where email = '" . $email_telemovel . "'  ";
            if (mysqli_query($conexao, $sqlUpdate)) {

                $resultado = array(
                    "estado" => "sucesso", "mensagem" => "Login com sucesso",
                    "nome" => $row['nome'], "email" => $row['email'], "apikey" => $row['apikey']
                );
            } else {
                $resultado = array("estado" => "erro", "mensagem" => "Erro no login tente novamente");
            }
        } else {
            $resultado = array("estado" => "erro", "mensagem" => "Email/Telemovel ou senha errada");
        }
    } else {
        $resultado = array("estado" => "erro", "mensagem" => "Email/Telemovel invalido");
    }
} else {
    $resultado = array("estado" => "erro", "mensagem" => "Todos os campos são necessarios");
}

 echo json_encode($resultado, JSON_PRETTY_PRINT);


