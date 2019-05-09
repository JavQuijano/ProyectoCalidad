<?php
/**
 * Created by PhpStorm.
 * User: Moisés Barbachano
 * Date: 02/05/2019
 * Time: 10:00 PM
 */

class Cumplido extends CI_Model
{
    private $tabla = 'historialcumplidos';
    private $fecha_dia;
    private $id_empleado;
    private $id_entrada;
    private $id_salida;


    public function guardar_cumplido($cumplido){
        $this->db->insert($this->tabla, $cumplido);
    }


}