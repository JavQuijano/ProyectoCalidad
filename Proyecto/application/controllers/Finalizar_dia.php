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
        $entrada = new Entrada();
        $historial_dia= $entrada->obtener_entrada_salida(date("Y-m-d"));
        foreach ($historial_dia as $registro){
            if($registro->hora_salida == null || $registro->hora_entrada == null){
                $this->load->model('Excepcion');
                $excepcion = new stdClass();
                $excepcion->fecha_dia = date("Y-m-d");
                $excepcion->id_empleado = $this->checar_nulo($registro);
                $excepcion->id_entrada = $registro->id_entrada;
                $excepcion->id_salida = $registro->id_salida;
                $this->Excepcion->guardar_excepcion($excepcion);
            }else{
                $this->load->model('Cumplido');
                $cumplido = new stdClass();
                $cumplido->fecha_dia = date("Y-m-d");
                $cumplido->id_empleado = $registro->id_empleado;
                $cumplido->id_entrada = $registro->id_entrada;
                $cumplido->id_salida = $registro->id_salida;
                $this->Cumplido->guardar_cumplido($cumplido);
            }
        }

    }

    public function checar_nulo($registro){

        if($registro->id_salida == null){
            $this->load->model('Entrada');
            $entrada = new Entrada();
            $id_empleado = $entrada->obtener_id_empleado_por_fecha('hora_entrada',$registro->hora_entrada);
        }
        if($registro->id_entrada == null){
            $this->load->model('Salida');
            $salida = new Salida();
            $id_empleado = $salida->obtener_id_empleado_por_fecha('hora_salida',$registro->hora_salida);
        }
        return $id_empleado;
    }

}