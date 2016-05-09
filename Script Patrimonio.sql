\c postgres;

drop database cygni;

create database cygni;

	\c cygni;

	CREATE TABLE categoria (
		codigo serial,
		nome varchar(30) NOT NULL,	
		descricao varchar(80) NOT NULL,
		CONSTRAINT pkCategoria PRIMARY KEY (codigo)
	);

	CREATE TABLE predio (
		codigo Serial,	
		nome Varchar(50) NOT NULL,
		endereco Varchar(100) NOT NULL,
		CONSTRAINT pkPredio PRIMARY KEY (codigo)
	);

	CREATE TABLE departamento (
		sigla Char(5),
		nome Varchar(30) NOT NULL,	
		responsável	Varchar(50)	NOT NULL,
		CONSTRAINT pkDepartamento PRIMARY KEY (sigla)
	);

	CREATE TABLE sala (
		numero Serial,
		comprimeto Numeric(5,2) NOT NULL,	
		largura	Numeric(5,2) NOT NULL,	
		codpredio Int NOT NULL,	
		sigladpto Char(5) NOT NULL,
		CONSTRAINT pkSala PRIMARY KEY (numero),
		CONSTRAINT fk_Sala_Departamento FOREIGN KEY (sigladpto) REFERENCES Departamento(sigla),
		CONSTRAINT fk_Sala_Predio FOREIGN KEY (codpredio) REFERENCES Predio(codigo)
	);

	CREATE TABLE bempatrimonial (
		numero Serial,
		descricao Varchar(80) NOT NULL,	
		nrnotafiscal Int NOT NULL,	
		dtnotafiscal Date NOT NULL,	
		fornecedor Varchar(60) NOT NULL,	
		valor Numeric(15,2) NOT NULL,
		situacao Char(1) NOT NULL,
		codcat Int NOT NULL,	
		numsala	Int	NOT NULL,
		CONSTRAINT pkBemPatrimonial PRIMARY KEY (numero),
		CONSTRAINT fk_bem_categoria FOREIGN KEY (codcat) REFERENCES categoria(codigo),
		CONSTRAINT fk_bem_NumSala FOREIGN KEY (numsala) REFERENCES sala(numero)
	);

	CREATE TABLE usuario (
		login Varchar(20),
		nome Varchar(50) NOT NULL,	
		senha Varchar(60) NOT NULL,	
		nivel Char(1) NOT NULL,
		CONSTRAINT pkUsuario PRIMARY KEY (login)
	);

	CREATE TABLE mbp (
		numero Serial,
		data date NOT NULL,
		login varchar(20) NOT NULL,
		numbem int NOT NULL,
		numsalaorigem int NOT NULL,
		numsaladestino int NOT NULL,
		CONSTRAINT pkMBP PRIMARY KEY (numero),
		CONSTRAINT fk_mbp_usuario FOREIGN KEY (login) REFERENCES usuario(login),
		CONSTRAINT fk_mbp_bem FOREIGN KEY (numbem) REFERENCES bempatrimonial(numero),
		CONSTRAINT fk_mbp_salaOrigem FOREIGN KEY (numsalaorigem) REFERENCES sala(numero),
		CONSTRAINT fk_mbp_salaDestino FOREIGN KEY (numsaladestino) REFERENCES sala(numero)
	);



	
