
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
              <li class="breadcrumb-item active">Curso</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="box">
        <div class="box-header with-border">
            
              <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCurso">Agregar Curso</button>
       
        <div class="box-body">
      
          <table class="table table-striped tabladataTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Alumnos</th>   
          <th scope="col">Accion</th>   
        </tr>
      </thead>
        <tbody>
          <?php
              $item=null;
              $valor = null;
              $cursos = ControladorCursos::ctrMostrarCursos($item, $valor);
              foreach ($cursos as $key => $value) {
                    echo'<tr>
                  <th scope="row">'.$value['id'].'</th>
                    <td>'.$value['nombre'].'</td>
                    <td>'.$value['descripcion'].'</td>
                    <td>'.$value['alumno'].'</td>
                    <td>  
                  <div class="btn-group">
                        
                    <button class="btn btn-warning btn-xs btnEditarCurso" idCurso="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCurso"><i class="fas fa-pencil-alt"></i></button>

                    <button class="btn btn-danger btn-xs btnEliminarCurso" idCurso="'.$value["id"].'" curso="'.$value["nombre"].'"><i class="fa fa-times"></i></button>

                  </div></td>
                  </tr>';
                  }
          ?>
        </tbody>
    </table>
    <!-- /.content -->
  </div>

  <div id="modalAgregarCurso" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   <form role="form" method="post" enctype="multipart/form-data">

    <div class="modal-content">
      <div class="modal-header" style="background: #3c8dbc; color: white;"; >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Curso</h4>
      </div>
      <div class="modal-body">
         <div class="box-body">
           <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-user"></i></span>
               <input type="text" class="form-control input-lg" name="nuevoCurso" placeholder="Ingresar Curso" required>
             </div>
           </div>
           <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-key"></i></span>
               <input type="text" class="form-control input-lg" name="nuevoDescripcion" placeholder="Ingresar Descripcion" required>
             </div>
           </div>
           <div class="form-group">
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-lock"></i></span>
               <input type="text" class="form-control input-lg" name="nuevoAlumno" placeholder="Ingresar Alumno" required>
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
   
      $crearCurso = new ControladorCursos();
      $crearCurso ->ctrCrearCurso();
    ?>
  </form>

  </div>
    </div>

    <div class="modal fade" id="modalEditarCurso" role="dialog">
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
            <input type="text" name="editarDescripcion" id="editarDescripcion" class="form-control input-lg" placeholder="Ingresar Descripcion" readonly>
          </div>
        </div>
        <div class="input-group">
            <span class="input-group-addon" style="margin:10px 10px 0px 0px;"><i class="fa fa-lock"></i></span>
            <input type="text" name="editarAlumno" class="form-control input-lg" placeholder="Escriba el nuevo Alumno">
            <input type="hidden" name="editarAlumno" id="editarAlumno">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
    
    <?php

    $editarCurso = new ControladorCursos();
    $editarCurso -> ctrEditarCurso();

    ?>
</form>
  </div>
  
  
</div>




 </div>
 </div>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->