create database VentasInventario;
use VentasInventario;
-- DROP DATABASE VentasInventario;
create table Usuario(
idUsuario smallint unsigned Primary key auto_increment,
numeroDocumento bigint unsigned unique not null,
clave varchar(255) not null,
nombre varchar(255) not null,
apellido varchar(255) not null,
correo varchar(255) not null unique,
fechaNacimiento date not null,
direccion varchar(255) not null,
genero enum("Hombre","Mujer") null,
telefono int unsigned not null unique,
estadoCuenta enum("Activo","No activo") default "Activo" not null,
rol enum("Cliente","Operador","Administrador") default "Cliente" not null,
eps varchar(255) null, -- pueden ser null porque para los clientes no es necesario
rh enum("+","-") null,
tipoSangre enum("AB","O","A","B") null,
registradoPor smallint unsigned null,
foreign key(registradoPor) references Usuario(idUsuario)
);
create table InventarioHerramienta(
idHerramienta smallint unsigned Primary key auto_increment,
nombre varchar(255) not null,
tipoHerramienta enum("Herramienta de Mano", "Herramienta de Instalacion", "Herramienta de Taller", "Herramienta de Oficina", "Maquinaria pesada" ) not null,
cantidad smallint unsigned not null,
imagenHerramienta blob null,
estado enum("Activo","No activo") default "Activo"
);
create table DetallesUtiliza(
 codigoUsuario smallint unsigned not null,
 codigoHerramienta smallint unsigned not null,
 foreign key(codigoUsuario) references Usuario(idUsuario),
 foreign key(codigoHerramienta) references InventarioHerramienta(idHerramienta),
 salida smallint unsigned not null,
 fechaSalida date not null,
 fechaLlegada date null
);
create table InventarioMaterial( -- aqui solo se registra el material no es necesario especificar quien tiene q material
idMaterial smallint unsigned Primary key auto_increment,
nombre varchar(255) not null,
descripcion varchar(255) not null,
cantidad smallint unsigned not null,
fechaCompra date not null,
valorUnidad mediumint unsigned not null,
valorTotal int unsigned not null,
imagenMaterial blob null,
fechaRegistro date not null,
estado enum("Activo","No activo") default "Activo"
);
create table Categorias(
idCategoria smallint unsigned primary key auto_increment,
nombre varchar(50) not null
);
create table Color(
idColor smallint unsigned primary key auto_increment,
nombre varchar(50) not null
);
create table Material(
idMaterial smallint unsigned primary key auto_increment,
nombre varchar(50) not null
);
create table Pedido(
idPedido smallint unsigned Primary key auto_increment,
codigoCategoria smallint unsigned not null,
descripcion varchar(255) null,
abono int unsigned null,
fechaSolicitud date not null,
fechaEntrega date null,
fechaVisita date not null,
estado enum("Activo","No activo") default "Activo",
codigoColor smallint unsigned not null,
codigoMaterial smallint unsigned not null,
codigoUsuario smallint unsigned not null,
foreign key(codigoUsuario) references Usuario(idUsuario),
foreign key(codigoCategoria) references Categorias(idCategoria),
foreign key(codigoColor) references Color(idColor),
foreign key(codigoMaterial) references Material(idMaterial)
);
create table EspecificacionesPedido(
idEspecificacion smallint unsigned primary key auto_increment,
nombre varchar(50) not null,
descripcion varchar(255) not null,
codigoPedido smallint unsigned not null,
foreign key (codigoPedido) references Pedido(idPedido)
);
create table Proyecto(
idProyecto smallint unsigned Primary key auto_increment,
precio int unsigned not null,
nombre varchar(50) not null,
descripcion varchar(255) null,
estado enum("Activo","No activo") default "Activo",
imagen blob not null,
codigoUsuario smallint unsigned not null,
codigoPedido smallint unsigned not null,
foreign key(codigoUsuario) references Usuario(idUsuario),
foreign key(codigoPedido) references Pedido(idPedido)
);
create table DetallesCrea(
codigoProyecto smallint unsigned not null,
codigoMaterial smallint unsigned not null,
foreign key(codigoProyecto) references Proyecto(idProyecto),
foreign key(codigoMaterial) references InventarioMaterial(idMaterial),
salida smallint unsigned not null,
fechaSalida date not null,
totalInventario mediumint unsigned not null,
loTiene smallint unsigned not null,
foreign key(loTiene) references Usuario(idUsuario)
);

create table Venta(
idVenta smallint unsigned Primary key auto_increment,
precio int unsigned not null,
descuento tinyint unsigned null,
fechaFacturacion date not null,
impuesto int not null,
cancelacion enum("Si","No") default "No",
codigoUsuario smallint unsigned not null,
codigoPedido smallint unsigned unique not null,
foreign key(codigoUsuario) references Usuario(idUsuario),
foreign key(codigoPedido) references Pedido(idPedido)
);