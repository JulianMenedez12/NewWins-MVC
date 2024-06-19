
-- Crear la tabla "categorias"
CREATE TABLE categorias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  descripcion TEXT NOT NULL,
  imagen VARCHAR(255)
);

-- Crear la tabla "autores"
CREATE TABLE autores (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  foto_perfil VARCHAR(255) NOT NULL,
  biografia TEXT NOT NULL
);

-- Crear la tabla "articulos"
CREATE TABLE articulos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  fecha_publicacion DATE NOT NULL,
  contenido TEXT NOT NULL,
  url VARCHAR(255) NOT NULL,
  categoria_id INT NOT NULL,
  CONSTRAINT fk_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

-- Crear la tabla "articulos_autores"
CREATE TABLE articulos_autores (
  articulo_id INT NOT NULL,
  autor_id INT NOT NULL,
  PRIMARY KEY (articulo_id, autor_id),
  CONSTRAINT fk_articulo FOREIGN KEY (articulo_id) REFERENCES articulos(id) ON DELETE CASCADE,
  CONSTRAINT fk_autor FOREIGN KEY (autor_id) REFERENCES autores(id) ON DELETE CASCADE
);

-- Crear la tabla "comentarios"
CREATE TABLE comentarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL,
  fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  texto TEXT NOT NULL,
  puntuacion INT NOT NULL,
  articulo_id INT NOT NULL,
  CONSTRAINT fk_comentario_articulo FOREIGN KEY (articulo_id) REFERENCES articulos(id) ON DELETE CASCADE
);

-- Crear la tabla "usuarios_registrados"
CREATE TABLE usuarios_registrados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre_usuario VARCHAR(50) NOT NULL,
  contrasena VARCHAR(255) NOT NULL,
  correo_electronico VARCHAR(100) NOT NULL,
  nombre VARCHAR(50),
  foto_perfil VARCHAR(255),
  ubicacion VARCHAR(100),
  CONSTRAINT unique_nombre_usuario UNIQUE (nombre_usuario),
  CONSTRAINT unique_correo_electronico UNIQUE (correo_electronico)
);
ALTER TABLE usuarios_registrados
ADD apellido varchar(30) not null;
-- Crear la tabla "imagenes_multimedia"
CREATE TABLE imagenes_multimedia (
  id INT AUTO_INCREMENT PRIMARY KEY,
  url VARCHAR(255) NOT NULL,
  articulo_id INT NOT NULL,
  CONSTRAINT fk_imagen_articulo FOREIGN KEY (articulo_id) REFERENCES articulos(id) ON DELETE CASCADE
);

-- Crear la tabla "etiquetas"
CREATE TABLE etiquetas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  descripcion TEXT,
  CONSTRAINT unique_nombre_etiqueta UNIQUE (nombre)
);

-- Crear la tabla "articulos_etiquetas"
CREATE TABLE articulos_etiquetas (
  articulo_id INT NOT NULL,
  etiqueta_id INT NOT NULL,
  PRIMARY KEY (articulo_id, etiqueta_id),
  CONSTRAINT fk_articulo_etiqueta FOREIGN KEY (articulo_id) REFERENCES articulos(id) ON DELETE CASCADE,
  CONSTRAINT fk_etiqueta_articulo FOREIGN KEY (etiqueta_id) REFERENCES etiquetas(id) ON DELETE CASCADE
);

-- Crear la tabla "eventos"
CREATE TABLE eventos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fecha DATE NOT NULL,
  titulo VARCHAR(255) NOT NULL,
  descripcion TEXT
);

-- Crear la tabla "articulos_eventos"
CREATE TABLE articulos_eventos (
  articulo_id INT NOT NULL,
  evento_id INT NOT NULL,
  PRIMARY KEY (articulo_id, evento_id),
  CONSTRAINT fk_articulo_evento FOREIGN KEY (articulo_id) REFERENCES articulos(id) ON DELETE CASCADE,
  CONSTRAINT fk_evento_articulo FOREIGN KEY (evento_id) REFERENCES eventos(id) ON DELETE CASCADE
);

-- Crear la tabla "publicidad"
CREATE TABLE publicidad (
  id INT AUTO_INCREMENT PRIMARY KEY,
  anunciante VARCHAR(50) NOT NULL,
  banner VARCHAR(255) NOT NULL,
  campana TEXT
);

-- Crear la tabla "suscripciones"
CREATE TABLE suscripciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  categoria_id INT NOT NULL,
  CONSTRAINT fk_suscripcion_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios_registrados(id) ON DELETE CASCADE,
  CONSTRAINT fk_suscripcion_categoria FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE CASCADE
);

-- Crear la tabla "boletines"
CREATE TABLE boletines (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255) NOT NULL,
  contenido TEXT NOT NULL,
  fecha_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla "boletines_usuarios"
CREATE TABLE boletines_usuarios (
  boletin_id INT NOT NULL,
  usuario_id INT NOT NULL,
  PRIMARY KEY (boletin_id, usuario_id),
  CONSTRAINT fk_boletin_usuario FOREIGN KEY (boletin_id) REFERENCES boletines(id) ON DELETE CASCADE,
  CONSTRAINT fk_usuario_boletin FOREIGN KEY (usuario_id) REFERENCES usuarios_registrados(id) ON DELETE CASCADE
);

-- Crear la tabla "historial_edicion"
CREATE TABLE historial_edicion (
  id INT AUTO_INCREMENT PRIMARY KEY,
  articulo_id INT NOT NULL,
  fecha_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  cambio TEXT NOT NULL,
  CONSTRAINT fk_historial_articulo FOREIGN KEY (articulo_id) REFERENCES articulos(id) ON DELETE CASCADE
);
select * from categorias;
select * from usuarios_registrados;


