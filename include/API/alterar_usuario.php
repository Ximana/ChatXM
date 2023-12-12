<?php
include_once './conexao.php';

$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
$apelido = mysqli_real_escape_string($conexao, $_POST['apelido']);
$nascimento = mysqli_real_escape_string($conexao, $_POST['nascimento']);
$genero = mysqli_real_escape_string($conexao, $_POST['genero']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

echo "<br>Nome: " . $nome;
echo "<br>Apelido: " . $apelido;
echo "<br>Nascimento: " . $nascimento;
echo "<br>genero: " . $genero;
echo "<br>Email: " . $email;
echo "<br>Telefone: " . $telefone;
echo "<br>Senha: " . $senha;
echo "<br>Senha: " . $_SESSION['id_usuario'];
echo "<br><br><br>";

//$sql = "UPDATE usuario SET estado = 'Offline' WHERE id_usuario = ".$_SESSION['id_usuario'];

$sql = "UPDATE usuario SET nome = '".$nome."', apelido = '".$apelido."', data_nascimento = '".$nascimento."', genero = '".$genero."', email = '".$email."', senha = '".$senha."', numero_telefone = '".$telefone."' WHERE id_usuario =".$_SESSION['id_usuario'];

if (mysqli_query($conexao, $sql)) {
  echo "Sucesso";
   header("Location: ../perfil.php");
} else {
  echo "Erro: " . mysqli_error($conexao);
}

