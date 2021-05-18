drop database bdCantina;
create database bdCantina;

use bdCantina;

-- Criação das tabelas
create table tblUsuario
(
    idUsuario int not null auto_increment,
     primary key (idUsuario),
  	nomeUsuario varchar (70) not null,
   	emailUsuario varchar (70) not null,
    	senhaUsuario varchar (30) not null,
	authkeyUsuario varchar (45) not null,
	accesstokenUsuario varchar (45) not null,
   	admUsuario bit not null
);
create table tblPedido
(
	idPedido int not null auto_increment,
	 primary key (idPedido),
    idUsuario int not null,-- fk V
	dataPedido date not null,
	precoPedido double not null,
	pagPedido bit not null
);
create table tblProduto
(
	idProduto int not null auto_increment,
    primary key (idProduto),
	nomeProduto varchar(70) not null,
	precoProduto double not null,
	valProduto date not null,
	estqProduto int not null,
	idCategoria int not null-- fk V
);
create table tblPedidoProduto
(
	idPedidoProduto int not null auto_increment,
    primary key (idPedidoProduto),
	idPedido int not null,-- fk V
	idProduto int not null,-- fk V
	qtdProduto int not null,
	valorProduto double not null,
	retProduto bit not null
);
create table tblHistoricoEstoque
(
	idHistEstoque int not null auto_increment,
    primary key (idHistEstoque),
	idPedidoProduto int not null,-- fk V
	idProduto int not null,-- fk V
	histQtd date not null,
	natOperacao bit not null
);
create table tblPagamento
(
	idPagamento int not null auto_increment,
    primary key (idPagamento),
	formaPagamento varchar(20) not null
);
create table tblCategoria
(
	idCategoria int not null auto_increment,
    primary key (idCategoria),
	nomeCategoria varchar(50) not null
);
create table tblPedidoPagamento
(
	idPedidoPagamento int not null auto_increment,
    primary key (idPedidoPagamento),
	idPedido int not null,-- fk
	idPagamento int not null,-- fk
	valorPago double not null
); 
-- Criação dos relacionamentos
-- pedido - usuario
alter table tblpedido
add constraint FK_tblPedido_tblUsuario
foreign key (idUsuario) references tblusuario (idUsuario);
-- pedidoProduto - pedido
alter table tblPedidoProduto 
add constraint FK_tblPedidoProduto_tblPedido 
foreign key (idPedido) references tblPedido (idPedido);

-- pedidoProduto - produto
alter table tblPedidoProduto
add constraint FK_tblPedidoProduto_tblProduto
foreign key (idProduto) references tblProduto (idProduto);

-- historicoEstoque  - pedidoProduto
alter table tblHistoricoEstoque
add constraint FK_tblHistoricoEstoque_tblPedidoProduto 
foreign key (idPedidoProduto) references tblPedidoProduto (idPedidoProduto);

-- historicoEstoque - produto
alter table tblHistoricoEstoque 
add constraint FK_tblHistoricoEstoque_tblProduto
foreign key (idProduto) references tblProduto (idProduto);

-- produto - categoria
alter table tblProduto 
add constraint FK_tblProduto_tblCategoria
foreign key (idCategoria) references tblCategoria (idCategoria);

-- pedidoPagamento - pedido
alter table tblPedidoPagamento
add constraint FK_pedidoPagamento_tblPedido
foreign key (idPedido) references tblPedido (idPedido);

-- pedidoPagamento - pagamento
alter table tblPedidoPagamento
add constraint FK_tblPedidoPagamento_tblPagamento
foreign key (idPagamento) references tblPagamento (idPagamento);


-- inserts tblCategoria
INSERT INTO `tblcategoria`(`nomeCategoria`) VALUES ('Bebida');
INSERT INTO `tblcategoria`(`nomeCategoria`) VALUES ('Salgado');
INSERT INTO `tblcategoria`(`nomeCategoria`) VALUES ('Doce');
INSERT INTO `tblcategoria`(`nomeCategoria`) VALUES ('Salgadinho');

-- inserts tblPagamento

INSERT INTO `tblpagamento`(`formaPagamento`) VALUES ('À vista');
INSERT INTO `tblpagamento`(`formaPagamento`) VALUES ('Crédito');
INSERT INTO `tblpagamento`(`formaPagamento`) VALUES ('Débito');
INSERT INTO `tblpagamento`(`formaPagamento`) VALUES ('Pix');