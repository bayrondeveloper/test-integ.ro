<?
error_reporting(0);
$edit=0;
if (!empty($_GET['cript'])) {

    $cript="'".$_GET['cript']."'";
    $datos=$DB->Consultar('users','cript='.$cript);
    $title="Editar registro";
    $edit="1";
    //print_r($datos['Nom_emp']);
}else{
  $title="Agregar registro";
  $edit="0";
}
?>
<?php $nom_mod="Usuarios";?>

  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$nom_mod?> 

<a href="?N=usuario" class="btn btn-warning btn-circle btn-lg"> <i class="fas fa-arrow-left"></i></a>
          </h1> 
          <p class="mb-4">Gestione <?=$nom_mod?> de manera eficiente</p>
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
    
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><?=$title ?></h1>
              </div>
              <input type="hidden" id="edit" value="<?=$edit?>">
              <input type="hidden" id="cripedit" value="<?=$datos['cript']?>">
              <!--validación en tiempo real-->
              <form role="form" data-toggle="validator">
                  
                <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" minlength="5" data-error="Es requerido con mínimo 5 caracteres." 
                        id="name" placeholder="Juan" value="<?=$datos['name']?>"  required>

                        <!-- Error -->
                        <div class="help-block with-errors"></div>
                    </div>
                <div class="form-group">
                        <label>Nickname</label>
                        <input type="text" class="form-control" data-error="solo puede contener letras, números y guión al
                        piso"  pattern="^[a-zA-Z0-9_]*$" id="nickname" placeholder="Mi_nick" value="<?=$datos['nickname']?>"  required>

                        <!-- Error -->
                        <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                        <label>Contraseña</label>
                        <div class="form-group">
                            <input type="password" data-minlength="4" pattern="[A-Za-z][A-Za-z0-9]*[0-9][A-Za-z0-9_.-]*" class="form-control" id="clave1"
                                data-error="Es requerido y debe contener mínimo una mayúscula y un número, minimo 4 caracteres" placeholder="Contraseña" required />

                            <!-- Error -->
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Confirmar Contraseña</label>
                        <div class="form-group">
                            <input type="password" class="form-control" id="clave2"
                                data-match="#clave1" data-match-error="La contraseña no coincide"
                                placeholder="Confirmar" required />

                            <!-- Error -->
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                 <button type="button" id="form_" class="btn btn-success btn-user btn-block">Registrar</button>
              
              </form>
                 
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
              form:'user',
              name:$("#name").val(),
              nickname:$("#nickname").val(),
              edit:$("#edit").val(),
              cripedit:$("#cripedit").val(),
              clave1:$("#clave1").val(),
              clave2:$("#clave2").val(),

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


