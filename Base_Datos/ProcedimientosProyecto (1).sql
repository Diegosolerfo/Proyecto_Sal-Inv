use Ventas_Inventario;
/*Procedimientos*/
/*-----------------------------Tabla Usuario----------------------------------*/
/*Login*/
delimiter //
create procedure LoginUsuario(
    in Num_Usu BIGINT UNSIGNED,
    in Cont VARCHAR(255)
)
begin
    select ID_Usuario, Numero_documento, Clave, Estado_Cuenta, Rol
    from Usuario
    where Numero_documento = Num_Usu 
      and Clave = Cont 
      and Estado_Cuenta = 'Activo';
end //
delimiter ;
delimiter //
create procedure RegistrarUsuarioAdmOpe(
    in p_Numero_documento bigint unsigned,
    in p_Clave varchar(255),
    in p_Nombre varchar(255),
    in p_Apellido varchar(255),
    in p_Correo varchar(255),
    in p_Fecha_nacimiento date,
    in p_Direccion varchar(255),
    in p_Genero enum("Hombre","Mujer"),
    in p_Telefono int unsigned,
    in p_Rol enum("Cliente","Operador","Administrador"),
    in p_EPS varchar(255),
    in p_RH enum("+","-"),
    in p_Tipo_sangre enum("AB","O","A","B"),
    in p_Registrado_por smallint unsigned
)
begin
    -- insertar los datos del nuevo usuario administrador y operador
    insert into Usuario (
        Numero_documento, Clave, Nombre, Apellido, Correo, Fecha_nacimiento,
        Direccion, Genero, Telefono, Rol, EPS, RH, Tipo_sangre, Registrado_por
    )
    values (
        p_Numero_documento, p_Clave, p_Nombre, p_Apellido, p_Correo, p_Fecha_nacimiento,
        p_Direccion, p_Genero, p_Telefono, p_Rol, p_EPS, p_RH, p_Tipo_sangre, p_Registrado_por
    );
end //
delimiter ;
delimiter //
create procedure RegistrarUsuarioCli(
    in p_Numero_documento bigint unsigned,
    in p_Clave varchar(255),
    in p_Nombre varchar(255),
    in p_Apellido varchar(255),
    in p_Correo varchar(255),
    in p_Fecha_nacimiento date,
    in p_Direccion varchar(255),
    in p_Genero enum("Hombre","Mujer"),
    in p_Telefono int unsigned
)
begin
    -- insertar los datos del nuevo usuario cliente
    insert into Usuario (
        Numero_documento, Clave, Nombre, Apellido, Correo, Fecha_nacimiento,
        Direccion, Genero, Telefono
    )
    values (
        p_Numero_documento, p_Clave, p_Nombre, p_Apellido, p_Correo, p_Fecha_nacimiento,
        p_Direccion, p_Genero, p_Telefono
    );
end //
delimiter ;
-- PROCEDIMIENTO PARA BUSCAR TODOS LOS OPERADORES
DELIMITER //
CREATE PROCEDURE todos_operadores()
BEGIN
SELECT id_usuario, nombre, apellido FROM usuario WHERE rol = "Operador";
END //
DELIMITER ;
select * from usuario;
-- DROP PROCEDURE todos_operadores;
-- PROCEDIMIENTO ALMACENADO QUE PERMITE LA CONSULTA DE UN USUARIO POR DOCUMENTO
delimiter //
create procedure EspecificoUsuario(
    in p_NumDoc bigint unsigned
)
begin
   select ID_Usuario, Numero_documento, Nombre, Apellido, Correo, Fecha_nacimiento, Direccion, Telefono, Genero, Rol, EPS, RH, Tipo_sangre 
from Usuario 
where Numero_documento = p_NumDoc;
end //
delimiter ;
-- drop procedure EspecificoUsuario;
-- VISTA QUE PERMITE LA CONSULTA GENERAL DE USUARIOS ACTIVOS
create view GeneralUsuarios as
select 
    ID_Usuario, Numero_documento, Nombre, Apellido, Correo, Fecha_nacimiento, Direccion, Telefono, Genero, Rol, EPS, RH, Tipo_sangre
from Usuario 
where Estado_Cuenta = 'Activo'
order by ID_Usuario asc;
-- PROCEDIMIENTO ALMACENADO QUE PERMITE CONSULTAR DATOS GENERALES DE USUARIOS ACTIVOS
delimiter //
create procedure ConsultaGeneralUsuario()
begin
    select * from GeneralUsuarios;
end //
delimiter ;
-- PROCEDIMIENTO ALMACENADO PARA ACTUALIZAR DATOS DE UN USUARIO CLIENTE
delimiter //
create procedure ActualizarUsuarioCli(
	in p_ID_Usuario smallint unsigned,
    in p_Numero_documento bigint unsigned,
    in p_Clave varchar(255),
    in p_Nombre varchar(255),
    in p_Apellido varchar(255),
    in p_Correo varchar(255),
    in p_Fecha_nacimiento date,
    in p_Direccion varchar(255),
    in p_Genero enum("Hombre","Mujer"),
    in p_Telefono int unsigned
)
begin
    update Usuario 
    set 
        Numero_documento = p_Numero_documento,
        Clave = p_Clave,
        Nombre = p_Nombre,
        Apellido = p_Apellido,
        Correo = p_Correo,
        Fecha_nacimiento = p_Fecha_nacimiento,
        Direccion = p_Direccion,
        Genero = p_Genero,
        Telefono = p_Telefono
    where 
        ID_Usuario = p_ID_Usuario;
end //
delimiter ;
-- PROCEDIMIENTO ALMACENADO PARA ACTUALIZAR DATOS DE UN USUARIO DE OPERADOR Y ADMINISTRADOR
delimiter //
create procedure ActualizarUsuarioAdmOpe(
	in p_ID_Usuario smallint unsigned,
    in p_Numero_documento bigint unsigned,
    in p_Clave varchar(255),
    in p_Nombre varchar(255),
    in p_Apellido varchar(255),
    in p_Correo varchar(255),
    in p_Fecha_nacimiento date,
    in p_Direccion varchar(255),
    in p_Genero enum("Hombre","Mujer"),
    in p_Telefono int unsigned,
    in p_Rol enum("Cliente","Operador","Administrador"),
    in p_EPS varchar(255),
    in p_RH enum("+","-"),
    in p_Tipo_sangre enum("AB","O","A","B")
)
begin
    update Usuario 
    set 
        Numero_documento = p_Numero_documento,
        Clave = p_Clave,
        Nombre = p_Nombre,
        Apellido = p_Apellido,
        Correo = p_Correo,
        Fecha_nacimiento = p_Fecha_nacimiento,
        Direccion = p_Direccion,
        Genero = p_Genero,
        Telefono = p_Telefono,
        Rol = p_Rol,
        EPS = p_EPS,
        RH = p_RH,
        Tipo_sangre = p_Tipo_sangre
    where 
        ID_Usuario = p_ID_Usuario;
end //
delimiter ;
use ventas_inventario;
-- PROCEDIMIENTO ALMACENADO PARA ACTUALIZAR ADM Y OPE
delimiter //
create procedure act_usu(
	in p_ID_Usuario smallint unsigned,
    in p_Numero_documento bigint unsigned,
    in p_Nombre varchar(255),
    in p_Apellido varchar(255),
    in p_Correo varchar(255),
    in p_Fecha_nacimiento date,
    in p_Direccion varchar(255),
    in p_Genero enum("Hombre","Mujer"),
    in p_Telefono int unsigned,
    in p_Rol enum("Cliente","Operador","Administrador"),
    in p_EPS varchar(255),
    in p_RH enum("+","-"),
    in p_Tipo_sangre enum("AB","O","A","B")
)
begin
    update Usuario 
    set 
        Numero_documento = p_Numero_documento,
        Nombre = p_Nombre,
        Apellido = p_Apellido,
        Correo = p_Correo,
        Fecha_nacimiento = p_Fecha_nacimiento,
        Direccion = p_Direccion,
        Genero = p_Genero,
        Telefono = p_Telefono,
        Rol = p_Rol,
        EPS = p_EPS,
        RH = p_RH,
        Tipo_sangre = p_Tipo_sangre
    where 
        ID_Usuario = p_ID_Usuario;
end //
delimiter ;
-- PROCEDIMIENTO ALMACENADO PARA ELIMINAR UN USUARIO (CAMBIO DE ESTADO)
delimiter //
create procedure EliminarUsuario(
    in p_numdoc bigint unsigned
)
begin
    update Usuario 
    set Estado_Cuenta = 'No activo' 
    where Numero_documento = p_numdoc;
end //
delimiter ;


/*-----------------------------Tabla Inventario Herramienta----------------------------------*/
delimiter //
create procedure RegistrarInventarioHerramienta(
    in p_Nombre varchar(255),
    in p_Tipo_Herramienta enum("Herramienta de Mano", "Herramienta de Instalacion", "Herramienta de Taller", "Herramienta de Oficina", "Maquinaria pesada"),
    in p_Cantidad smallint unsigned,
    in p_Imagen_Herramienta blob 
)
begin
    -- insertar los datos en Inventario_Herramienta
    insert into Inventario_Herramienta (
        Nombre, Tipo_Herramienta, Cantidad, Imagen_Herramienta
    )
    values (
        p_Nombre, p_Tipo_Herramienta, p_Cantidad, p_Imagen_Herramienta
    );
end //
delimiter ;
-- PROCEDIMIENTO ALMACENADO QUE PERMITE LA CONSULTA DE INVENTARIO HERRAMIENTAS POR NOMBRE
delimiter //
create procedure EspecificoInventarioH(
    in p_Nombre varchar(255)
)
begin
    select 
		ID_Inventario_H, 
        Nombre, 
        Tipo_Herramienta, 
        Cantidad, 
        Imagen_Herramienta
    from Inventario_Herramienta 
    where LOWER(TRIM(Inventario_Herramienta.Nombre)) LIKE LOWER(CONCAT('%', TRIM(p_Nombre), '%')) AND Estado = "Activo"
    order by Inventario_Herramienta.ID_Inventario_H asc;
end //
delimiter ;
call EspecificoInventarioH("m") ;
use ventas_inventario;
-- drop procedure EspecificoInventarioH;
-- VISTA QUE PERMITE LA CONSULTA GENERAL DE INVENTARIO HERRAMIENTAS ACTIVOS
create view GeneralInventarioH as
select 
		ID_Inventario_H, 
        Nombre, 
        Tipo_Herramienta, 
        Cantidad, 
        Imagen_Herramienta
    from Inventario_Herramienta 
    where Estado = 'Activo'
    order by Inventario_Herramienta.ID_Inventario_H asc;
delimiter ;
-- PROCEDIMIENTO ALMACENADO QUE PERMITE CONSULTAR DATOS GENERALES DE INVENTARIO HERRAMIENTAS
delimiter //
create procedure ConsultaGeneralInventarioH()
begin
    select * from GeneralInventarioH;
end //
delimiter ;
-- drop procedure FEspecificoInventarioH;
-- PROCEDIMIENTO ALMACENADO QUE PERMITE LA CONSULTA DE FORMULARIO DE SALIDA DE INVENTARIO HERRAMIENTAS POR NOMBRE
delimiter //
create procedure FEspecificoInventarioH(
	in p_id_herra smallint unsigned,
    in p_id_usuario smallint unsigned
)
begin
    select 
		Inventario_Herramienta.ID_Inventario_H, 
        Inventario_Herramienta.Nombre AS Nombre_Herramienta, 
        Inventario_Herramienta.Tipo_Herramienta, 
        Inventario_Herramienta.Cantidad, 
        Inventario_Herramienta.Imagen_Herramienta,
        Detalles_Utiliza.Salida, 
        Detalles_Utiliza.Fecha_Salida, 
        Detalles_Utiliza.Fecha_Llegada,
        Usuario.ID_Usuario,
        Usuario.Numero_documento, 
        Usuario.Nombre AS Nombre_Usuario, 
        Usuario.Apellido AS Apellido_Usuario
    from Inventario_Herramienta 
    inner join Detalles_Utiliza
        on Inventario_Herramienta.ID_Inventario_H = Detalles_Utiliza.Codigo_Inventario_H
	inner join Usuario
		on Detalles_Utiliza.Codigo_Usuario =Usuario.ID_Usuario
    where ID_Usuario = p_id_usuario and ID_Inventario_H = p_id_herra
    order by Inventario_Herramienta.ID_Inventario_H asc;
end //
delimiter ;

-- drop view FGeneralInventarioH;
-- VISTA QUE PERMITE LA CONSULTA GENERAL DE FORMULARIO DE SALIDA DE INVENTARIO HERRAMIENTAS ACTIVOS
create view FGeneralInventarioH as
select 
		Inventario_Herramienta.ID_Inventario_H, 
        Inventario_Herramienta.Nombre AS Nombre_Herramienta, 
        Inventario_Herramienta.Tipo_Herramienta, 
        Inventario_Herramienta.Cantidad, 
        Inventario_Herramienta.Imagen_Herramienta,
        Detalles_Utiliza.Salida, 
        Detalles_Utiliza.Fecha_Salida, 
        Detalles_Utiliza.Fecha_Llegada,
        Usuario.ID_Usuario,
        Usuario.Numero_documento, 
        Usuario.Nombre AS Nombre_Usuario, 
        Usuario.Apellido AS Apellido_Usuario
    from Inventario_Herramienta 
    inner join Detalles_Utiliza
        on Inventario_Herramienta.ID_Inventario_H = Detalles_Utiliza.Codigo_Inventario_H
	inner join Usuario
		on Detalles_Utiliza.Codigo_Usuario =Usuario.ID_Usuario
    where Estado = 'Activo'
    order by Inventario_Herramienta.ID_Inventario_H asc;
-- PROCEDIMIENTO ALMACENADO QUE PERMITE CONSULTAR DATOS GENERALES DE FORMULARIO DE SALIDA DE INVENTARIO HERRAMIENTAS ACTIVOS
delimiter //
create procedure ConsultaFGeneralInventarioH()
begin
    select * from FGeneralInventarioH;
end //
delimiter ;
call ConsultaFGeneralInventarioH;
DELIMITER //
CREATE PROCEDURE CONSEGUIR_IMAGEN(
IN P_ID_HER smallint unsigned
)
BEGIN
SELECT Imagen_Herramienta FROM INVENTARIO_HERRAMIENTA WHERE P_ID_HER = ID_Inventario_H;
END //
DELIMITER ;
USE VENTAS_INVENTARIO;
-- PROCEDIMIENTO ALMACENADO PARA ACTUALIZAR DATOS DE UN INVENTARIO HERRAMIENTAS
delimiter //
create procedure ActualizarInventarioHerramienta(
	in p_ID_Inventario_H smallint unsigned,
    in p_Nombre varchar(255),
    in p_Tipo_Herramienta enum("Herramienta de Mano", "Herramienta de Instalacion", "Herramienta de Taller", "Herramienta de Oficina", "Maquinaria pesada"),
    in p_Cantidad smallint unsigned,
    in p_Imagen_Herramienta blob 
)
begin
    update Inventario_Herramienta 
    set 
        Nombre = p_Nombre,
        Tipo_Herramienta = p_Tipo_Herramienta,
        Cantidad = p_Cantidad,
        Imagen_Herramienta = p_Imagen_Herramienta
    where 
        ID_Inventario_H = p_ID_Inventario_H;
end //
delimiter ;
-- PROCEDIMIENTO ALMACENADO PARA ELIMINAR UN INVENTARIO HERRAMIENTAS (CAMBIO DE ESTADO)
delimiter //
create procedure GuardarHerramienta(
	in p_id_her smallint unsigned,
    in p_id_usu smallint unsigned,
    in p_fec_lle date
)
begin
	update Detalles_Utiliza
    set 
    Fecha_Llegada = p_fec_lle
    where Codigo_Usuario = p_id_usu and Codigo_Inventario_H = p_id_her;
end//
delimiter ;
call GuardarHerramienta('1','1','2024-09-11');
call FEspecificoInventarioH('1','1');
delimiter //
create procedure EliminarInventarioHerramienta(
    p_ID_Inventario_H smallint unsigned
)
begin
    update Inventario_Herramienta 
    set Estado = 'No activo' 
    where ID_Inventario_H = p_ID_Inventario_H;
end //
delimiter ;
/*-----------------------------Tabla Inventario Material----------------------------------*/
delimiter //
create procedure RegistrarInventarioMaterial(
    #in p_Fecha_Registro date,
    in p_Cantidad smallint unsigned,
    in p_Nombre varchar(255),
    in p_Descripcion varchar(255),
    in p_Fecha_Compra date,
    in p_Valor_Unidad mediumint unsigned,
    in p_Valor_Total int unsigned,
    in p_Imagen_Material blob,
    in p_Codigo_Usuario smallint unsigned
)
begin
    -- insertar los datos en Inventario_Material
    insert into Inventario_Material (
        Fecha_Registro, Cantidad, Nombre, Descripcion, Fecha_Compra,
        Valor_Unidad, Valor_Total, Imagen_Material, Codigo_Usuario
    )
    values (
        CURDATE(), p_Cantidad, p_Nombre, p_Descripcion, p_Fecha_Compra,
        p_Valor_Unidad, p_Valor_Total, p_Imagen_Material, p_Codigo_Usuario
    );
end //
delimiter ;
delimiter ;
/* Procedimiento para consultar un material específico por nombre */ /*--Usuario que lo regstro---*/
delimiter //
create procedure EspecificoInventarioM(
    in p_Nombre varchar(255)
)
begin
    select 
        ID_Inventario_M, Fecha_Registro, Cantidad, Nombre, Descripcion, Fecha_Compra, 
        Valor_Unidad, Valor_Total, Imagen_Material, Codigo_Usuario
    from Inventario_Material
    where LOWER(TRIM(Nombre)) LIKE LOWER(CONCAT('%', TRIM(p_Nombre), '%')) AND estado = "Activo"
    order by ID_Inventario_M asc;
end //
delimiter ;
select * from Inventario_material;
call EspecificoInventarioM("tor");
drop procedure EspecificoInventarioM;
-- drop procedure EspecificoInventarioM;
delimiter //
create procedure especifico_inventario(
in p_id_mat smallint unsigned
)
begin
	select * from Inventario_Material where ID_Inventario_M = p_id_mat;
end//
delimiter ;

delimiter //
create procedure imagen(
in p_id_mat smallint unsigned
)
begin
	select Imagen_Material from Inventario_Material where ID_Inventario_M = p_id_mat;
end//
delimiter ;

/* Vista para consultar todos los materiales activos */
create view GeneralInventarioM as
select 
    ID_Inventario_M, Fecha_Registro, Cantidad, Nombre, Descripcion, Fecha_Compra, 
    Valor_Unidad, Valor_Total, Imagen_Material, Codigo_Usuario
from Inventario_Material
where Estado = 'Activo'
order by ID_Inventario_M asc;
-- PROCEDIMIENTO ALMACENADO QUE PERMITE CONSULTAR DATOS GENERALES DE INVENTARIO MATERIAL
delimiter //
create procedure ConsultaGeneralInventarioM()
begin
    select 
    ID_Inventario_M, Fecha_Registro, Cantidad, Nombre, Descripcion, Fecha_Compra, 
    Valor_Unidad, Valor_Total, Imagen_Material, Codigo_Usuario
from Inventario_Material
where Estado = 'Activo'
order by ID_Inventario_M asc;
end //
delimiter ;

-- PROCEDIMIENTO ALMACENADO QUE PERMITE LA CONSULTA DE FORMULARIO DE SALIDA DE INVENTARIO MATERIALES POR NOMBRE
delimiter //
create procedure FEspecificoInventarioM(
    in p_Nombre varchar(255)
)
begin
    select 
        Inventario_Material.ID_Inventario_M,
        Inventario_Material.Nombre AS Nombre_Material, 
        Inventario_Material.Descripcion, 
        Inventario_Material.Cantidad, 
        Inventario_Material.Imagen_Material,
		Inventario_Material.Fecha_Registro,
		Inventario_Material.Fecha_Compra,
        Inventario_Material.Valor_Unidad,
        Inventario_Material.Valor_Total,
        Detalles_Crea.Salida, 
        Detalles_Crea.Fecha_Salida, 
        Detalles_Crea.Total_Inventario,/*Total=Can-Sali-->Total=Cant*/ 
        Producto.Nombre AS Nombre_Producto,
        Producto.Precio
    from Inventario_Material
    inner join Detalles_Crea
        on Inventario_Material.ID_Inventario_M = Detalles_Crea.Codigo_Inventario_M
    inner join Producto
        on Detalles_Crea.Codigo_Producto = Producto.ID_Producto
    inner join Usuario
        on Inventario_Material.Codigo_Usuario = Usuario.ID_Usuario
    where LOWER(TRIM(Inventario_Material.Nombre)) LIKE LOWER(CONCAT('%', TRIM(p_Nombre), '%'))
    order by Inventario_Material.ID_Inventario_M asc;
end //
delimiter ;
-- VISTA QUE PERMITE LA CONSULTA GENERAL DE FORMULARIO DE SALIDA DE INVENTARIO MATERIALES ACTIVOS
create view FGeneralInventarioM as
select 
        Inventario_Material.ID_Inventario_M,
        Inventario_Material.Nombre AS Nombre_Material, 
        Inventario_Material.Descripcion, 
        Inventario_Material.Cantidad, 
        Inventario_Material.Imagen_Material,
		Inventario_Material.Fecha_Registro,
		Inventario_Material.Fecha_Compra,
        Inventario_Material.Valor_Unidad,
        Inventario_Material.Valor_Total,
        Detalles_Crea.Salida, 
        Detalles_Crea.Fecha_Salida,/*Similar*/ 
        Detalles_Crea.Total_Inventario, 
        Producto.Nombre AS Nombre_Producto,
        Producto.Precio
    from Inventario_Material
    inner join Detalles_Crea
        on Inventario_Material.ID_Inventario_M = Detalles_Crea.Codigo_Inventario_M
    inner join Producto
        on Detalles_Crea.Codigo_Producto = Producto.ID_Producto
    inner join Usuario
        on Inventario_Material.Codigo_Usuario = Usuario.ID_Usuario
    where Inventario_Material.Estado = 'Activo'
    order by Inventario_Material.ID_Inventario_M asc;
    -- PROCEDIMIENTO ALMACENADO QUE PERMITE CONSULTAR DATOS GENERALES DE FROMULARIO INVENTARIO MATERIAL
delimiter //
create procedure ConsultaFGeneralInventarioM()
begin
    select * from FGeneralInventarioM;
end //
delimiter ;
/* Procedimiento para actualizar los datos de un material */
delimiter //
create procedure ActualizarInventarioMaterial(
    in p_ID_Inventario_M smallint unsigned,
    in p_Cantidad smallint unsigned,
    in p_Nombre varchar(255),
    in p_Descripcion varchar(255),
    in p_Fecha_Compra date,
    in p_Valor_Unidad mediumint unsigned,
    in p_Valor_Total int unsigned,
    in p_Imagen_Material blob
)
begin
    update Inventario_Material 
    set 
        Cantidad = p_Cantidad,
        Nombre = p_Nombre,
        Descripcion = p_Descripcion,
        Fecha_Compra = p_Fecha_Compra,
        Valor_Unidad = p_Valor_Unidad,
        Valor_Total = p_Valor_Total,
        Imagen_Material = p_Imagen_Material
    where 
        ID_Inventario_M = p_ID_Inventario_M;
end //
delimiter ;
/* Procedimiento para actualizar los datos de un material desde un operador*/
delimiter //
create procedure sacar(
	in p_Producto  smallint unsigned,
    in p_ID_Inventario_M smallint unsigned,
    in p_Cantidad smallint unsigned,
    in p_total_inventario mediumint unsigned,
    in p_lo_tiene smallint unsigned
)
begin
	insert into detalles_crea(Codigo_Producto,Codigo_Inventario_M,Salida,Total_Inventario,Lo_tiene)
    values (p_Producto, p_ID_Inventario_M,p_Cantidad,p_total_inventario,p_lo_tiene);
    update Inventario_Material 
    set 
        Cantidad = p_total_inventario - p_cantidad
    where 
        ID_Inventario_M = p_ID_Inventario_M;
end //
delimiter ;
select * from detalles_crea;
 drop procedure sacar;
/* Procedimiento para eliminar un material (cambiar estado a 'No activo') */
delimiter //
create procedure EliminarInventarioMaterial(
    in p_ID_Inventario_M smallint unsigned
)
begin
    update Inventario_Material 
    set Estado = 'No activo'
    where ID_Inventario_M = p_ID_Inventario_M;
end //
delimiter ;
/*-----------------------------Tabla Producto----------------------------------*/
delimiter //
create procedure RegistrarProducto(
    in p_Nombre varchar(255),
    in p_Precio int unsigned,
    in p_Descripcion varchar(255),
    in p_Especificacion varchar(255),
    in p_imagen blob,
    in p_Codigo_Usuario smallint unsigned
)
begin
    -- insertar los datos en Producto
    insert into Producto (
        Nombre, Precio, Descripcion, Especificacion, Imagen, Codigo_Usuario
    )
    values (
        p_Nombre, p_Precio, p_Descripcion, p_Especificacion, p_imagen, p_Codigo_Usuario
    );
end //
delimiter ;
delimiter //
create procedure todos_productos()
begin
select ID_Producto, nombre from producto;
end //
delimiter ;
select * from usuario;
-- drop procedure todos_productos;
call todos_productos();
-- PROCEDIMIENTO ALMACENADO QUE PERMITE CONSULTAR DATOS GENERALES DE PRODUCTO PARA UN CLIENTE

delimiter //
create procedure ConsultaGeneralProductoCli()
begin
    select * from GeneralProductoCli;
end //
delimiter ;

-- PROCEDIMIENTO ALMACENADO QUE PERMITE LA CONSULTA DE UN PRODUCTO ESPESIFICA PARA CLIENTE
delimiter //
create procedure EspecificoProductoCli(
    in p_Nombre varchar(255)
)
begin
    select 
	Nombre,
    Precio, 
    Descripcion, 
    Especificacion
    from Producto
    -- Hacemos que la comparación sea insensible a mayúsculas
      where LOWER(TRIM(Producto.Nombre)) LIKE LOWER(CONCAT('%', TRIM(p_Nombre), '%'))
      and Estado = 'Activo'
    order by Producto.ID_Producto asc;
end //
delimiter ;
call EspecificoProductoCli('lap');

delimiter //
create procedure EspecificoActu(
    in p_id_pro smallint unsigned
)
begin
    select *
    from Producto
    -- Hacemos que la comparación sea insensible a mayúsculas
      where ID_Producto = p_id_pro;
end //
delimiter ;
-- drop procedure EspecificoActu;
-- VISTA QUE PERMITE LA CONSULTA GENERAL DE PRODUCTO PARA ADMINISTRADORES Y OPERADORES
create view GeneralProductoAdmOp as 
select 
    Producto.ID_Producto, 
    Producto.Nombre as NombreProducto,  -- Alias para evitar conflicto
    Producto.Precio, 
    Producto.Descripcion, 
    Producto.Especificacion,
    Producto.Imagen,
    Usuario.Numero_documento, 
    Usuario.Nombre as NombreUsuario,  -- Alias para evitar conflicto
    Usuario.Apellido 
from 
    Producto  
INNER JOIN 
    Usuario ON Producto.Codigo_Usuario = Usuario.ID_Usuario 
    where Estado = 'Activo'
order by 
    Producto.ID_Producto asc;
-- PROCEDIMIENTO ALMACENADO QUE PERMITE CONSULTAR DATOS GENERALES DE PRODUCTO PARA ADMINISTRADORES Y OPERADORES
delimiter //
create procedure ConsultaGeneralProductoAdmOp()
begin
    select * from GeneralProductoAdmOp;
end //
delimiter ;

-- PROCEDIMIENTO ALMACENADO QUE PERMITE LA CONSULTA DE UN PRODUCTO ESPESIFICA PARA ADMINISTRADORES Y OPERADORES
delimiter //
create procedure EspecificoProductoAdmOp(
    in p_Nombre varchar(255)
)
begin
    select 
        Producto.ID_Producto, 
        Producto.Nombre as NombreProducto,  -- Alias para evitar conflicto
        Producto.Precio, 
        Producto.Descripcion, 
        Producto.Especificacion,
        Producto.Imagen,
        Usuario.Numero_documento, 
        Usuario.Nombre as NombreUsuario,  -- Alias para evitar conflicto
        Usuario.Apellido
    from Producto 
    INNER JOIN Usuario
        ON Producto.Codigo_Usuario = Usuario.ID_Usuario
    -- Hacemos que la comparación sea insensible a mayúsculas
      where LOWER(TRIM(Producto.Nombre)) LIKE LOWER(CONCAT('%', TRIM(p_Nombre), '%'))
      and Estado = 'Activo'
    order by Producto.ID_Producto asc;
end //
delimiter ;
CALL EspecificoProductoAdmOp('LAP');
DELIMITER //
CREATE PROCEDURE IMAGEN_Pro(
IN P_ID_Producto smallint unsigned
)
BEGIN
SELECT IMAGEN FROM PRODUCTO WHERE P_ID_Producto = ID_Producto;
END //
DELIMITER ;
-- PROCEDIMIENTO ALMACENADO PARA ACTUALIZAR DATOS DE UN PRODUCTO
delimiter //
create procedure ActualizarProducto(
	in p_ID_Producto smallint unsigned,
    in p_Nombre varchar(255),
    in p_Precio int unsigned,
    in p_Descripcion varchar(255),
    in p_Especificacion varchar(255),
    in p_Imagen blob
)
begin
    update Producto 
    set 
        Nombre = p_Nombre,
        Precio = p_Precio,
        Descripcion = p_Descripcion,
        Especificacion = p_Especificacion,
        Imagen = p_Imagen
    where 
        ID_Producto = p_ID_Producto;
end //
delimiter ;
-- DROP PROCEDURE ActualizarProducto;
-- PROCEDIMIENTO ALMACENADO PARA ELIMINAR UN PRODUCTO (CAMBIO DE ESTADO)
delimiter //
create procedure EliminarProducto(
    in p_ID_Producto bigint unsigned
)
begin
    update Producto 
    set Estado = 'No activo' 
    where ID_Producto = p_ID_Producto;
end //
delimiter ;

/*-----------------------------Tabla Pedido----------------------------------*/
delimiter //
create procedure RegistrarPedido(
    in p_Especificacion varchar(255),
    in p_Abono int unsigned,
    in p_Fecha_Entrega date,
    in p_Codigo_Usuario smallint unsigned
)
begin
    -- insertar los datos en Pedido
    insert into Pedido (
        Especificacion, Abono, Fecha_Solicitud, Fecha_Entrega, Codigo_Usuario
    )
    values (
        p_Especificacion, p_Abono, CURDATE(), p_Fecha_Entrega, p_Codigo_Usuario
    );
end //
delimiter ;
-- VISTA QUE PERMITE LA CONSULTA GENERAL DE PEDIDO

create view GeneralPedido as 
select 
    Pedido.ID_Pedido, 
    Pedido.Especificacion, 
    Pedido.Abono, 
    Pedido.Fecha_Solicitud, 
    Pedido.Fecha_Entrega, 
    -- Datos del producto
    Producto.ID_Producto,
    Producto.Nombre as NombreProducto, 
    -- Especificaciones del pedido
    Detalles_Genera.Especificacion1, 
    Detalles_Genera.Especificacion2, 
    Detalles_Genera.Especificacion3, 
    Detalles_Genera.Especificacion4, 
    Detalles_Genera.Especificacion5, 
    Detalles_Genera.Especificacion6, 
    Detalles_Genera.Especificacion7, 
    Detalles_Genera.Especificacion8, 
    Detalles_Genera.Especificacion9, 
    Detalles_Genera.Especificacion10, 
    Usuario.Numero_documento, 
    Usuario.Nombre as NombreUsuario,  -- Alias para evitar conflicto
    Usuario.Apellido 
from 
    Pedido 
inner join 
    Usuario on Pedido.Codigo_Usuario = Usuario.ID_Usuario
inner join 
    Detalles_Genera on Pedido.ID_Pedido = Detalles_Genera.Codigo_Pedido 
inner join 
    Producto on Detalles_Genera.Codigo_Producto = Producto.ID_Producto 
    and Pedido.Estado = 'Activo' 
order by 
    Pedido.ID_Pedido asc;

-- PROCEDIMIENTO ALMACENADO QUE PERMITE CONSULTAR DATOS GENERALES DE PEDIDO
delimiter //
create procedure ConsultaGeneralPedido()
begin
    select * from GeneralPedido;
end //
delimiter ;
call ConsultaGeneralPedido();
-- PROCEDIMIENTO ALMACENADO QUE PERMITE LA CONSULTA DE UN PEDIDO ESPESIFICA
delimiter //
create procedure EspecificoPedido(
    in p_NumDoc BIGINT UNSIGNED
)
begin
    select 
        Pedido.ID_Pedido, 
        Pedido.Especificacion,
        Pedido.Abono, 
        Pedido.Fecha_Solicitud, 
        Pedido.Fecha_Entrega,
        -- Datos del producto
        Producto.ID_Producto,
        Producto.Nombre as NombreProducto,
        -- Especificaciones del pedido
        Detalles_Genera.Especificacion1,
        Detalles_Genera.Especificacion2,
        Detalles_Genera.Especificacion3,
        Detalles_Genera.Especificacion4,
        Detalles_Genera.Especificacion5,
        Detalles_Genera.Especificacion6,
        Detalles_Genera.Especificacion7,
        Detalles_Genera.Especificacion8,
        Detalles_Genera.Especificacion9,
        Detalles_Genera.Especificacion10,
        Usuario.Numero_documento, 
        Usuario.Nombre as NombreUsuario,  -- Alias para evitar conflicto
        Usuario.Apellido 
    from Pedido 
    inner join Usuario
        on Pedido.Codigo_Usuario = Usuario.ID_Usuario
    inner join Detalles_Genera
        on Pedido.ID_Pedido = Detalles_Genera.Codigo_Pedido
    inner join Producto
        on Detalles_Genera.Codigo_Producto = Producto.ID_Producto
    where Usuario.Numero_documento = p_NumDoc
      and Pedido.Estado = 'Activo'
    order by Pedido.ID_Pedido asc;
end //
delimiter ;
-- PROCEDIMIENTO ALMACENADO QUE PERMITE LA CONSULTA DEL ULTIMO PEDIDO ESPESIFICA
delimiter //
create procedure EspecificoPedidoID(
    in p_Codigo_Usuario BIGINT UNSIGNED
)
begin
    select 
        ID_Pedido
    from Pedido 
    where Pedido.Codigo_Usuario = p_Codigo_Usuario-- Ordena de la fecha más reciente a la más antigua
    order by Pedido.ID_Pedido desc
    limit 1;  -- Muestra solo el último registro
end //
delimiter ;

-- PROCEDIMIENTO ALMACENADO QUE PERMITE LA CONSULTA DE UN PEDIDO ESPESIFICA PARA LA ACTUALIZACION
delimiter //
create procedure EspecificoPedidoA(
    in p_ID_Pedido smallint unsigned
)
begin
    select 
		ID_Pedido, 
		Especificacion,
		Abono, 
		Fecha_Entrega
    from Pedido 
      where ID_Pedido= p_ID_Pedido;
end //
delimiter ;
-- PROCEDIMIENTO ALMACENADO PARA ACTUALIZAR DATOS DE UN PEDIDO
delimiter //
create procedure ActualizarPedido(
	in p_ID_Pedido smallint unsigned,
    in p_Especificacion varchar(255),
    in p_Abono int unsigned,
    in p_Fecha_Entrega date
)
begin
    update Pedido 
    set 
        Especificacion = p_Especificacion,
        Abono = p_Abono,
        Fecha_Entrega = p_Fecha_Entrega
    where 
        ID_Pedido = p_ID_Pedido;
end //
delimiter ;

-- PROCEDIMIENTO ALMACENADO PARA ELIMINAR UN PEDIDO (CAMBIO DE ESTADO)
delimiter //
create procedure EliminarPedido(
    in p_ID_Pedido smallint unsigned
)
begin
    update Pedido 
    set Estado = 'No activo' 
    where ID_Pedido = p_ID_Pedido;
end //
delimiter ;

/*-----------------------------Tabla Ventas----------------------------------*/
delimiter //
create procedure RegistrarVenta(
    in p_Precio int unsigned,
    in p_Descuento tinyint unsigned,
    in p_Impuesto int,
    in p_Codigo_Usuario smallint unsigned,
    in p_Codigo_Pedido smallint unsigned

)
begin
    -- insertar los datos en Venta
    insert into Venta (
        Precio, Descuento, Fecha_Facturacion, Impuesto, Codigo_Usuario, Codigo_Pedido
    )
    values (
        p_Precio, p_Descuento, CURDATE(), p_Impuesto, p_Codigo_Usuario, p_Codigo_Pedido
    );
	update Pedido 
    set Estado = 'No activo' 
    where ID_Pedido = p_Codigo_Pedido;
end //
delimiter ;
-- VISTA QUE PERMITE LA CONSULTA GENERAL DE VENTA
create view GeneralVenta as 
select 
    Venta.ID_Venta, 
    Venta.Precio,
    Venta.Descuento, 
    Venta.Fecha_Facturacion, 
    Venta.Impuesto,
    Venta.Cancelacion,
    -- Datos del cliente (quien hizo el pedido)
    Cliente.Numero_documento as NumeroDocumentoCliente, 
    Cliente.Nombre as NombreCliente,  
    Cliente.Apellido as ApellidoCliente,
    Pedido.Abono,
    Pedido.Fecha_Entrega,
    -- Especificaciones del pedido
    Detalles_Genera.Especificacion1,
    Detalles_Genera.Especificacion2,
    Detalles_Genera.Especificacion3,
    Detalles_Genera.Especificacion4,
    Detalles_Genera.Especificacion5,
    Detalles_Genera.Especificacion6,
    Detalles_Genera.Especificacion7,
    Detalles_Genera.Especificacion8,
    Detalles_Genera.Especificacion9,
    Detalles_Genera.Especificacion10,
    -- Datos del producto
    Producto.Nombre as NombreProducto,
    -- Datos del administrador (quien generó la venta)
    Administrador.Numero_documento as NumeroDocumentoAdmin,
    Administrador.Nombre as NombreAdministrador,
    Administrador.Apellido as ApellidoAdministrador
from 
    Venta  
    inner join Usuario as Administrador on Venta.Codigo_Usuario = Administrador.ID_Usuario 
    inner join Pedido on Venta.Codigo_Pedido = Pedido.ID_Pedido 
    inner join Usuario as Cliente on Pedido.Codigo_Usuario = Cliente.ID_Usuario 
    inner join Detalles_Genera on Pedido.ID_Pedido = Detalles_Genera.Codigo_Pedido 
    inner join Producto on Detalles_Genera.Codigo_Producto = Producto.ID_Producto 
order by 
    Venta.ID_Venta asc;
-- PROCEDIMIENTO ALMACENADO QUE PERMITE CONSULTAR DATOS GENERALES DE VENTA
delimiter //
create procedure ConsultaGeneralVenta()
begin
    select * from GeneralVenta;
end //
delimiter ;
call ConsultaGeneralVenta();
-- PROCEDIMIENTO ALMACENADO QUE PERMITE LA CONSULTA DE UNA VENTA ESPESIFICA
delimiter //
create procedure EspecificoVenta(
    in p_NumDoc BIGINT UNSIGNED
)
begin
    select 
	Venta.ID_Venta, 
    Venta.Precio,
    Venta.Descuento, 
    Venta.Fecha_Facturacion, 
    Venta.Impuesto,
    Venta.Cancelacion,
    -- Datos del cliente (quien hizo el pedido)
    Cliente.Numero_documento as NumeroDocumentoCliente, 
    Cliente.Nombre as NombreCliente,  
    Cliente.Apellido as ApellidoCliente,
    Pedido.Abono,
    Pedido.Fecha_Entrega,
    -- Especificaciones del pedido
    Detalles_Genera.Especificacion1,
    Detalles_Genera.Especificacion2,
    Detalles_Genera.Especificacion3,
    Detalles_Genera.Especificacion4,
    Detalles_Genera.Especificacion5,
    Detalles_Genera.Especificacion6,
    Detalles_Genera.Especificacion7,
    Detalles_Genera.Especificacion8,
    Detalles_Genera.Especificacion9,
    Detalles_Genera.Especificacion10,
    -- Datos del producto
    Producto.Nombre as NombreProducto,
    -- Datos del administrador (quien generó la venta)
    Administrador.Numero_documento as NumeroDocumentoAdmin,
    Administrador.Nombre as NombreAdministrador,
    Administrador.Apellido as ApellidoAdministrador
from 
    Venta  
    inner join Usuario as Administrador on Venta.Codigo_Usuario = Administrador.ID_Usuario 
    inner join Pedido on Venta.Codigo_Pedido = Pedido.ID_Pedido 
    inner join Usuario as Cliente on Pedido.Codigo_Usuario = Cliente.ID_Usuario 
    inner join Detalles_Genera on Pedido.ID_Pedido = Detalles_Genera.Codigo_Pedido 
    inner join Producto on Detalles_Genera.Codigo_Producto = Producto.ID_Producto 
    where Cliente.Numero_documento = p_NumDoc
order by 
    Venta.ID_Venta asc;
end //
delimiter ;
-- PROCEDIMIENTO ALMACENADO QUE PERMITE LA CONSULTA DE UN VENTA ESPESIFICA PARA LA ACTUALIZACION
delimiter //
create procedure EspecificoVentaA(
    in p_ID_Venta smallint unsigned
)
begin
    select 
		ID_Venta, 
		Precio,
		Descuento,  
		Impuesto
    from Venta 
      where ID_Venta= p_ID_Venta;
end //
delimiter ;
-- PROCEDIMIENTO ALMACENADO PARA ACTUALIZAR DATOS DE UNA VENTA
delimiter //
create procedure ActualizarVenta(
	in p_ID_Venta smallint unsigned,
    in p_Precio int unsigned,
    in p_Descuento tinyint unsigned,
    in p_Impuesto int
)
begin
    update Venta 
    set 
        Precio = p_Precio,
        Descuento = p_Descuento,
        Impuesto = p_Impuesto
    where 
        ID_Venta = p_ID_Venta;
end //
delimiter ;

-- PROCEDIMIENTO ALMACENADO PARA CANCELAR UNA VENTA 
delimiter //
create procedure CancelarVenta(
    in p_ID_Venta smallint unsigned
)
begin
    update Venta 
    set Cancelacion = 'Si' 
    where ID_Venta = p_ID_Venta;
end //
delimiter ;
/*-----------------------------Tabla Experiencia----------------------------------*/
delimiter //
create procedure RegistrarExperiencia(
    in p_Codigo_Usuario smallint unsigned,
    in p_Nombre_Empresa varchar(255),
    in p_Cargo varchar(255),
    in p_Fecha_Inicio date,
    in p_Fecha_Fin date,
    in p_Observacion varchar(255),
    in p_Telefono_Empresa int unsigned,
    in p_Nombre_Contacto varchar(255)
)
begin
    -- Insertar la experiencia en la tabla Experiencia
    insert into Experiencia (
        Codigo_Usuario, Nombre_Empresa, Cargo, Fecha_Inicio, Fecha_Fin, Observacion, Telefono_empresa, Nombre_Contacto
    )
    value ( 
		p_Codigo_Usuario, p_Nombre_Empresa, p_Cargo, p_Fecha_Inicio, p_Fecha_Fin, p_Observacion, p_Telefono_Empresa, p_Nombre_Contacto
	);
end //
delimiter ;

-- PROCEDIMIENTO ALMACENADO QUE PERMITE CONSULTAR DATOS GENERALES DE USUARIOS ACTIVOS
delimiter //
create procedure ConsultaGeneralExperiencia(
IN p_cod_usuario smallint unsigned
)
begin
    select * from experiencia where p_cod_usuario = Codigo_Usuario;
end //
delimiter ;

delimiter //
create procedure ActualizarExperiencia(
    in p_Codigo_Usuario smallint unsigned,
    in p_Nombre_Empresa varchar(255),
    in p_Cargo varchar(255),
    in p_Fecha_Inicio date,
    in p_Fecha_Fin date,
    in p_Observacion varchar(255),
    in p_Telefono_Empresa int unsigned,
    in p_Nombre_Contacto varchar(255)
)
begin
    -- Actualizar la experiencia en la tabla Experiencia
    update Experiencia 
    set 
        Nombre_Empresa = p_Nombre_Empresa,
        Cargo = p_Cargo,
        Fecha_Inicio = p_Fecha_Inicio,
        Fecha_Fin = p_Fecha_Fin,
        Observacion = p_Observacion,
        Telefono_empresa = p_Telefono_Empresa,
        Nombre_Contacto = p_Nombre_Contacto
    where 
        Codigo_Usuario = p_Codigo_Usuario;
end //
delimiter ;
-- PROCEDIMIENTO ALMACENADO PARA ELIMINAR UN EXPERIENCIA
delimiter //
create procedure EliminarExperiencia(
    in p_Codigo_Usuario bigint unsigned,
	in p_Fecha_Inicio date,
    in p_Fecha_Fin date
)
begin
    delete from Experiencia 
    where Codigo_Usuario = p_Codigo_Usuario
    and Fecha_Inicio = p_Fecha_Inicio
    and Fecha_Fin = p_Fecha_Fin;
end //
delimiter ;
/*-----------------------------Tabla Certificado----------------------------------*/
delimiter //
create procedure RegistrarCertificado(
    in p_Codigo_Usuario smallint unsigned,
    in p_Nombre_Certificado varchar(255),/*Datos que ayudan a eliminar*/
    in p_Organizacion_Emisora varchar(255),
    in p_Fecha_Expedicion date,/*Datos que ayudan a eliminar*/
	in p_Certificacion blob
)
begin
    -- Insertar el certificado en la tabla Certificado
    insert into Certificado (
        Codigo_Usuario, Nombre_Certificado, Organizacion_Emisora, Fecha_Expedicion, Certificacion
    )
    value( 
    p_Codigo_Usuario, p_Nombre_Certificado, p_Organizacion_Emisora, p_Fecha_Expedicion, p_Certificacion
    );
end //
delimiter ;

-- PROCEDIMIENTO ALMACENADO QUE PERMITE LA CONSULTA DE UNA CERTIFICADOS ESPESIFICA
delimiter //
create procedure EspecificoCertificado(
    in p_cod_usuario smallint unsigned
)
begin
    select * from certificado where p_cod_usuario = Codigo_Usuario;
end //
delimiter ;
use ventas_inventario;
call EspecificoCertificado(4);
use ventas_inventario;
drop procedure ActualizarCertificado;
delimiter //
DROP PROCEDURE IF EXISTS ActualizarCertificado;
DELIMITER //
CREATE PROCEDURE ActualizarCertificado(
  IN p_Codigo_Usuario       SMALLINT UNSIGNED,
  IN p_Nombre_Certificado   VARCHAR(255),
  IN p_Organizacion_Emisora VARCHAR(255),
  IN p_Fecha_Expedicion     DATE,
  IN p_Certificacion        BLOB
)
BEGIN
  UPDATE Certificado
    SET 
	  codigo_usuario = p_Codigo_Usuario,
      Nombre_Certificado  = p_Nombre_Certificado,
      Organizacion_Emisora= p_Organizacion_Emisora,
      Fecha_Expedicion    = p_Fecha_Expedicion,
      Certificacion       = p_Certificacion
  WHERE Codigo_Usuario = p_Codigo_Usuario;
END //
DELIMITER ;
drop procedure ActualizarCertificado;
-- PROCEDIMIENTO ALMACENADO PARA ELIMINAR UN CERTIFICADOS
delimiter //
create procedure EliminarCertificado(
    in p_Codigo_Usuario bigint unsigned,
    in p_Nombre_Certificado varchar(255),
    in p_Fecha_Expedicion date
)
begin
    delete from Certificado 
    where Codigo_Usuario = p_Codigo_Usuario
    and Nombre_Certificado = p_Nombre_Certificado
    and Fecha_Expedicion = p_Fecha_Expedicion;
end //
delimiter ;
/*-----------------------------Tabla Detalles Crea----------------------------------*/
/*Para esto se requiere una consulta antes de los productos linea 598*/
delimiter //
create procedure RegistrarDetallesCrea(
    in p_Codigo_Producto smallint unsigned,
    in p_Codigo_Inventario_M smallint unsigned,
    in p_Salida smallint,
    in p_Antes mediumint unsigned,
    in p_Lo_Tiene smallint unsigned
)
begin
    -- Insertar el certificado en la tabla Detalles Crea
    insert into Detalles_Crea (
        Codigo_Producto, Codigo_Inventario_M, Fecha_Salida, Salida, Total_Inventario, Lo_Tiene
    )
    value( 
    p_Codigo_Producto, p_Codigo_Inventario_M, CURDATE(), p_Salida, p_Antes, p_Lo_Tiene
    );
    update inventario_material 
    set 
		Cantidad = Cantidad - p_Salida
	where
		ID_Inventario_M = p_Codigo_Inventario_M;
end //
delimiter ;
-- DROP PROCEDURE RegistrarDetallesCrea;
#select * from Detalles_Crea;
#select * from inventario_material;
#select * from inventario_herramienta;
delimiter //
create procedure ActualizarDetallesCrea(
    in p_Codigo_Producto smallint unsigned,
    in p_Codigo_Inventario_M smallint unsigned,
    in p_Salida smallint,
    in p_Total_Inventario mediumint unsigned
)
begin
    -- Actualizar el certificado en la tabla Detalles Crea
    update Detalles_Crea 
    set 
        Salida = p_Salida,
        Total_Inventarioo = p_Total_Inventario
    where 
        Codigo_Producto = p_Codigo_Producto
        and Codigo_Inventario_M = p_Codigo_Inventario_M;
end //
delimiter ;
/*-----------------------------Tabla Detalles Utiliza----------------------------------*/
delimiter //
create procedure RegistrarDetallesUtiliza(
    in p_Codigo_Usuario smallint unsigned,
    in p_Codigo_Inventario_H smallint unsigned,
    in p_Salida smallint unsigned,
    in p_Cantidad smallint unsigned,
    in p_fecha_llegada date 
)
begin
    -- Insertar el certificado en la tabla Detalles Utiliza
    insert into Detalles_Utiliza (
        Codigo_Usuario, Codigo_Inventario_H, Salida, Fecha_Salida, Fecha_Llegada
    )
    value( 
    p_Codigo_Usuario, p_Codigo_Inventario_H, p_Salida, NOW(), p_fecha_llegada
    );
    update Inventario_Herramienta 
    set 
        Cantidad = P_Cantidad
    where 
		ID_Inventario_H = p_Codigo_Inventario_H; 
end //
delimiter ;
-- drop procedure RegistrarDetallesUtiliza;
/*Consulta por el id de la hherramienta*/
DELIMITER //
CREATE PROCEDURE ConsultarHerramienta(
IN p_id_herramienta smallint unsigned
)
BEGIN
	SELECT * FROM Inventario_Herramienta WHERE ID_Inventario_H = p_id_herramienta;
END //
DELIMITER ;
-- DROP PROCEDURE consultarherrmaienta;
/*Consulta de de detalles utiliza*/
DELIMITER //

CREATE PROCEDURE ConsultarDetallesUtilizaEspecifico(
    IN p_Codigo_Usuario SMALLINT UNSIGNED,
    IN p_Codigo_Inventario_H SMALLINT UNSIGNED
)
BEGIN
    SELECT 
        U.Nombre AS NombreUsuario,
        U.Apellido AS ApellidoUsuario,
        U.Correo,
        IH.Nombre AS NombreHerramienta,
        IH.Tipo_Herramienta,
        DU.Salida,
        DU.Fecha_Salida,
        DU.Fecha_Llegada
    FROM Detalles_Utiliza DU
    INNER JOIN Usuario U ON DU.Codigo_Usuario = U.ID_Usuario
    INNER JOIN Inventario_Herramienta IH ON DU.Codigo_Inventario_H = IH.ID_Inventario_H
    WHERE DU.Codigo_Usuario = p_Codigo_Usuario
    AND DU.Codigo_Inventario_H = p_Codigo_Inventario_H;
END //

DELIMITER ;
-- DROP PROCEDURE ConsultarDetallesUtilizaEspecifico;
DELIMITER //

CREATE PROCEDURE ConsultarDetallesUtilizaGeneral(
    IN p_Codigo_Usuario SMALLINT UNSIGNED
)
BEGIN
    SELECT 
        U.Nombre AS NombreUsuario,
        U.Apellido AS ApellidoUsuario,
        U.Correo,
        IH.ID_Inventario_H,
        IH.Imagen_Herramienta,
        IH.Cantidad,
        IH.Nombre AS NombreHerramienta,
        IH.Tipo_Herramienta,
        DU.Salida,
        DU.Fecha_Salida,
        DU.Fecha_Llegada
    FROM Detalles_Utiliza DU
    INNER JOIN Usuario U ON DU.Codigo_Usuario = U.ID_Usuario
    INNER JOIN Inventario_Herramienta IH ON DU.Codigo_Inventario_H = IH.ID_Inventario_H
    WHERE DU.Codigo_Usuario = p_Codigo_Usuario;
END //

DELIMITER ;
-- DROP PROCEDURE ConsultarDetallesUtilizaGeneral;
delimiter //
create procedure ActualizarDetallesUtiliza(
    in p_Codigo_Usuario smallint unsigned,
    in p_Codigo_Inventario_H smallint unsigned,
    in p_Salida smallint unsigned,
    in p_Fecha_Llegada date
)
begin
    -- Actualizar el certificado en la tabla Detalles Utiliza
    update Detalles_Utiliza 
    set 
        Salida = p_Salida,
        Fecha_Llegada = p_Fecha_Llegada
    where 
		Codigo_Usuario = p_Codigo_Usuario
        and Codigo_Inventario_H = p_Codigo_Inventario_H;
end //
delimiter ;
/* PROCEDIMIENTO PARA DEVOLVER LAS HERRAMIENTAS */
delimiter //
CREATE PROCEDURE devolver(
IN p_id_herramienta smallint unsigned,
IN p_salida smallint unsigned,
IN p_salida_2 smallint unsigned
)
BEGIN
delete from Detalles_Utiliza where Codigo_Inventario_H = p_id_herramienta and Salida = p_salida_2;
update Inventario_Herramienta set Cantidad = p_salida where ID_Inventario_H = p_id_herramienta;
END //
delimiter ;
/*-----------------------------Tabla Detalles Genera----------------------------------*/
/* Procedimiento almacenado que permite el registro*/
delimiter //
create procedure RegistrarDestallesGenera(
    in p_Codigo_Producto smallint unsigned,
    in p_Codigo_Pedido smallint unsigned,
    in p_Especificacion1 varchar(255),
    in p_Especificacion2 varchar(255),
    in p_Especificacion3 varchar(255),
    in p_Especificacion4 varchar(255),
    in p_Especificacion5 varchar(255),
    in p_Especificacion6 varchar(255),
    in p_Especificacion7 varchar(255),
    in p_Especificacion8 varchar(255),
    in p_Especificacion9 varchar(255),
    in p_Especificacion10 varchar(255)
)
begin
    -- Insertar el certificado en la tabla Detalles Genera
    insert into Destalles_Genera (
        Codigo_Producto, Codigo_Pedido, Especificacion1, Especificacion2, Especificacion3, Especificacion4, Especificacion5, Especificacion6, Especificacion7, Especificacion8, Especificacion9, Especificacion10
    )
    value( 
    p_Codigo_Producto, p_Codigo_Pedido, p_Especificacion1, p_Especificacion2, p_Especificacion3, p_Especificacion4, p_Especificacion5, p_Especificacion6, p_Especificacion7, p_Especificacion8, p_Especificacion9, p_Especificacion10
    );
end //
delimiter ;
/* Para la consulta de detalles genera*/
DELIMITER //
CREATE PROCEDURE GetPedidoProductoDetalle(
    IN pedidoID SMALLINT UNSIGNED, 
    IN productoID SMALLINT UNSIGNED
)
BEGIN
    SELECT 
        P.ID_Pedido,
        P.Especificacion AS EspecificacionPedido,
        P.Abono,
        P.Fecha_Solicitud,
        P.Fecha_Entrega,
        P.Estado AS EstadoPedido,
        PR.ID_Producto,
        PR.Nombre,
        PR.Precio,
        PR.Descripcion,
        PR.Especificacion AS EspecificacionProducto,
        PR.Estado AS EstadoProducto,
        DG.Especificacion1,
        DG.Especificacion2,
        DG.Especificacion3,
        DG.Especificacion4,
        DG.Especificacion5,
        DG.Especificacion6,
        DG.Especificacion7,
        DG.Especificacion8,
        DG.Especificacion9,
        DG.Especificacion10
    FROM Pedido P
    INNER JOIN Destalles_Genera DG ON P.ID_Pedido = DG.Codigo_Pedido
    INNER JOIN Producto PR ON DG.Codigo_Producto = PR.ID_Producto
    WHERE P.ID_Pedido = pedidoID AND PR.ID_Producto = productoID;
    
END //
DELIMITER ;
/* Actualizar detalles genera */
delimiter //
create procedure ActualizarDestallesGenera(
    in p_Codigo_Producto smallint unsigned,
    in p_Codigo_Pedido smallint unsigned,
    in p_Especificacion1 varchar(255),
    in p_Especificacion2 varchar(255),
    in p_Especificacion3 varchar(255),
    in p_Especificacion4 varchar(255),
    in p_Especificacion5 varchar(255),
    in p_Especificacion6 varchar(255),
    in p_Especificacion7 varchar(255),
    in p_Especificacion8 varchar(255),
    in p_Especificacion9 varchar(255),
    in p_Especificacion10 varchar(255)
)
begin
    -- Actualizar el certificado en la tabla Detalles Genera
    update Destalles_Genera 
    set 
        Especificacion1 = p_Especificacion1,
        Especificacion2 = p_Especificacion2,
        Especificacion3 = p_Especificacion3,
        Especificacion4 = p_Especificacion4,
        Especificacion5 = p_Especificacion5,
        Especificacion6 = p_Especificacion6,
        Especificacion7 = p_Especificacion7,
        Especificacion8 = p_Especificacion8,
        Especificacion9 = p_Especificacion9,
        Especificacion10 = p_Especificacion10
    where 
		Codigo_Producto = p_Codigo_Producto
        and Codigo_Pedido = p_Codigo_Pedido;
end //
delimiter ;
/*Eliminar detalles genera*/
DELIMITER //

CREATE PROCEDURE EliminarDetallesGenera(
    IN pedidoID SMALLINT UNSIGNED, 
    IN productoID SMALLINT UNSIGNED
)
BEGIN
    DELETE FROM Destalles_Genera
    WHERE Codigo_Pedido = pedidoID AND Codigo_Producto = productoID;
END //

DELIMITER ;