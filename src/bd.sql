/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ *
 *                               BASE DE DATOS                                *
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
DROP DATABASE aplicacion_certificados;

CREATE DATABASE IF NOT EXISTS aplicacion_certificados
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_unicode_ci;

USE aplicacion_certificados;

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ *
 *                                   TABLAS                                   *
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
CREATE TABLE cursos (
    id MEDIUMINT(8) UNSIGNED NOT NULL,
    nombre VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

ALTER TABLE cursos
    ADD CONSTRAINT pk_cursos_id
        PRIMARY KEY (id),
    ADD CONSTRAINT uk_cursos_nombre
        UNIQUE KEY (nombre);

ALTER TABLE cursos
    MODIFY COLUMN id MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT;

/* -------------------------------------------------------------------------- */
CREATE TABLE alumnos (
    id MEDIUMINT(8) UNSIGNED NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

ALTER TABLE alumnos
    ADD CONSTRAINT pk_alumnos_id
        PRIMARY KEY (id),
    ADD CONSTRAINT uk_cursos_nombre_apellido
        UNIQUE KEY (nombre, apellido);

ALTER TABLE alumnos
    MODIFY COLUMN id MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT;

/* -------------------------------------------------------------------------- */
CREATE TABLE alumnos_cursos (
    id MEDIUMINT(8) UNSIGNED NOT NULL,
    alumno MEDIUMINT(8) UNSIGNED NOT NULL,
    curso MEDIUMINT(8) UNSIGNED NOT NULL
) ENGINE=InnoDB;

ALTER TABLE alumnos_cursos
    ADD CONSTRAINT pk_alumnos_cursos_id
        PRIMARY KEY (id),
    ADD CONSTRAINT fk_alumnos_cursos_alumno
        FOREIGN KEY (alumno) REFERENCES alumnos (id)
            ON DELETE CASCADE
            ON UPDATE CASCADE,
    ADD CONSTRAINT fk_alumnos_cursos_curso
        FOREIGN KEY (curso) REFERENCES cursos (id)
            ON DELETE CASCADE
            ON UPDATE CASCADE;

ALTER TABLE alumnos_cursos
    MODIFY COLUMN id MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT;

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ *
 *                                   DATOS                                    *
 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
INSERT INTO cursos (nombre) VALUES ('Sitio web con PHP');
INSERT INTO cursos (nombre) VALUES ('Curso de PHP desde cero');
INSERT INTO cursos (nombre) VALUES ('Curso de piloto Varitech (VF-1)');
INSERT INTO cursos (nombre) VALUES ('Curso de kendo');

INSERT INTO alumnos (nombre, apellido) VALUES ('Óscar', 'Uh Pérez');
INSERT INTO alumnos (nombre, apellido) VALUES ('Maximilian', 'Sterling');
INSERT INTO alumnos (nombre, apellido) VALUES ('Kenshin', 'Himura');

INSERT INTO alumnos_cursos (alumno, curso) VALUES (1, 1);
INSERT INTO alumnos_cursos (alumno, curso) VALUES (2, 3);
INSERT INTO alumnos_cursos (alumno, curso) VALUES (3, 4);
