<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class UnitsModel extends CI_Model {
    
    public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public function get_all()
    {
        $q = $this->db->get('unit');
        return $q;        
    }

   
}
