<?php

session_start();
include_once 'include/conexao.php';

$query = "SELECT mensagem.*
FROM mensagem
JOIN conversa ON mensagem.id_conversa = conversa.id_conversa
JOIN participante AS p1 ON conversa.id_conversa = p1.id_conversa
JOIN participante AS p2 ON conversa.id_conversa = p2.id_conversa
WHERE (p1.id_usuario = ".$id_amigo." AND p2.id_usuario = ".$_SESSION['id_usuario'].") 
ORDER BY mensagem.data_criacao ASC";

//echo "id amigo selecionado: ".$id_amigo;



//$query = "SELECT * FROM usuario ORDER BY estado ASC";
$sql = mysqli_query($conexao, $query);
$saida = "";

if (mysqli_num_rows($sql) > 0) {

    while ($row = mysqli_fetch_assoc($sql)) {

        //Verificar se a mensagem e enviada ou recebida
        if ($row['id_remetente'] == $_SESSION['id_usuario']) { // o Usuario atual que enviou || Pa usar a classe css e formatar a mensagem do emissor e receptor
            
           //  echo "Id do usuario na bd: " .$row['id_remetente'];
             //echo "Id do usuario na sessao: " .$_SESSION['id_usuario'];
            //$saida .=
            echo '<li class="clearfix">
                        <div class="mensagem-dados text-right">
                            <span class="mensagem-data-hora">'. $row['data_criacao'] .'</span>
                        </div>
                        <div class="mensagem minha-mensagem float-right "> 
                                   ' . $row['mensagem'] . '
                        </div>                                    
                    </li>';
            
        }
      
        else {
            
            echo '<li class="clearfix">
                        <div class="mensagem-dados">
                            <span class="mensagem-data-hora">'. $row['data_criacao'] .'</span>
                        </div>
                        <div class="mensagem outra-messagem "> 
                                   ' . $row['mensagem'] . '
                        </div>                                    
                    </li>';
             
             
        }
        


        
    }
} else {

    //$saida .= "Nao ha Mensagens, inicie conversa";
    echo "Sem mensagens";
}

//echo $saida;
?>