<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: loginForm.php");
}

// Pegar dados do usuario
include_once 'include/conexao.php';
$query = "SELECT * FROM usuario WHERE id_usuario = " . $_SESSION['id_usuario'] . "";
$sql = mysqli_query($conexao, $query);
if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
}