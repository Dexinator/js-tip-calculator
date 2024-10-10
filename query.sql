CREATE TABLE `productos` (
    `id` int,
    `Nombre Platillo` text NOT NULL,
    `Precio` float NOT NULL,
    `Categoria` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

ALTER TABLE
    `productos`
ADD
    PRIMARY KEY (`id`);

ALTER TABLE
    `productos`
MODIFY
    `id` int(11) NOT NULL AUTO_INCREMENT;