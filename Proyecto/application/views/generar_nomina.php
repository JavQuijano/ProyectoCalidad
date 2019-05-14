<?php echo $bienvenida ?>
<div class="container-fluid">
    <br>
    <h4><b>Horario de empleados cumplidos</b></h4>
    <?php if(!empty($empleados_cumplidos)):?>
    <table class="table">
        <th>ID</th>
        <th>Nombre</th>
        <th>Horario</th>
        <th>Horas Trabajadas</th>
        <th>Día Trabajo</th>
        <th>Pago X Hora</th>
        <?php foreach ($empleados_cumplidos as $empleado_c):?>
            <tr>
                <td><?php echo $empleado_c->id_empleado?></td>
                <td><?echo $empleado_c->nombres." ".$empleado_c->apellidos?></td>
                <td><?echo $empleado_c->hora_entrada."-".$empleado_c->hora_salida?></td>
                <td><?echo $empleado_c->horas_trabajadas?></td>
                <td><?echo $empleado_c->fecha_dia?></td>
                <td><?echo "$".$empleado_c->pago_por_dia?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <?php else:?>
        <div>No hay horarios que no se encuentren ya registrados en el sistema.</div>
    <?php endif;?>
    <?if(!empty($empleados_cumplidos)):?>
        <div>
            <button id="registrar_cumplidos">Registrar Horas Trabajadas</button>
        </div>
    <?endif;?>
    <hr>
    <h4><b>Horario de empleados con excepciones</b></h4>
    <?if(!empty($empleados_excepcion)):?>
    <table class="table">
        <th>ID</th>
        <th>Nombre</th>
        <th>Horario</th>
        <th>Día Trabajo</th>
        <th>Pago X Hora</th>
        <th>Descuento X Hora</th>
        <th>Opciones</th>
        <?php foreach ($empleados_excepcion as $empleado_x):?>
            <tr>
                <td><?php echo $empleado_x->id_empleado?></td>
                <td><?echo $empleado_x->nombres." ".$empleado_x->apellidos?></td>
                <td><?echo $empleado_x->hora_entrada."-".$empleado_x->hora_salida?></td>
                <td><?echo $empleado_x->fecha_dia?></td>
                <td><?echo "$".$empleado_x->pago_por_dia?></td>
                <td><?echo "$".$empleado_x->descuento_por_hora?></td>
                <td
                    data-id_empleado="<?php echo $empleado_x->id_empleado?>"
                    <?php if (!is_null($empleado_x->id_entrada)){ echo "data-hora_entrada='".$empleado_x->hora_entrada."'"; }else{ echo "data-hora_entrada=''";} ?>
                    <?php if (!is_null($empleado_x->id_salida)){ echo "data-hora_salida='".$empleado_x->hora_salida."'"; }else{ echo "data-hora_salida=''";} ?>
                    data-id_excepcion="<?php echo $empleado_x->id_excepcion?>"
                >
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_excepcion">
                        Editar
                    </button>
                </td>
            </tr>
        <?php endforeach;?>
    </table>
    <?else:?>
        <div>No hay horarios que no se encuentren ya registrados en el sistema.</div>
    <?endif;?>

    <?php if(empty($empleados_cumplidos) && empty($empleados_excepcion)):?>
        <hr>
        <button id="generar_nomina">Generar Nómina</button>
    <?php endif;?>

    <div class="modal" id="modal_excepcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Definir Horas Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_excepcion" action="#" style="padding: 1rem">
                    <input type="hidden" id="id_empleado" value="">
                    <input type="hidden" id="id_excepcion" value="">
                    <label>Hora Entrada: <input type="time" id="hora_entrada"></label>
                    <br>
                    <label>Hora Salida: <input type="time" id="hora_salida"></label>
                    <br>
                    <input type="submit" value="Guardar Horas">
                </form>
            </div>
        </div>
    </div>

</div>

<script>
    $("#registrar_cumplidos").click(function () {
        $.ajax({
            method: "POST",
            url: "Generar_nomina/registrar_horas_cumplidos",
            success: function (respuesta) {
                location.reload();
            }
        });
    });

    $("#modal_excepcion").on('show.bs.modal', function (event) {
        const id_empleado = $(event.relatedTarget).parent().data("id_empleado");
        const hora_entrada = $(event.relatedTarget).parent().data("hora_entrada");
        const hora_salida = $(event.relatedTarget).parent().data("hora_salida");
        const id_excepcion = $(event.relatedTarget).parent().data("id_excepcion");

        $("#id_empleado").val(id_empleado);
        $("#hora_entrada").val(hora_entrada);
        $("#hora_salida").val(hora_salida);
        $("#id_excepcion").val(id_excepcion);
    });

    $("#form_excepcion").submit(function () {
        const id_excepcion = $("#id_excepcion").val();
        const id_empleado = $("#id_empleado").val();
        const hora_entrada = $("#hora_entrada").val();
        const hora_salida = $("#hora_salida").val();
        $.ajax({
            method: "POST",
            url: "Generar_nomina/registrar_horas_excepcion",
            data:{
                id_empleado : id_empleado,
                hora_entrada : hora_entrada,
                hora_salida : hora_salida,
                id_excepcion : id_excepcion
            },
            success: function (respuesta) {
                const ver = JSON.parse(respuesta);
                if(ver){
                    //exito
                    $('#modal_excepcion').modal('toggle');
                    location.reload();
                }else{
                    //error
                    $('#modal_excepcion').modal('toggle');
                }
            }
        });
    });
    
    $("#generar_nomina").click(function () {
        $.ajax({
            method: "POST",
            url: "Generar_nomina/generar_nomina_final",
            success: function (respuesta) {
                respuesta = JSON.parse(respuesta);
            }
        });
    });

</script>