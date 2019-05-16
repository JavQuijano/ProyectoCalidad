<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pruebas_unitarias extends CI_Controller {
    
    public function test(){
        $hola = 1 + 1;

        $expected_result = 2;

        $test_name = 'Adds one plus one';

        echo $this->unit->run($hola, $expected_result, $test_name);
        
        
    }
    
}