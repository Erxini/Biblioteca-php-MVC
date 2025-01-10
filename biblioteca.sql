-- Crear la base de datos
CREATE DATABASE biblioteca;

USE biblioteca;

-- Tabla usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    ape1 VARCHAR(50),
    ape2 VARCHAR(50),
    rol ENUM('registrado', 'administrador'),
    clave VARCHAR(255) NOT NULL
);

-- Tabla libros
CREATE TABLE libros (
    ISBN VARCHAR(13) PRIMARY KEY,
    titulo VARCHAR(100),
    autor VARCHAR(100)
    portada VARCHAR(255),
);

-- Tabla prestamos
CREATE TABLE prestamos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ISBN VARCHAR(13),
    id_usuario INT,
    fecha_desde DATE,
    fecha_hasta DATE,
    FOREIGN KEY (ISBN) REFERENCES libros(ISBN),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- Datos iniciales
INSERT INTO usuarios (nombre, ape1, ape2, rol, clave) VALUES
('admin', 'admin', 'admin', 'administrador', 'admin123'),
('Sergio', 'Rueda', 'Gonzalez', 'registrado','sergio123'),
('Marta', 'Alonso', 'Talavera', 'registrado','marta123');

