<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct()
	{ 
       parent::__construct();
       $this->load->model(array('m_login','m_barang'));	  
    }

    
	public function index() 
	{
		
		$this->load->view('index');
	}

	
}
