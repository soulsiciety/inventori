<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {
	
	function __construct()
	{ 
       parent::__construct();
       $this->load->model(array('m_login','m_barang'));	  
    }

    
	public function index() 
	{
		
		$this->load->view('login');
	}

	function login_proses()
    {
    	$this->load->library('form_validation');
    	$data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');

        $this->form_validation->set_message('required', '%s Harus Diisi.');

        $this->form_validation->set_rules('username','username','required|trim');
        $this->form_validation->set_rules('password','password','required|trim');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('index');
        }
        else
        {
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            
            $cek=$this->m_login->cek($username,md5($password));
            if($cek->num_rows()>0)
            {
                foreach($cek->result() as $sess)
                {
                    //login berhasil, buat session
                    $sess_data['username']  = $sess->username;
                    $sess_data['level']     = $sess->level;
                    $this->session->set_userdata($sess_data);   
                }
                
                if($this->session->userdata('level')=='1')
                {
                    redirect('c_admin',$sess_data);
                }
                else if($this->session->userdata('level')>='2'&&$this->session->userdata('level')<='4')
                {
                    redirect('c_user',$sess_data);
                }    
            }
            else
            {
                //login gagal
                $this->session->set_flashdata('message','username dan password anda tidak cocok!');
                
                redirect('masuk');
            }
        }
    }//close p_login

    function logout()
    {
        $this->session->unset_userdata('username');
        redirect('masuk');
    }
}
