CREATE DATABASE  serie_db;
USE serie_db;

CREATE TABLE personajes (
  id INT IDENTITY(1,1) PRIMARY KEY,
  nombre NVARCHAR(100) NOT NULL,
  color NVARCHAR(50),
  tipo NVARCHAR(50),
  nivel INT,
  foto NVARCHAR(255)
);

INSERT INTO personajes (nombre, color, tipo, nivel, foto) VALUES
('Nightwing', 'Azul Oscuro', 'Líder', 9, 'img/nightwing.jpg'),
('Superboy', 'Rojo', 'Kryptoniano', 8, 'img/superboy.jpg'),
('Miss Martian', 'Verde', 'Marciana Blanca', 8, 'img/missmartian.jpg'),
('Kid Flash', 'Amarillo', 'Velocista', 7, 'img/kidflash.jpg');
