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

    public function obtener_id_empleado_por_fecha($columna, $param){
        $entrada = $this->db->get_where($this->tabla, array($columna => $param))->result();
        return $entrada[0]->id_empleado;
    }

    public function obtener_entrada_duplicada($id_empleado, $fecha){

        $query = $this->db->from($this->tabla)->where('id_empleado',$id_empleado)->like('hora_entrada',$fecha)->get();
        return $query->result();
    }

    public function obtener_entrada_salida($fecha){
        $query = $this->db->query("select * from 
            (select * from historialentradas 
            where hora_entrada like \"%".$fecha."%\"
            ) as x left join 
            (select * from historialsalidas
            where hora_salida like \"%".$fecha."%\") as y
            on x.id_empleado = y.id_empleado
            UNION
            select * from 
            (select * from historialentradas 
            where hora_entrada like \"%".$fecha."%\"
            ) as a right join 
            (select * from historialsalidas
            where hora_salida like \"%".$fecha."%\") as b
            on a.id_empleado = b.id_empleado");
        return $query->result();
    }

    public function guardar_entrada($entrada){
        $this->db->insert($this->tabla, $entrada);
    }


}