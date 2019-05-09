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

    public function obtener_id_empleado_por_fecha($columna, $param){
        $entrada = $this->db->get_where($this->tabla, array($columna => $param))->result();
        return $entrada[0]->id_empleado;
        /*
        $asd = $this->obtener_salida_por('id_empleado',18);
        echo "<script>alert('".$asd[0]->hora_salida."')</script>";

        echo "<script>alert('".$param."')</script>";
        $formato = "Y-m-d H:i:s";
        $hora_salida = DateTime::createFromFormat($formato, $param);


        $entrada = $this->db->get_where($this->tabla, array($columna => $hora_salida))->result();
        return $entrada[0]->id_empleado;*/
    }

    public function obtener_salida_duplicada($id_empleado, $fecha){
        $query = $this->db->from($this->tabla)->where('id_empleado',$id_empleado)->like('hora_salida',$fecha)->get();
        return $query->result();
    }

    public function guardar_salida($salida){
        $this->db->insert($this->tabla, $salida);
    }

}