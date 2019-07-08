<?php
  include("db.php");

  function getRooms() {
    try {
      $db = DB::getInstance();
      $mysqli = $db->getConnection(); 
      $query = "
        SELECT 
          id_salon,
          chipid,
          tiempo,
          puerta,
          videobeam,
          sensormovimiento
        FROM 
          salones.valores  
      ";
      $result = $mysqli->query($query);

      // descomentar para logs
      /*if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id_salon"] . "<br>";
        }
      } else {
        echo "0 results";
      }*/
      
      return $result;
    } catch(Exception $e){
      return $e->getMessage();
    }
  }
?>