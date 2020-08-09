<div class="col-md-2 col-lg-2 col-xl-2 w-100 float-left align-self-stretch d-none d-md-flex d-lg-flex d-xl-flex bg-dark shadow" style="opacity: 80%;">
  <nav class="navAside navAside-light sticky-top float-left bg-transparent pt-4 flex-nowrap w-100" id="navLat">


    <div class=" container-fluid w-100 mt-5">


      <button type="button" onclick="location.assign('escenas.php?id=<?php echo $pId?>')" class="btn text-center text- flex-block btn-transparent  border-0 w-100" id="menuLatOp" >
      <img class="img-fluid" src="img/escenas.png" alt="mas" width="35px"> 
      <p class="d-block text-center text-monospace" style=" color: black;"><small><small>escenas</small></small></p>
      </button>

      <button onclick="location.assign('planos.php?id=<?php echo $pId?>')" class="btn text-center text-success flex-block btn-transparent  border-0 w-100" id="menuLatPryct">
        <img class="img-fluid" src="img/planos.png" alt="mas" width="35px">
        <p class="d-block text-center text-monospace"><small><small>planos</small></small></p>
      </button>

      <button onclick="location.assign('PlanRodaje.php?id=<?php echo $pId  ?>')" class="btn text-center text-info flex-block btn-transparent border-0 w-100" id="menuLatOp">
        <center><img class="img-fluid ml-1 " src="img/planRodaje.png" alt="mas" width="35px"></center>
        <p class="d-block text-center text-monospace"><small><small>plan rodaje</small></small></p>
      </button>

      <button onclick="location.assign('fooAdmin.php?op=proyectos')" class="btn text-center text-warning flex-block btn-transparent border-0 w-100" id="menuLatOp">
        <img class="img-fluid" src="img/publicP.png" alt="mas" width="35px">
        <p class="d-block text-center text-monospace"><small><small>proyectos</small></small></p>
      </button>

    </div>



  </nav>
</div>