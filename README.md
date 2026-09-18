## Hi there 👋

CREATE DATABASE IF NOT EXISTS amisadora;

USE amisadora;

CREATE TABLE usuarios (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100),
    CPF VARCHAR(20),
    Endereco VARCHAR(150),
    Bairro VARCHAR(100),
    Cidade VARCHAR(100),
    Estado VARCHAR(50),
    CEP VARCHAR(20),
    Login VARCHAR(50),
    Senha VARCHAR(255)
);

CREATE TABLE produtos (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100),
    Preco DECIMAL(10,2),
    Imagem VARCHAR(150)
);

CREATE TABLE contatos (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100),
    Email VARCHAR(150),
    Mensagem TEXT
);

CREATE TABLE vendas (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    NumeroVenda INT,
    Usuario VARCHAR(50),
    Total DECIMAL(10,2),
    Pagamento VARCHAR(30),
    DataHora DATETIME
);

CREATE TABLE itens_venda (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    NumeroVenda INT,
    Produto VARCHAR(100),
    Preco DECIMAL(10,2)
);

USE amisadora;

INSERT INTO produtos (Nome, Preco, Imagem) VALUES
('Blazer Preto Estruturado', 199.90, 'blazer.png'),
('Vestido Minimalista', 159.90, 'vestidomini.png'),
('Camisa Branca Clássica', 89.90, 'camisa branca class.png'),
('Saia Elegante Midi', 129.90, 'saia mid.png'),
('Conjunto Moderno', 219.90, 'conjunto moderno.png'),
('Casaco Premium', 299.90, 'casaco premium.png'),
('Blusa Sofisticada', 109.90, 'blusa sofisticada.png'),
('Calça Alfaiataria', 179.90, 'calca alfaiataria.png');