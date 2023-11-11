<?php

include_once './conexao.php';

$searchTerm = mysqli_real_escape_string($conexao, $_POST['searchTerm']);

$query = "SELECT * FROM usuario WHERE nome LIKE '%" . $searchTerm . "%' OR Apelido LIKE '%" . $searchTerm . "%'";
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

        $saida .= '<li class="clearfix">
                         <a href="index.php?amigo=' . $row['id_usuario'] . '" class="text-dark listaPessoa ">
                            <img src="include/imagensUsuario/' . $row['imagem'] . '" alt="avatar">
                            <div class="about">
                                <div class="name">' . $row['nome'] . ' ' . $row['apelido'] . '</div>
                                <div class="status"> <i class="fa fa-circle ' . $estado . '"></i>  ' . $row['estado'] . ' </div>                                            
                            </div>
                        </a>
                    </li>';
    }
} else {

    $saida .= "Nao ha usuarios disponiveis";
}

echo $saida;
?>