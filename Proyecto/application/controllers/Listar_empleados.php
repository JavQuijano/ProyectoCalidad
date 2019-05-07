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

}