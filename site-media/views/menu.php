   <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
       <a class="navbar-brand" href="#">Taller mecanico</a>
       <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
           <span class="navbar-toggler-icon"></span>
       </button>

       <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
           <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                   <a class="nav-link" href="index.php?c=clientes">Clientes <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="index.php?c=Vehiculos">Vehiculos</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="index.php?c=Notas">Notas</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="index.php?c=Servicios">Servicios</a>
               </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
                   <div class="dropdown-menu" aria-labelledby="dropdown01">
                       <a class="dropdown-item" href="index.php?c=reportes">Action</a>
                       <a class="dropdown-item" href="index.php?c=Notas">Another action</a>
                       <a class="dropdown-item" href="index.php?c=Notas">Something else here</a>
                   </div>
               </li>
           </ul>
           <form class="form-inline my-2 my-lg-0">
                <button type="button" class="btn btn-outline-success my-2 my-sm-0" onclick="window.location = 'index.php?c=login&a=cerrarSesion'">Cerra sesion</button>
           </form>
       </div>
   </nav> 