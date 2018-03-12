<?php
class C_user extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_userpass','m_peminjaman','m_departemen','m_prodi'));
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
        $data['jumlah_peminjaman']  = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada

        $data['user']              = $this->m_userpass->all()->result();
        $data['id_new']             = $this->m_userpass->get_last_no();
        if($this->uri->segment(3)=="delete_success")
        {
            $data['message']="<div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            User Berhasil Dihapus!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success_edit")
        {
            $data['message']="<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            User Berhasil Diubah!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success")
        {
            $data['message']="<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            User Berhasil Ditambah!
                            </div>";
        }
        else
        {
            $data['message'] ="";
        }
        $this->load->view('header',$data);
        $this->load->view('user/view',$data);
        $this->load->view('footer',$data);
    }

    function input()
    {
        $this->load->library('form_validation');
        
        $data['id_user']        = $this->input->post('id_user');
        $data['nama_user']      = $this->input->post('nama_user');
        $data['level']          = $this->input->post('level');
        $data['no_telp']        = $this->input->post('no_telp');
        $data['id_departemen']  = $this->input->post('id_departemen');
        $data['id_prodi']       = $this->input->post('id_prodi');
        $data['username']       = $this->input->post('username');
        $data['password']       = $this->input->post('password');

        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
        $this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
        $this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
        $this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
        $this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
        
         $this->form_validation->set_rules('nama_user', 'Nama departemen', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'Kode departemen', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            //selalu ada
            $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
            //close selalu ada
            $data['id_new']             = $this->m_userpass->get_last_no();
            $data['password_new']       = $this->m_userpass->get_password_new();
            $data['username_new']       = $this->m_userpass->get_username_new();
            $data['departemen']         = $this->m_departemen->all()->result();
            $data['prodi']              = $this->m_prodi->all()->result(); 
            $data['message']            = "";
            $this->load->view('header',$data);
            $this->load->view('user/input',$data);
            $this->load->view('footer',$data);
        }
        else
        {
            $this->m_userpass->input($data);
            redirect('c_user/index/add_success');
             
        }
    }

    function delete()
    {
        $kode=$this->input->post('kode');
        $detail=$this->m_userpass->cek($kode)->result();
        $this->m_userpass->delete($kode);
    }

    function edit($id_user)
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $this->_set_rules();
        if($this->form_validation->run()==true)
        {
            $data['nama_user']    = $this->input->post('nama_user');
            $data['kode_user']    = $this->input->post('kode_user');
            $this->m_userpass->edit($id_user,$data);
            $data['user']=$this->m_userpass->cek($id_user)->row_array();
            redirect('c_user/index/add_success_edit');
        }
        else
        {
            $data['user'] = $this->m_userpass->cek($id_user)->row_array();
            
            $this->load->view('header',$data);
            $this->load->view('user/edit',$data);
            $this->load->view('footer',$data);
        }
    }

    function _set_rules(){
     
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

} 