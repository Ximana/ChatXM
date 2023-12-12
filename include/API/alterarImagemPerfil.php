<?php
include_once './conexao.php';

$id_usuario = $_SESSION['id_usuario'];

if (isset($_FILES["fileImg"]["name"])) {

    $src = $_FILES["fileImg"]["tmp_name"];
    $imageName = uniqid() . $_FILES["fileImg"]["name"];

    $target = "imagensUsuario/" . $imageName;

    move_uploaded_file($src, $target);

    $query = "UPDATE usuario SET imagem = '" .$imageName ."' WHERE id_usuario = ".$id_usuario."";
    mysqli_query($conexao, $query);

    header("Location: ../perfil.php");
}