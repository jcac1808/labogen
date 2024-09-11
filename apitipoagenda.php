<?php
    header("content-type: application/json; charset=utf-8");
    require_once("model/tipoagenda.php");
    $obj= new Agenda();
    
    // API QUE DEVUELVE UN JSON
    $server = $_SERVER["REQUEST_METHOD"];
    switch($server){
        case "GET":
            $result = $obj->Listar();
            $arraymedicos = array();
            foreach ($result as $fila)
            {
                array_push($arraymedicos, $fila );
            }
            echo json_encode($arraymedicos);
            break;
    }
?>