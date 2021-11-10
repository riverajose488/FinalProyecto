/*=============================================
    EDITAR USUARIO
    =============================================*/
   
    $(".btnEditarUsuario").click(function(){
      var idUsuario = $(this).attr("idUsuario");
      var datos = new FormData();
      console.log("idUsuario",idUsuario);
      datos.append("idUsuario", idUsuario);
      $.ajax({
          url:"ajax/usuarios.ajax.php",
          method: "POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(respuesta){
          console.log("idUsuario","Respuesta");
           $("#editarNombre").val(respuesta['nombre']);
           $("#editarUsuario").val(respuesta['usuario']);
           $("#passwordActual").val(respuesta['password']);
           $("#editarPerfil").html(respuesta['perfil']);
           $("#editarPerfil").val(respuesta['perfil']);
           $("#editarNota").val(respuesta['nota']);
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
    Validad usuario unico
    =============================================*/

    $("#nuevoUsuario").change(function(){
      $(".alert").remove();
      var usuario = $(this).val();
      var datos = new FormData();
      datos.append("validarUsuario",usuario);
      $.ajax({
        url:"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        success:function(respuesta){
          console.log("Respuesta",respuesta);
          if(respuesta!="false"){
              console.log("Respuesta2",respuesta);
            $("#nuevoUsuario").parent().after("<div class='alert alert-warning'>Este nombre de usuario ya existe</div>");
            $("#nuevoUsuario").val("");
          }
        }
      })
    })
/*=============================================
Eliminar Usuario
=============================================*/

$(".btnEliminarUsuario").click(function(){

var idUsuario = $(this).attr("idUsuario");
var usuario   = $(this).attr("usuario");

  Swal.fire({
  title: '¡Estas seguro que deseas eliminar el Usuario?',
  text: "Si no es asi puedes presionar el boton cancelar",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Borrar usuario'
  }).then((result) => {
    if (result.value) {
       window.location = "index.php?ruta=usuarios&idusuario="+idUsuario+"&usuario="+usuario;
     
  }
})
})