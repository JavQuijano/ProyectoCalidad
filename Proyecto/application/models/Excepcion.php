<?php
/**
 * Created by PhpStorm.
 * User: Moisés Barbachano
 * Date: 02/05/2019
 * Time: 10:00 PM
 */

class Excepcion extends CI_Model
{
    private $tabla = 'historialexcepciones';
    private $fecha_dia;
    private $id_empleado;
    private $id_entrada;
    private $id_salida;


    public function guardar_excepcion($excepcion){
        $this->db->insert($this->tabla, $excepcion);
    }


}