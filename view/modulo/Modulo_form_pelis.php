<?
error_reporting(0);
$edit=0;
if (!empty($_GET['cript'])) {

    $cript="'".$_GET['cript']."'";
    $datos=$DB->Consultar('movies','cript='.$cript);
    $title="Editar registro";
    $edit="1";
    //print_r($datos['Nom_emp']);
}else{
  $title="Agregar registro";
  $edit="0";
}
?>
<?php $nom_mod="Películas";?>

  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$nom_mod?> 

<a href="?N=pelis" class="btn btn-warning btn-circle btn-lg"> <i class="fas fa-arrow-left"></i></a>
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
                        <label>Título</label>
                        <input type="text" class="form-control" data-error="Es requerido escriba título." 
                        id="title" placeholder="Título de la película" value="<?=$datos['title']?>"  required>

                        <!-- Error -->
                        <div class="help-block with-errors"></div>
                    </div>
                
                  <div class="form-group">
                        <label>Sinopsis:</label>
                        <input type="text" class="form-control" id="sinop" placeholder="Sinopsis" value="<?=$datos['sinop']?>" >

                        <!-- Error -->
                        <div class="help-block with-errors"></div>
                  </div>
                  <div class="form-group">
                        <label>Año</label>
                        
                        <input type="number" class="form-control" max="<?=$year=date('Y');?>" data-error="Máximo el año actual"  pattern="0-9" id="year" placeholder="Año de lanzamiento de la película Ej: 2009" value="<?=$datos['year']?>" required>

                        <!-- Error -->
                        <div class="help-block with-errors"></div>
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
            $.post('./?P=pelis',{
              form:'peli',
              title:$("#title").val(),
              year:$("#year").val(),
              sinop:$("#sinop").val(),
              edit:$("#edit").val(),
              cripedit:$("#cripedit").val(),
          

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


