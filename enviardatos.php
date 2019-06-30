<?php

$conexion = new mysqli("localhost", "root","12345","salones");

$chipid = $_POST ['chipid'];	
$puerta = $_POST ['puerta'];
$videoBeam = $_POST ['videoBeam'];
$sensorMovimiento = $_POST ['sensorMovimiento'];
$query="UPDATE `valores` SET `puerta` = '$puerta', `videoBeam` = '$videoBeam', `sensorMovimiento` = $sensorMovimiento WHERE `valores`.`chipId` = '$chipid';";
$resultado= $conexion->query($query);

if($resultado){

              echo "Registro exitoso";
              }
else{
             echo "Registro no exitoso";
    }

?>