show databases;

use chatXM;
show tables;


SELECT mensagem.*
FROM mensagem
JOIN conversa ON mensagem.id_conversa = conversa.id_conversa
JOIN participante AS p1 ON conversa.id_conversa = p1.id_conversa
JOIN participante AS p2 ON conversa.id_conversa = p2.id_conversa
WHERE (p1.id_usuario = 2 AND p2.id_usuario = 1) 
ORDER BY mensagem.data_criacao ASC;


/-- Pega todas as mensagens da conversa que determinado usuario participou/participa
SELECT `conversa`.*, `mensagem`.*, `participante`.*, `usuario`.*
FROM `mensagem` 
	INNER JOIN `conversa` ON `conversa`.`id_conversa` = `mensagem`.`id_conversa` 
	INNER JOIN `participante` ON `participante`.`id_conversa` = `conversa`.`id_conversa` 
	INNER JOIN `usuario` ON `usuario`.`id_usuario` = `participante`.`id_usuario`
    WHERE `participante`.`id_usuario` = 1;
    
    

/-- Pega todas as mensagens da conversa que determinado usuario Enviou
SELECT `conversa`.*, `mensagem`.*, `participante`.*, `usuario`.*
FROM `mensagem` 
	INNER JOIN `conversa` ON `conversa`.`id_conversa` = `mensagem`.`id_conversa` 
	INNER JOIN `participante` ON `participante`.`id_conversa` = `conversa`.`id_conversa` 
	INNER JOIN `usuario` ON `usuario`.`id_usuario` = `participante`.`id_usuario`
    WHERE `participante`.`id_usuario` = 1 AND `mensagem`.`id_remetente` = 1;
    
    
    
/-- (Teste ){Pegar a conversa com maior id} Pega todas as mensagens da conversa que determinado usuario participou/participa
SELECT `conversa`.*, `mensagem`.*, `participante`.*, `usuario`.*
FROM `mensagem` 
	INNER JOIN `conversa` ON `conversa`.`id_conversa` = `mensagem`.`id_conversa` 
	INNER JOIN `participante` ON `participante`.`id_conversa` = `conversa`.`id_conversa` 
	INNER JOIN `usuario` ON `usuario`.`id_usuario` = `participante`.`id_usuario`
    WHERE `participante`.`id_usuario` = 1;
    
    
SELECT conversa.id_conversa, conversa.tipo,  mensagem.conversa, mensagem.mensagem, `participante`.id_usuario, `usuario`.nome
	FROM `conversa` 
	INNER JOIN `mensagem` ON `mensagem`.`id_conversa` = `conversa`.`id_conversa` 
	INNER JOIN `participante` ON `participante`.`id_conversa` = `conversa`.`id_conversa`
    LEFT JOIN `usuario` ON `mensagem`.`id_remetente` = `usuario`.`id_usuario`;