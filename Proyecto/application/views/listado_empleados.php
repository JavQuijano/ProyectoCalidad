<?php echo $bienvenida ?>
<div class="container-fluid">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Estatus</th>
            <th>Nombre</th>
            <th>Usuario</th>
            <th>Horario</th>
            <th>Dias</th>
            <th>Pago X Día</th>
            <th>Descuento X Hora</th>
            <th>Opciones</th>
        </tr>
        <?php foreach ($empleados as $empleado):?>
            <tr class="fila" data-id-empleado = <?echo $empleado->id_empleado?>>
                <td>
                    <?echo $empleado->id_empleado?>
                </td>
                <td>
                    <?php
                    if($empleado->estatus == 1){
                        echo "<span style='color: green;'>Activo</span>";
                    }else if($empleado->estatus == 2){
                        echo "<span style='color: red;'>Baja</span>";
                    }else if($empleado->estatus == 3){
                        echo "<span style='color: orange;'>Suspendido</span>";
                    }else if($empleado->estatus == 4){
                        echo "<span style='color: blue;'>Vacaciones</span>";
                    }
                    ?>
                </td>
                <td class="nombre_empleado">
                    <?echo $empleado->nombres." ".$empleado->apellidos?>
                </td>
                <td>
                    <?echo $empleado->usuario?>
                </td>
                <td>
                    <?echo $empleado->hora_entrada."-".$empleado->hora_salida?>
                </td>
                <td>
                    <?php
                    $dias = explode(",", $empleado->dias_trabajo);
                    foreach ($dias as $dia){
                        echo mb_substr($dia, 0, 2)." ";
                    }
                    ?>
                </td>
                <td>
                    <?echo "$".$empleado->pago_por_dia?>
                </td>
                <td>
                    <?echo "-$".$empleado->descuento_por_hora?>
                </td>
                <td data-id-empleado = <?echo $empleado->id_empleado?>>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Editar
                    </button>
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVacaciones">
                        Asignar Vacaciones
                    </button>
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalContra">
                        Cambiar Contraseña
                    </button>
                </td>
            </tr>
        <?endforeach;?>
    </table>

    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Información Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_editar" action="#">

                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="modalVacaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignar Vacaciones Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <br>
                <form class="text-center" id="form_vacaciones" action="#" style="margin: 1rem;">

                </form>
                <br>
            </div>
        </div>
    </div>

    <div class="modal" id="modalContra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambiar Contraseña Empleado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <br>
                <form class="text-center" id="form_cambiar_contra" action="#" style="margin: 1rem;">
                    <input type="hidden" id="id_empleado_contra" value="">
                    <label for="nueva_contra">Nueva Contraseña: </label>
                    <input type="text" id="nueva_contra">
                    <input class="alert-primary" type="submit" id="submit" value="Cambiar Contraseña!" />
                </form>
                <br>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->

<script>
    $(document).ready(function () {
        $('#exampleModal').on('show.bs.modal', function (event) {
            const id_empleado = $(event.relatedTarget).parent().data("id-empleado");
            $.ajax({
                method: "GET",
                url: "Listar_empleados/get_empleado/"+id_empleado,
                success: function (respuesta) {
                    const html_form = "<div class=\"modal-body\">\n" +
                        "<input type='hidden' id='id_empleado' value='"+id_empleado+"'>" +
                        "<label for='nombres'>Nombres:</label>&nbsp;\n" +
                        "<input id='nombres' placeholder='Nombres Empleado' required>\n" +
                        "<br>\n" +
                        "<label for=\"apellidos\">Apellidos:</label>&nbsp;\n" +
                        "<input id=\"apellidos\" placeholder=\"Apellidos Empleado\" required>\n" +
                        "<br>\n" +
                        "<label for='estatus'>Estatus:</label>&nbsp;" +
                        "<select  id='estatus'  required >" +
                            "<option value='1'>Activo</option>" +
                            "<option value='2'>Baja</option>" +
                            "<option value='3'>Suspendido</option>" +
                        "</select>"+
                        "<br>\n" +
                        "<label for=\"hora_entrada\">Hora Entrada:</label>&nbsp;\n" +
                        "<input id=\"hora_entrada\" type=\"time\" required>\n" +
                        "<br>\n" +
                        "<label for=\"hora_salida\">Hora Salida:</label>&nbsp;\n" +
                        "<input id=\"hora_salida\" type=\"time\" required>\n" +
                        "<br>\n" +
                        "<label for=\"pago_por_dia\">Pago X Día:</label>&nbsp;\n" +
                        "$<input id=\"pago_por_dia\" type=\"number\" min=\"0\" step=\"any\" required/>\n" +
                        "<br>\n" +
                        "<label for=\"descuento_por_hora\">Descuento X Hora:</label>&nbsp;\n" +
                        "$<input id=\"descuento_por_hora\" type=\"number\" min=\"0\" step=\"any\" required/>\n" +
                        "<br>\n" +
                        "<b>Días de Trabajo Empleado</b>\n" +
                        "<br>\n" +
                        "<label for=\"Lunes\">Lunes</label>\n" +
                        "<input class=\"dia\" type=\"checkbox\" value=\"Lunes\" id=\"Lunes\" >\n" +
                        "<br>\n" +
                        "<label for=\"Martes\">Martes</label>\n" +
                        "<input class=\"dia\" type=\"checkbox\" value=\"Martes\" id=\"Martes\" >\n" +
                        "<br>\n" +
                        "<label for=\"Miercoles\">Miercoles</label>\n" +
                        "<input class=\"dia\" type=\"checkbox\" value=\"Miercoles\" id=\"Miercoles\" >\n" +
                        "<br>\n" +
                        "<label for=\"Jueves\">Jueves</label>\n" +
                        "<input class=\"dia\" type=\"checkbox\" value=\"Jueves\" id=\"Jueves\" >\n" +
                        "<br>\n" +
                        "<label for=\"Viernes\">Viernes</label>\n" +
                        "<input class=\"dia\" type=\"checkbox\" value=\"Viernes\" id=\"Viernes\" >\n" +
                        "<br>\n" +
                        "</div>\n" +
                        "<div class=\"modal-footer\">\n" +
                        "    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Cancelar</button>\n" +
                        "    <button type=\"submit\" id='submit_editar' class=\"btn btn-primary\">Guardar Cambios</button>\n" +
                        "</div>";
                    $("#form_editar").html(html_form);

                    const empleado = JSON.parse(respuesta);
                    $("#nombres").val(empleado.nombres);
                    $("#apellidos").val(empleado.apellidos);
                    $("#estatus").val(empleado.estatus);
                    $("#hora_entrada").val(empleado.hora_entrada);
                    $("#hora_salida").val(empleado.hora_salida);
                    $("#pago_por_dia").val(empleado.pago_por_dia);
                    $("#descuento_por_hora").val(empleado.descuento_por_hora);
                    let dias = empleado.dias_trabajo.split(',');
                    $.each(dias, function (indice, dia) {
                        $("#"+dia).attr('checked','checked');
                    });
                }
            });
        });

        $('#exampleModal').on('hide.bs.modal', function () {
            $("#form_editar").html('');
        });

        $('#modalContra').on('show.bs.modal', function (event) {
            const id_empleado = $(event.relatedTarget).parent().data("id-empleado");
            $("#id_empleado_contra").val(id_empleado);
        });

        $(document).on('click', '#submit_editar', function () {
            const id_empleado = $("#id_empleado").val();
            const nombres = $("#nombres").val();
            const apellidos = $("#apellidos").val();
            const hora_entrada = $("#hora_entrada").val();
            const estatus = $("#estatus").val();
            const hora_salida = $("#hora_salida").val();
            const pago_por_dia = $("#pago_por_dia").val();
            const descuento_por_dia = $("#descuento_por_hora").val();
            let arr_dias = [];
            if($("#Lunes").prop("checked") === true){
                arr_dias.push("Lunes");
            }
            if($("#Martes").prop("checked") === true){
                arr_dias.push("Martes");
            }
            if($("#Miercoles").prop("checked") === true){
                arr_dias.push("Miercoles");
            }
            if($("#Jueves").prop("checked") === true){
                arr_dias.push("Jueves");
            }
            if($("#Viernes").prop("checked") === true){
                arr_dias.push("Viernes");
            }
            const dias_trabajo = arr_dias.toString();
            $.ajax({
                method: "POST",
                url: "Listar_empleados/guardar_empleado",
                data: {
                    id_empleado: id_empleado,
                    nombres: nombres,
                    apellidos: apellidos,
                    hora_entrada: hora_entrada,
                    hora_salida: hora_salida,
                    estatus: estatus,
                    pago_por_dia: pago_por_dia,
                    descuento_por_dia: descuento_por_dia,
                    dias_trabajo: dias_trabajo
                },
                success: function (respuesta) {
                    const ver = JSON.parse(respuesta);
                    if(ver){
                        //exito
                        $('#exampleModal').modal('toggle');
                    }else{
                        //error
                        $('#exampleModal').modal('toggle');
                    }
                }
            });
        });

        $("#form_cambiar_contra").submit(function () {
            const id_empleado = $("#id_empleado_contra").val();
            const nueva_contra = $("#nueva_contra").val();
            $.ajax({
                method: "POST",
                url: "Listar_empleados/cambiar_contrasena",
                data: {
                    id_empleado: id_empleado,
                    nueva_contra: nueva_contra
                },
                success: function(respuesta){
                    const ver = JSON.parse(respuesta);
                    if(ver){
                        //exito
                        $('#modalContra').modal('toggle');
                    }else{
                        //error
                        $('#modalContra').modal('toggle');
                    }
                }
            });
        });

        $('#modalVacaciones').on('show.bs.modal', function (event) {
            const id_empleado = $(event.relatedTarget).parent().data("id-empleado");
            $("#id_empleado_vacas").val(id_empleado);
            $.ajax({
                url: "Listar_empleados/obtener_vacaciones/"+id_empleado,
                method: "GET",
                success: function (respuesta) {
                    respuesta = JSON.parse(respuesta);
                    console.log(respuesta);
                    if(respuesta === false){
                        const html_sin = "" +
                            "<input type=\"hidden\" id='id_empleado_vacas' value='"+id_empleado+"'>" +
                            "<label for='fecha_inicio'>Fecha inicio: </label>" +
                            "<input type='date' id=fecha_inicio />" +
                            "<br>" +
                            "<label for='fecha_termino'>Fecha termino: </label>" +
                            "<input type='date' id=fecha_termino />" +
                            "<br>" +
                            "<input type='submit' value='Asignar Vacaciones'>";
                        $("#form_vacaciones").append(html_sin);
                    }else{
                        const html_con = "" +
                            "<p>El empleado ya cuenta con vacaciones en las siguientes fechas: </p>" +
                            "<br>" +
                            "<p>Del <b>"+respuesta[0].fecha_inicio+"</b> A <b>"+respuesta[0].fecha_termino+"</b></p>" +
                            "<br>" +
                            "<p>Desea reagendar sus vacaciones?</p>" +
                            "<br>" +
                            "<input type=\"hidden\" id=\"id_empleado_vacas\" value='"+id_empleado+"'>" +
                            "<input type='button' value='Sí'/>" +
                            "";
                        $("#form_vacaciones").append(html_con);
                    }
                }
            });
        });

        $('#modalVacaciones').on('hide.bs.modal', function () {
            $("#form_vacaciones").html('');
        });

        $("#form_vacaciones").submit(function () {
           const fecha_inicio = $("#fecha_inicio").val();
           const fecha_termino = $("#fecha_termino").val();
           const id_empleado = $("#id_empleado_vacas").val();
           $.ajax({
               method: "POST",
               url:"Listar_empleados/asignar_vacaciones",
               data: {
                   fecha_inicio : fecha_inicio,
                   fecha_termino : fecha_termino,
                   id_empleado : id_empleado
               },
               success: function (respuesta) {

               }
           });
        });
    });
</script>