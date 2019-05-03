<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Landing PAGE Html5 Template">
    <meta name="keywords" content="landing,startup,flat">
    <meta name="author" content="Made By GN DESIGNS">
    <title>Vortex - Startup Landing Page</title>



    <!-- // PLUGINS (css files) // -->

    <link href="<?php echo base_url();?>assets/js/plugins/bootsnav_files/skins/color.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/js/plugins/bootsnav_files/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/js/plugins/bootsnav_files/css/bootsnav.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/js/plugins/bootsnav_files/css/overwrite.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!--// ICONS //-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--// BOOTSTRAP & Main //-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">

</head>



<body>
<?php
if(isset($mensaje) && $mensaje == "1"){
 echo "<script>
Swal.fire({
  position: 'center',
  type: 'success',
  title: 'Entrada registrada con éxito',
  showConfirmButton: false,
  timer: 1500
})
</script>";

}else{
    if(isset($mensaje) && $mensaje == "0"){
        echo "<script>
              Swal.fire({
              position: 'center',
              type: 'error',
              title: 'Verifique su clave o contraseña',
              showConfirmButton: false,
              timer: 1500
            })

        </script>";
    }else{
        if(isset($mensaje) && $mensaje == "2"){
            echo "<script>
              Swal.fire({
              position: 'center',
              type: 'warning',
              title: 'Ya ha registrado su entrada el día de hoy.',
              showConfirmButton: false,
              timer: 1500
            })

        </script>";
        }
    }
}
?>


    <!--========================================

           Preloader

    ========================================-->

    <div class="page-preloader">

        <div class="spinner">

            <div class="rect1"></div>

            <div class="rect2"></div>

            <div class="rect3"></div>

            <div class="rect4"></div>

            <div class="rect5"></div>

        </div>

    </div>



    <!--========================================

           Header

    ========================================-->







    <!--//** Banner**//-->

    <section class="home">

        <div class="container">

            <div class="row">

                <div id="particles-js"></div>

                <!-- Introduction -->

                <div class="col-md-6 caption">

                    <h1>Bienvenido a *Nombre Empresa*</h1>

                    <h2>

                            <span class="animated-text"></span>

                            <span class="typed-cursor"></span>

                        </h2>

                        <div class="contenedor">
      <div class="widget">
        <div class="fecha">
          <p id="diaSemana" class="diaSemana"></p>
          <p id="dia" class="dia"></p>
          <p>de</p>
          <p id="mes" class="mes"></p>
          <p>del</p>
          <p id="anio" class="anio"></p>
        </div>
        <div class="reloj">
          <p id="horas" class="horas"></p>
          <p>:</p>
          <p id="minutos" class="minutos"></p>
          <p>:</p>
          <div class="cajaSegundos">
            <p id="segundos" class="segundos"></p>&nbsp
            <p id="ampm" class="ampm"></p>
          </div>
        </div>
      </div>
    </div>
                </div>
                <!-- Sign Up -->
                <div class="col-md-5 col-md-offset-1">
                    <form class="signup-form" action="<?php echo base_url();?>index.php/Registro_entrada/verificar_entrada" method="post">
                        <h2 class="text-center">Iniciar Día</h2>
                        <hr>
                        <div class="form-group">
                            <input name="code" type="text" class="form-control" placeholder="Código Personal" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" name="contra" class="form-control" placeholder="Contraseña" required="required">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-blue btn-block">Registrar Entrada</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/bootsnav_files/js/bootsnav.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/typed.js-master/typed.js-master/dist/typed.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/particles.js-master/particles.js-master/particles.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/particales-script.js"></script>
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

</body>



</html>
