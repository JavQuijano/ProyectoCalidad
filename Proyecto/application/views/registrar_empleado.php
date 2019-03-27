<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php echo $bienvenida ?>
    <div class="container">

    <div class="row">
        <div class="col-lg">
            <form action="<?php echo base_url();?>index.php/Registro_empleados/registrar_empleado" method="post">
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" name="usuario" class="form-control" placeholder="Introduce tu usuario">
                    <label>Contraseña</label>
                    <input type="password" name="contra" class="form-control" placeholder="Introduce tu contraseña">
                    <label>Nombres</label>
                    <input type="text" name="nombres" class="form-control" placeholder="Introduce tu usuario">
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" placeholder="Introduce tu usuario">
                    <label>Hora Entrada</label>
                    <input type="time" name="hora_entrada" class="form-control" placeholder="Introduce tu usuario">
                    <label>Hora Salida</label>
                    <input type="time" name="hora_salida" class="form-control" placeholder="Introduce tu usuario">
                    <label>Estatus</label>
                    <input type="text" name="estatus" class="form-control" placeholder="Introduce tu usuario">
                    <label>Pago por dia</label>
                    <input type="number" name="pago_por_dia" class="form-control" placeholder="Introduce tu usuario">
                    <label>Dias trabajo</label>
                    <input type="text" name="dias_trabajo" class="form-control" placeholder="Introduce tu usuario">
                    <label>Descuento por hora</label>
                    <input type="number" name="descuento_por_hora" class="form-control" placeholder="Introduce tu usuario">
                    <label>Fecha inicio</label>
                    <input type="datetime-local" name="fecha_inicio" class="form-control" placeholder="Introduce tu usuario">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>