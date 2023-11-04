create database chatXM;

-- Tabela de Usuários
CREATE TABLE usuario (
    user_Id INT AUTO_INCREMENT PRIMARY KEY,
    unique_Id INT(200),
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255),  
    email VARCHAR(255),    
    password VARCHAR(255) NOT NULL,
    status VARCHAR(255),
    image VARCHAR(400),
    
    registration_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Mensagens
CREATE TABLE mensagem (
    message_Id INT AUTO_INCREMENT PRIMARY KEY,
    incomming_Msg_Id int,
    outgoing_Msg_Id int,
    message varchar(1000),
	timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    MessageStatus ENUM('Enviada', 'Recebida', 'Lida', 'Apagada') DEFAULT 'Sent',
);
