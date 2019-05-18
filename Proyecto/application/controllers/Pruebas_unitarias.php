<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pruebas_unitarias extends CI_Controller {

    public function Verificar_Status_Test(){
        $test_name = 'Verificar Status';
        $status_test = 1;
        $expected_result = true;

        
        $this->load->library('../controllers/Registro_entrada');
        $obj = new $this->Registro_entrada();
        $result=$obj->verificar_estatus($status_test);
        echo $this->unit->run($result, $expected_result, $test_name);

    }
    

    public function obtenerEmpleadoTest()
    {
        $test=$this->empleado->obtener_empleado_por("id_empleado",1);
        $resultado=new stdClass();
        $resultado->id_empleado ="1";
        $resultado->usuario="asd";
        $resultado->contra="123";
        $resultado->nombres="asd";
        $resultado->apellidos="asd";
        $resultado->hora_entrada='19:01:00';
        $resultado->hora_salida='12:03:00';
        $resultado->estatus='1';
        $resultado->pago_por_dia="123.00";
        $resultado->dias_trabajo='123';
        $resultado->descuento_por_hora="123.00";
        $resultado->fecha_creacion="2019-03-27 05:29:58";
        $resultado->fecha_inicio="0222-02-22 14:02:00";
        $testName = "Prueba Funcion obtener_empleados_por()";
        $ExpectectResult = array($resultado);
        echo $this->unit->run($test,$ExpectectResult,$testName);
    }

    public function obtenerVacacionesEmpleadoTest()
    {
        $test=$this->empleado->obtener_vacaciones_empleado(1);
        $expectedResult=[];
        $testName = "Prueba Funcion obtener_vacaciones_empleado()";
        echo $this->unit->run($test,$expectedResult,$testName);
    }

    public function obtenerIdEmpleadoFechaTest(){
       $test_name='Prueba obtener id del empleado segun la fecha'; 
       $this->load->model('Salida');
       $salida = new Salida();
       $test = $salida->obtener_id_empleado_por_fecha('hora_salida','2019-05-03 08:34:14');
       $expected_result=14;
       echo $this->unit->run($test,$expected_result,$test_name);
    }
    
    public function obtener_Salida_Test()
    {
        $testName = "Prueba Funcion obtener_salida_por()";
        $this->load->model('Salida');
        $salida = new Salida();
        $test = $salida->obtener_salida_por("id_salida",2);
        $resultado=new stdClass();
        $resultado->id_salida ="2";
        $resultado->id_empleado="14";
        $resultado->hora_salida="2019-05-03 08:34:22";
        $ExpectectResult = array($resultado);
        echo $this->unit->run($test,$ExpectectResult,$testName);
    }
    
}