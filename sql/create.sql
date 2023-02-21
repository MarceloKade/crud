CREATE TABLE IF NOT EXISTS cliente (
id_cliente serial NOT NULL,
nome_cliente varchar(255),
cpf_cliente varchar(11),
email_cliente varchar(255),
data_nascimento_cliente timestamp,
PRIMARY KEY (id_cliente)
);