<?php

session_start();
include_once './conexao.php';

$mensagem = mysqli_real_escape_string($conexao, $_POST['mensagem']);
$id_usuario = $_SESSION['id_usuario'];
$id_receptor =  mysqli_real_escape_string($conexao, $_POST['receptor']);
$id_conversa = "";

echo "<br>Id Usuario: " . $id_usuario;
echo "<br>Id recpetor: " .$id_receptor;
echo "<br>mensagem: " .$mensagem;
echo "<br>Id conversa: " .$id_conversa;

//___________________________________________________________________________________
//

//Verificar se ja existe uma conversa entre eles

$query = "SELECT mensagem.*
FROM mensagem
JOIN conversa ON mensagem.id_conversa = conversa.id_conversa
JOIN participante AS p1 ON conversa.id_conversa = p1.id_conversa
JOIN participante AS p2 ON conversa.id_conversa = p2.id_conversa
WHERE (p1.id_usuario = " . $id_receptor . " AND p2.id_usuario = " . $id_usuario . ") 
ORDER BY mensagem.data_criacao ASC";

$sql = mysqli_query($conexao, $query);

if (mysqli_num_rows($sql) > 0) { // se ja existe uma conversa entre eles pega o id da conversa
    /*
     * se ja existe uma conversa entre eles pega o id da conversa (apenas)
     */
    while ($row = mysqli_fetch_assoc($sql)) {
        
        $id_conversa = $row['id_conversa'];
        echo "<br><br><br>_____________________________________<br>";

        echo "<br>Id conversa Existente na bd: " .$id_conversa;
        echo "<br>_____________________________________<br><br><br>";

    }
} else { // se nao existe uma conversa entre eles insere uma nova conversa na tabela "conversa" e insere os usuarios na tabela "participantes"
/*
 *  se nao existe uma conversa entre eles insere uma nova conversa na tabela "conversa" 
 * e insere os usuarios na tabela "participantes"
 */

    // Cria uma nova onversa e pega o id da mesma
    $query2 = "INSERT INTO conversa (id_conversa, titulo, tipo, data_criacao, ultima_actividade) VALUES (default, '', 'Individual', current_timestamp(), current_timestamp())";

    if (mysqli_query($conexao, $query2)) {
        $id_conversa = mysqli_insert_id($conexao);
        echo "Nova conversa inserida (id): " . $id_conversa;

         echo "<br><br><br>_____________________________________<br>";

        echo "<br>Id conversa da nova conversa criada: " .$id_conversa;
        echo "<br>_____________________________________<br><br><br>";

    } 
    else {
        echo "Erro na criacao da conversa: " . $query2 . "<br>" . mysqli_error($conexao);
    }

    // Inserir os usuarios como participantes da nova conversa
    
    $query3 = "INSERT INTO participante (id_participantes, id_conversa, id_usuario, data__criacao, tipo) VALUES (default, '". $id_conversa ."', '". $id_usuario ."', current_timestamp(), default)";
    $sql3 = mysqli_query($conexao, $query3);
    if ($sql3) {
        echo "<br>Primeiro Participantes inserido com sucesso<br>";
    }
    else{
        echo "Erro" .mysqli_error($conexao);
    }

    $query3 = "INSERT INTO participante (id_participantes, id_conversa, id_usuario, data__criacao, tipo) VALUES (default, '". $id_conversa ."', '". $id_receptor ."', current_timestamp(), default)";
    $sql3 = mysqli_query($conexao, $query3);
    if ($sql3) {
        echo "<br> Segundo Participantes inserido com sucesso<br>";
    }
    else{
        echo "Erro" .mysqli_error($conexao);
    }
    
   /*
    $query3 = "INSERT INTO participante (id_participantes, id_conversa, id_usuario, data__criacao, tipo) VALUES (default, '". $id_conversa ."', '". $id_usuario ."', current_timestamp(), default);";
    $query3 .= "INSERT INTO participante (id_participantes, id_conversa, id_usuario, data__criacao, tipo) VALUES (default, '". $id_conversa ."', '". $id_receptor ."', current_timestamp(), default)";
    $sql3 = mysqli_multi_query($conexao, $query3);
    if ($sql3) {
        echo "<br>Participantes inseridos com sucesso<br>";
    }
    else{
        echo "Erro" .mysqli_error($conexao);
    }
    */
   
    
    
}

/*
 * Insere a nova mensagem na tabela "mensagem"
 * 
 * 
 */
echo "<br><br><br>_____________________________________<br>";
echo "<br>Id Usuario: " . $id_usuario;
echo "<br>Id recpetor: " .$id_receptor;
echo "<br>mensagem: " .$mensagem;
echo "<br>Id conversa: " .$id_conversa;
echo "<br>_____________________________________<br>";

$query4 = "INSERT INTO mensagem (id_mensagem, id_conversa, id_remetente, mensagem, data_criacao, status) VALUES (default, '". $id_conversa ."', '". $id_usuario ."', '". $mensagem ."', current_timestamp(), default)";
$sql4 = mysqli_query($conexao, $query4);
if ($sql4) {
    echo "mensagem enviada com sucesso";
    header("Location: ../chat.php?amigo=".$id_receptor."#campoMensagem");
}
else{
    echo "Erro no envio";
}

