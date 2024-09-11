<?php
    declare(strict_types=1);
    require_once 'model/conexion.php';

    class Agenda extends Conexion{
        public $pdo;

        public function __construct() {
            $this->pdo=parent::Conectar();
        }

        public function Listar(){
            try
            {
                $stm = $this->pdo->prepare("SELECT tipoagenda_id, descripcion FROM `tipoagenda`;");
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch (PDOException $e)
            {
                echo "Error al consultar medico: ".$e->getMessage();
            }
        }
    }
?>