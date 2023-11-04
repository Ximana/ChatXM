-- Criar o banco de dados (se ainda não existir)
CREATE DATABASE IF NOT EXISTS chatonline;

-- Usar o banco de dados
USE chatonline;

-- Tabela de Usuários
CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(255) UNIQUE NOT NULL,
    FullName VARCHAR(255),
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(255),
    RegistrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    LastAccess TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ProfileInfo TEXT,
    NotificationPreferences TEXT,
    FriendsList TEXT
);

-- Tabela de Conversas
CREATE TABLE Conversations (
    ConversationID INT AUTO_INCREMENT PRIMARY KEY,
    ConversationName VARCHAR(255),
    ConversationType ENUM('Individual', 'Group') NOT NULL,
    LastMessageID INT,
    LastActivity TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Mensagens
CREATE TABLE Messages (
    MessageID INT AUTO_INCREMENT PRIMARY KEY,
    ConversationID INT,
    SenderID INT,
    Content TEXT,
    Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    MessageStatus ENUM('Sent', 'Delivered', 'Read', 'Deleted') DEFAULT 'Sent',
    Labels TEXT
);

-- Tabela de Mensagens Lidas
CREATE TABLE ReadMessages (
    MessageID INT,
    RecipientID INT,
    ReadTimestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de Grupos
CREATE TABLE Groups (
    GroupID INT AUTO_INCREMENT PRIMARY KEY,
    GroupName VARCHAR(255),
    Description TEXT,
    CreatorID INT,
    MembersList TEXT,
    GroupSettings TEXT
);

-- Tabela de Bloqueios e Denúncias
CREATE TABLE BlocksAndReports (
    RecordID INT AUTO_INCREMENT PRIMARY KEY,
    BlockerUserID INT,
    BlockedUserID INT,
    Reason TEXT,
    ReportStatus ENUM('Pending', 'Resolved') DEFAULT 'Pending'
);
