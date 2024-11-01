CREATE DATABASE arcaderocket; 
USE arcaderocket;

CREATE TABLE tb_formulario (
    form_id INT AUTO_INCREMENT PRIMARY KEY,
    form_nome VARCHAR(100) NOT NULL,
    form_idade INT NOT NULL,
    form_genero ENUM('Masculino', 'Feminino', 'Outro') NOT NULL,
    form_datanascimento DATE NOT NULL,
    form_email VARCHAR(100) NOT NULL,
    form_telefone VARCHAR(15) NOT NULL
);
