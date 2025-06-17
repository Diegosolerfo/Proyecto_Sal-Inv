<?php
    //include "controlador_c1.php";
    class inventario_material {
        private $id_inventario_material;
        private $cantidad;
        private $nombre;
        private $descripcion;
        private $fecha_compra;
        private $valor_unidad;
        private $valor_total;
        private $imagen_material;
        private $estado;
        private $total_inventario;
        private $registrado_por;
        private $salida;
        private $id_pro;
        private $lo_tiene;

        public function __construct(
            $id_inventario_material_f = NULL,
            $cantidad_f = NULL,
            $nombre_f = NULL,
            $descripcion_f = NULL,
            $fecha_compra_f = NULL,
            $valor_unidad_f = NULL,
            $valor_total_f = NULL, 
            $imagen_material_f = NULL,
            $estado_f = NULL,
            $registrado_por_f = NULL,
            $salida_f = NULL,
            $total_inventario_f = NULL,
            $id_pro_f = NULL,
            $lo_tiene_f = NULL
        ) {
            $this->id_inventario_material = $id_inventario_material_f;
            $this->cantidad = $cantidad_f;
            $this->nombre = $nombre_f;
            $this->descripcion = $descripcion_f;
            $this->fecha_compra = $fecha_compra_f;
            $this->valor_unidad = $valor_unidad_f;
            $this->valor_total = $valor_total_f;
            $this->imagen_material = $imagen_material_f;
            $this->estado = $estado_f;
            $this->registrado_por = $registrado_por_f;
            $this->salida = $salida_f;
            $this->total_inventario = $total_inventario_f;
            $this->id_pro = $id_pro_f;
            $this->lo_tiene = $lo_tiene_f;
        }
        // Metodo para el registro de un material 
        public function registrar_material(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sentencia = $conexion->prepare("CALL RegistrarInventarioMaterial(?, ?, ?, ?, ?, ?, ?, ?)");
            // Usamos bindParam de manera correcta
            $sentencia->bindParam(1, $this->cantidad);
            $sentencia->bindParam(2, $this->nombre);
            $sentencia->bindParam(3, $this->descripcion);
            $sentencia->bindParam(4, $this->fecha_compra);
            $sentencia->bindParam(5, $this->valor_unidad);
            $sentencia->bindParam(6, $this->valor_total);
            $sentencia->bindParam(7, $this->imagen_material);
            $sentencia->bindParam(8, $this->registrado_por);
            $rrm = $sentencia->execute();
            return $rrm;
        }
        public function registro_detalles_crea(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL RegistrarDetallesCrea(?,?,?,?,?)");
            $sentencia->bindParam(1, $this->id_pro);
            $sentencia->bindParam(2, $this->id_inventario_material);
            $sentencia->bindParam(3, $this->salida);
            $sentencia->bindParam(4, $this->total_inventario);
            $sentencia->bindParam(5, $this->lo_tiene);
            $rrc = $sentencia->execute();
            return $rrc;
        }// Metodo para la consulta general de los materiales
        public function conseguir_imagen(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL imagen(?)");
            $sentencia->bindParam(1, $this->id_inventario_material);
            $rrc = $sentencia->execute();
            return $rrc;
        }
        // Metodo para la consulta general de los materiales
        public function consultar_material(){
            $conexion = new PDO("mysql:host=localhost; dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL ConsultaGeneralInventarioM()");
            $sentencia->execute();
            $rcgm = $sentencia->fetchALL(PDO::FETCH_ASSOC);
            return $rcgm;
        }
        public function consulta_especifica(){
            $conexion = new PDO("mysql:host=localhost; dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL especifico_inventario(?)");
            $sentencia->bindParam(1, $this->id_inventario_material);
            $sentencia->execute();
            $rcdc = $sentencia->fetchALL(PDO::FETCH_ASSOC);
            return $rcdc;
        }
        public function esp_consultar_detalles_crea(){
            $conexion = new PDO("mysql:host=localhost; dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL FEspecificoInventarioM(?)");
            $sentencia->bindParam(1, $this->id_pro);
            $sentencia->execute();
            $rcdc = $sentencia->fetchALL(PDO::FETCH_ASSOC);
            return $rcdc;
        }
        // Método para consultar un material por el nombre
        public function consultar_inv_mat() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL EspecificoInventarioM(?)");
            $sentencia->bindParam(1, $this->nombre);
            $sentencia->execute();
            $rcem = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $rcem;
        }
    
        // Método para actualizar un material en el inventario
        public function actualizar_inv_mat() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL ActualizarInventarioMaterial(?,?,?,?,?,?,?,?)");
            $sentencia->bindParam(1, $this->id_inventario_material);
            $sentencia->bindParam(2, $this->cantidad);
            $sentencia->bindParam(3, $this->nombre);
            $sentencia->bindParam(4, $this->descripcion);
            $sentencia->bindParam(5, $this->fecha_compra);
            $sentencia->bindParam(6, $this->valor_unidad);
            $sentencia->bindParam(7, $this->valor_total);
            $sentencia->bindParam(8, $this->imagen_material);
            $ram = $sentencia->execute();
            return $ram;
        }#Para actualizar un material o sacar con un operador
        public function sacar() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL sacar(?,?,?,?,?)");
            $sentencia->bindParam(1, $this->id_pro);
            $sentencia->bindParam(2, $this->id_inventario_material);
            $sentencia->bindParam(3, $this->salida);
            $sentencia->bindParam(4, $this->total_inventario);
            $sentencia->bindParam(5, $this->lo_tiene);
            $ram = $sentencia->execute();
            return $ram;
        }
        public function actualizar_detalles(){
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL ActualizarDetallesCrea(?,?,?,?,?)");
            $sentencia->bindParam(1, $this->id_pro);
            $sentencia->bindParam(2, $this->salida);
            $sentencia->bindParam(3, $this->total_inventario);
            $sentencia->bindParam(4, $this->cantidad);
            $sentencia->bindParam(5, $this->id_inventario_material);
            $rdc = $sentencia->execute();
            return $rdc;
        }
        // Método para eliminar un material del inventario
        public function eliminar_inv_mat() {
            $conexion = new PDO("mysql:host=localhost;dbname=Ventas_Inventario", "root");
            $sentencia = $conexion->prepare("CALL EliminarInventarioMaterial(?)");
            $sentencia->bindParam(1, $this->id_inventario_material);
            $rem = $sentencia->execute();
            return $rem;
        }
    }
?>