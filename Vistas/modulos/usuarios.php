
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
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>
      </div>
    </div>       
    <p></p>
    <p></p>

    <table class="table table-striped tabladataTable ">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Carnet</th>
          <th scope="col">Rol</th>   
          <th scope="col">Acciones</th>
          <th scope="col">nota</th>
        </tr>
      </thead>
        <tbody>
          <?php
              $item=null;
              $valor = null;
              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
              foreach ($usuarios as $key => $value) {
                echo'<tr>
                  <th scope="row">'.$value['id'].'</th>
                  <td>'.$value['nombre'].'</td>
                  <td>'.$value['usuario'].'</td>
                  <td>'.$value['perfil'].'</td>
                  <td>'.$value['nota'].'</td>
                  <td>  
                  <div class="btn-group">
                        
                    <button class="btn btn-warning btn-xs btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></button>

                    <button class="btn btn-danger btn-xs btnEliminarUsuario" idUsuario="'.$value["id"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>

                  </div></td>
                  </tr>';
            }
          ?>
        </tbody>
    </table>


<!-- Modal agregar Usuario -->
  <div id="modalAgregarUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   <form role="form" method="post" enctype="multipart/form-data">

    <div class="modal-content">
      <div class="modal-header" style="background: #3c8dbc; color: white;"; >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar usuario</h4>
      </div>
      <div class="modal-body">
         <div class="box-body">
           <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-user"></i></span>
               <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
             </div>
           </div>
           <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-key"></i></span>
               <input class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Carnet" required>
             </div>
           </div>
           <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-lock"></i></span>
               <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
             </div>
           </div>
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-lock"></i></span>
               <select class="form-control input-lg" name="nuevoPerfil">
                 <option value="">Seleccionar Perfil</option>
                 <option value="Administrador">Administrador</option>
                 <option value="Supervisor">Supervisor</option>
                 <option value="Maestro">Maestro</option>
                 <option value="Padre">Padre</option>
                 <option value="Estudiante">Estudiante</option>
               </select>
             </div>
           </div>
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fas fa-calendar-day"></i></span>
               <input type="text" class="form-control input-lg" id="nuevoNacimiento" name="nuevoNacimiento" placeholder="Ingresar Fecha de Nacimiento">
             </div>
           </div>
            <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fas fa-birthday-cake"></i></span>
               <input type="text" class="form-control input-lg" name="nuevoEdad" placeholder="Ingresar Edad">
             </div>
           </div>
             <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-lock"></i></span>
               <input type="text" class="form-control input-lg" name="nuevoNota" placeholder=""   >
             </div>
           </div>
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>

    <?php
      $crearUsuario = new ControladorUsuarios();
      $crearUsuario ->ctrCrearUsuario();

    ?>
  </form>
    </div>
  </div>

  <!-- Modal Editar  Usuario -->
<div class="modal fade" id="modalEditarUsuario" role="dialog">
  <div class="modal-dialog">
     <form role="form" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-user"></i></span>
            <input type="text" name="editarNombre" id="editarNombre" class="form-control input-lg" value="Nombre Usuario" required>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-key"></i></span>
            <input type="text" name="editarUsuario" id="editarUsuario" class="form-control input-lg" placeholder="Ingresar Carnet" readonly>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
            <input type="text" name="editarPassword" class="form-control input-lg" placeholder="Escriba la nueva contraseña">
            <input type="hidden" name="passwordActual" id="passwordActual">
          </div>
        </div>
        <div class="input-group">
            <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
            <input type="text" name="editarNota" class="form-control input-lg" placeholder="Escriba la nueva Nota">
            <input type="hidden" name="editarNota" id="editarNota">
          </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-user"></i></span>
            <select class="form-control input-lg" name="editarPerfil">
              <option  value="" id="editarPerfil"></option>
                 <option value="Administrador">Administrador</option>
                 <option value="Supervisor">Supervisor</option>
                 <option value="Maestro">Maestro</option>
                 <option value="Padre">Padre</option>
                 <option value="Estudiante">Estudiante</option>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
    
    <?php

    $editarUsuario = new ControladorUsuarios();
    $editarUsuario -> ctrEditarUsuario();

    ?>
</form>
  </div>
  
  
</div>

 </section>
</div>
  <!-- /.content-wrapper -->

<?php
  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();
  ?>