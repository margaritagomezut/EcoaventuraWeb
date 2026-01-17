DROP DATABASE IF EXISTS ecoaventura;
CREATE DATABASE ecoaventura CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE ecoaventura;

CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    correo VARCHAR(40) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol ENUM('admin', 'turista', 'hotelero', 'restaurantero') NOT NULL,
    activo BOOLEAN DEFAULT TRUE
) ENGINE=InnoDB;

CREATE TABLE turista (
    id_turista INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(25) NOT NULL,
    apaterno VARCHAR(25) NOT NULL,
    amaterno VARCHAR(25) NOT NULL,
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE hotelero (
    id_hotelero INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(25) NOT NULL,
    apaterno VARCHAR(25) NOT NULL,
    amaterno VARCHAR(25),
    telefono VARCHAR(10),
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE restaurantero (
    id_restaurantero INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(25) NOT NULL,
    apaterno VARCHAR(25) NOT NULL,
    amaterno VARCHAR(25),
    telefono VARCHAR(10),
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE sitio (
    id_sitio INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45) NOT NULL,
    descripcion TEXT NOT NULL,
    direccion VARCHAR(50),
    horario VARCHAR(30),
    telefono VARCHAR(10),
    categoria ENUM('Balneario','Ecoturistico','Turistico'),
    comunidad VARCHAR(25),
    ciudad VARCHAR(25),
    costo DECIMAL(8,2),
    foto VARCHAR(100)
);

CREATE TABLE hotel (
    id_hotel INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45) NOT NULL,
    descripcion TEXT,
    direccion VARCHAR(50),
    telefono VARCHAR(10),
    fotos VARCHAR(100),
    id_hotelero INT,
    FOREIGN KEY (id_hotelero) REFERENCES hotelero(id_hotelero)
);

CREATE TABLE habitacion (
    id_habitacion INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(25),
    descripcion TEXT,
    precio DECIMAL(8,2),
    id_hotel INT NOT NULL,
    FOREIGN KEY (id_hotel) REFERENCES hotel(id_hotel)
);

CREATE TABLE reserva_hotel (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    fecha_inicio DATE,
    fecha_fin DATE,
    estado ENUM('pendiente','confirmada','cancelada'),
    id_turista INT,
    id_habitacion INT,
    FOREIGN KEY (id_turista) REFERENCES turista(id_turista),
    FOREIGN KEY (id_habitacion) REFERENCES habitacion(id_habitacion)
);

CREATE TABLE pago_externo (
    id_pago INT AUTO_INCREMENT PRIMARY KEY,
    referencia_pago VARCHAR(100),
    estado ENUM('pendiente','pagado'),
    id_reserva INT,
    FOREIGN KEY (id_reserva) REFERENCES reserva_hotel(id_reserva)
);

CREATE TABLE restaurante (
    id_restaurante INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    descripcion TEXT,
    direccion VARCHAR(50),
    telefono VARCHAR(10),
    fotos_menu VARCHAR(255),
    id_restaurantero INT,
    FOREIGN KEY (id_restaurantero) REFERENCES restaurantero(id_restaurantero)
);

CREATE TABLE comentario (
    id_comentario INT AUTO_INCREMENT PRIMARY KEY,
    comentario TEXT NOT NULL,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    tipo ENUM('sitio','hotel','restaurante','pagina') NOT NULL,
    id_referencia INT NULL,
    id_turista INT NOT NULL,
    FOREIGN KEY (id_turista) REFERENCES turista(id_turista)
);

