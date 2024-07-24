CREATE TABLE tb_usuarios(
    id_usuario INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(255) NULL,
    email_usuario VARCHAR(255) NULL,
    email_verificado VARCHAR(255),
    password_usuario VARCHAR(255) NULL,
    token VARCHAR(255) NULL,

    fyh_creacion DATETIME NULL,
    fyh_modificacion DATETIME NULL,
    fyy_eliminacion DATETIME NULL,

    estado VARCHAR(10) 
);