<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 2019-05-06
 * Time: 21:03
 */

class Generar_nomina extends CI_Controller
{
    public function index(){
        $array['bienvenida'] = 'Bienvenido a Listar Empleados';
        $array['empleados'] = $this->empleado->obtener_empleados_admin();

        $this->load->view('header');
        $this->load->view('footer');

        $data = array();

        $data['content'] = $this->load->view('listado_empleados', $array,true);

        $this->load->view('layout',$data, false);
    }
}