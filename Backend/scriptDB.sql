CREATE DATABASE proyecto_autorecord CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE Proyecto_AutoRecord;

CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    nombre_completo VARCHAR(100) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, -- Se guardará hasheada en PHP
    rol ENUM('admin', 'checador', 'chofer') NOT NULL,
    unidad_asignada VARCHAR(20), -- Solo para choferes
    estado ENUM('activo', 'inactivo') DEFAULT 'activo',
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE unidades (
    id_unidad INT PRIMARY KEY AUTO_INCREMENT,
    clave_unidad VARCHAR(20) UNIQUE NOT NULL, -- Ej. TP-482
    modelo VARCHAR(50),
    capacidad INT,
    estado ENUM('operativa', 'mantenimiento', 'fuera_de_servicio') DEFAULT 'operativa',
    ultima_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE rutas (
    id_ruta INT PRIMARY KEY AUTO_INCREMENT,
    nombre_ruta VARCHAR(100) NOT NULL, -- Ej. "Ruta 5 - Centro"
    paradas TEXT, -- JSON o texto separado por comas
    activa BOOLEAN DEFAULT TRUE
);

CREATE TABLE asistencias (
    id_asistencia INT PRIMARY KEY AUTO_INCREMENT,
    id_chofer INT NOT NULL,
    id_unidad INT,
    id_ruta INT,
    tipo_registro ENUM('entrada', 'salida') NOT NULL,
    hora_registro TIME,
    fecha DATE DEFAULT (CURRENT_DATE),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_chofer) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_unidad) REFERENCES unidades(id_unidad),
    FOREIGN KEY (id_ruta) REFERENCES rutas(id_ruta)
);

CREATE TABLE incidencias (
    id_incidencia INT PRIMARY KEY AUTO_INCREMENT,
    id_chofer INT NOT NULL,
    id_unidad INT,
    tipo ENUM('falla_mecanica', 'accidente', 'trafico', 'otro') NOT NULL,
    descripcion TEXT NOT NULL,
    ubicacion VARCHAR(255),
    estado ENUM('reportada', 'en_proceso', 'resuelta') DEFAULT 'reportada',
    fecha_reporte TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_chofer) REFERENCES usuarios(id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (id_unidad) REFERENCES unidades(id_unidad)
);

CREATE TABLE descargas (
    id_descarga INT PRIMARY KEY AUTO_INCREMENT,
    tipo_dispositivo ENUM('escritorio', 'movil') NOT NULL,
    ip_usuario VARCHAR(45), -- Para evitar múltiples registros del mismo usuario
    fecha_descarga TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE estadisticas_descargas (
    fecha DATE PRIMARY KEY,
    total_escritorio INT DEFAULT 0,
    total_movil INT DEFAULT 0,
    total_general INT DEFAULT 0
);