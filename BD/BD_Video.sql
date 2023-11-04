create  database if not exists chatXM;

-- Tabela de Usuários
CREATE TABLE usuario (
    userId INT AUTO_INCREMENT PRIMARY KEY,
    uniqueId INT(200),
    firstName VARCHAR(255) NOT NULL,
    lastNme VARCHAR(255),  
    email VARCHAR(255),    
    password VARCHAR(255) NOT NULL,
    status VARCHAR(255),
    image VARCHAR(400)     
);

-- Tabela de Mensagens
CREATE TABLE mensagem (
    messageId INT AUTO_INCREMENT PRIMARY KEY,
    incomming_Msg_Id int,
    outgoing_Msg_Id int,
    message varchar(1000),
);