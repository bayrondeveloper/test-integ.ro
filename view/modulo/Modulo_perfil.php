<?

error_reporting(0);
    //SELECT `id`, `Nom_emp`, `nit`, `sucursal`, `cuentaban`, `fechacreacion`, `fechaconstitucion`, `telefono`, `direccion`, `cript` FROM `empresa` WHERE 1

  header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
clearstatcache();

  
?>



<?php $nom_mod="Perfil";?>

  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$nom_mod?>  

<a href="?" class="btn btn-warning btn-circle btn-lg"> <i class="fas fa-arrow-left"></i></a>
          </h1> 
          <p class="mb-4">Gestione <?=$nom_mod?> de manera eficiente</p>

    <div class="card o-hidden border-0 shadow-lg my-5">
     <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg-6 d-none d-lg-block" style=" background: url('img/default/user.png') 50% 50% no-repeat no-repeat;">
        
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Perfil de usuario</h1>
                    <p class="mb-4">Nombres: <?= $_SESSION["nombres_usuario"] ?></p>
                    <p class="mb-4">Nickname: <?= $_SESSION["USER"] ?></p>
                  </div>
                  <form class="user">
                  <!--  <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="cam_clave" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>-->
             


<button type="button" class="btn btn-primary btn-user btn-block" data-toggle="modal" data-target="#cam_clave" data-whatever="">Cambiar contraseña</button>
                  </form>
<!-- MODAL  -->
<div class="modal fade" id="cam_clave" tabindex="-1" role="dialog" aria-labelledby="cam_clave" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" id="clave1-" class="col-form-label">Nueva Clave:</label>
            <input type="password" class="form-control" id="clave1">
          </div>

           <div class="form-group">
            <label for="recipient-name" id="clave2-" class="col-form-label">Repita la clave:</label>
            <input type="password" class="form-control" id="clave2">
          </div>
          <input type="hidden" id="edit" value="3">
          <input type="hidden" id="id" value="<?= $_SESSION["USER"] ?>">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="form_" class="btn btn-primary">Cambiar ahora</button>
      </div>
    </div>
  </div>
</div><!-- fin modal -->
    <hr>
    


                </div>
              </div>
            </div>
          </div>
  </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<script>
  $(function(){
    $("#form_").click(function(event) {
      //event.preventDefault();
            $.post('./?P=usuarios',{
              form:'user_pass',
              edit:$("#edit").val(),
              clave1:$("#clave1").val(),
              clave2:$("#clave2").val(),
              id:$("#id").val(),
 
            },function(res) {
                DataJson=JSON.parse(res); 
                  
                  if (DataJson['Est']) {
                    //window.location='./';

                   swal("¡Atención!", DataJson['Men'], "success");
                  }else{
                    //alert('error');

                   swal("¡Atención!", DataJson['Men'], "error");
                  }
              });
     });
  });
</script>

