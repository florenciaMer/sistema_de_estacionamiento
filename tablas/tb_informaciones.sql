CREATE TABLE tb_informaciones(
    id_inf INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_parqueo VARCHAR(255) NULL,
    actividad_empresa VARCHAR(255) NULL,
    sucursal VARCHAR(255) NULL,
    direccion VARCHAR(255) NULL,
    zona VARCHAR(255) NULL,
    telefono VARCHAR(255) NULL,
    ciudad VARCHAR(255) NULL,
    pais VARCHAR(255) NULL,    

    fyh_creacion DATETIME NULL,
    fyh_modificacion DATETIME NULL,
    fyy_eliminacion DATETIME NULL
);