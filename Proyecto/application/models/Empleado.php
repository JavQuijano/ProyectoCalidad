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

    public function update_empleado($id_empleado, $empleado){
        return $this->db->where("id_empleado", $id_empleado)
            ->update($this->tabla, $empleado);
    }

    public function obtener_vacaciones_empleado($id_empleado){
        $this->db->select("*")
            ->from("historialvacaciones")
            ->where("fecha_termino >= CURDATE()")
            ->where("id_empleado", $id_empleado);
        return $this->db->get()->result();
    }

    public function registrar_vacaciones($nueva_vaca){
        $this->db->insert("historialvacaciones", $nueva_vaca);
    }

    public function obtener_empleados_cumplidos(){
        $inicio_semana = date("Y-m-d", strtotime('-7 days') );
        $fecha_actual = date("Y-m-d");
        $this->db->select("*")
            ->from("historialcumplidos")
            ->join("empleados", "historialcumplidos.id_empleado = empleados.id_empleado")
            ->where("fecha_dia between '".$inicio_semana."' and '".$fecha_actual."'")
            ->where("flag_registrado", 0);
        return $this->db->get()->result();
    }

    public function obtener_empleados_excepcion(){
        $inicio_semana = date("Y-m-d", strtotime('-7 days') );
        $fecha_actual = date("Y-m-d");
        $this->db->select("*")
            ->from("historialexcepciones")
            ->join("empleados", "historialexcepciones.id_empleado = empleados.id_empleado")
            ->where("fecha_dia between '".$inicio_semana."' and '".$fecha_actual."'")
            ->where("flag_registrado", 0);
        return $this->db->get()->result();
    }

    public function registrar_cumplidos($empleados){
        foreach ($empleados as $empleado){
            $temp = new stdClass();
            $temp->id_empleado = $empleado->id_empleado;
            $temp->cantidad_horas = $empleado->horas_trabajadas;
            $temp->dia_registro = date("Y-m-d");

            $this->db->insert("horastrabajadas", $temp);

            $temp_update = new stdClass();
            $temp_update->flag_registrado = 1;

            $this->db->where("id_cumplido", $empleado->id_cumplido)
                ->update("historialcumplidos", $temp_update);
        }
    }
}