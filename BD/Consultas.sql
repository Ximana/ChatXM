show databases;

use chatXM;
show tables;


/-- Pega todas as mensagens da conversa entre 2 usuarios
SELECT mensagem.*
FROM mensagem
JOIN conversa ON mensagem.id_conversa = conversa.id_conversa
JOIN participante AS p1 ON conversa.id_conversa = p1.id_conversa
JOIN participante AS p2 ON conversa.id_conversa = p2.id_conversa
WHERE (p1.id_usuario = 2 AND p2.id_usuario = 1) 
ORDER BY mensagem.data_criacao ASC;

--obter todas as mensagens em um grupo específico em que um usuário
-- específico participa, você pode usar a seguinte consulta SQL. 
-- Vou assumir que o ID do usuário é 1 e o ID da conversa em grupo é 3, por exemplo:
SELECT mensagem.*
FROM mensagem
JOIN participante ON mensagem.id_conversa = participante.id_conversa
WHERE participante.tipo = 'Grupo' AND participante.id_usuario = 1 AND participante.id_conversa = 3
ORDER BY mensagem.data_criacao;



 
   