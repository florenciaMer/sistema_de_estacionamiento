CREATE TABLE tb_tickets(
    id_ticket INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_cliente VARCHAR(255) NULL,
    dni VARCHAR(255) NULL,
    cuviculo VARCHAR(255) NULL,
    fecha_ingreso VARCHAR(255) NULL,
    hora_ingreso VARCHAR(255) NULL,
    user_sesion VARCHAR(255) NULL,
    

    fyh_creacion DATETIME NULL,
    fyh_modificacion DATETIME NULL,
    fyy_eliminacion DATETIME NULL,

);