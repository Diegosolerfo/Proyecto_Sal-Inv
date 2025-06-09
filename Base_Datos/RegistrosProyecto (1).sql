use Ventas_Inventario;
/*Insercion de la tabla Usuario*/
INSERT INTO Usuario (Numero_documento, Clave, Nombre, Apellido, Correo, Fecha_nacimiento, Direccion, Genero, Telefono, Estado_Cuenta, Rol, EPS, RH, Tipo_sangre) VALUES
(12345678901, 'clave123', 'Juan', 'Pérez', 'juan.perez@mail.com', '1990-01-01', 'Calle 1 # 23-45', 'Hombre', 3101234567, 'Activo', 'Cliente', 'EPS Salud', '+', 'O'),
(23456789012, 'clave456', 'María', 'Gómez', 'maria.gomez@mail.com', '1985-02-15', 'Calle 2 # 34-56', 'Mujer', 3112345678, 'Activo', 'Operador', 'EPS Bienestar', '-', 'A'),
(34567890123, 'clave789', 'Luis', 'Martínez', 'luis.martinez@mail.com', '1992-03-20', 'Calle 3 # 45-67', 'Hombre', 3123456789, 'Activo', 'Cliente', 'EPS Futuro', '+', 'AB'),
(45678901234, 'clave321', 'Ana', 'López', 'ana.lopez@mail.com', '1988-04-25', 'Calle 4 # 56-78', 'Mujer', 3134567890, 'Activo', 'Administrador', 'EPS Prosalud', '-', 'B'),
(56789012345, 'clave654', 'Carlos', 'Torres', 'carlos.torres@mail.com', '1995-05-30', 'Calle 5 # 67-89', 'Hombre', 3145678901, 'Activo', 'Cliente', 'EPS Sanitas', '+', 'O'),
(67890123456, 'clave987', 'Sofía', 'Hernández', 'sofia.hernandez@mail.com', '1982-06-05', 'Calle 6 # 78-90', 'Mujer', 3156789012, 'Activo', 'Operador', 'EPS Coomeva', '-', 'A'),
(78901234567, 'clave159', 'Andrés', 'Cruz', 'andres.cruz@mail.com', '1991-07-10', 'Calle 7 # 89-01', 'Hombre', 3167890123, 'Activo', 'Cliente', 'EPS Sura', '+', 'AB'),
(89012345678, 'clave753', 'Laura', 'Ramírez', 'laura.ramirez@mail.com', '1993-08-15', 'Calle 8 # 90-12', 'Mujer', 3178901234, 'Activo', 'Administrador', 'EPS Salud Total', '-', 'B'),
(90123456789, 'clave852', 'Felipe', 'Díaz', 'felipe.diaz@mail.com', '1987-09-20', 'Calle 9 # 01-23', 'Hombre', 3189012345, 'Activo', 'Cliente', 'EPS Nueva EPS', '+', 'O'),
(10123456701, 'clave963', 'Camila', 'Gutiérrez', 'camila.gutierrez@mail.com', '1990-10-25', 'Calle 10 # 12-34', 'Mujer', 3190123456, 'Activo', 'Operador', 'EPS Cafesalud', '-', 'A'),
(11123456712, 'clave147', 'Diego', 'Martín', 'diego.martin@mail.com', '1989-11-30', 'Calle 11 # 23-45', 'Hombre', 3201234567, 'Activo', 'Cliente', 'EPS EMDISALUD', '+', 'AB'),
(12123456723, 'clave258', 'Paola', 'Salazar', 'paola.salazar@mail.com', '1992-12-05', 'Calle 12 # 34-56', 'Mujer', 3212345678, 'Activo', 'Administrador', 'EPS Medicina Prepagada', '-', 'B'),
(13123456734, 'clave369', 'Javier', 'Hurtado', 'javier.hurtado@mail.com', '1986-01-10', 'Calle 13 # 45-67', 'Hombre', 3223456789, 'Activo', 'Cliente', 'EPS Asmet Salud', '+', 'O'),
(14123456745, 'clave789', 'Tatiana', 'Córdoba', 'tatiana.cordoba@mail.com', '1994-02-15', 'Calle 14 # 56-78', 'Mujer', 3234567890, 'Activo', 'Operador', 'EPS Famisanar', '-', 'A'),
(15123456756, 'clave456', 'Mauricio', 'Valencia', 'mauricio.valencia@mail.com', '1993-03-20', 'Calle 15 # 67-89', 'Hombre', 3245678901, 'Activo', 'Cliente', 'EPS Humana', '+', 'AB'),
(16123456767, 'clave654', 'Verónica', 'Ochoa', 'veronica.ochoa@mail.com', '1985-04-25', 'Calle 16 # 78-90', 'Mujer', 3256789012, 'Activo', 'Administrador', 'EPS Compensar', '-', 'B'),
(17123456778, 'clave321', 'Sergio', 'Marín', 'sergio.marin@mail.com', '1984-05-30', 'Calle 17 # 89-01', 'Hombre', 3267890123, 'Activo', 'Cliente', 'EPS Sanitas', '+', 'O'),
(1147484290, 'diego11', 'Diego', 'Soler', 'Diego.Soler@mail.com', '2005-07-11', 'Calle 18 # 90-12', 'Hombre', 3125565319, 'Activo', 'Administrador', 'EPS Compensar', '-', 'O');
select*from Usuario;
update usuario set rol = "Administrador" where id_usuario = 18;
/*Insercion de la tabla Inventario Herramienta*/
INSERT INTO Inventario_Herramienta (Nombre, Tipo_Herramienta, Cantidad, Imagen_Herramienta) VALUES
('Martillo', 'Herramienta de Mano', 50, NULL),
('Destornillador', 'Herramienta de Mano', 100, NULL),
('Taladro', 'Herramienta de Instalacion', 20, NULL),
('Sierra de Mesa', 'Herramienta de Taller', 10, NULL),
('Compresor de Aire', 'Herramienta de Taller', 5, NULL),
('Grapadora', 'Herramienta de Oficina', 30, NULL),
('Impresora 3D', 'Herramienta de Oficina', 2, NULL),
('Excavadora', 'Maquinaria pesada', 3, NULL),
('Llave Inglesa', 'Herramienta de Mano', 60, NULL),
('Soplete', 'Herramienta de Instalacion', 15, NULL),
('Sierra de Cinta', 'Herramienta de Taller', 8, NULL),
('Perforadora', 'Maquinaria pesada', 1, NULL),
('Compresor de Mano', 'Herramienta de Taller', 7, NULL),
('Escáner', 'Herramienta de Oficina', 4, NULL),
('Martillo Hidráulico', 'Maquinaria pesada', 2, NULL),
('Pala', 'Herramienta de Mano', 80, NULL),
('Cortadora Láser', 'Herramienta de Instalacion', 3, NULL),
('Torno', 'Herramienta de Taller', 5, NULL),
('Calculadora Científica', 'Herramienta de Oficina', 50, NULL),
('Grúa', 'Maquinaria pesada', 1, NULL);
select*from Inventario_Herramienta;

/*Insercion de la tabla Inventario Material*/
INSERT INTO Inventario_Material (Fecha_Registro, Cantidad, Nombre, Descripcion, Fecha_Compra, Valor_Unidad, Valor_Total, Imagen_Material, Codigo_Usuario) VALUES
('2024-08-01', 100, 'Madera de pino', 'Madera tratada para construcción', '2024-07-25', 1500, 150000, NULL, 1),
('2024-08-02', 50, 'Clavos de acero', 'Clavos de 3 pulgadas para carpintería', '2024-07-20', 50, 2500, NULL, 2),
('2024-08-03', 200, 'Tornillos', 'Tornillos de 2 pulgadas para ensamblaje', '2024-07-22', 30, 6000, NULL, 3),
('2024-08-04', 30, 'Barniz', 'Barniz transparente para madera', '2024-07-23', 5000, 150000, NULL, 4),
('2024-08-05', 1000, 'Láminas de aluminio', 'Láminas para techos', '2024-07-18', 1000, 1000000, NULL, 5),
('2024-08-06', 80, 'Cemento', 'Cemento gris para construcción', '2024-07-19', 10000, 800000, NULL, 6),
('2024-08-07', 60, 'Pintura acrílica', 'Pintura blanca para interiores', '2024-07-21', 15000, 900000, NULL, 7),
('2024-08-08', 120, 'Ladrillos', 'Ladrillos de construcción', '2024-07-24', 300, 36000, NULL, 8),
('2024-08-09', 75, 'Placas de yeso', 'Placas de yeso para paredes interiores', '2024-07-26', 2000, 150000, NULL, 9),
('2024-08-10', 50, 'Tubos de PVC', 'Tubos de PVC para plomería', '2024-07-27', 500, 25000, NULL, 10),
('2024-08-11', 90, 'Paneles solares', 'Paneles para energía solar', '2024-07-28', 30000, 2700000, NULL, 1),
('2024-08-12', 150, 'Cable eléctrico', 'Cable de cobre para instalaciones', '2024-07-29', 1000, 150000, NULL, 2),
('2024-08-13', 20, 'Ventanas de aluminio', 'Ventanas para edificaciones', '2024-07-30', 120000, 2400000, NULL, 3),
('2024-08-14', 5, 'Puertas de madera', 'Puertas para interiores', '2024-07-31', 80000, 400000, NULL, 4),
('2024-08-15', 100, 'Grava', 'Grava para mezcla de concreto', '2024-07-15', 1500, 150000, NULL, 5),
('2024-08-16', 60, 'Hormigón premezclado', 'Hormigón para estructuras', '2024-07-16', 18000, 1080000, NULL, 6),
('2024-08-17', 40, 'Arenilla fina', 'Arenilla para acabado', '2024-07-17', 250, 10000, NULL, 7),
('2024-08-18', 80, 'Vigas de acero', 'Vigas para soportes', '2024-07-14', 12000, 960000, NULL, 8),
('2024-08-19', 150, 'Azulejos cerámicos', 'Azulejos para pisos y paredes', '2024-07-13', 800, 120000, NULL, 9),
('2024-08-20', 10, 'Fibras de vidrio', 'Fibras para refuerzo de concreto', '2024-07-12', 20000, 200000, NULL, 10);
select*from Inventario_Material;

/*Insercion de la tabla Producto*/
INSERT INTO Producto (Nombre, Precio, Descripcion, Especificacion, Codigo_Usuario) VALUES
('Laptop Dell', 1500000, 'Laptop con 16GB RAM y 512GB SSD', 'Color negro, pantalla 15 pulgadas', 1),
('Teléfono Samsung Galaxy', 1200000, 'Smartphone con 8GB RAM y 128GB almacenamiento', 'Color azul, pantalla 6.4 pulgadas', 2),
('Silla Ergonomica', 250000, 'Silla de oficina ergonómica con soporte lumbar', 'Material de malla, ajustable', 3),
('Monitor LG', 800000, 'Monitor 24 pulgadas Full HD', 'Pantalla LED, resolución 1080p', 4),
('Teclado Mecánico', 150000, 'Teclado mecánico con retroiluminación RGB', 'Interruptores Cherry MX Red', 5),
('Mouse Inalámbrico', 80000, 'Mouse inalámbrico con 3 botones', NULL, 6),
('Impresora Multifunción', 400000, 'Impresora todo en uno con escáner y copiadora', 'Conectividad Wi-Fi y USB', 7),
('Cámara DSLR', 2500000, 'Cámara DSLR con lente 18-55mm', 'Resolución de 24MP, grabación 4K', 8),
('Auriculares Bluetooth', 120000, 'Auriculares inalámbricos con cancelación de ruido', 'Color negro', 9),
('Tablet iPad', 2000000, 'iPad de 10.2 pulgadas con 128GB', 'Soporte para Apple Pencil', 10),
('Altavoz Inteligente', 300000, 'Altavoz con asistente de voz integrado', 'Conectividad Wi-Fi y Bluetooth', 1),
('Smartwatch', 500000, 'Reloj inteligente con monitor de actividad', 'Resistencia al agua, GPS integrado', 2),
('Televisor 4K', 3500000, 'Televisor 55 pulgadas con resolución 4K UHD', 'Pantalla LED, HDR10', 3),
('Consola de Videojuegos', 1800000, 'Consola de videojuegos con 1TB almacenamiento', 'Soporte para 4K HDR', 4),
('Barra de Sonido', 600000, 'Barra de sonido con subwoofer inalámbrico', 'Conectividad Bluetooth y HDMI', 5),
('Microondas', 300000, 'Microondas de 20 litros con grill', 'Descongelación automática', 6),
('Aspiradora Robot', 1000000, 'Aspiradora robot con mapeo inteligente', 'Control mediante app', 7),
('Refrigerador Samsung', 2500000, 'Refrigerador de doble puerta con congelador', 'Capacidad de 500 litros, color plateado', 8),
('Cafetera Expreso', 450000, 'Cafetera expreso con espumador de leche', 'Tanque de agua removible', 9),
('Plancha a Vapor', 120000, 'Plancha a vapor con suela antiadherente', 'Función de autolimpieza', 10);
select*from Producto;

/*Insercion de la tabla Pedido*/
INSERT INTO Pedido (Especificacion, Abono, Fecha_Solicitud, Fecha_Entrega, Codigo_Usuario) VALUES
('Pedido de 10 mesas de roble', 500000, '2024-08-01', '2024-08-10', 1),
('Sillas de oficina ergonómicas', 300000, '2024-08-02', '2024-08-12', 2),
(NULL, 200000, '2024-08-03', NULL, 3),
('Laptops para equipo de desarrollo', 1500000, '2024-08-04', '2024-08-14', 4),
('Refrigeradores para la oficina', 250000, '2024-08-05', '2024-08-15', 5),
('Impresoras multifunción', 400000, '2024-08-06', '2024-08-16', 6),
('Mesas de reunión grandes', 0, '2024-08-07', '2024-08-17', 7),
('Monitores de 24 pulgadas', 800000, '2024-08-08', '2024-08-18', 8),
('Altavoces de conferencia', NULL, '2024-08-09', '2024-08-19', 9),
('Proyectores para salas de reunión', 1200000, '2024-08-10', '2024-08-20', 10),
('Paneles solares para el edificio', 5000000, '2024-08-11', '2024-08-21', 1),
('Cámaras de seguridad', 700000, '2024-08-12', '2024-08-22', 2),
('Pizarras interactivas', 300000, '2024-08-13', '2024-08-23', 3),
('Mobiliario para área de recepción', 800000, '2024-08-14', '2024-08-24', 4),
('Plantas decorativas para oficina', NULL, '2024-08-15', NULL, 5),
('Máquinas de café para la cocina', 250000, '2024-08-16', '2024-08-25', 6),
('Muebles modulares para despachos', 1200000, '2024-08-17', '2024-08-26', 7),
('Equipos de videoconferencia', 1500000, '2024-08-18', '2024-08-27', 8),
('Software de gestión de proyectos', NULL, '2024-08-19', '2024-08-28', 9),
('Estantes para almacenamiento', 200000, '2024-08-20', '2024-08-29', 10);
select*from Pedido;


/*Insercion de la tabla Detalles Crea*/
INSERT INTO Detalles_Crea (Codigo_Producto, Codigo_Inventario_M, Salida, Fecha_Salida, Total_Inventario) VALUES
(1, 1, 10, '2024-08-01', 90),
(2, 2, 20, '2024-08-02', 30),
(3, 3, 15, '2024-08-03', 85),
(4, 4, 25, '2024-08-04', 75),
(5, 5, 5, '2024-08-05', 95),
(6, 6, 12, '2024-08-06', 88),
(7, 7, 8, '2024-08-07', 92),
(8, 8, 18, '2024-08-08', 82),
(9, 9, 6, '2024-08-09', 94),
(10, 10, 30, '2024-08-10', 70),
(1, 2, 25, '2024-08-11', 65),
(2, 3, 10, '2024-08-12', 75),
(3, 4, 20, '2024-08-13', 65),
(4, 5, 15, '2024-08-14', 60),
(5, 6, 8, '2024-08-15', 87),
(6, 7, 14, '2024-08-16', 74),
(7, 8, 7, '2024-08-17', 85),
(8, 9, 12, '2024-08-18', 80),
(9, 10, 5, '2024-08-19', 90),
(10, 1, 22, '2024-08-20', 48);
select*from Detalles_Crea;

/*Insercion de la tabla Detalles Utiliza*/
INSERT INTO Detalles_Utiliza (Codigo_Usuario, Codigo_Inventario_H, Salida, Fecha_Salida, Fecha_Llegada) VALUES
(1, 1, 5, '2024-08-01', '2024-08-10'),
(2, 2, 3, '2024-08-02', '2024-08-12'),
(3, 3, 7, '2024-08-03', '2024-08-15'),
(4, 4, 2, '2024-08-04', '2024-08-14'),
(5, 5, 10, '2024-08-05', NULL),
(6, 6, 4, '2024-08-06', '2024-08-20'),
(7, 7, 8, '2024-08-07', '2024-08-22'),
(8, 8, 6, '2024-08-08', '2024-08-25'),
(9, 9, 9, '2024-08-09', NULL),
(10, 10, 1, '2024-08-10', '2024-08-30'),
(1, 2, 4, '2024-08-11', '2024-08-20'),
(2, 3, 2, '2024-08-12', '2024-08-22'),
(3, 4, 5, '2024-08-13', NULL),
(4, 5, 8, '2024-08-14', '2024-08-24'),
(5, 6, 3, '2024-08-15', '2024-08-27'),
(6, 7, 6, '2024-08-16', NULL),
(7, 8, 7, '2024-08-17', '2024-08-28'),
(8, 9, 9, '2024-08-18', '2024-08-29'),
(9, 10, 2, '2024-08-19', NULL),
(10, 1, 5, '2024-08-20', '2024-08-31');
select*from Detalles_Utiliza;

/*Insercion de la tabla Destalles Genera*/
INSERT INTO Detalles_Genera (Codigo_Producto, Codigo_Pedido, Especificacion1, Especificacion2, Especificacion3, Especificacion4, Especificacion5, Especificacion6, Especificacion7, Especificacion8, Especificacion9, Especificacion10) 
VALUES 
(1, 1, 'Color: Blanco', 'Tamaño: Grande', 'Material: Madera', NULL, NULL, NULL, NULL, NULL, NULL, NULL), 
(2, 2, 'Color: Negro', 'Tamaño: Mediano', 'Material: Metal', NULL, NULL, NULL, NULL, NULL, NULL, NULL), 
(3, 3, 'Color: Gris', 'Tamaño: Pequeño', 'Material: Plástico', NULL, NULL, NULL, NULL, NULL, NULL, NULL), 
(4, 4, 'Color: Azul', 'Tamaño: Grande', 'Material: Tela', 'Tipo: Deportivo', NULL, NULL, NULL, NULL, NULL, NULL), 
(5, 5, 'Color: Marrón', 'Tamaño: Mediano', 'Material: Madera', 'Tipo: Rústico', NULL, NULL, NULL, NULL, NULL, NULL), 
(6, 6, 'Color: Rojo', 'Tamaño: Grande', 'Material: Metal', 'Tipo: Industrial', NULL, NULL, NULL, NULL, NULL, NULL), 
(7, 7, 'Color: Blanco', 'Tamaño: Mediano', 'Material: Cerámica', 'Tipo: Elegante', NULL, NULL, NULL, NULL, NULL, NULL), 
(8, 8, 'Color: Verde', 'Tamaño: Pequeño', 'Material: Plástico', 'Tipo: Compacto', NULL, NULL, NULL, NULL, NULL, NULL), 
(9, 9, 'Color: Amarillo', 'Tamaño: Grande', 'Material: Madera', 'Tipo: Clásico', NULL, NULL, NULL, NULL, NULL, NULL), 
(10, 10, 'Color: Naranja', 'Tamaño: Mediano', 'Material: Metal', 'Tipo: Moderno', NULL, NULL, NULL, NULL, NULL, NULL), 
(11, 11, 'Color: Blanco', 'Tamaño: Grande', 'Material: Tela', 'Tipo: Casual', NULL, NULL, NULL, NULL, NULL, NULL), 
(12, 12, 'Color: Gris', 'Tamaño: Mediano', 'Material: Madera', 'Tipo: Contemporáneo', NULL, NULL, NULL, NULL, NULL, NULL), 
(13, 13, 'Color: Azul', 'Tamaño: Pequeño', 'Material: Plástico', 'Tipo: Deportivo', NULL, NULL, NULL, NULL, NULL, NULL), 
(14, 14, 'Color: Verde', 'Tamaño: Grande', 'Material: Cerámica', 'Tipo: Decorativo', NULL, NULL, NULL, NULL, NULL, NULL), 
(15, 15, 'Color: Rojo', 'Tamaño: Mediano', 'Material: Metal', 'Tipo: Industrial', NULL, NULL, NULL, NULL, NULL, NULL), 
(16, 16, 'Color: Marrón', 'Tamaño: Pequeño', 'Material: Madera', 'Tipo: Rústico', NULL, NULL, NULL, NULL, NULL, NULL), 
(17, 17, 'Color: Amarillo', 'Tamaño: Grande', 'Material: Tela', 'Tipo: Elegante', NULL, NULL, NULL, NULL, NULL, NULL), 
(18, 18, 'Color: Naranja', 'Tamaño: Mediano', 'Material: Plástico', 'Tipo: Compacto', NULL, NULL, NULL, NULL, NULL, NULL), 
(19, 19, 'Color: Gris', 'Tamaño: Grande', 'Material: Metal', 'Tipo: Moderno', NULL, NULL, NULL, NULL, NULL, NULL), 
(20, 20, 'Color: Blanco', 'Tamaño: Pequeño', 'Material: Cerámica', 'Tipo: Decorativo', NULL, NULL, NULL, NULL, NULL, NULL);
select*from Detalles_Genera;

/*Insercion de la tabla Experiencia*/
INSERT INTO Experiencia(Codigo_Usuario, Nombre_Empresa, Fecha_Inicio, Fecha_Fin, Observacion, Telefono_empresa, Nombre_Contacto) VALUES
(1, 'Empresa A', '2022-01-01', '2023-06-30', 'Experiencia en ventas y gestión de proyectos.', 123456789, 'Juan Pérez'),
(2, 'Empresa B', '2021-03-15', NULL, 'Desarrollador de software en proyectos web.', 987654321, 'Ana Gómez'),
(3, 'Empresa C', '2020-07-01', '2022-12-31', 'Especialista en marketing digital.', NULL, 'Luis Rodríguez'),
(4, 'Empresa D', '2019-11-01', NULL, 'Responsable de atención al cliente y soporte técnico.', 456789123, 'María López'),
(5, 'Empresa E', '2022-05-01', '2024-01-31', 'Gestor de recursos humanos y formación.', NULL, 'Carlos Martínez'),
(6, 'Empresa F', '2018-01-01', '2022-08-31', 'Analista de datos y gestión de sistemas.', 321654987, 'Laura Fernández'),
(7, 'Empresa G', '2021-09-01', NULL, 'Consultor en estrategia empresarial.', NULL, 'Pedro Sánchez'),
(8, 'Empresa H', '2020-02-01', '2023-05-31', 'Coordinador de proyectos y eventos.', NULL, 'Sofia Morales'),
(9, 'Empresa I', '2019-06-01', NULL, 'Técnico en mantenimiento de equipos.', 654987321, 'Jorge Salazar'),
(10, 'Empresa J', '2023-02-01', NULL, 'Asistente administrativo y contable.', NULL, 'Isabel Vargas'),
(1, 'Empresa K', '2015-09-01', '2019-12-31', 'Analista de mercado y estudios de competencia.', 789123456, 'Andrés Ruiz'),
(2, 'Empresa L', '2018-06-01', '2021-05-31', 'Desarrollador de aplicaciones móviles.', NULL, 'Claudia Moreno'),
(3, 'Empresa M', '2017-01-01', '2020-08-31', 'Gerente de proyectos de tecnología.', 987123456, 'Ricardo Álvarez'),
(4, 'Empresa N', '2020-10-01', '2022-06-30', 'Supervisor de ventas y operaciones.', NULL, 'Elena Cruz'),
(5, 'Empresa O', '2019-04-01', '2022-11-30', 'Especialista en desarrollo de negocios.', 654321987, 'Felipe Arias'),
(6, 'Empresa P', '2015-03-01', '2019-12-31', 'Coordinador de soporte técnico y formación.', NULL, 'Verónica Castro'),
(7, 'Empresa Q', '2022-01-01', NULL, 'Estratega de ventas y crecimiento.', NULL, 'Diego Moreno'),
(8, 'Empresa R', '2019-07-01', '2022-04-30', 'Responsable de comunicación y relaciones públicas.', NULL, 'Gabriela Pinto'),
(9, 'Empresa S', '2018-08-01', '2020-10-31', 'Administrador de proyectos de IT.', 987654321, 'Mauricio Nieto'),
(10, 'Empresa T', '2021-03-01', NULL, 'Auxiliar administrativo y gestión de recursos.', NULL, 'Rosa Hernández');
select*from Experiencia;

/*Insercion de la tabla Certificado*/
INSERT INTO Certificado (Codigo_Usuario, Certificacion, Nombre_Certificado, Organizacion_Emisora, Fecha_Expedicion) VALUES
(1, 'blob_data_1', 'Certificación en Gestión de Proyectos', 'Organización A', '2023-01-15'),
(2, 'blob_data_2', 'Certificación en Desarrollo Web', 'Organización B', '2022-11-22'),
(3, 'blob_data_3', 'Certificación en Marketing Digital', 'Organización C', '2023-06-30'),
(4, 'blob_data_4', 'Certificación en Administración de Redes', 'Organización D', '2024-03-01'),
(5, 'blob_data_5', 'Certificación en Análisis de Datos', 'Organización E', '2023-09-10'),
(6, 'blob_data_6', 'Certificación en Seguridad Informática', 'Organización F', '2022-12-05'),
(7, 'blob_data_7', 'Certificación en Ingeniería de Software', 'Organización G', '2023-04-20'),
(8, 'blob_data_8', 'Certificación en Gestión de Calidad', 'Organización H', '2023-07-15'),
(9, 'blob_data_9', 'Certificación en Programación en Python', 'Organización I', '2023-02-10'),
(10, 'blob_data_10', 'Certificación en Diseño Gráfico', 'Organización J', '2024-01-25'),
(1, 'blob_data_11', 'Certificación en Estrategia Empresarial', 'Organización K', '2023-05-18'),
(2, 'blob_data_12', 'Certificación en Data Science', 'Organización L', '2023-08-12'),
(3, 'blob_data_13', 'Certificación en UX/UI Design', 'Organización M', '2023-10-05'),
(4, 'blob_data_14', 'Certificación en Cloud Computing', 'Organización N', '2022-11-30'),
(5, 'blob_data_15', 'Certificación en Gestión Financiera', 'Organización O', '2023-12-15'),
(6, 'blob_data_16', 'Certificación en Inteligencia Artificial', 'Organización P', '2024-02-20'),
(7, 'blob_data_17', 'Certificación en Desarrollo Ágil', 'Organización Q', '2023-03-25'),
(8, 'blob_data_18', 'Certificación en Administración de Proyectos Ágiles', 'Organización R', '2024-04-10'),
(9, 'blob_data_19', 'Certificación en Blockchain', 'Organización S', '2022-07-15'),
(10, 'blob_data_20', 'Certificación en Técnicas de Ventas', 'Organización T', '2023-11-01');
select*from Certificado;

