/*=============================================
    EDITAR USUARIO
    =============================================*/
   
    $(".btnEditarCurso").click(function(){
      var idCurso = $(this).attr("idCurso");
      var datos = new FormData();
      console.log("idCurso",idCurso);
      datos.append("idCurso", idCurso);
      $.ajax({
          url:"ajax/cursos.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(respuesta){
          console.log("idCurso","Respuesta");
           $("#editarNombre").val(respuesta['nombre']);
           $("#editarDescripcion").val(respuesta['descripcion']);
           $("#alumnoActual").val(respuesta['alumno']);
            },     
          error : function(respuesta) {
              console.log("Error",respuesta);
            }

  });


    })

   // $(".btnEditarUsuario").click(function(){
     // var idUsuario =$(this).attr("idUsuario");
      //console.log("idUsuario",idUsuario);
    //})


/*=============================================
Eliminar Curso
=============================================*/

$(".btnEliminarCurso").click(function(){

var idCurso = $(this).attr("idCurso");
var curso   = $(this).attr("curso");

  Swal.fire({
  title: '¡Estas seguro que deseas eliminar el Curso?',
  text: "Si no es asi puedes presionar el boton cancelar",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Borrar curso'
  }).then((result) => {
    if (result.value) {
       window.location = "index.php?ruta=cursos&idcurso="+idCurso+"&curso="+curso;
     
  }
})
})