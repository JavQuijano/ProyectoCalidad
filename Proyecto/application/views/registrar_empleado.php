<?php echo $bienvenida ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <form action="<?php echo base_url();?>index.php/Registro_empleados/registrar_empleado" method="post">
                <div class=" row form-group">
                    <div class="col-md-4">
                        <label>Usuario</label>
                        <input type="text" name="usuario" class="form-control" placeholder="Introduce tu usuario">
                        <label>Contraseña</label>
                        <input type="password" name="contra" class="form-control" placeholder="Introduce tu contraseña">
                        <label>Nombres</label>
                        <input type="text" name="nombres" class="form-control" placeholder="Introduce tus nombres">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" placeholder="Introduce tus apellidos">
                    </div>
                    <div class="col-md-4">
                        <label>Hora Entrada</label>
                        <input type="time" name="hora_entrada" class="form-control" placeholder="Introduce tu hora de entrada">
                        <label>Hora Salida</label>
                        <input type="time" name="hora_salida" class="form-control" placeholder="Introduce tu hora de salida">
                        <label>Estatus</label>
                        <input type="text" name="estatus" class="form-control" placeholder="1,2,3,4">
                        <label>Pago por dia</label>
                        <input type="number" name="pago_por_dia" class="form-control" placeholder="Introduce tu pago por día">
                    </div>
                    <div class="col-md-4">
                        <label>Dias trabajo</label>
                        <input type="text" name="dias_trabajo" class="form-control" placeholder="Introduce tus días de trabajo">
                        <label>Descuento por hora</label>
                        <input type="number" name="descuento_por_hora" class="form-control" placeholder="Introduce tu descuento por hora">
                        <label>Fecha inicio</label>
                        <input type="datetime-local" name="fecha_inicio" class="form-control" placeholder="Introduce tu fecha de inicio">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <button type="submit" style="width: 20vw;margin-left: 15px;" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>