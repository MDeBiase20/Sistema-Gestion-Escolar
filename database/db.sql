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
INSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('DOCENTE','2024-02-12 20:10:00','1');

CREATE TABLE usuarios (
    id_usuario INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rol_id     INT     (11) NOT NULL,
    email      VARCHAR (255) NOT NULL UNIQUE KEY,
    password   TEXT    (255) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (rol_id) REFERENCES roles (id_rol) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB;

INSERT INTO usuarios (rol_id, email, password, fyh_creacion, estado)
VALUES ('1', 'mylton20@gmail.com', '$2y$10$m6jG.SzwuXTopEVUSBtBauhFTG02/aZF3qU7IqUmccvRACK2Ljfrq', '2024-02-12 15:30:00', '1');


CREATE TABLE personas (
    id_persona       INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usuario_id       INT     (11) NOT NULL,
    nombres          VARCHAR (50) NOT NULL,
    apellidos        VARCHAR (50) NOT NULL,
    ci               VARCHAR (20) NOT NULL,
    fecha_nacimiento VARCHAR (20) NOT NULL,
    profesion        VARCHAR (50) NOT NULL,
    direccion        VARCHAR (255) NOT NULL,
    celular          VARCHAR (20) NOT NULL,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (usuario_id) REFERENCES usuarios (id_usuario) ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=InnoDB;
/* El ci es el carnét de identidad*/
INSERT INTO personas (usuario_id, nombres, apellidos, ci, fecha_nacimiento, profesion, direccion, celular, fyh_creacion, estado)
VALUES ('1', 'Milton Exequiel', 'De Biase', '12345678', '1990-12-13', 'LICENCIADO EN EDUCACION', 'Alvear 2855', '3424329667', '2024-02-26', '1');


CREATE TABLE administrativos (
    id_administrativo INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id       INT     (11) NOT NULL,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=InnoDB;


CREATE TABLE docentes (
    id_docente       INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id       INT     (11) NOT NULL,
    especialidad     VARCHAR  (255) NOT NULL,   
    antiguedad       VARCHAR  (255) NOT NULL,   
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=InnoDB;


CREATE TABLE estudiantes (
    id_estudiante    INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    persona_id       INT     (11) NOT NULL,
    nivel_id         INT     (11) NOT NULL,   
    grado_id         INT     (11) NOT NULL,
    rude             VARCHAR (50) NOT NULL, /*el rude es un identificador único del estudiante (País Bolivia)*/ 
     
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (persona_id) REFERENCES personas (id_persona) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (grado_id) REFERENCES grados (id_grado) ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=InnoDB;

/*ppffs -> padres de familias*/
CREATE TABLE ppffs (
    id_ppffs                INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    estudiante_id           INT     (11) NOT NULL,
    ci_ppff                 VARCHAR (20) NOT NULL,
    nombres_apellidos_ppff  VARCHAR (20) NOT NULL,
    celular_ppff            VARCHAR (50) NOT NULL,
    ocupacion               VARCHAR (50) NOT NULL,
    ref_nombre              VARCHAR (50) NOT NULL,
    ref_parentezco          VARCHAR (50) NOT NULL,
    ref_celular             VARCHAR (50) NOT NULL,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=InnoDB;


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
VALUES ('Instituo ICOP', 'logo.jpg', 'San Martin 1540', '3425378127', '3424329668', 'instituto@icop.edu.ar', '2024-02-17 19:05:00', '1');


CREATE TABLE gestiones (
    id_gestion INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    gestion    VARCHAR (255) NOT NULL,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)

)ENGINE=InnoDB;

INSERT INTO gestiones (gestion, fyh_creacion, estado)
VALUES ('Gestion 2024', '2024-02-19 18:08:00', '1');


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
VALUES ('1', 'INICIAL', 'MAÑANA', '2024-02-12 15:30:00', '1');

CREATE TABLE grados (
    id_grado    INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nivel_id    INT     (11) NOT NULL,
    curso       VARCHAR (255) NOT NULL,
    paralelo    VARCHAR (255) NOT NULL,
    

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (nivel_id) REFERENCES niveles (id_nivel) ON DELETE NO ACTION ON UPDATE CASCADE 
)ENGINE=InnoDB;

INSERT INTO grados (nivel_id, curso, paralelo, fyh_creacion, estado)
VALUES ('1', 'PRIMARIA - PRIMERO', 'A', '2024-02-24 15:30:00', '1');

CREATE TABLE materias (
    id_materia INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_materia    VARCHAR (255) NOT NULL,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11)

)ENGINE=InnoDB;

INSERT INTO materias (nombre_materia, fyh_creacion, estado)
VALUES ('Matemática', '2024-02-25 18:08:00', '1');

CREATE TABLE pagos (
    id_pago           INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    estudiante_id     INT     (11) NOT NULL,
    mes_pagado        VARCHAR (50) NOT NULL,
    monto_pagado      VARCHAR (10) NOT NULL,
    fecha_pago        VARCHAR (20) NOT NULL,
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;

CREATE TABLE asignacion (
    id_asignacion     INT     (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    docente_id        INT     (11) NOT NULL,
    nivel_id          INT     (11) NOT NULL,
    grado_id          INT     (11) NOT NULL,
    materia_id        INT     (11) NOT NULL,
    
    
    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (nivel_id)   REFERENCES niveles (id_nivel) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (grado_id)   REFERENCES grados (id_grado) ON DELETE NO ACTION ON UPDATE CASCADE,
FOREIGN KEY (materia_id) REFERENCES materias (id_materia) ON DELETE NO ACTION ON UPDATE CASCADE

)ENGINE=InnoDB;

CREATE TABLE calificaciones (
    id_calificacion INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    docente_id      INT (11) NOT NULL,
    estudiante_id   INT (11) NOT NULL,
    materia_id      INT (11) NOT NULL,

    nota_1          VARCHAR (10) NOT NULL,
    nota_2          VARCHAR (10) NOT NULL,
    nota_3          VARCHAR (10) NOT NULL,

    fyh_creacion DATETIME NULL,
    fyh_actualizacion DATETIME NULL,
    estado VARCHAR (11),

    FOREIGN KEY (docente_id) REFERENCES docentes (id_docente) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (materia_id) REFERENCES materias (id_materia) ON DELETE NO ACTION ON UPDATE CASCADE,
    FOREIGN KEY (estudiante_id) REFERENCES estudiantes (id_estudiante) ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=InnoDB; 