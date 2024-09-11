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
                $stm = $this->pdo->prepare("SELECT agenda_id, agenda.tipoagenda_id, tipoagenda.descripcion , agenda_descripcion, fecha_inicio, fecha_fin FROM `agenda` INNER JOIN tipoagenda ON agenda.tipoagenda_id=tipoagenda.tipoagenda_id;");
                $stm->execute();
                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch (PDOException $e)
            {
                echo "Error al consultar medico: ".$e->getMessage();
            }
        }

        public function ListarId(int $agenda_id){
            try
            {
                $stm = $this->pdo->prepare("SELECT agenda_id, tipoagenda_id, agenda_descripcion, fecha_inicio, fecha_fin FROM `agenda` WHERE agenda_id=:agenda_id");
                $stm->execute(array("agenda_id" => $agenda_id));
                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch (PDOException $e)
            {
                echo "Error al consultar medico: ".$e->getMessage();
            }
        }

        public function Insertar(string $tipoagenda_id, string $agenda_descripcion, $fecha_inicio, $fecha_fin){
            try
            {
                $medico_id=0;
                $stm = $this->pdo->prepare("INSERT INTO `agenda` (`tipoagenda_id`, `agenda_descripcion`, `fecha_inicio`, `fecha_fin`) VALUES (:tipoagenda_id,:agenda_descripcion,:fecha_inicio,:fecha_fin)");
                $stm->execute(array("tipoagenda_id" => $tipoagenda_id, "agenda_descripcion" => $agenda_descripcion, "fecha_inicio" => $fecha_inicio, "fecha_fin" => $fecha_fin));
                $result = $stm->rowCount();
                if($result>0)
                    $agenda_id=$this->pdo->lastInsertId();
                
                return $agenda_id;
            }
            catch (PDOException $e)
            {
                echo "Error al consultar agenda: ".$e->getMessage();
            }
        }

        public function Modificar(int $agenda_id, string $tipoagenda_id, string $agenda_descripcion, $fecha_inicio, $fecha_fin){
            try
            {
                $stm = $this->pdo->prepare("UPDATE agenda SET tipoagenda_id=:tipoagenda_id, agenda_descripcion=:agenda_descripcion, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin WHERE agenda_id=:agenda_id");
                echo "$agenda_id $tipoagenda_id $agenda_descripcion $fecha_inicio $fecha_fin";
                $stm->execute(array("agenda_id" => $agenda_id,"tipoagenda_id" => $tipoagenda_id, "agenda_descripcion" => $agenda_descripcion, "fecha_inicio" => $fecha_inicio, "fecha_fin" => $fecha_fin));
                $result = $stm->rowCount();
                if($result>0)
                    $agenda_id=$result;
                
                return $agenda_id;
            }
            catch (PDOException $e)
            {
                echo "Error al consultar agenda: ".$e->getMessage();
            }
        }

        public function Eliminar(int $agenda_id){
            try
            {
                $stm = $this->pdo->prepare("DELETE FROM agenda WHERE agenda_id=:agenda_id");
                $stm->execute(array('agenda_id' => $agenda_id));
                $result = $stm->rowCount();
                if($result>0)
                    $medico_id=$result;
                
                return $medico_id;
            }
            catch (PDOException $e)
            {
                echo "Error al consultar agenda: ".$e->getMessage();
            }
        }
    }
?>