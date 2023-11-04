<?php
echo "Ola mundo";


session_start();
include_once './conexao.php';

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$apelido = mysqli_real_escape_string($conexao, $_POST['apelido']);
$nascimento = mysqli_real_escape_string($conexao, $_POST['nascimento']);
$genero = mysqli_real_escape_string($conexao, $_POST['genero']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
$imagem = mysqli_real_escape_string($conexao, $_POST['imagem']);











if (!empty($nome) && !empty($apelido) && !empty($email) && !empty($senha)) {

    //Verificar se o email do usuario e valido
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //se o email for valido
    // 
        //Verificar se o email ja existe na base de dados
        $sql = mysqli_query($conexao, "SELECT email FROM usuario WHERE email = '{$email}'");

        if (mysqli_num_rows($sql) > 0) { // se o email ja existe
            echo "$email - este email ja existe na bd";
        } else {
            
            // verificar se o usuario fez o upload da imagem
            if (isset($_FILES['imagem'])) { // Se a imagem foi carregada
                $img_nome = $_FILES['imagem']['name'];
                $img_tipo = $_FILES['imagem']['type'];
                $tmp_nome = $_FILES['imagem']['tmp_name'];

                //Pegar a extensao da imagem
                $img_explode = explode('.', $img_nome);
                $img_ext = end($img_explode);  // pega a extensao da imagem

                $extensions = ['png', 'jpeg', 'jpg'];

                if (in_array($img_ext, $extensions) == true) {// se a extensao inserida estiver correta
                    $time = time(); //retorna a hora e data atual
                    $new_img_name = $time . $img_nome;

                    if (move_uploaded_file($tmp_nome, "imagensUsuario/" . $new_img_name)) {
                        $status = "Ativo";
                        $random_id = rand(time(), 10000000); // id aleatorio para o usuario
                        
                        
                        // inserir os dados na tabela
                        $sql2 = mysqli_query($conexao, "INSERT INTO `usuario` 
(`unique_Id`, `first_name`, `last_name`, `birthday`, `gender`, `email`, `password`, `status`, `image`, `registration_date`, `phone_number`) 
VALUES ({$random_id}, '{$nome}', '{$apelido}', '{$nascimento}', '{$genero}', '{$email}', '{$senha}', '{$status}', '{$new_img_name}', current_timestamp(), '{$telefone}') ");

                        if ($sql2) { // se os dados foram inseridos
                            $sql3 = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '{$email}'");
                            
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "Suesso";
                            } else {
                                echo "Algo correu mal";
                            }
                        }
                    }
                } else {
                    echo "Selecione uma imagem com extensao valida - png, jpg, jpeg";
                }
                
            } else {
                echo "Por favor seleione uma imagem";
            }
        }
    } else {
        echo "$email - este nao e um email valido";
    }
} else {
    echo "Todos os campos são necessarios";
}


