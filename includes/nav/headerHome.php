<header>
  <nav class="navbar bg-dark  fixed-top" id="navU">
    <a class="navbar-brand " href="index.php">
      <img src="img/footagsY.png" class="img-fluid mt-1 mb-1 float-right" alt="footags" width="80px" />
    </a>

    <div class=" navbar-expand text-warning">
      <?php
      //creamos array con las opciones del menú
      $menu = [
        1 => 'comunidad',
        2 => 'registrarse',
        3 => 'iniciar sesión',

      ];
      ?>
      <button onclick="location.assign('proyectosComunidadPublic.php')" class="btn text-center text-warning btn-dark mydark border-0">

        <p><small><?php echo $menu[1] ?></small></p>
      </button>
      <button onclick="location.assign('home.php?op=<?php echo $menu[2] ?>')" class="btn text-center text-warning  btn-dark  border-0">

        <p><small><?php echo $menu[2] ?></small></p>
      </button>
      <button onclick="location.assign('home.php?op=<?php echo $menu[3] ?>')" class="btn text-center text-warning btn-dark border-0">

        <p><small><?php echo $menu[3] ?></small></p>
      </button>
    </div>

  </nav>

</header>