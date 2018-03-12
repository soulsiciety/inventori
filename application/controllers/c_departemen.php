<?php
class C_departemen extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_departemen','m_peminjaman'));
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

        $data['departemen']              = $this->m_departemen->all()->result();
        $data['id_new']             = $this->m_departemen->get_last_no();
        if($this->uri->segment(3)=="delete_success")
        {
            $data['message']="<div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Departemen Berhasil Dihapus!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success_edit")
        {
            $data['message']="<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Departemen Berhasil Diubah!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success")
        {
            $data['message']="<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Departemen Berhasil Ditambah!
                            </div>";
        }
        else
        {
            $data['message'] ="";
        }
        $this->load->view('header',$data);
        $this->load->view('departemen/view',$data);
        $this->load->view('footer',$data);
    }

    function input()
    {
        $this->load->library('form_validation');
        
        $data['nama_departemen']  = $this->input->post('nama_departemen');
        $data['kode_departemen']  = $this->input->post('kode_departemen');
        $data['id_departemen']    = $this->input->post('id_departemen');

    
        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
        $this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
        $this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
        $this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
        $this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
        
        $this->form_validation->set_rules('nama_departemen', 'Nama departemen', 'trim|required|is_unique[departemen.nama_departemen]|min_length[3]');
        $this->form_validation->set_rules('kode_departemen', 'Kode departemen', 'trim|required|is_unique[departemen.nama_departemen]|min_length[3]');

        if ($this->form_validation->run() == FALSE)
        {
            //selalu ada
            $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
            //close selalu ada
            $data['id_new']             = $this->m_departemen->get_last_no();
            $data['departemen']              = $this->m_departemen->all()->result();
            $data['message']    ="";
            $this->load->view('header',$data);
            $this->load->view('departemen/view',$data);
            $this->load->view('footer',$data);
        }
        else
        {
            $this->m_departemen->input($data);
            redirect('c_departemen/index/add_success');
             
        }
    }

    function delete()
    {
        $kode=$this->input->post('kode');
        $detail=$this->m_departemen->cek($kode)->result();
        $this->m_departemen->delete($kode);
    }

    function edit($id_departemen)
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $this->_set_rules();
        if($this->form_validation->run()==true)
        {
            $data['nama_departemen']    = $this->input->post('nama_departemen');
            $data['kode_departemen']    = $this->input->post('kode_departemen');
            $this->m_departemen->edit($id_departemen,$data);
            $data['departemen']=$this->m_departemen->cek($id_departemen)->row_array();
            redirect('c_departemen/index/add_success_edit');
        }
        else
        {
            $data['departemen'] = $this->m_departemen->cek($id_departemen)->row_array();
            
            $this->load->view('header',$data);
            $this->load->view('departemen/edit',$data);
            $this->load->view('footer',$data);
        }
    }

    function _set_rules(){
        $this->form_validation->set_rules('nama_departemen', 'departemen Barang', 'trim|required|min_length[3]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

} 