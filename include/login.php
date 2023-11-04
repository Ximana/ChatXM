<?php

session_start();
include_once './conexao.php';

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

echo "<br>Nome: " . $email;
echo "<br>Senha: " . $senha;
echo "<br><br><br>";

if (!empty($email) && !empty($senha)) {
    //Verificar se o email e a senha combinam na bd
    $query = "SELECT * FROM usuario WHERE email = '" . $email . "' AND senha = '" . $senha . "'";
    $sql = mysqli_query($conexao, $query);
    if (mysqli_num_rows($sql) > 0) { // se as credencias combinam
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['id_usuario'] = $row['id_usuario']; // vamos precisar do id do usuario em outros arquivos
        /*
        $_SESSION['id'] = $row['user_Id'];
        $_SESSION['nome'] = $row['first_name'];
        $_SESSION['apelido'] = $row['last_name'];
        $_SESSION['estado'] = $row['status'];
        $_SESSION['nascimento'] = $row['birthday'];
        $_SESSION['genero'] = $row['gender'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['imagem'] = $row['image'];
        $_SESSION['dataRegistro'] = $row['registration_date'];
        $_SESSION['telefone'] = $row['phone_number'];
         
         */
        echo "sucesso";
        
       
        //echo "<br>unique id: ". $row['unique_id'];
         //echo "<br>Nome: ". $row['first_name'];
         //echo "<br>Session unique id: ". $_SESSION['unique_id'];
        //Chamar o arquivo index abaixo
        //
        //
        //
        //
         header("Location: ../index.php");
    } else {
        echo "Email ou senha errada";
    }
} else {
    echo "Preencha todos os campos";
}
  
 


