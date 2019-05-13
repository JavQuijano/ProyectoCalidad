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
                <td data-id_excepcion="<?php echo $empleado_x->id_excepcion?>">
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

    <div class="modal" id="modal_excepcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Definir Horas Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_editar" action="#">

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
</script>