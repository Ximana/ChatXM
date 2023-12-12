<?php
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "chatXM";

$conexao = mysqli_connect($hostname, $username, $password, $database);

if ($conexao) {
    //echo "Conectada";
} else {
    echo "Erro na conexao";
}

