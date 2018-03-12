<?php
class C_prodi extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_prodi','m_peminjaman'));
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

        $data['prodi']              = $this->m_prodi->all()->result();
        $data['id_new']             = $this->m_prodi->get_last_no();
        if($this->uri->segment(3)=="delete_success")
        {
            $data['message']="<div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Program Studi (Prodi) Berhasil Dihapus!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success_edit")
        {
            $data['message']="<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Program Studi (Prodi) Berhasil Diubah!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success")
        {
            $data['message']="<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Program Studi (Prodi) Berhasil Ditambah!
                            </div>";
        }
        else
        {
            $data['message'] ="";
        }
        $this->load->view('header',$data);
        $this->load->view('prodi/view',$data);
        $this->load->view('footer',$data);
    }

    function input()
    {
        $this->load->library('form_validation');
        
        $data['nama_prodi']  = $this->input->post('nama_prodi');
        $data['kode_prodi']  = $this->input->post('kode_prodi');
        $data['id_prodi']    = $this->input->post('id_prodi');

    
        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
        $this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
        $this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
        $this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
        $this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
        
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'trim|required|is_unique[prodi.nama_prodi]|min_length[3]');
        $this->form_validation->set_rules('kode_prodi', 'Kode Prodi', 'trim|required|is_unique[prodi.nama_prodi]|min_length[3]');

        if ($this->form_validation->run() == FALSE)
        {
            //selalu ada
            $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
            //close selalu ada
            $data['id_new']             = $this->m_prodi->get_last_no();
            $data['prodi']              = $this->m_prodi->all()->result();
            $data['message']    ="";
            $this->load->view('header',$data);
            $this->load->view('prodi/view',$data);
            $this->load->view('footer',$data);
        }
        else
        {
            $this->m_prodi->input($data);
            redirect('c_prodi/index/add_success');
             
        }
    }

    function delete()
    {
        $kode=$this->input->post('kode');
        $detail=$this->m_prodi->cek($kode)->result();
        $this->m_prodi->delete($kode);
    }

    function edit($id_prodi)
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $this->_set_rules();
        if($this->form_validation->run()==true)
        {
            $data['nama_prodi']    = $this->input->post('nama_prodi');
            $data['kode_prodi']    = $this->input->post('kode_prodi');
            $this->m_prodi->edit($id_prodi,$data);
            $data['prodi']=$this->m_prodi->cek($id_prodi)->row_array();
            redirect('c_prodi/index/add_success_edit');
        }
        else
        {
            $data['prodi'] = $this->m_prodi->cek($id_prodi)->row_array();
            
            $this->load->view('header',$data);
            $this->load->view('prodi/edit',$data);
            $this->load->view('footer',$data);
        }
    }

    function _set_rules(){
        $this->form_validation->set_rules('nama_prodi', 'prodi Barang', 'trim|required|min_length[3]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

} 