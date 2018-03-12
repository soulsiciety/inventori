<?php
class C_jenis_barang extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_barang','m_peminjaman','m_jenis_barang','m_kategori_barang'));
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

        $data['jenis_barang']       = $this->m_jenis_barang->all_semua()->result();
        $data['id_new']             = $this->m_jenis_barang->get_last_no();
        if($this->uri->segment(3)=="delete_success")
        {
            $data['message']="<div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            jenis Barang Berhasil Dihapus!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success_edit")
        {
            $data['message']="<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            jenis Barang Berhasil Diubah!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success")
        {
            $data['message']="<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            jenis Barang Berhasil Ditambah!
                            </div>";
        }
        else
        {
            $data['message'] ="";
        }
        $this->load->view('header',$data);
        $this->load->view('jenis_barang/view',$data);
        $this->load->view('footer',$data);
    }

    function input()
    {
        $this->load->library('form_validation');
        
        $data['nama_jenis']  = $this->input->post('nama_jenis');
        $data['id_jenis']    = $this->input->post('id_jenis');

    
        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
        $this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
        $this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
        $this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
        $this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
        
        $this->form_validation->set_rules('nama_jenis', 'Nama jenis', 'trim|required|is_unique[jenis_barang.nama_jenis]|min_length[3]');

        if ($this->form_validation->run() == FALSE)
        {
            //selalu ada
            $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
            //close selalu ada
            $data['id_new']             = $this->m_jenis_barang->get_last_no();
            $data['jenis_barang']    = $this->m_jenis_barang->all_semua()->result();
            $data['message']    ="";
            $this->load->view('header',$data);
            $this->load->view('jenis_barang/view',$data);
            $this->load->view('footer',$data);
        }
        else
        {
            $this->m_jenis_barang->input($data);
            redirect('c_jenis_barang/index/add_success');
             
        }
    }

    function delete()
    {
        $kode=$this->input->post('kode');
        $detail=$this->m_jenis_barang->cek($kode)->result();
        $this->m_jenis_barang->delete($kode);
    }

    function detail_barang()
    {
        //selalu ada
        $data['jumlah_peminjaman']  = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
         $id_jenis = $this->input->post('kode'); 
        
        $data['nama_jenis']      = $this->m_jenis_barang->cek($id_jenis)->row_array();
        $data['total_barang_by_jenis']  = $this->m_jenis_barang->total_by_jenis($id_jenis)->row_array();
        $data['jenis']      = $this->m_jenis_barang->barang_by_jenis($id_jenis)->result();
        $data['kategori_by_jenis'] = $this->m_kategori_barang->kategori_by_jenis($id_jenis)->result();
        $this->load->view('header',$data);
        $this->load->view('jenis_barang/detail',$data);
        $this->load->view('footer',$data);
    }

    function detail($id_jenis,$id_kategori)
    {
        //selalu ada
        $data['jumlah_peminjaman']  = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        
        $data['nama_jenis']             = $this->m_jenis_barang->cek($id_jenis)->row_array();
        $data['total_barang_by_jenis']  = $this->m_jenis_barang->total_by_jenis($id_jenis)->row_array();
        $data['jenis']      = $this->m_jenis_barang->barang_by_jenis($id_jenis)->result();
        $data['kategori_by_jenis'] = $this->m_kategori_barang->kategori_by_jenis($id_jenis)->result();
        $this->load->view('header',$data);
            $this->load->view('jenis_barang/detail',$data);
            $this->load->view('footer',$data);
    }

    function edit ($id_jenis)
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $this->_set_rules();
        if($this->form_validation->run()==true)
        {
            $data['nama_jenis']    = $this->input->post('nama_jenis');
            $this->m_jenis_barang->edit($id_jenis,$data);
            $data['jenis_barang']=$this->m_jenis_barang->cek($id_jenis)->row_array();
            redirect('c_jenis_barang/index/add_success_edit');
        }
        else
        {
            $data['jenis_barang'] = $this->m_jenis_barang->cek($id_jenis)->row_array();
            
            $this->load->view('header',$data);
            $this->load->view('jenis_barang/edit',$data);
            $this->load->view('footer',$data);
        }
    }


    function _set_rules(){
        $this->form_validation->set_rules('nama_jenis', 'jenis Barang', 'trim|required|min_length[3]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

} 