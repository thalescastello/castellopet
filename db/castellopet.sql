--
-- Database: castellopet
--
CREATE DATABASE IF NOT EXISTS castellopet DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE castellopet;

-- --------------------------------------------------------

--
-- Estrutura da tabela tb_login
--

CREATE TABLE IF NOT EXISTS tb_login (
  id_login int(11) NOT NULL,
  usuario varchar(30) NOT NULL,
  senha varchar(60) NOT NULL,
  cod_login int(11) NOT NULL,
  nome varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela tb_login
--

INSERT INTO tb_login (id_login, usuario, senha, cod_login, nome) VALUES
(1, 'thales', '202cb962ac59075b964b07152d234b70', 1, ''),
(2, 'rafaela', '202cb962ac59075b964b07152d234b70', 0, 'rafaela');

-- --------------------------------------------------------

--
-- Estrutura da tabela tb_pedido
--

CREATE TABLE IF NOT EXISTS tb_pedido (
  ip_pedido int(20) NOT NULL,
  numero int(20) NOT NULL,
  tipopedido smallint(1) NOT NULL,
  cod_ordemservico int(20) NOT NULL,
  descricao varchar(150) DEFAULT NULL,
  cod_cliente int(20) DEFAULT NULL,
  cod_solicitante int(20) DEFAULT NULL,
  situacao smallint(2) NOT NULL,
  totaldescontovalor float DEFAULT NULL,
  totalpedido float NOT NULL,
  totalcusto float NOT NULL,
  totalimpostos float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela tb_pedidoitem
--

CREATE TABLE IF NOT EXISTS tb_pedidoitem (
  id_pedidoitem int(11) NOT NULL,
  cod_pedido int(20) NOT NULL,
  cod_produto int(20) NOT NULL,
  valorunitario float NOT NULL,
  quantidade float NOT NULL,
  descontovalor float DEFAULT NULL,
  descontopercentual float DEFAULT NULL,
  precocusto float DEFAULT NULL,
  impostos float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela tb_produto
--

CREATE TABLE IF NOT EXISTS tb_produto (
  id_produto int(11) NOT NULL,
  codigo varchar(30) NOT NULL,
  descricao varchar(100) NOT NULL,
  codigobarras varchar(30) DEFAULT NULL,
  cod_grupo int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela tb_produto
--

INSERT INTO tb_produto (id_produto, codigo, descricao, codigobarras, cod_grupo) VALUES
(1, '12', '', '1', NULL),
(5, 'CA9', '', '789789765', NULL),
(15, '1', 'teste', '12', NULL),
(17, '1234', 'desc', '12', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela tb_produtogrupo
--

CREATE TABLE IF NOT EXISTS tb_produtogrupo (
  id_produtogrupo int(11) NOT NULL,
  codigo varchar(30) NOT NULL,
  nome varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela tb_produtogrupo
--

INSERT INTO tb_produtogrupo (id_produtogrupo, codigo, nome) VALUES
(2, '14', 'te');

--
-- Indexes for table tb_login
--
ALTER TABLE tb_login
  ADD PRIMARY KEY (id_login);

--
-- Indexes for table tb_pedido
--
ALTER TABLE tb_pedido
  ADD PRIMARY KEY (ip_pedido);

--
-- Indexes for table tb_pedidoitem
--
ALTER TABLE tb_pedidoitem
  ADD PRIMARY KEY (id_pedidoitem);

--
-- Indexes for table tb_produto
--
ALTER TABLE tb_produto
  ADD PRIMARY KEY (id_produto),
  ADD UNIQUE KEY codigo (codigo);

--
-- Indexes for table tb_produtogrupo
--
ALTER TABLE tb_produtogrupo
  ADD PRIMARY KEY (id_produtogrupo),
  ADD UNIQUE KEY codigo (codigo);

--
-- AUTO_INCREMENT for table tb_login
--
ALTER TABLE tb_login
  MODIFY id_login int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table tb_pedido
--
ALTER TABLE tb_pedido
  MODIFY ip_pedido int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table tb_pedidoitem
--
ALTER TABLE tb_pedidoitem
  MODIFY id_pedidoitem int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table tb_produto
--
ALTER TABLE tb_produto
  MODIFY id_produto int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table tb_produtogrupo
--
ALTER TABLE tb_produtogrupo
  MODIFY id_produtogrupo int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
