






<div class="side-nav col-md-2 col-lg-2 col-xl-2 w-100 float-left d-none d-md-flex d-lg-flex d-xl-flex bg-dark shadow" style="opacity: 80%">
  <nav class="nav-side navAside sticky-top navAside-light float-left bg-transparent  pt-4 flex-nowrap w-100" id="navLat">


    <div class=" container-fluid w-100 mt-5">
      <?php
      //creamos array con las opciones del menú
      $menu = [
        1 => 'crear',
        2 => 'proyectos',
        3 => 'comunidad',
        4 => 'salir'
      ];
      ?>
      <button onclick="location.assign('fooAdmin.php?op=<?php echo $menu[1] ?>')" class="btn text-center text-warning flex-block btn-transparent mydark border-0 w-100" id="menuLatOp">
        <img class="img-fluid" src="img/mas.png" alt="mas" width="35px" >
        <p class="d-block text-center text-monospace"><small><small><?php echo $menu[1] ?></small></small></p>
      </button>
      <button onclick="location.assign('fooAdmin.php?op=<?php echo $menu[2] ?>')" class="btn text-center text-warning flex-block btn-transparent border-0 w-100" id="menuLatPryct">
        <img class="img-fluid" src="img/publicP.png" alt="mas" width="35px" >
        <p class = "d-block text-center text-monospace"><small><small><?php echo $menu[2] ?></small></small></p>
      </button>
      <button onclick="location.assign('fooAdmin.php?op=<?php echo $menu[3] ?>')" class="btn text-center text-warning flex-block btn-transparent border-0 w-100" id="menuLatOp">
        <center><img class="img-fluid ml-1 " src="img/comunidad.png" alt="mas" width="35px"></center>
        <p class="d-block text-center text-monospace"><small><small><?php echo $menu[3] ?></small></small></p>
      </button>
      <button onclick="location.assign('salir.php')" class="btn text-center text-warning flex-block btn-transparent border-0 w-100" id="menuLatOp">
        <img class="img-fluid" src="img/cerrar.png" alt="mas" width="35px">
        <p class="d-block text-center text-monospace"><small><small><?php echo $menu[4] ?></small></small></p>
      </button>
    </div>



  </nav>
</div>