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
        /*
         * nombres: nombres,
            apellidos: apellidos,
            hora_entrada: hora_entrada,
            hora_salida: hora_salida,
            estatus: estatus,
            pago_por_dia: pago_por_dia,
            descuento_por_dia: descuento_por_dia,
            dias_trabajo: dias_trabajo
         * */
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

}