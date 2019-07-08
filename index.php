<!DOCTYPE html>
<html lang="en">

  <?php
    include 'core/funciones.php';
  ?>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <title>Principal</title>
  </head>

  <body>
    <header class="header">
      <img src="assets/img/logoIngenieria.png" class="logo" alt="">
      <h1 class="tittle"> Salones </h1>
      <h1> Cerrar Sesion </h1>
    </header>
      
    <div class="contenido-salones contenedor">
      <?php  
        $salones=getRooms();
        foreach($salones as $salon) {
      ?>
        <!--salon-->
        <div class="salon grow" href="#modal" valuz e=<?php echo $salon["id_salon"];?>>
          <h2>Salon</h2>
          <h3><?php echo $salon["id_salon"]; ?></h3>
          <h4>puerta: <?php echo $salon["puerta"]; ?> </h4>
          <h4>videoBeam: <?php echo $salon["videoBeam"]; ?> </h4>
          <h4>tiempo: <?php echo $salon["tiempo"]; ?> </h4>
          <h4>sensorMovimiento: <?php echo $salon["sensorMovimiento"]; ?> </h4>
        </div>
      <?php
        }
      ?>
    </div>

    <!--ventanaModal-->
    <div id="miModal" class="modal">
      <div class="flex">
        <div class="contenido-modal">
          <div class="modal-header flex">
            <span class="close" id="close">&times;</span>
            <h2>Horario Salon <span class="idSalon"></span></h2>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer"></div>
        </div>
      </div>
    </div>
    <script src="assets/js/app.js"></script>
  </body>
</html>