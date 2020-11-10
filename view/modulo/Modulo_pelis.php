<!-- Begin Page Content -->
        <div class="container-fluid">
<?php $nom_mod="Películas";?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$nom_mod?> <a href="?N=form_pelis" class="btn btn-warning btn-circle btn-lg">
                   +</i>
                  </a></h1>
          <p class="mb-4">Gestione <?=$nom_mod?> de manera rápida y efectiva.</p>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary ">Lista de datos</h6><div class="mostrar_res font-weight-bold text-success"></div>

            </div>
            <div class="card-body ">
              <div class="table-responsive">
                <table class="table table-bordered" id="tabla" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Item</th>
                      <th>Título</th>
                      <th>Sinopsis</th>
                      <th>Año</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <?php
                    $obj = new IMEC();
                    //consulto usuarios
                    $fila=$obj->ConLista("movies","");
                    $cont=0;
                    while ($row=$fila->fetch_array()) {
                    $cont++;
                    $id=$row['cript'];
                    ?>
                    <tr id="<?=$row['cript'];?>">
                    <?
                    echo "<td>".$cont."</td>";
                    echo "<td>".$row['title']."</td>";
                    echo "<td>".$row['sinop']."</td>";
                    echo "<td>".$row['year']."</td>";
                    echo '<td> 
                    <a href="?N=form_pelis&cript='.$id.'" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
                    ';
                    ?>
                    <h9 id_eli="<?=$row['cript'];?>">
                    <a class="btn btn-light"><i  class="fa fa-trash" aria-hidden="true"></i></a>
                    </h9>
                    </td>
                    </tr>
                    <?
                    }

                    ?>       
                  </tbody>
                </table>
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
<script>
//Eliminar de la lista
$(document).ready(function(){
        $("h9").click(function(){
            var cript = $(this).attr('id_eli');
            var parametros={
              "cript":cript,
              "form_sup":'aAJd15Ff5a6s65dFfa56svmiJremoiH4iidiRsadiurjeg',
            }; 
           $("#"+cript).hide(1100);
                     
                    $.ajax({
                        data: parametros,
                        url: './?P=pelis',
                        type:  'POST',
                        beforeSend: function() {},
                            success:  function (response) {    
                            $(".mostrar_res").html(response);
                        },
                        error:function(){ 
                            alert("error")
                        }
                    }); // fin de ajax/ 
        }); // fin de click 
}); // fin de document 
</script>