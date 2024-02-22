CREATE TABLE roles (
    id_rol        INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_rol    VARCHAR (255) NOT NULL UNIQUE KEY,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)
)ENGINE=InnoDB;

INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('ADMINISTRADOR','2024-02-12 20:10:00','1');
INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('DIRECTOR ACADEMICO','2024-02-12 20:10:00','1');
INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('DIRECTOR ADMINISTRATIVO','2024-02-12 20:10:00','1');
INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('CONTADOR','2024-02-12 20:10:00','1');
INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('SECRETARIA','2024-02-12 20:10:00','1');

CREATE TABLE usuarios (
    id_usuario INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombres    VARCHAR (255) NOT NULL,
    rol_id     INT     (11) NOT NULL,
    email      VARCHAR (255) NOT NULL UNIQUE KEY,
    password   TEXT    (255) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB;

INSERT INTO usuarios (nombres, rol_id, email, password, fyh_creacion, estado)
VALUES ('Milton Exequiel De Biase', '1', 'mylton20@gmail.com', '$2y$10$m6jG.SzwuXTopEVUSBtBauhFTG02/aZF3qU7IqUmccvRACK2Ljfrq', '2024-02-12 15:30:00', '1')

CREATE TABLE configuracion_instituciones (
    id_config_institucion INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_institucion    VARCHAR (255) NOT NULL,
    logo                  VARCHAR (11)  NULL,
    direccion             VARCHAR (255) NOT NULL UNIQUE KEY,
    telefono              VARCHAR (100) NULL,
    celular               VARCHAR (100) NULL,
    correo                VARCHAR (100) NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)

)ENGINE=InnoDB;

INSERT INTO configuracion_instituciones (nombre_institucion, logo, direccion, telefono, celular, correo, fyh_creacion, estado)
VALUES ('Instituo ICOP', 'logo.jpg', 'San Martin 1540', '3425378127', '3424329668', 'instituto@icop.edu.ar', '2024-02-17 19:05:00', '1')


CREATE TABLE gestiones (
    id_gestion INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion    VARCHAR (255) NOT NULL,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)

)ENGINE=InnoDB;

INSERT INTO gestiones (gestion, fyh_creacion, estado)
VALUES ('Gestion 2024', '2024-02-19 18:08:00', '1')


CREATE TABLE niveles (
    id_nivel    INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion_id  INT     (11) NOT NULL,
    nivel       VARCHAR (255) NOT NULL,
    turno       VARCHAR (255) NOT NULL,
    

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (gestion_id) REFERENCES gestiones (id_gestion) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB;

INSERT INTO niveles (gestion_id, nivel, turno, fyh_creacion, estado)
VALUES ('1', 'INICIAL', 'MAÑANA', '2024-02-12 15:30:00', '1')