CREATE TABLE tb_precios(
    id_precio INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cantidad INT(11) NULL,
    detalle VARCHAR(255) NULL,
    precio VARCHAR(255) NULL,
    

    fyh_creacion DATETIME NULL,
    fyh_modificacion DATETIME NULL,
    fyy_eliminacion DATETIME NULL
);