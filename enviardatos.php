<?php
include 'core/db.php';

$db = DB::getInstance();
$mysqli = $db->getConnection(); 

$chipid = $_POST ['chipid'];	
$puerta = $_POST ['puerta'];
$videoBeam = $_POST ['videoBeam'];
$sensorMovimiento = $_POST ['sensorMovimiento'];

$query="
  UPDATE
    `valores` 
  SET
    `puerta` = '$puerta', 
    `videoBeam` = '$videoBeam',
    `sensorMovimiento` = $sensorMovimiento 
  WHERE
    `valores`.`chipId` = '$chipid';
";

$result = $mysqli->query($query);

if($result) {
  echo "Registro exitoso";
} else {
  echo "Registro no exitoso";
}
?>