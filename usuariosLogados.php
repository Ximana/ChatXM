<?php

session_start();
include_once 'include/conexao.php';

//Verifiar se a pesquisa foi setada
if (isset($_GET['pesqiosaUsuario'])) {//Mostra apenas que condizem com a pesquisa
    $query = "SELECT * FROM usuario WHERE nome LIKE '%". $_GET['pesqiosaUsuario'] ."%' OR Apelido LIKE '%". $_GET['pesqiosaUsuario'] ."%' ORDER BY estado ASC"; 
} else {// Mostra todos os usuarios
    $query = "SELECT * FROM usuario ORDER BY estado ASC";
}


$sql = mysqli_query($conexao, $query);
$saida = "";

if (mysqli_num_rows($sql) > 0) {
    
    while ($row = mysqli_fetch_assoc($sql)) {
       
        //Verificar se o estado esta online ou offline
        $estado = "";
        if ($row['estado'] === "Online")
            $estado = "online";
        else
            $estado = "offline";
        if ($_SESSION['id_usuario'] != $row['id_usuario']) {
            $saida .= '<li class="clearfix">
                         <a href="chat.php?amigo=' . $row['id_usuario'] . '" class="text-dark listaPessoa ">
                            <img src="include/imagensUsuario/' . $row['imagem'] . '" alt="avatar">
                            <div class="about">
                                <div class="name">' . $row['nome'] . ' ' . $row['apelido'] . '</div>
                                <div class="status"> <i class="fa fa-circle ' . $estado . '"></i>  ' . $row['estado'] . ' </div>                                            
                            </div>
                        </a>
                    </li>';
        }
         
    }
} else {

    $saida .= "Nao ha usuarios disponiveis";
}

echo $saida;
?>