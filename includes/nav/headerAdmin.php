<header>
  <nav class="navbar bg-dark navbar-inverse w-100 fixed-top shadow" id="navU">
    
    <a class="navbar-brand " href="index.php">
      <img src="img/footagsY.png" class="img-fluid d-flex d-md-none  mb-2 float-right" alt="footags" width="90px" />
      <img src="img/footagsY.png" class="img-fluid d-none d-md-flex mt-1 mb-1 float-right" alt="footags" width="100px" />
    </a>
    <div class="col-6">
     
      <?php 
       $nombre = "no login";
      if ($_SESSION['logueado'] == $nombre){
      echo '<div class="bg-warning float-right rounded mt-1 pt-1 pb-1 h-50"><a href="home.php?op=iniciar sesión" class= " float-right" type= "button" style="height: 25px;">
        <p class="text-dark text-center  mx-2 ">inicia sesión</p>
       </a></div>';
       } elseif($_SESSION['logueadoId'] == TRUE) {
       
      echo '<p class="mt-2 text-warning float-right">
        '.$_SESSION["logueado"] .'&nbsp;
        <img src="img/path2.png" class="img-fluid mr-2 float-right" alt="userfoo" width="24px">
      </p>';
       }?>


    </div>


  </nav>
  <nav class="navbar fixed-bottom navbar-light align-items-center flex-row d-inline d-block d-md-none bg-dark flex-nowrap w-100" style="opacity: 80%;">


    <div class="container-fluid w-100">
      <?php
      //creamos array con las opciones del menú
      $menu = [
        1 => 'crear',
        2 => 'proyectos',
        3 => 'comunidad',
        4 => 'salir'
      ];
      ?>
      <button onclick="location.assign('fooAdmin.php?op=<?php echo $menu[1] ?>')" class="nav-item nav-link text-center text-warning flex-block bg-transparent border-0 w-25" id="navAsideItem">
        <img class="img-fluid" src="img/mas.png" alt="mas" width="35px" id="sideItem">
        <p class="d-block text-center"><small><small><?php echo $menu[1] ?></small></small></p>
      </button>
      <button onclick="location.assign('fooAdmin.php?op=<?php echo $menu[2] ?>')" class=" nav-item nav-link text-center text-warning flex-block bg-transparent border-0 w-25">
        <img class="img-fluid" src="img/publicP.png" alt="mas" width="35px id=" sideItem">
        <p class="d-block text-center"><small><small><?php echo $menu[2] ?></small></small></p>
      </button>
      <button onclick="location.assign('fooAdmin.php?op=<?php echo $menu[3] ?>')" class=" nav-item nav-link text-center text-warning flex-block bg-transparent border-0 w-25">
        <img class="img-fluid float-none " src="img/comunidad.png" alt="mas" width="35px id=" sideItem">
        <p class="d-block text-center"><small><small><?php echo $menu[3] ?></small></small></p>
      </button>
      <button onclick="location.assign('salir.php')" class=" nav-item nav-link text-center text-warning flex-block bg-transparent border-0 w-25" href="salir.php">
        <img class="img-fluid" src="img/cerrar.png" alt="mas" width="35px" id="sideItem">
        <p class="d-block text-center"><small><small><?php echo $menu[4] ?></small></small></p>
      </button>
    </div>


  </nav>



</header>