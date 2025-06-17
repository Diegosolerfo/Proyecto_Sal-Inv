<?php
    //include "controlador_c1.php";
    class producto {
        private $id_pro;
        private $nombre;
        private $precio;
        private $descripcion;
        private $especificaciones;
        private $imagen_pro;
        private $estado;
        private $codigo_usuario;
    
        public function __construct(
            $id_pro_f = NULL, 
            $nombre_f = NULL, 
            $precio_f = NULL, 
            $descripcion_f = NULL, 
            $especificaciones_f = NULL, 
            $imagen_pro_f = NULL, 
            $codigo_usuario_f = NULL,
        ) {
            $this->id_pro = $id_pro_f;
            $this->nombre = $nombre_f;
            $this->precio = $precio_f;
            $this->descripcion = $descripcion_f;
            $this->especificaciones = $especificaciones_f;
            $this->codigo_usuario = $codigo_usuario_f;
            $this->imagen_pro = $imagen_pro_f;
        }
    
        // Método para registrar un producto
        public function registrar_producto() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL RegistrarProducto(?,?,?,?,?,?)");
            $sentencia->bindParam(1, $this->nombre);
            $sentencia->bindParam(2, $this->precio);
            $sentencia->bindParam(3, $this->descripcion);
            $sentencia->bindParam(4, $this->especificaciones);
            $sentencia->bindParam(5, $this->imagen_pro);
            $sentencia->bindParam(6, $this->codigo_usuario);
            $r = $sentencia->execute();
            return $r;
        }
    
        // Método para consultar todos los productos
        public function Consultar_producto_general() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL ConsultaGeneralProductoAdmOp()");
            $sentencia->execute();
            $rcu = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $rcu;
        }
        // Método para consultar todos los productos
        public function todos_productos() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL todos_productos()");
            $sentencia->execute();
            $rcu = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $rcu;
        }
        // Método para consultar un producto específico por su nombre
        public function consultar_pro_especifico() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL EspecificoProductoAdmOp(?)");
            $sentencia->bindParam(1, $this->nombre);
            $sentencia->execute();
            $rcep = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $rcep;
        }
        public function consultar_act() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL EspecificoActu(?)");
            $sentencia->bindParam(1, $this->id_pro);
            $sentencia->execute();
            $rcep = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $rcep;
        }
        public function imagen() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL IMAGEN_Pro(?)");
            $sentencia->bindParam(1, $this->id_pro);
            $sentencia->execute();
            $rcep = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $rcep;
        }
        // Método para actualizar un producto
        public function actualizar() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL ActualizarProducto(?,?,?,?,?,?)");
            $sentencia->bindParam(1, $this->id_pro);
            $sentencia->bindParam(2, $this->nombre);
            $sentencia->bindParam(3, $this->precio);
            $sentencia->bindParam(4, $this->descripcion);
            $sentencia->bindParam(5, $this->especificaciones);
            $sentencia->bindParam(6, $this->imagen_pro);
            $res = $sentencia->execute();
            return $res;
        }
    
        // Método para eliminar un producto
        public function eliminar() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL EliminarProducto(?)");
            $sentencia->bindParam(1, $this->id_pro);
            $res = $sentencia->execute();
            return $res;
        }
    }
?>