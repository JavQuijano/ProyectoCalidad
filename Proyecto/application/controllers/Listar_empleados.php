<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 2019-05-06
 * Time: 19:17
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Listar_empleados extends CI_Controller {

    public function index(){
        $array['bienvenida'] = 'Bienvenido a Listar Empleados';
        $array['empleados'] = $this->empleado->obtener_empleados_admin();

        $this->load->view('header');
        $this->load->view('footer');

        $data = array();

        $data['content'] = $this->load->view('listado_empleados', $array,true);

        $this->load->view('layout',$data, false);
    }

    public function get_empleado($id_empleado){
        $empleado = $this->empleado->obtener_empleado_por("id_empleado",$id_empleado);
        echo json_encode($empleado[0]);
    }

    public function guardar_empleado(){
        $id_empleado = $this->input->post("id_empleado");
        $empleado = new stdClass();
        $empleado->nombres = $this->input->post("nombres");
        $empleado->apellidos = $this->input->post("apellidos");
        $empleado->hora_entrada = $this->input->post("hora_entrada");
        $empleado->hora_salida = $this->input->post("hora_salida");
        $empleado->estatus = $this->input->post("estatus");
        $empleado->pago_por_dia = $this->input->post("pago_por_dia");
        $empleado->dias_trabajo = $this->input->post("dias_trabajo");
        $empleado->descuento_por_hora = $this->input->post("descuento_por_dia");

        echo json_encode($this->empleado->update_empleado($id_empleado, $empleado));
    }

    public function cambiar_contrasena()
    {
        $id_empleado = $this->input->post("id_empleado");
        $contra_sin_encriptar = $this->input->post("nueva_contra");
        $empleado = new stdClass();
        $empleado->contra = crypt($contra_sin_encriptar, "jsoft");

        echo json_encode($this->empleado->update_empleado($id_empleado, $empleado));
    }

    public function obtener_vacaciones($id_empleado){
        $vacaciones = $this->empleado->obtener_vacaciones_empleado($id_empleado);
        if(!empty($vacaciones)){
            echo json_encode($vacaciones);
        }else{
            echo json_encode(false);
        }
    }

    public function asignar_vacaciones(){
        $nueva_vaca = new stdClass();
        $nueva_vaca->id_empleado = $this->input->post("id_empleado");
        $nueva_vaca->fecha_inicio = $this->input->post("fecha_inicio");
        $nueva_vaca->fecha_termino = $this->input->post("fecha_termino");
        $nueva_vaca->fecha_registro = date("Y-m-d");

        echo json_encode($this->empleado->registrar_vacaciones($nueva_vaca));

        $empleado = new stdClass();
        $empleado->estatus = 4;
        $this->empleado->update_empleado($nueva_vaca->id_empleado, $empleado);

    }

}