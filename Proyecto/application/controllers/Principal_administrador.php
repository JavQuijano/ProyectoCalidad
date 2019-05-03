<?php
/**
 * Created by PhpStorm.
 * User: Moisés Barbachano
 * Date: 03/05/2019
 * Time: 02:48 AM
*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal_administrador extends CI_Controller {


    public function index()
    {
        $array['bienvenida'] = 'Bienvenido al menú del Administrador';
        $this->load->view('header');
        $this->load->view('footer');

        //$this->load->view('registrar_empleado', $array);
        $data = array();
        $data['content'] = $this->load->view('principal_administrador', $array,true);
        $this->load->view('layout',$data, false);
    }


}