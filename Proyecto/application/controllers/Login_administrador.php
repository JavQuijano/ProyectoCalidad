<?php
/**
 * Created by PhpStorm.
 * User: Moisés Barbachano
 * Date: 03/05/2019
 * Time: 02:43 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_administrador extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index()
    {
        $this->load->view('administrador');
    }

    public function ingresar_menu(){
        if($this->input->post('user') == "root" && $this->input->post('contra') == "root"){
            redirect(base_url()."index.php/Principal_administrador");
        }
    }

}
