CREATE DATABASE IF NOT EXISTS peluqueria_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE peluqueria_db;

-- =========================
-- Tabla: peluqueros
-- =========================

CREATE TABLE peluqueros (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(100) NOT NULL,
sexo CHAR(1) NOT NULL,
edad INT NOT NULL,
correo VARCHAR(100) NOT NULL
);

-- =========================
-- Tabla: turnos
-- =========================

CREATE TABLE turnos (
id INT AUTO_INCREMENT PRIMARY KEY,
fecha_inicio DATETIME NOT NULL,
fecha_fin DATETIME NOT NULL,
id_peluquero INT NOT NULL,
cliente_contacto VARCHAR(150) NOT NULL,
estado VARCHAR(50) NOT NULL DEFAULT 'ocupado',

CONSTRAINT fk_turnos_peluquero
    FOREIGN KEY (id_peluquero)
    REFERENCES peluqueros(id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE

);

-- =========================
-- Datos de ejemplo
-- =========================

INSERT INTO peluqueros (
nombre,
sexo,
edad,
correo
) VALUES
('Juan Pérez', 'M', 32, '[juan@peluqueria.com](mailto:juan@peluqueria.com)'),
('María Gómez', 'F', 28, '[maria@peluqueria.com](mailto:maria@peluqueria.com)'),
('Carlos Rodríguez', 'M', 40, '[carlos@peluqueria.com](mailto:carlos@peluqueria.com)');

-- Turnos de ejemplo

INSERT INTO turnos (
fecha_inicio,
fecha_fin,
id_peluquero,
cliente_contacto,
estado
) VALUES
(
'2026-06-15 10:00:00',
'2026-06-15 11:00:00',
1,
'[cliente1@email.com](mailto:cliente1@email.com)',
'ocupado'
),
(
'2026-06-16 09:00:00',
'2026-06-16 10:00:00',
2,
'1123456789',
'ocupado'
);
