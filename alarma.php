<?php
include 'core/db.php';

$db = DB::getInstance();
$mysqli = $db->getConnection(); 

// consulta que obtiene el numero de videoBeam con dato 0 (desconectado)
$query = "
  select
    COUNT(videoBeam) 
  from
    valores 
  where
    videoBeam = 0
"; 

$result = $mysqli->query($query);
$fila = mysqli_fetch_assoc($result);

echo 'resultado: ' . $fila['COUNT(videoBeam)']; // fila[nombre de la columna que devuelve]


if ($fila['COUNT(videoBeam)']>0) {
  // header('Location: http://192.168.1.21/LED=ON'); 
	// header('Location: http://.facebook.com'); 
}else{
	// header('Location: http://192.168.1.21/LED=OFF'); 	
}
?>