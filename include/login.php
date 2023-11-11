<?php
session_start();
include_once './conexao.php';

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

if (!empty($email) && !empty($senha)) {
    //Verificar se o email e a senha combinam na bd
    $query = "SELECT * FROM usuario WHERE email = '" . $email . "' AND senha = '" . $senha . "'";
    $sql = mysqli_query($conexao, $query);
    if (mysqli_num_rows($sql) > 0) { // se as credencias combinam
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['id_usuario'] = $row['id_usuario']; // vamos precisar do id do usuario em outros arquivos
        echo "sucesso";
        
        // Alterar a data do ultimo login
        $query = "UPDATE usuario SET Ultima_atividade = default WHERE id_usuario = ".$row['id_usuario']."";
        $sql = mysqli_query($conexao, $query);
        
        header("Location: ../index.php");
    } else {
        echo "Email ou senha errada";
    }
} else {
    echo "Preencha todos os campos";
}
  
 


