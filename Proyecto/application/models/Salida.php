<?php
/**
 * Created by PhpStorm.
 * User: Moisés Barbachano
 * Date: 03/05/2019
 * Time: 12:26 AM
 */

class Salida extends CI_Model
{
    private $tabla = 'historialsalidas';
    private $id_empleado;
    private $hora_salida;

    public function obtener_salida_por($columna, $param ){
        return $this->db->get_where($this->tabla, array($columna => $param))->result();
    }

    public function obtener_salida_duplicada($id_empleado, $fecha){
        $query = $this->db->from($this->tabla)->where('id_empleado',$id_empleado)->like('hora_salida',$fecha)->get();
        return $query->result();
    }

    public function guardar_salida($salida){
        $this->db->insert($this->tabla, $salida);
    }

}