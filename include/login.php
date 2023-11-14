<?php

session_start();
include_once './conexao.php';

$email_telemovel = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

if (!empty($email_telemovel) && !empty($senha)) {
    //Verificar se o email e a senha combinam na bd
    $query = "SELECT * FROM usuario WHERE (email = '" . $email_telemovel . "' OR numero_telefone = '" . $email_telemovel . "') AND senha = '" . $senha . "'";
    $sql = mysqli_query($conexao, $query);
    if (mysqli_num_rows($sql) > 0) { // se as credencias combinam
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['id_usuario'] = $row['id_usuario']; // vamos precisar do id do usuario em outros arquivos
        //echo "sucesso";
        // Alterar a data do ultimo login e o estado para online

        $query = "UPDATE usuario SET estado = 'Online', Ultima_atividade = default WHERE id_usuario = " . $row['id_usuario'] . "";
        $sql = mysqli_query($conexao, $query);

        header("Location: ../index.php");
    } else {
        $mensagem_erro = "Email/Telemovel ou senha errada";
        header("Location: ../loginForm.php?mensagem_erro=" . $mensagem_erro);
    }
} else {
    $mensagem_erro = "Preencha todos os campos";
    header("Location: ../loginForm.php?mensagem_erro=" . $mensagem_erro);
}

 


