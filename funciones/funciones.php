<?php

function obtenerSalones(){
    include 'conexion.php';

    try{
        return $conn->query("SELECT id_salon,chipId,tiempo,puerta,videoBeam,sensorMovimiento FROM valores"); 

    }catch(Exception $e){
         echo "Error!!". $e->getMessage();
         return false;

    }
    
}