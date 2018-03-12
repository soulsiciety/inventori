<?php
class C_gedung extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_peminjaman','m_gedung'));
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

        $data['gedung']       = $this->m_gedung->all()->result();
        $data['id_new']             = $this->m_gedung->get_last_no();
        if($this->uri->segment(3)=="delete_success")
        {
            $data['message']="<div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Gedung Berhasil Dihapus!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success_edit")
        {
            $data['message']="<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Gedung Berhasil Diubah!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success")
        {
            $data['message']="<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Gedung Berhasil Ditambah!
                            </div>";
        }
        else
        {
            $data['message'] ="";
        }
        $this->load->view('header',$data);
        $this->load->view('gedung/view',$data);
        $this->load->view('footer',$data);
    }

    function input()
    {
        $this->load->library('form_validation');
        
        $data['nama_gedung']  = $this->input->post('nama_gedung');
        $data['id_gedung']    = $this->input->post('id_gedung');

    
        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
        $this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
        $this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
        $this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
        $this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
        
        $this->form_validation->set_rules('nama_gedung', 'Nama gedung', 'trim|required|is_unique[gedung.nama_gedung]|min_length[3]');

        if ($this->form_validation->run() == FALSE)
        {
            //selalu ada
            $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
            //close selalu ada
            $data['id_new']             = $this->m_gedung->get_last_no();
            $data['gedung']    = $this->m_gedung->all()->result();
            $data['message']    ="";
            $this->load->view('header',$data);
            $this->load->view('gedung/view',$data);
            $this->load->view('footer',$data);
        }
        else
        {
            $this->m_gedung->input($data);
            redirect('c_gedung/index/add_success');
             
        }
    }

    function delete()
    {
        $kode=$this->input->post('kode');
        $detail=$this->m_gedung->cek($kode)->result();
        $this->m_gedung->delete($kode);
    }

    function detail_barang()
    {
        //selalu ada
        $data['jumlah_peminjaman']  = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
         $id_gedung = $this->input->post('kode'); 
        
        $data['nama_gedung']      = $this->m_gedung->cek($id_gedung)->row_array();
        $this->load->view('header',$data);
        $this->load->view('gedung/detail',$data);
        $this->load->view('footer',$data);
    }

    function detail($id_gedung)
    {
        //selalu ada
        $data['jumlah_peminjaman']  = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        
        $data['gedung']      = $this->m_gedung->barang_by_gedung($id_gedung)->result();
        $this->load->view('header',$data);
            $this->load->view('gedung/detail',$data);
            $this->load->view('footer',$data);
    }

    function edit ($id_gedung)
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $this->_set_rules();
        if($this->form_validation->run()==true)
        {
            $data['nama_gedung']    = $this->input->post('nama_gedung');
            $this->m_gedung->edit($id_gedung,$data);
            $data['gedung']=$this->m_gedung->cek($id_gedung)->row_array();
            redirect('c_gedung/index/add_success_edit');
        }
        else
        {
            $data['gedung'] = $this->m_gedung->cek($id_gedung)->row_array();
            
            $this->load->view('header',$data);
            $this->load->view('gedung/edit',$data);
            $this->load->view('footer',$data);
        }
    }


    function _set_rules(){
        $this->form_validation->set_rules('nama_gedung', 'gedung Barang', 'trim|required|min_length[3]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

} 