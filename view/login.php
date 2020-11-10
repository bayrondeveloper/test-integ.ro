<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Iniciar sesión</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css" />

</head>
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">¡Bienvenido!</h1>
                  </div>
                  <form class="user" id="FormLogin">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="formUsuario" aria-describedby="emailHelp" placeholder="Ingresar su correo" required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user"  id="formClave" placeholder="Contraseña" required="required">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Recordarme</label>
                      </div>
                    </div>
               
                    <button type="submit" class="btn btn-primary btn-user btn-block">Entrar</button>
                 
                  </form>
                  <hr>
            
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
 
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

<script>
  $(function(){
    $("#FormLogin").submit(function(event) {event.preventDefault();
            $.post('?P=accesos',{
              form:'login',
              correo:$("#formUsuario").val(),
              clave:$("#formClave").val()}, 
              function(res) {
              DataJson=JSON.parse(res);
          if (DataJson['Est']) {
            window.location='./';
          }else{
            //alert('error');

           swal("¡Atención!", "Error en la contraseña!", "error");
          }
        });
     });
  });
</script>


</body>

</html>
