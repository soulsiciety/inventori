<?php
class C_ruangan extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_peminjaman','m_ruangan','m_gedung'));
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

        $data['ruangan']        = $this->m_ruangan->all()->result();
        $data['gedung']         = $this->m_gedung->all()->result();
        $data['id_new']         = $this->m_ruangan->get_last_no();
        if($this->uri->segment(3)=="delete_success")
        {
            $data['message']="<div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Ruangan Berhasil Dihapus!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success_edit")
        {
            $data['message']="<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Ruangan Berhasil Diubah!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success")
        {
            $data['message']="<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Ruangan Berhasil Ditambah!
                            </div>";
        }
        else
        {
            $data['message'] ="";
        }
        $this->load->view('header',$data);
        $this->load->view('ruangan/view',$data);
        $this->load->view('footer',$data);
    }

    function input()
    {
        $this->load->library('form_validation');
        $data['keterangan']     = $this->input->post('keterangan');
        $data['nama_ruangan']   = $this->input->post('nama_ruangan');
        $data['id_ruangan']     = $this->input->post('id_ruangan');
        $data['id_gedung']      = $this->input->post('id_gedung');
    
        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
        $this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
        $this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
        $this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
        $this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
        
        $this->form_validation->set_rules('nama_ruangan', 'Nama ruangan', 'trim|required|is_unique[ruangan.nama_ruangan]|min_length[3]');

        if ($this->form_validation->run() == FALSE)
        {
            //selalu ada
            $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
            //close selalu ada
            $data['id_new']             = $this->m_ruangan->get_last_no();
            $data['ruangan']            = $this->m_ruangan->all()->result();
            $data['gedung']             = $this->m_gedung->all()->result();
            $data['message']    ="";
            $this->load->view('header',$data);
            $this->load->view('ruangan/view',$data);
            $this->load->view('footer',$data);
        }
        else
        {
            $this->m_ruangan->input($data);
            redirect('c_ruangan/index/add_success');
             
        }
    }

    function delete()
    {
        $kode=$this->input->post('kode');
        $detail=$this->m_ruangan->cek($kode)->result();
        $this->m_ruangan->delete($kode);
    }

    function edit ($id_ruangan)
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $this->_set_rules();
        if($this->form_validation->run()==true)
        {
            $data['nama_ruangan']    = $this->input->post('nama_ruangan');
            $data['keterangan']    = $this->input->post('keterangan');
            $data['id_gedung']    = $this->input->post('id_gedung');
            $this->m_ruangan->edit($id_ruangan,$data);
            $data['ruangan']=$this->m_ruangan->cek($id_ruangan)->row_array();
            redirect('c_ruangan/index/add_success_edit');
        }
        else
        {
            $data['ruangan']    = $this->m_ruangan->cek($id_ruangan)->row_array();
            $data['gedung']     = $this->m_gedung->all()->result();
            $this->load->view('header',$data);
            $this->load->view('ruangan/edit',$data);
            $this->load->view('footer',$data);
        }
    }


    function _set_rules(){
        $this->form_validation->set_rules('nama_ruangan', 'ruangan Barang', 'trim|required|min_length[3]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

} 