<?php
$cons_usuario="root"; //usuario de la base de datos
$cons_contra="12345"; // contraseña de la base de datos
$cons_base_datos="salones"; // nombre de la base de datos a acceder
$cons_equipo="localhost"; // host de la base de datos

$obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos); //conexion a la bb
if ($obj_conexion) {
	$var_consulta= "select COUNT(videoBeam) from valores where videoBeam=0"; // consulta que obtiene el numero de videoBeam con dato 0(desconectado)
	$var_resultado = $obj_conexion->query($var_consulta); // resultado de la consulta
	$fila = mysqli_fetch_assoc($var_resultado); //manejo de los datos
	echo 'resultado: ' . $fila['COUNT(videoBeam)']; // fila[nombre de la columna que devuelve]
}else{
	echo "resultado: erro";
}

if ($fila['COUNT(videoBeam)']>0) {
	// header('Location: http://192.168.1.21/LED=ON'); 
	//header('Location: http://.facebook.com'); 
}else{
	//header('Location: http://192.168.1.21/LED=OFF'); 
	
}


/*if(!$obj_conexion)
{
    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
}
else
{
    echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
}

/* ejemplo de una consulta */
/*
$var_consulta= "select * from valores";
$var_resultado = $obj_conexion->query($var_consulta);

if($var_resultado->num_rows>0)
  {
    echo"<table border='1' align='center'>
     <tr bgcolor='#E6E6E6'>
        <th>Campo1</th>
        <th>Campo2</th>
        <th>Campo3</th>
        <th>Campo5</th>
        <th>Campo5</th>
    </tr>";

while ($var_fila=$var_resultado->fetch_array())
{
    echo "<tr>
    <td>".$var_fila["id"]."</td>";
    echo "<td>".$var_fila["videoBeam"]."</td>";
    

 }
}
else
  {
    echo "No hay Registros";

  }
*/
?>