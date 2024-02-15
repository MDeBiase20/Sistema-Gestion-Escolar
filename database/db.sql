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