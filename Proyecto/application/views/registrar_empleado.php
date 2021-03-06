<?php
if(isset($bienvenida) && $bienvenida == "1"){
 echo "<script>
Swal.fire({
  position: 'center',
  type: 'success',
  title: 'Empleado registrado con éxito',
  showConfirmButton: false,
  timer: 1500
})
</script>";
}
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <form action="<?php echo base_url();?>index.php/Registro_empleados/registrar_empleado" method="post">
                <div class=" row form-group">
                    <div class="col-md-6">
                        <!--<label>Usuario</label>
                        <input type="text" name="usuario" class="form-control" placeholder="Introduce tu usuario">
                        <label>Contraseña</label>
                        <input type="password" name="contra" class="form-control" placeholder="Introduce tu contraseña"> -->
                        <label>Nombres</label>
                        <input type="text" name="nombres" class="form-control" placeholder="Introduce tus nombres" required>
                        <label>Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" placeholder="Introduce tus apellidos" required>
                        <label>Hora Entrada</label>
                        <input type="time" name="hora_entrada" class="form-control" placeholder="Introduce tu hora de entrada" required>
                        <label>Hora Salida</label>
                        <input type="time" name="hora_salida" class="form-control" placeholder="Introduce tu hora de salida" required>
                    </div>
                    <div class="col-md-6">
                        <label>Estatus</label>
                        <!--<input type="text" name="estatus" class="form-control" placeholder="1,2,3,4">-->
                        <select name="estatus" type="text" class="form-control">
                            <option value="1">Activo</option>
                            <option value="2">De Baja</option>
                            <option value="3">Suspendido</option>
                            <option value="4">De Vacaciones</option>
                        </select>
                        <label>Pago por dia</label>
                        <input type="number" name="pago_por_dia" class="form-control" placeholder="Introduce tu pago por día" required>
                        <label>Descuento por hora</label>
                        <input type="number" name="descuento_por_hora" class="form-control" placeholder="Introduce tu descuento por hora" required>
                        <label>Dias trabajo</label>
                        <br>
                        <input type="checkbox" name="dias_trabajo[]" value="Lunes">Lunes
                        <input type="checkbox" name="dias_trabajo[]" value="Martes">Martes
                        <input type="checkbox" name="dias_trabajo[]" value="Miercoles">Miercoles
                        <input type="checkbox" name="dias_trabajo[]" value="Jueves">Jueves
                        <input type="checkbox" name="dias_trabajo[]" value="Viernes">Viernes
                        <input type="checkbox" name="dias_trabajo[]" value="Sabado">Sabado
                        <input type="checkbox" name="dias_trabajo[]" value="Domingo">Domingo
                    </div>
                    <div class="col-md-12">
                        <label>Fecha inicio</label>
                        <input type="datetime-local" name="fecha_inicio" class="form-control" placeholder="Introduce tu fecha de inicio" required>
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