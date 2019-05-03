<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_entrada extends CI_Controller {

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
        $this->load->view('entrada');
    }

    public function success()
    {
        $arreglo['mensaje'] = 1;
        $this->load->view('entrada',$arreglo);
    }

    public function error(){
        $arreglo['mensaje'] = 0;
        $this->load->view('entrada',$arreglo);
    }

    public function error_dia(){
        $arreglo['mensaje'] = 2;
        $this->load->view('entrada',$arreglo);
    }

    public function verificar_entrada(){
        $empleado = new Empleado();
        $user_empleado = $this->input->post('code');
        $empleado_encontrado = $empleado->obtener_empleado_por("usuario",$user_empleado);


        $contra_empleado = crypt($this->input->post('contra'), "jsoft");

        if($empleado_encontrado != null  && $empleado_encontrado[0]->contra == $contra_empleado ){
           $this->registrar_entrada($empleado_encontrado);
        }else{
            $this->error();
        }

    }

    public function verificar_duplicado($id_empleado){
        $this->load->model('Entrada');
        $empleado_dia = $this->Entrada->obtener_entrada_duplicada($id_empleado, date("Y-m-d"));
        if($empleado_dia != null){
            return true; //Si hay duplicado de ese día
        }else{
            return false;  //No hay duplicado de ese día
        }
    }

    public function registrar_entrada($empleado_encontrado)
    {
        $this->load->model('Entrada');
        $entrada = new stdClass();
        $entrada->hora_entrada = date("Y-m-d H:i:s");
        $entrada->id_empleado = $empleado_encontrado[0]->id_empleado;

        if ($this->verificar_duplicado($entrada->id_empleado)){
            $this->error_dia();
        }else{

            $this->Entrada->guardar_entrada($entrada);
            $this->success();
        }

    }
}
