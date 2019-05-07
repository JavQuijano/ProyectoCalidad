<?php
/**
 * Created by PhpStorm.
 * User: javier
 * Date: 2019-03-22
 * Time: 19:15
 */

class Empleado extends CI_Model
{
    private $tabla = 'empleados';
    private $encryption_key = 'jsoft';
    private $usuario;
    private $contra;
    private $nombres;
    private $apellidos;
    private $hora_entrada;
    private $hora_salida;
    private $estatus;
    private $pago_por_dia;
    private $dias_trabajo;
    private $descuento_por_hora;
    private $fecha_creacion;
    private $fecha_inicio;


    public function obtener_empleado_por($columna, $param){
        return $this->db->get_where($this->tabla, array($columna => $param))->result();
    }


    public function guardar_empleado($empleado){
        $this->db->insert($this->tabla, $empleado);
    }

    public function obtener_empleados_admin(){
        $this->db->select("*")
            ->from("Empleados");
        return $this->db->get()->result();
    }

}