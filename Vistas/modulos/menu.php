<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="vistas/img/suizo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Suizo Americano</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="vistas/img/usuario.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <?php 
          if ($_SESSION['nombre']!=""){
            echo'<a class="d-block">'.$_SESSION['nombre'].'</a></div>';
          }else{
            echo'<a href="#" class="d-block">Nombre del usuario</a>
            </div>';
          }
          ?>
        </div>  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-header">Menu</li>

                  <?php 
          if ($_SESSION['perfil'] == "Administrador"){
            echo'<li class="nav-item">
            <a href="usuarios" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>';
          }
          ?>

                    <?php 
          if ($_SESSION['perfil'] == "Supervisor"){
            echo'<li class="nav-item">
            <a href="usuarios" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>';
          }
          ?>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus-circle"></i>
              <p>
                Revisar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <?php 
          if ($_SESSION['perfil'] == "Administrador"){
            echo'<li class="nav-item">
           <li class="nav-item">
                <a href="estudiante" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Estudiante</p>
                </a>
              </li>
          </li>';
          }
          ?>

           <?php 
          if ($_SESSION['perfil'] == "Administrador"){
            echo'<li class="nav-item">
              <li class="nav-item">
                <a href="padre" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Padres</p>
                </a>
              </li>
          </li>';
          }
          ?>

            <?php 
          if ($_SESSION['perfil'] == "Administrador"){
            echo'<li class="nav-item">
           <li class="nav-item">
                <a href="nota" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notas</p>
                </a>
              </li>
          </li>';
          }
          ?>

           <?php 
          if ($_SESSION['perfil'] == "Administrador"){
            echo'<li class="nav-item">
            <li class="nav-item">
                <a href="maestro" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Maestro</p>
                </a>
              </li>
          </li>';
          }
          ?>

                 <?php 
          if ($_SESSION['perfil'] == "Administrador"){
            echo'<li class="nav-item">
             <li class="nav-item">
                <a href="curso" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Curso</p>
                </a>
              </li>
          </li>';
          }
          ?>

           <?php 
          if ($_SESSION['perfil'] == "Supervisor"){
            echo'<li class="nav-item">
           <li class="nav-item">
                <a href="estudiante" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Estudiante</p>
                </a>
              </li>
          </li>';
          }
          ?>

           <?php 
          if ($_SESSION['perfil'] == "Supervisor"){
            echo'<li class="nav-item">
              <li class="nav-item">
                <a href="padre" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Padres</p>
                </a>
              </li>
          </li>';
          }
          ?>

            <?php 
          if ($_SESSION['perfil'] == "Supervisor"){
            echo'<li class="nav-item">
           <li class="nav-item">
                <a href="nota" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notas</p>
                </a>
              </li>
          </li>';
          }
          ?>

           <?php 
          if ($_SESSION['perfil'] == "Supervisor"){
            echo'<li class="nav-item">
            <li class="nav-item">
                <a href="maestro" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Maestro</p>
                </a>
              </li>
          </li>';
          }
          ?>

                 <?php 
          if ($_SESSION['perfil'] == "Supervisor"){
            echo'<li class="nav-item">
             <li class="nav-item">
                <a href="curso" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Curso</p>
                </a>
              </li>
          </li>';
          }
          ?>

          <?php 
          if ($_SESSION['perfil'] == "Maestro"){
            echo'<li class="nav-item">
           <li class="nav-item">
                <a href="estudiante" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Estudiante</p>
                </a>
              </li>
          </li>';
          }
          ?>

            <?php 
          if ($_SESSION['perfil'] == "Maestro"){
            echo'<li class="nav-item">
           <li class="nav-item">
                <a href="nota" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notas</p>
                </a>
              </li>
          </li>';
          }
          ?>


                 <?php 
          if ($_SESSION['perfil'] == "Maestro"){
            echo'<li class="nav-item">
             <li class="nav-item">
                <a href="curso" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Curso</p>
                </a>
              </li>
          </li>';
          }
          ?>

                <?php 
          if ($_SESSION['perfil'] == "Padre"){
            echo'<li class="nav-item">
           <li class="nav-item">
                <a href="estudiante" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Estudiante</p>
                </a>
              </li>
          </li>';
          }
          ?>

                <?php 
          if ($_SESSION['perfil'] == "Padre"){
            echo'<li class="nav-item">
           <li class="nav-item">
                <a href="nota" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notas</p>
                </a>
              </li>
          </li>';
          }
          ?>

                 <?php 
          if ($_SESSION['perfil'] == "Estudiante"){
            echo'<li class="nav-item">
           <li class="nav-item">
                <a href="nota" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notas</p>
                </a>
              </li>
          </li>';
          }
          ?>

                  <?php 
          if ($_SESSION['perfil'] == "Estudiante"){
            echo'<li class="nav-item">
             <li class="nav-item">
                <a href="curso" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Curso</p>
                </a>
              </li>
          </li>';
          }
          ?>    
            </ul>
          </li>
        </ul>
      </nav>
      </div><!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>