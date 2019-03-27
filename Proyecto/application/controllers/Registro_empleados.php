<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_empleados extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $array['bienvenida'] = 'Bienvenido a Registrar Empleado';
        $this->load->view('header');
        $this->load->view('footer');

        //$this->load->view('registrar_empleado', $array);
        $data = array();
        $data['content'] = $this->load->view('registrar_empleado', $array,true);
        $this->load->view('layout',$data, false);


    }
    
    public function registrar_empleado(){
        
        $empleado = new stdClass();

        $empleado->usuario = $this->input->post('usuario');
        $empleado->contra  =  $this->input->post('contra');
        $empleado->nombres = $this->input->post('nombres');
        $empleado->apellidos = $this->input->post('apellidos');
        $empleado->hora_entrada = $this->input->post('hora_entrada');
        $empleado->hora_salida = $this->input->post('hora_salida');
        $empleado->estatus = $this->input->post('estatus');
        $empleado->pago_por_dia = $this->input->post('pago_por_dia');
        $empleado->dias_trabajo = $this->input->post('dias_trabajo');
        $empleado->descuento_por_hora = $this->input->post('descuento_por_hora');
        $empleado->fecha_creacion = date("Y-m-d H:i:s");
        $empleado->fecha_inicio = $this->input->post('fecha_inicio');


        $this->empleado->guardar_empleado($empleado);
        redirect(base_url()."index.php/Registro_empleados");
    }

}
