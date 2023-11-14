<?php
include_once './conexao.php';
session_start();

// Atualizar o status para "offline" ma BD
$sql = "UPDATE usuario SET estado = 'Offline' WHERE id_usuario = ".$_SESSION['id_usuario'];

if (mysqli_query($conexao, $sql)) {
  echo "Estado atualizado";
} else {
  echo "Erro: " . mysqli_error($conexao);
}

session_unset();
session_destroy();

 header("Location: ../index.php");