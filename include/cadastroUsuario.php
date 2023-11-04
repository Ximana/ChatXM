<?php

session_start();
include_once './conexao.php';

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$apelido = mysqli_real_escape_string($conexao, $_POST['apelido']);
$nascimento = mysqli_real_escape_string($conexao, $_POST['nascimento']);
$genero = mysqli_real_escape_string($conexao, $_POST['genero']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
//$imagem = mysqli_real_escape_string($conexao, $_POST['imagem']);

echo "<br>Nome: " . $nome;
echo "<br>Apelido: " . $apelido;
echo "<br>Nascimento: " . $nascimento;
echo "<br>genero: " . $genero;
echo "<br>Email: " . $email;
echo "<br>Telefone: " . $telefone;
echo "<br>Senha: " . $senha;
echo "<br>Imagem: " . $_FILES['imagem']['name'];
echo "<br><br><br>";

if (!empty($nome) && !empty($apelido) && !empty($email) && !empty($senha)) {

    //Verificar se o email do usuario e valido
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //se o email for valido
        // 
        //Verificar se o email ja existe na base de dados
        $sql = mysqli_query($conexao, "SELECT email FROM usuario WHERE email = '{$email}'");

        if (mysqli_num_rows($sql) > 0) { // se o email ja existe
            echo "$email - este email ja existe na bd";
        } else {

            echo "O email nao existe na bd, pronto para inserir";

            // verificar se o usuario fez o upload da imagem
            if (isset($_FILES['imagem'])) { // Se a imagem foi carregada
                $img_nome = $_FILES['imagem']['name'];
                //$img_tipo = $_FILES['imagem']['type'];
                $tmp_nome = $_FILES['imagem']['tmp_name'];

                // echo "<br>Nome da imagem";
                //Pegar a extensao da imagem
                $img_explode = explode('.', $img_nome);
                $img_ext = end($img_explode);  // pega a extensao da imagem

                $extensions = ['png', 'jpeg', 'jpg'];

                if (in_array($img_ext, $extensions) == true) {// se a extensao inserida estiver correta
                    $time = time(); //retorna a hora e data atual
                    // precisamos do tempo para atribuir nomes unicos as imagens.
                    //Inserir a imagem carregada na pasta de usuarios
                    $new_img_name = $time . $img_nome;
                    if (move_uploaded_file($tmp_nome, "imagensUsuario/" . $new_img_name)) {
                        $status = "Ativo";
                        $random_id = rand(time(), 10000000); // id aleatorio para o usuario
                        //Inserir os dados do usuario na BD
                        $query = "INSERT INTO usuario
                            (id_usuario, id_unico, nome, apelido, data_nascimento, genero, email, senha, estado, imagem, data_registro, numero_telefone)
                            VALUES (default, " . $random_id . ", '" . $nome . "', '" . $apelido . "', '" . $nascimento . "', '" . $genero . "', '" . $email . "', '" . $senha . "', '" . $status . "', '" . $new_img_name . "', default, '" . $telefone . "')";
                        echo "<br><br> Query: <br>" . $query;
                        $sql2 = mysqli_query($conexao, $query);

                        if ($sql2) { // se os dados foram inseridos
                            echo "<br><br>Cheguei aqui";
                            $sql3 = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '" . $email . "'");

                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);

                                $_SESSION['id_unico'] = $row['id_unico']; // para usar o id unico do utilizador em outros arquivos php
                                // $_SESSION['nomeUsuario'] = $row['unique_Id']
                                // $_SESSION['idUsuario'] = $row['unique_Id']
                                // $_SESSION['apelido'] = $row['unique_Id']
                                // $_SESSION['status'] = $row['unique_Id']

                                echo "Suesso";

                                // Codigo para chamar login ou o index vai aqui abaixo
                                //
                                //
                                //
                                //
                                header("Location: ../loginForm.php");
                            }
                        } else {
                            echo "Algo correu mal";
                            header("Location: ../criarContaForm.php");
                        }
                    }
                } else {
                    echo "Selecione uma imagem com extensao valida - png, jpg, jpeg";
                    header("Location: ../criarContaForm.php");
                }
            } else {
                echo "Por favor seleione uma imagem";
                header("Location: ../criarContaForm.php");
            }
        }
    } else {
        echo "$email - este nao e um email valido";
    }
} else {
    echo "Todos os campos são necessarios";
}
