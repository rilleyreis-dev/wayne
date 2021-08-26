DROP SCHEMA IF EXISTS `wayne_sale` ;

CREATE SCHEMA IF NOT EXISTS `wayne_sale` DEFAULT CHARACTER SET utf8 ;
USE `wayne_sale` ;

--
-- Estrutura da tabela Venda
CREATE TABLE `venda` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `vendedor` varchar(200) NOT NULL,
    `data` date NOT NULL,
    `hora` time NOT NULL,
    `total` decimal(20,2) NOT NULL,
    PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;

--
-- Estrutura da table venda_produto
CREATE TABLE `venda_produto`(
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_venda` int(11) UNSIGNED NOT NULL,
    `nome` varchar(200) NOT NULL,
    `valor` decimal(20,2) NOT NULL,
    `quantidade` decimal(20,2) NOT NULL,
    PRIMARY KEY(`id`),
    CONSTRAINT `fk_venda_vendaproduto`
    FOREIGN KEY (`id_venda`)
    REFERENCES `venda` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
)ENGINE=InnoDB DEFAULT CHARACTER SET=utf8;