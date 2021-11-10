<?php
  $conexion = mysqli_connect('localhost','root','','pos');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Panel de Control</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Suizo Americano</a></li>
              <li class="breadcrumb-item active">Estudiantes</li>
            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->


    </div>
    <!-- /.content-header -->
        <table class="table table-striped tabladataTable  ">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Carnet</th>
          <th scope="col">Rol</th>   
        </tr>
      </thead>
        <tbody>
          <?php
              $item=null;
              $valor = null;
              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
              foreach ($usuarios as $key => $value) {

                 if ($value["perfil"] == "Estudiante" ) {
                    echo'<tr>
                  <th scope="row">'.$value['id'].'</th>
                    <td>'.$value['nombre'].'</td>
                    <td>'.$value['usuario'].'</td>
                    <td>'.$value['perfil'].'</td>
                  </tr>';
                  }
                 }
          ?>
        </tbody>
    </table>
  

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

