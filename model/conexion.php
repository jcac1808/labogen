<?php
    require_once("configuracion.php");
    class Conexion{
        public function Conectar(){
            try {
                $pdo = new PDO(DSN, USERNAME, PASSWORD, []);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            } catch (PDOException $e) {
                echo "Error al conectar a la Base de Datos: ".$e->getMessage();
            }
        }
    }
?>