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

        $empleado->nombres = $this->input->post('nombres');
        $empleado->apellidos = $this->input->post('apellidos');
        $empleado->hora_entrada = $this->input->post('hora_entrada');
        $empleado->hora_salida = $this->input->post('hora_salida');
        $empleado->estatus = $this->input->post('estatus');
        $empleado->pago_por_dia = $this->input->post('pago_por_dia');
        $empleado->dias_trabajo = "";
        foreach($this->input->post('dias_trabajo') as $day) {
            $empleado->dias_trabajo = ($empleado->dias_trabajo).",".($day);
        }
        $empleado->dias_trabajo = substr($empleado->dias_trabajo, 1);
        $empleado->descuento_por_hora = $this->input->post('descuento_por_hora');
        $empleado->fecha_creacion = date("Y-m-d H:i:s");
        $empleado->fecha_inicio = $this->input->post('fecha_inicio');
        $empleado->usuario = substr($empleado->apellidos,0,2).rand(1000,99999);
        $empleado->contra  =  crypt($empleado->usuario, "jsoft");


        $this->empleado->guardar_empleado($empleado);
        $this->success();
        //redirect(base_url()."index.php/Registro_empleados");
    }

    public function success()
    {
        $array['bienvenida'] = "1";
        $this->load->view('header');
        $this->load->view('footer');

        //$this->load->view('registrar_empleado', $array);
        $data = array();
        $data['content'] = $this->load->view('registrar_empleado', $array,true);
        $this->load->view('layout',$data, false);

    }

}
