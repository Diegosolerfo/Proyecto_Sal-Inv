create database Ventas_Inventario;
use Ventas_Inventario;
-- DROP DATABASE Ventas_Inventario;
create table Usuario(
ID_Usuario smallint unsigned Primary key auto_increment,
Numero_documento bigint unsigned unique not null,
Clave varchar(255) not null,
Nombre varchar(255) not null,
Apellido varchar(255) not null,
Correo varchar(255) not null,
Fecha_nacimiento date not null,
Direccion varchar(255) not null,
Genero enum("Hombre","Mujer") null,
Telefono int unsigned not null,
Estado_Cuenta enum("Activo","No activo") default "Activo",
Rol enum("Cliente","Operador","Administrador") default "Cliente" null,
EPS varchar(255) null,
RH enum("+","-") null,
Tipo_sangre enum("AB","O","A","B") null,
Registrado_por smallint unsigned null,
foreign key(Registrado_por) references Usuario(ID_Usuario)
);
create table Inventario_Herramienta(
ID_Inventario_H smallint unsigned Primary key auto_increment,
Nombre varchar(255) not null,
Tipo_Herramienta enum("Herramienta de Mano", "Herramienta de Instalacion", "Herramienta de Taller", "Herramienta de Oficina", "Maquinaria pesada" ) not null,
Cantidad smallint unsigned not null,
Imagen_Herramienta blob null,
Estado enum("Activo","No activo") default "Activo",
Disponibilidad enum("Si","No") default "Si"
);

create table Inventario_Material(
ID_Inventario_M smallint unsigned Primary key auto_increment,
Fecha_Registro date not null,
Cantidad smallint unsigned not null,
Nombre varchar(255) not null,
Descripcion varchar(255) not null,
Fecha_Compra date not null,
Valor_Unidad mediumint unsigned not null,
Valor_Total int unsigned not null,
Imagen_Material blob null,
Estado enum("Activo","No activo") default "Activo",
Codigo_Usuario smallint unsigned not null,
foreign key(Codigo_Usuario) references Usuario(ID_Usuario)
);

create table Producto(
ID_Producto smallint unsigned Primary key auto_increment,
Nombre varchar(255) not null,
Precio int unsigned not null,
Descripcion varchar(255) not null,
Especificacion varchar(255) null,
Estado enum("Activo","No activo") default "Activo",
Imagen blob not null,
Codigo_Usuario smallint unsigned not null,
foreign key(Codigo_Usuario) references Usuario(ID_Usuario)
);

create table Pedido(
ID_Pedido smallint unsigned Primary key auto_increment,
Especificacion varchar(255) null,
Abono int unsigned null,
Fecha_Solicitud date not null,
Fecha_Entrega date null,
Estado enum("Activo","No activo") default "Activo",
Codigo_Usuario smallint unsigned not null,
foreign key(Codigo_Usuario) references Usuario(ID_Usuario)
);

create table Venta(
ID_Venta smallint unsigned Primary key auto_increment,
Precio int unsigned not null,
Descuento tinyint unsigned null,
Fecha_Facturacion date not null,
Impuesto int not null,
Cancelacion enum("Si","No") default "No",
Codigo_Usuario smallint unsigned not null,
Codigo_Pedido smallint unsigned unique not null,
foreign key(Codigo_Usuario) references Usuario(ID_Usuario),
foreign key(Codigo_Pedido) references Pedido(ID_Pedido)
);
create table Detalles_Crea(
Codigo_Producto smallint unsigned not null,
Codigo_Inventario_M smallint unsigned not null,
foreign key(Codigo_Producto) references Producto(ID_Producto),
foreign key(Codigo_Inventario_M) references Inventario_Material(ID_Inventario_M),
Salida smallint unsigned not null,
Fecha_Salida date not null,
Total_Inventario mediumint unsigned not null,
Lo_tiene smallint unsigned not null,
foreign key(Lo_tiene) references Usuario(ID_Usuario)
);
-- use ventas_inventario;
-- drop table detalles_crea;
create table Detalles_Utiliza(
 Codigo_Usuario smallint unsigned not null,
 Codigo_Inventario_H smallint unsigned not null,
 foreign key(Codigo_Usuario) references Usuario(ID_Usuario),
 foreign key(Codigo_Inventario_H) references Inventario_Herramienta(ID_Inventario_H),
 Salida smallint unsigned not null,
 Fecha_Salida date not null,
 Fecha_Llegada date null
);

create table Detalles_Genera(
 Codigo_Producto smallint unsigned not null,
 Codigo_Pedido smallint unsigned not null,
 Especificacion1 varchar(255) null,
 Especificacion2 varchar(255) null,
 Especificacion3 varchar(255) null,
 Especificacion4 varchar(255) null,
 Especificacion5 varchar(255) null,
 Especificacion6 varchar(255) null,
 Especificacion7 varchar(255) null,
 Especificacion8 varchar(255) null,
 Especificacion9 varchar(255) null,
 Especificacion10 varchar(255) null,
 foreign key(Codigo_Producto) references Producto(ID_Producto),
 foreign key(Codigo_Pedido) references Pedido(ID_Pedido)
);

create table Experiencia(
Codigo_Usuario smallint unsigned not null,
Nombre_Empresa varchar(255) null,
Cargo varchar(255) null,
Fecha_Inicio date null,
Fecha_Fin date null,
Observacion varchar(255) null,
Telefono_empresa int unsigned null,
Nombre_Contacto varchar(255) null,
foreign key(Codigo_Usuario) references Usuario(ID_Usuario)
);

create table Certificado(
Codigo_Usuario smallint unsigned not null,
Nombre_Certificado varchar(255) not null,
Organizacion_Emisora varchar(255) not null,
Fecha_Expedicion date not null,
Certificacion blob not null,
foreign key(Codigo_Usuario) references Usuario(ID_Usuario)
);
drop table certificado;