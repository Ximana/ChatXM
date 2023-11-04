<?php

include_once './conexao.php';
$nomeUsuario = mysqli_real_escape_string($conexao, $_POST['nomeUsuario']);



$query = "SELECT * FROM usuario WHERE estado = 'Online' AND nome LIKE '%". $nomeUsuario ."%' OR Apelido LIKE '%". $nomeUsuario ."%'"; 
$sql = mysqli_query($conexao, $query);
//$saida = "";

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
                        <img src="include/imagensUsuario/'. $row['imagem'] .'" alt="avatar">
                        <div class="about">
                            <div class="name">'. $row['nome'] .' '. $row['apelido'] .'</div>
                            <div class="status"> <i class="fa fa-circle offline"></i>  '. $row['estado'] .' </div>                                            
                        </div>
                    </li>';
    }

}

//echo $saida;

?>: ../index.php");