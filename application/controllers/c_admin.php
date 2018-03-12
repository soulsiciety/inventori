<?php
//test
class C_admin extends CI_Controller{

    function __construct()
	{
        parent::__construct();
        $this->load->model(array('m_login','m_barang','m_peminjaman'));
        $this->load->library(array('form_validation','upload'));
		$this->load->helper('text');	  

        if(!$this->session->userdata('username'))
        {
            redirect('masuk');
        } 
    } 

    function index()
	{
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        
        $this->load->view('header',$data);
        $this->load->view('dashboard',$data);
        $this->load->view('footer',$data);
    }
} 