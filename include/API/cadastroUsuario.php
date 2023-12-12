<?php

include_once './conexao.php';

if (!empty($_POST['nome']) && !empty($_POST['apelido']) && !empty($_POST['email']) && !empty($_POST['telefone']) && !empty($_POST['senha'])) {

    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario
              (id_usuario, nome, apelido, data_nascimento, genero, email, senha, estado, imagem, data_registro, numero_telefone, Ultima_atividade)
              VALUES (default, '" . $nome . "', '" . $apelido . "', defailt, defailt, '" . $email . "', '" . $senha . "',  default , 'default', default, '" . $telefone . "', default)";
    
    if (mysqli_query($conexao, $sql)) {
        echo "Sucesso";
    }
 else {
        echo "Erro";
    }
    
} else {
    echo "Todos os campos são necessarios";
}
