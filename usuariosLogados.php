<?php

session_start();
include_once 'include/conexao.php';




$query = "SELECT * FROM usuario WHERE estado = 'Online'"; 
$sql = mysqli_query($conexao, $query);
$saida = "";

if (mysqli_num_rows($sql) < 1) {
    $saida .= "Nao ha usuarios disponiveis";
}
elseif (mysqli_num_rows($sql) > 0) {
    
    while ($row = mysqli_fetch_assoc($sql)) {
        $saida = '<li class="clearfix">
                        <img src="include/imagensUsuario/'. $row['imagem'] .'" alt="avatar">
                        <div class="about">
                            <div class="name">'. $row['nome'] .' '. $row['apelido'] .'</div>
                            <div class="status"> <i class="fa fa-circle offline"></i> '. $row['estado'] .' </div>                                            
                        </div>
                    </li>';
        
        echo '<li class="clearfix">
            <a href="index.php?amigo='. $row['id_usuario'] .'" class="text-dark listaPessoa ">
                        <img src="include/imagensUsuario/'. $row['imagem'] .'" alt="avatar">
                        <div class="about">
                            <div class="name">'. $row['nome'] .' '. $row['apelido'] .'</div>
                            <div class="status"> <i class="fa fa-circle offline"></i>  '. $row['estado'] .' </div>                                            
                        </div>
                        </a>
                    </li>';
    }

}

//echo $saida;

?>