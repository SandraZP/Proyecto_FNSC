DROP DATABASE IF EXISTS bdci4;
CREATE DATABASE IF NOT EXISTS bdci4 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON bdci4.* TO 'userci4'@'localhost' IDENTIFIED BY 'passwordci4';

USE bdci4;

CREATE TABLE roles (
    id_rol INT(3) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(30) NOT NULL
)ENGINE=InnoDB;

-- ROLES 
-- -- 745 : ADMINISTRADOR
-- -- 125 : OPERADOR

INSERT INTO roles (id_rol, rol) VALUES
    (745, 'Administrador'),
	(125, 'Operador');
	
CREATE TABLE usuarios (
    estatus_usuario TINYINT(1) NULL DEFAULT 1 COMMENT '1-> Habilitado, -1-> Deshabilitado',
    id_usuario INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(50) NOT NULL,
    ap_usuario VARCHAR(50) NOT NULL,
    am_usuario VARCHAR(50) NULL,
    sexo_usuario TINYINT(1) NOT NULL COMMENT '0: Masculino 1:Femenino',
    email_usuario VARCHAR(70) NOT NULL,
    password_usuario VARCHAR(64) NOT NULL,
    imagen_usuario VARCHAR(100) DEFAULT NULL,
	id_rol INT(3) NOT NULL,
	FOREIGN KEY(id_rol) REFERENCES roles (id_rol) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

INSERT INTO usuarios (nombre_usuario, ap_usuario, am_usuario, sexo_usuario, email_usuario, password_usuario, imagen_usuario, id_rol) VALUES
    ('Administrador', 'Administrador', '', 0, 'admin@baseci4.com', SHA2('admin123',0), NULL, 745),
	('Operador', 'Operador', '', 0, 'operador@baseci4.com', SHA2('operador123',0), NULL, 125);


SELECT 
    usuarios.*,
    roles.*
FROM
    usuarios
INNER JOIN roles ON usuarios.id_rol = roles.id_rol
WHERE email_usuario = "admin@baseci4.com" AND password_usuario = SHA2("admin123",0);
	
-
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idalumno` int(11) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `grado` varchar(20) NOT NULL,
  `grupo` char(1) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `idAsignatura` int(11) NOT NULL,
  `asignatura` varchar(100) NOT NULL,
  `acronimo` varchar(45) NOT NULL,
  `creditos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `idcalificaciones` int(11) NOT NULL,
  `calificacion_a` int(11) NOT NULL,
  `calificacion_b` int(11) NOT NULL,
  `calificacion_c` varchar(45) NOT NULL,
  `calificacion_d` varchar(45) NOT NULL,
  `calificacion_final` varchar(45) NOT NULL,
  `idlista_alumnos` int(11) DEFAULT NULL,
  `idperiodo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga_horaria`
--

CREATE TABLE `carga_horaria` (
  `idcarga_horaria` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL,
  `idperiodo` int(11) NOT NULL,
  `fecha_asignacion` datetime NOT NULL,
  `ponderacion_parcial_a` int(11) NOT NULL,
  `ponderacion_parcial_b` int(11) DEFAULT NULL,
  `ponderacion_parcial_c` int(11) NOT NULL,
  `ponderacion_parcial_d` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `iddocente` int(11) NOT NULL,
  `numero_empleado` varchar(45) NOT NULL,
  `grado_estudios` varchar(100) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `idpe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_alumnos`
--

CREATE TABLE `lista_alumnos` (
  `idlista_alumnos` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `idalumno` int(11) NOT NULL,
  `iddocente` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `tipo_asistencia` tinyint(1) NOT NULL,
  `fecha_asistencia` date NOT NULL,
  `estatus_alumno` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `idperiodo` int(11) NOT NULL,
  `nombreperiodo` varchar(45) NOT NULL,
  `acronimo` varchar(45) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` varchar(45) NOT NULL,
  `estatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_educativo`
--

CREATE TABLE `programa_educativo` (
  `idpe` int(11) NOT NULL,
  `programa_educativo` varchar(100) NOT NULL,
  `acronimo` varchar(45) NOT NULL,
  `logo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idalumno`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`idAsignatura`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`idcalificaciones`),
  ADD KEY `idlista_alumnos` (`idlista_alumnos`),
  ADD KEY `idperiodo` (`idperiodo`);

--
-- Indices de la tabla `carga_horaria`
--
ALTER TABLE `carga_horaria`
  ADD PRIMARY KEY (`idcarga_horaria`),
  ADD KEY `idAsignatura` (`idAsignatura`),
  ADD KEY `iddocente` (`iddocente`),
  ADD KEY `idperiodo` (`idperiodo`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`iddocente`),
  ADD KEY `idusuario` (`id_usuario`),
  ADD KEY `idpe` (`idpe`);

--
-- Indices de la tabla `lista_alumnos`
--
ALTER TABLE `lista_alumnos`
  ADD PRIMARY KEY (`idlista_alumnos`),
  ADD KEY `idalumno` (`idalumno`),
  ADD KEY `iddocente` (`iddocente`),
  ADD KEY `idAsignatura` (`idAsignatura`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`idperiodo`);

--
-- Indices de la tabla `programa_educativo`
--
ALTER TABLE `programa_educativo`
  ADD PRIMARY KEY (`idpe`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idalumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `idAsignatura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `idcalificaciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carga_horaria`
--
ALTER TABLE `carga_horaria`
  MODIFY `idcarga_horaria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `iddocente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lista_alumnos`
--
ALTER TABLE `lista_alumnos`
  MODIFY `idlista_alumnos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `idperiodo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programa_educativo`
--
ALTER TABLE `programa_educativo`
  MODIFY `idpe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=746;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`idlista_alumnos`) REFERENCES `lista_alumnos` (`idlista_alumnos`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`idperiodo`) REFERENCES `periodo` (`idperiodo`);

--
-- Filtros para la tabla `carga_horaria`
--
ALTER TABLE `carga_horaria`
  ADD CONSTRAINT `carga_horaria_ibfk_1` FOREIGN KEY (`idAsignatura`) REFERENCES `asignatura` (`idAsignatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carga_horaria_ibfk_2` FOREIGN KEY (`iddocente`) REFERENCES `docente` (`iddocente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carga_horaria_ibfk_3` FOREIGN KEY (`idperiodo`) REFERENCES `periodo` (`idperiodo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista_alumnos`
--
ALTER TABLE `lista_alumnos`
  ADD CONSTRAINT `lista_alumnos_ibfk_1` FOREIGN KEY (`idalumno`) REFERENCES `alumno` (`idalumno`),
  ADD CONSTRAINT `lista_alumnos_ibfk_2` FOREIGN KEY (`iddocente`) REFERENCES `docente` (`iddocente`),
  ADD CONSTRAINT `lista_alumnos_ibfk_3` FOREIGN KEY (`idAsignatura`) REFERENCES `asignatura` (`idAsignatura`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
