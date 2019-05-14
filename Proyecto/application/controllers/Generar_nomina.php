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
        $array['empleados_excepcion'] = $empleados_excepcion;

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

    private function calcular_horas_excepcion($hora_entrada, $hora_salida){
        $time1 = strtotime($hora_entrada);
        $time2 = strtotime($hora_salida);
        $dif = round(abs($time2 - $time1) / 3600,2);
        return $dif;
    }

    public function registrar_horas_cumplidos(){
        $empleados_cumplidos = $this->empleados_cumplidos_final($this->empleado->obtener_empleados_cumplidos());
        $this->empleado->registrar_cumplidos($empleados_cumplidos);
        echo json_encode(true);
        return true;
    }

    public function registrar_horas_excepcion(){
        $id_excepcion = $this->input->post("id_excepcion");
        $id_empleado = $this->input->post("id_empleado");
        $hora_entrada = $this->input->post("hora_entrada");
        $hora_salida = $this->input->post("hora_salida");

        $empleado = new stdClass();
        $empleado->id_empleado = $id_empleado;
        $empleado->cantidad_horas = $this->calcular_horas_excepcion($hora_entrada, $hora_salida);
        $empleado->dia_registro = date("Y-m-d");

        $this->empleado->registrar_excepcion($empleado, $id_excepcion);

        echo json_encode(true);
        return true;
    }

    public function generar_nomina_final(){
        $fecha_actual = time();
        $ultima_nomina = $this->empleado->obtener_ultima_nomina();
        $ultima_nomina = strtotime($ultima_nomina[0]->fecha);
        $datediff = $fecha_actual - $ultima_nomina;
        $dias_desde_ultima_nomina = round($datediff / (60 * 60 * 24));
        if($dias_desde_ultima_nomina > 7) {
            $empleados = $this->empleado->obtener_horas_trabajadas_empleados();
            try {
                foreach ($empleados as $empleado) {
                    $pago = new stdClass();
                    $pago->id_empleado = $empleado->id_empleado;
                    $pago->fecha = date("Y-m-d");
                    $time1 = strtotime($empleado->hora_entrada);
                    $time2 = strtotime($empleado->hora_salida);
                    $dia = round(abs($time2 - $time1) / 3600, 0);
                    $dias_trabajados = $empleado->cantidad_horas / $dia;
                    $pago->cantidad = $dias_trabajados * $empleado->pago_por_dia;
                    $this->empleado->guardar_pago($pago, $empleado->id_empleado);
                }
                echo json_encode(true);
                return true;
            } catch (Exception $e) {
                echo json_encode(false);
                return false;
            }
        }else{
            echo json_encode(false);
            return false;
        }
    }
}