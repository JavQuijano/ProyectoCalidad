<?php
/**
 * Created by PhpStorm.
 * User: Moisés Barbachano
 * Date: 02/05/2019
 * Time: 10:00 PM
 */

class Entrada extends CI_Model
{
    private $tabla = 'historialentradas';
    private $id_empleado;
    private $hora_entrada;

    public function obtener_entrada_por($columna, $param ){
        return $this->db->get_where($this->tabla, array($columna => $param))->result();
    }

    public function obtener_entrada_duplicada($id_empleado, $fecha){

        $query = $this->db->from($this->tabla)->where('id_empleado',$id_empleado)->like('hora_entrada',$fecha)->get();
        return $query->result();
    }

    public function guardar_entrada($entrada){
        $this->db->insert($this->tabla, $entrada);
    }

}