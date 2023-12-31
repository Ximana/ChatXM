<?php

session_start();
include_once './conexao.php';

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$apelido = mysqli_real_escape_string($conexao, $_POST['apelido']);
$nascimento = mysqli_real_escape_string($conexao, $_POST['nascimento']);
$genero = mysqli_real_escape_string($conexao, $_POST['genero']);
$email_telemovel = mysqli_real_escape_string($conexao, $_POST['email']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
//$imagem = mysqli_real_escape_string($conexao, $_POST['imagem']);

echo "<br>Nome: " . $nome;
echo "<br>Apelido: " . $apelido;
echo "<br>Nascimento: " . $nascimento;
echo "<br>genero: " . $genero;
echo "<br>Email: " . $email_telemovel;
echo "<br>Telefone: " . $telefone;
echo "<br>Senha: " . $senha;
echo "<br>Imagem: " . $_FILES['imagem']['name'];
echo "<br><br><br>";

if (!empty($nome) && !empty($apelido) && !empty($email_telemovel) && !empty($senha)) {

    //Verificar se o email do usuario e valido
    if (filter_var($email_telemovel, FILTER_VALIDATE_EMAIL)) { //se o email for valido
        // 
        //Verificar se o email ja existe na base de dados
        $sql = mysqli_query($conexao, "SELECT email FROM usuario WHERE email = '{$email_telemovel}'");

        if (mysqli_num_rows($sql) > 0) { // se o email ja existe
            $mensagem_erro = "O email inserido ja existe na bd";
            header("Location: ../criarContaForm.php?mensagem_erro=" . $mensagem_erro);
        } else {

            echo "O email nao existe na bd, pronto para inserir";

            // verificar se o usuario fez o upload da imagem
            if (isset($_FILES['imagem'])) { // Se a imagem foi carregada
                $img_nome = $_FILES['imagem']['name'];
                $tmp_nome = $_FILES['imagem']['tmp_name'];

                //Pegar a extensao da imagem
                $img_explode = explode('.', $img_nome);
                $img_ext = end($img_explode);  // pega a extensao da imagem

                $extensions = ['png', 'jpeg', 'jpg'];

                if (in_array($img_ext, $extensions) == true) {// se a extensao inserida estiver correta
                    $time = time(); //retorna a hora e data atual
                    //
                    //Inserir a imagem carregada na pasta de usuarios
                    $new_img_name = $time . $img_nome;
                    if (move_uploaded_file($tmp_nome, "imagensUsuario/" . $new_img_name)) {

                        //Inserir os dados do usuario na BD
                        $query = "INSERT INTO usuario
                            (id_usuario, nome, apelido, data_nascimento, genero, email, senha, estado, imagem, data_registro, numero_telefone, Ultima_atividade)
                            VALUES (default, '" . $nome . "', '" . $apelido . "', '" . $nascimento . "', '" . $genero . "', '" . $email_telemovel . "', '" . $senha . "',  default , '" . $new_img_name . "', default, '" . $telefone . "', default)";

                        $sql2 = mysqli_query($conexao, $query);

                        if ($sql2) { // se os dados foram inseridos
                            $sql3 = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '" . $email_telemovel . "'");

                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);

                                header("Location: ../loginForm.php");
                            }
                        } else {

                            $mensagem_erro = "Algo correu mal";
                            header("Location: ../criarContaForm.php?mensagem_erro=" . $mensagem_erro);
                        }
                    }
                } else {

                    $mensagem_erro = "Selecione uma imagem com extensao valida - png, jpg, jpeg";
                    header("Location: ../criarContaForm.php?mensagem_erro=" . $mensagem_erro);
                }
            } else {

                $mensagem_erro = "Por favor seleione uma imagem";
                header("Location: ../criarContaForm.php?mensagem_erro=" . $mensagem_erro);
            }
        }
    } else {

        $mensagem_erro = "este nao e um email valido";
        header("Location: ../criarContaForm.php?mensagem_erro=" . $mensagem_erro);
    }
} else {

    $mensagem_erro = "Todos os campos são necessarios";
    header("Location: ../criarContaForm.php?mensagem_erro=" . $mensagem_erro);
}
