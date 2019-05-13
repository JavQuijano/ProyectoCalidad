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
        $array['bienvenida'] = 'Bienvenido a la Generación de Nómina';
        $empleados_cumplidos = $this->empleado->obtener_empleados_cumplidos();
        $empleados_excepcion = $this->empleado->obtener_empleados_excepcion();

        $array['empleados_cumplidos'] = $this->empleados_cumplidos_final($empleados_cumplidos);
        $array['empleados_excepcion'] = $this->empleados_excepcion_final($empleados_excepcion);

        $this->load->view('header');
        $this->load->view('footer');

        $data = array();

        $data['content'] = $this->load->view('generar_nomina', $array,true);

        $this->load->view('layout',$data, false);
    }

    private function empleados_cumplidos_final($empleados_cumplidos){
        foreach ($empleados_cumplidos as $empleados_c){
            $time1 = strtotime($empleados_c->hora_entrada);
            $time2 = strtotime($empleados_c->hora_salida);
            $dif = round(abs($time2 - $time1) / 3600,2);
            $empleados_c->horas_trabajadas = $dif;
        }
        return $empleados_cumplidos;
    }

    private function empleados_excepcion_final($empleados_excepcion){
        return $empleados_excepcion;
    }

    public function registrar_horas_cumplidos(){
        $empleados_cumplidos = $this->empleados_cumplidos_final($this->empleado->obtener_empleados_cumplidos());
        $this->empleado->registrar_cumplidos($empleados_cumplidos);
        return true;
    }
}