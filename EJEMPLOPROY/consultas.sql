CREATE TABLE usuario (
	id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(120) NOT NULL,
	correo VARCHAR(120) NOT NULL UNIQUE
)


--- Insertando información
INSERT INTO usuario (id_usuario, nombre, correo, password, especialidad, telefono) VALUES (1, 'Eduardo', 'ecalderon@solsoft.com.mx', MD5('hola'), 'Administrador', 'S/N')

INSERT INTO propietario (nombre, correo, direccion, telefono) VALUES ('Sandra López', 'sandra.lopez@mail.com', 'Calle Falsa 123', '5524658255')


INSERT INTO propietario (nombre, correo, direccion, telefono) VALUES ('Ricardo Rodríguez', 'ricardo.ro@mail.com', 'Av. Inexistente 4528', NULL)

--- Actualizando información
UPDATE propietario SET nombre = 'Sandra López C.', telefono = '5524577889',
direccion = '', correo = '' WHERE id_propietario = 1

--- Borrando información
DELETE FROM propietario WHERE id_propietario = 3

--- Seleccionando información
SELECT * FROM mascota

SELECT * FROM mascota WHERE id_especie = 2 AND (id_propietario = 1 OR nombre LIKE '%fido%')

SELECT *
FROM mascota
JOIN especie ON mascota.id_especie = especie.id_especie
JOIN propietario ON mascota.id_propietario = propietario.id_propietario


SELECT mascota.nombre nombre_mascota, especie.nombre nombre_especie, propietario.nombre nombre_propuetario
FROM mascota
JOIN especie ON mascota.id_especie = especie.id_especie
JOIN propietario ON mascota.id_propietario = propietario.id_propietario

SELECT m.nombre nombre_mascota, m.fecha_nacimiento, m.observaciones, e.nombre nombre_especie, p.nombre nombre_propietario, p.correo
FROM mascota m
JOIN especie e ON m.id_especie = e.id_especie
JOIN propietario p ON m.id_propietario = p.id_propietario
WHERE p.nombre LIKE '%sand%' OR m.observaciones LIKE '%marron%' OR m.id_especie = 1