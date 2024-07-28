CREATE TABLE tb_facturaciones(
    id_facturacion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_informacion INT(11) NULL,
    nro_factura INT(11) NULL,
    id_cliente INT(11) NULL,
    fecha_factura DATETIME NULL,
    fecha_ingreso DATETIME NULL,
    hora_ingreso TIME NULL,
    fecha_salida DATETIME NULL,
    hora_salida TIME NULL,
    tiempo VARCHAR(255) NULL,
    cuviculo VARCHAR(255) NULL,
    detalle VARCHAR(255) NULL,
    precio VARCHAR(255) NULL,
    cantidad VARCHAR(255) NULL,
    total VARCHAR(255) NULL,
    monton_total VARCHAR(255) NULL,
    monton_literal VARCHAR(255) NULL,
    user_sesion VARCHAR(255) NULL,
    qr VARCHAR(255) NULL,


    

    fyh_creacion DATETIME NULL,
    fyh_modificacion DATETIME NULL,
    fyy_eliminacion DATETIME NULL
);