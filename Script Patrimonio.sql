drop database cygni;

create database cygni;

	\c cygni;

	CREATE TABLE categoria (
		codigo serial,
		nome varchar(30) NOT NULL,	
		descricao varchar(80) NOT NULL,
		CONSTRAINT pkCategoria PRIMARY KEY (codigo)
	);

	insert into categoria(nome, descricao) values ('Monitor', 'Monitores');
	insert into categoria(nome, descricao) values ('Computador', 'Computadores');
	insert into categoria(nome, descricao) values ('Mesa', 'Mesa');
	insert into categoria(nome, descricao) values ('Cadeira', 'Cadeira');

	CREATE TABLE predio (
		codigo Serial,	
		nome Varchar(50) NOT NULL,
		endereco Varchar(100) NOT NULL,
		CONSTRAINT pkPredio PRIMARY KEY (codigo)
	);

	insert into predio(nome, endereco) values ('Cora Coralina', 'Av independência, quadra 804 , 1002 Lote 26/32 - Leste Vila Nova - Goiânia/GO');
	insert into predio(nome, endereco) values ('Elias Bufáiçal', 'Rua 31 A, 43 - Setor Aeroporto - Goiânia/GO');
	insert into predio(nome, endereco) values ('Aparecida de Goiânia', 'Avenida Maria Cardoso Qd. 29, Lts. 6-9/19-22, - Jardim Luz - Aparecida de Goiânia /GO');

	CREATE TABLE departamento (
		sigla Char(5),
		nome Varchar(30) NOT NULL,	
		responsavel	Varchar(50)	NOT NULL,
		CONSTRAINT pkDepartamento PRIMARY KEY (sigla)
	);

	insert into departamento values ('TI', 'Tecnologia da Informação', 'Gleidson');
	insert into departamento values ('ADM', 'Adminstração', 'Adaulto');
	insert into departamento values ('DIR', 'Diretoria', 'Lucas');

	CREATE TABLE sala (
		numero serial,
		comprimento Numeric(5,2) NOT NULL,	
		largura	Numeric(5,2) NOT NULL,	
		codpredio Int NOT NULL,	
		sigladpto Char(5) NOT NULL,
		CONSTRAINT pkSala PRIMARY KEY (numero),
		CONSTRAINT fk_Sala_Departamento FOREIGN KEY (sigladpto) REFERENCES Departamento(sigla),
		CONSTRAINT fk_Sala_Predio FOREIGN KEY (codpredio) REFERENCES Predio(codigo)
	);

	insert into sala(comprimento, largura, codpredio, sigladpto) values (10, 10, 1, 'TI');
	insert into sala(comprimento, largura, codpredio, sigladpto) values (10, 10, 1, 'ADM');
	insert into sala(comprimento, largura, codpredio, sigladpto) values (10, 10, 1, 'DIR');
	insert into sala(comprimento, largura, codpredio, sigladpto) values (10, 10, 2, 'TI');
	insert into sala(comprimento, largura, codpredio, sigladpto) values (10, 10, 2, 'ADM');
	insert into sala(comprimento, largura, codpredio, sigladpto) values (10, 10, 2, 'DIR');
	insert into sala(comprimento, largura, codpredio, sigladpto) values (10, 10, 3, 'TI');
	insert into sala(comprimento, largura, codpredio, sigladpto) values (10, 10, 3, 'ADM');
	insert into sala(comprimento, largura, codpredio, sigladpto) values (10, 10, 3, 'DIR');


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

	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Monitor Dell 24"', 1111, '2016-05-21', 'Primetek', 400.55, 'e', 1, 1);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Monitor Dell 24"', 1111, '2016-05-21', 'Primetek', 400.55, 'e', 1, 2);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Monitor Dell 24"', 1111, '2016-05-21', 'Primetek', 400.55, 'e', 1, 3);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Monitor Dell 24"', 1111, '2016-05-21', 'Primetek', 400.55, 'e', 1, 4);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Monitor Dell 24"', 1111, '2016-05-21', 'Primetek', 400.55, 'e', 1, 5);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Monitor Dell 24"', 1111, '2016-05-21', 'Primetek', 400.55, 'e', 1, 6);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Monitor Dell 24"', 1111, '2016-05-21', 'Primetek', 400.55, 'e', 1, 7);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Monitor Dell 24"', 1111, '2016-05-21', 'Primetek', 400.55, 'e', 1, 8);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Monitor Dell 24"', 1111, '2016-05-21', 'Primetek', 400.55, 'e', 1, 9);

	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Dell Edge 8GB I5', 2222, '2016-05-21', 'Primetek', 2200.55, 'e', 2, 1);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Dell Edge 8GB I5', 2222, '2016-05-21', 'Primetek', 2200.55, 'e', 2, 2);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Dell Edge 8GB I5', 2222, '2016-05-21', 'Primetek', 2200.55, 'e', 2, 3);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Dell Edge 8GB I5', 2222, '2016-05-21', 'Primetek', 2200.55, 'e', 2, 4);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Dell Edge 8GB I5', 2222, '2016-05-21', 'Primetek', 2200.55, 'e', 2, 5);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Dell Edge 8GB I5', 2222, '2016-05-21', 'Primetek', 2200.55, 'e', 2, 6);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Dell Edge 8GB I5', 2222, '2016-05-21', 'Primetek', 2200.55, 'e', 2, 7);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Dell Edge 8GB I5', 2222, '2016-05-21', 'Primetek', 2200.55, 'e', 2, 8);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Dell Edge 8GB I5', 2222, '2016-05-21', 'Primetek', 2200.55, 'e', 2, 9);

	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Mesa L 1x1', 3333, '2016-05-21', 'Primetek', 400.55, 'e', 3, 1);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Mesa L 1x1', 3333, '2016-05-21', 'Primetek', 400.55, 'e', 3, 2);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Mesa L 1x1', 3333, '2016-05-21', 'Primetek', 400.55, 'e', 3, 3);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Mesa L 1x1', 3333, '2016-05-21', 'Primetek', 400.55, 'e', 3, 4);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Mesa L 1x1', 3333, '2016-05-21', 'Primetek', 400.55, 'e', 3, 5);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Mesa L 1x1', 3333, '2016-05-21', 'Primetek', 400.55, 'e', 3, 6);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Mesa L 1x1', 3333, '2016-05-21', 'Primetek', 400.55, 'e', 3, 7);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Mesa L 1x1', 3333, '2016-05-21', 'Primetek', 400.55, 'e', 3, 8);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Mesa L 1x1', 3333, '2016-05-21', 'Primetek', 400.55, 'e', 3, 9);

	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Cadeira Ajustável Confort', 4444, '2016-05-21', 'Primetek', 250.55, 'e', 4, 1);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Cadeira Ajustável Confort', 4444, '2016-05-21', 'Primetek', 250.55, 'e', 4, 2);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Cadeira Ajustável Confort', 4444, '2016-05-21', 'Primetek', 250.55, 'e', 4, 3);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Cadeira Ajustável Confort', 4444, '2016-05-21', 'Primetek', 250.55, 'e', 4, 4);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Cadeira Ajustável Confort', 4444, '2016-05-21', 'Primetek', 250.55, 'e', 4, 5);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Cadeira Ajustável Confort', 4444, '2016-05-21', 'Primetek', 250.55, 'e', 4, 6);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Cadeira Ajustável Confort', 4444, '2016-05-21', 'Primetek', 250.55, 'e', 4, 7);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Cadeira Ajustável Confort', 4444, '2016-05-21', 'Primetek', 250.55, 'e', 4, 8);
	insert into bempatrimonial(descricao, nrnotafiscal, dtnotafiscal, fornecedor, valor, situacao, codcat, numsala) values ('Cadeira Ajustável Confort', 4444, '2016-05-21', 'Primetek', 250.55, 'e', 4, 9);



	CREATE TABLE usuario (
		login Varchar(20),
		nome Varchar(50) NOT NULL,	
		senha Varchar(60) NOT NULL,	
		nivel Char(1) NOT NULL,
		CONSTRAINT pkUsuario PRIMARY KEY (login)
	);

	insert into usuario values ('lzni', 'Lucas Luzini', 'c69874b898abb180ac71bd99bc16f8fb', 'g');
	insert into usuario values ('adaulto', 'Adaulto', 'c69874b898abb180ac71bd99bc16f8fb', 'f');

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



	
