CREATE DATABASE proyecto_mvc;
USE proyecto_mvc;

CREATE TABLE productos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    marca VARCHAR(100) NOT NULL,
    costo FLOAT(10,2) NOT NULL,
    precio FLOAT(10, 2) NOT NULL,
    cantidad INT NOT NULL,
    imagen VARCHAR(100) NOT NULL DEFAULT 'imagen.jpg',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  
);
INSERT INTO productos (nombre, marca, costo, precio, cantidad)
VALUES
    ('Laptop', 'Dell', 50.00, 75.00, 100),
    ('Smartphone', 'Samsung', 30.00, 45.00, 50),
    ('Tablet', 'Samsung', 20.00, 35.00, 80),
    -- Agrega más registros aquí según tus necesidades
    ('Monitor', 'hp', 40.00, 60.00, 70),
    ('Teclado', 'hp', 25.00, 40.00, 90),
    ('Raton', 'Marca Z', 15.00, 28.00, 120),
    ('Impresora', 'Marca X', 55.00, 80.00, 60),
    ('Auriculares', 'Marca Y', 28.00, 42.00, 70),
    ('Camara', 'Marca Z', 18.00, 32.00, 110),
    ('Altavoces', 'Marca X', 48.00, 70.00, 85);