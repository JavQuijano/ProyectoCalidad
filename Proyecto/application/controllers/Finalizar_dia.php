<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finalizar_dia extends CI_Controller {


    public function index()
    {
        $array['bienvenida'] = 'Bienvenido a Registrar Empleado';
        $this->load->view('header');
        $this->load->view('footer');

        //$this->load->view('registrar_empleado', $array);
        $data = array();
        $data['content'] = $this->load->view('finalizar_dia', $array,true);
        $this->load->view('layout',$data, false);
    }

    public function registrar_salidas_pendientes(){
        $this->load->model('Entrada');
        $entrada = new stdClass();
        $historial_entradas = $entrada->obtener_entrada_duplicada(date("Y-m-d"));

        $this->load->model("Salida");
        $salida = new stdClass();
        $historial_salidas = $salida->obtener_salida_duplicada(date("Y-m-d"));

        foreach ($historial_entradas as $entrada){
            foreach($historial_salidas as $salida){

            }
        }

    }

}