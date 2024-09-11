<?php
    header("content-type: application/json; charset=utf-8");
    require_once("model/agenda.php");
    $obj= new Agenda();
    
    // API QUE DEVUELVE UN JSON
    $server = $_SERVER["REQUEST_METHOD"];
    switch($server){
        case "GET":
            $result = $obj->Listar();
            $array = array();
            foreach ($result as $fila)
            {
                array_push($array, $fila );
            }
            echo json_encode($array);
            break;
        case "POST":
            $_POST= json_decode(file_get_contents("php://input",true));
            if (!isset($_POST->tipoagenda_id) && !isset($_POST->agenda_descripcion))
            {
                $respuesta = ["error", "introdusca los datos "];
            }
            else
            {
                $respuesta = $obj->Insertar($_POST->tipoagenda_id,$_POST->agenda_descripcion,$_POST->fecha_inicio,$_POST->fecha_fin);
            }
            echo json_encode($respuesta);
            break;
        case "PUT":
            $_PUT= json_decode(file_get_contents("php://input",true));
            if (!isset($_PUT->agenda_id) || !isset($_PUT->agenda_descripcion) )
            {
                $respuesta = ["error", "El nombre no existe"];
            }
            else
            {
                $respuesta = $obj->modificar($_PUT->agenda_id, $_PUT->tipoagenda_id,$_PUT->agenda_descripcion,$_PUT->fecha_inicio,$_PUT->fecha_fin);
            }
            echo json_encode($respuesta);
            break;
        case "DELETE":
            $_DELETE= json_decode(file_get_contents("php://input",true));
            if (!isset($_DELETE->agenda_id))
            {
                $respuesta = ["error", "No introdujo el codigo"];
            }
            else
            {
                $respuesta = $obj->eliminar($_DELETE->agenda_id);
            }
            echo json_encode($respuesta);
            break;
    }
?>