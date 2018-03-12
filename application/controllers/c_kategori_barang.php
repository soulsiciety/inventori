<?php
class C_kategori_barang extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_barang','m_peminjaman','m_kategori_barang','m_jenis_barang'));
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

        $data['kategori_barang']    = $this->m_kategori_barang->all()->result();
        $data['id_new']             = $this->m_kategori_barang->get_last_no();
        if($this->uri->segment(3)=="delete_success")
        {
            $data['message']="<div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Kategori Barang Berhasil Dihapus!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success_edit")
        {
            $data['message']="<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Kategori Barang Berhasil Diubah!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success")
        {
            $data['message']="<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Kategori Barang Berhasil Ditambah!
                            </div>";
        }
        else
        {
            $data['message'] ="";
        }
        $data['jenis_barang']       = $this->m_jenis_barang->all_semua()->result();
        $this->load->view('header',$data);
        $this->load->view('kategori_barang/view',$data);
        $this->load->view('footer',$data);
    }

    function input()
    {

        $this->load->library('form_validation');
        

        $data['nama_kategori']  = $this->input->post('nama_kategori');
        $data['id_kategori']    = $this->input->post('id_kategori');
        $data['id_jenis']       = $this->input->post('id_jenis');
    
        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
        $this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
        $this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
        $this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
        $this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
        
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required|is_unique[kategori_barang.nama_kategori]|min_length[5]');

        if ($this->form_validation->run() == FALSE)
        {
            //selalu ada
            $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
            //close selalu ada
            $data['id_new']             = $this->m_kategori_barang->get_last_no();
            $data['kategori_barang']    = $this->m_kategori_barang->all()->result();
            $data['jenis_barang']       = $this->m_jenis_barang->all_semua()->result();
            $data['message']    ="";
            $this->load->view('header',$data);
            $this->load->view('kategori_barang/view',$data);
            $this->load->view('footer',$data);
        }
        else
        {
            $this->m_kategori_barang->input($data);
            redirect('c_kategori_barang/index/add_success');
             
        }
    }
    function detail($id_jenis,$id_kategori)
    {
        //selalu ada
        $data['jumlah_peminjaman']  = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $data['nama_kategori']      = $this->m_kategori_barang->cek($id_kategori)->row_array();
        $data['total_barang_by_kategori']  = $this->m_kategori_barang->total_by_kategori($id_kategori)->row_array();
        $data['kategori']          = $this->m_kategori_barang->barang_by_kategori($id_kategori)->result();
        $this->load->view('header',$data);
        $this->load->view('kategori_barang/detail',$data);
        $this->load->view('footer',$data);
    }

    function delete()
    {
        $kode=$this->input->post('kode');
        $detail=$this->m_kategori_barang->cek($kode)->result();
        $this->m_kategori_barang->delete($kode);
    }

    function edit ($id_kategori)
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $this->_set_rules();
        if($this->form_validation->run()==true)
        {
            $data['nama_kategori']    = $this->input->post('nama_kategori');
            $this->m_kategori_barang->edit($id_kategori,$data);
            
            redirect('c_kategori_barang/index/add_success_edit');
        }
        else
        {
            $data['kategori_barang'] = $this->m_kategori_barang->cek($id_kategori)->row_array();
            $data['jenis_barang']       = $this->m_jenis_barang->all_semua()->result();
            $this->load->view('header',$data);
            $this->load->view('kategori_barang/edit',$data);
            $this->load->view('footer',$data);
        }
    }


    function _set_rules(){
        $this->form_validation->set_rules('nama_kategori', 'Kategori Barang', 'trim|required|min_length[5]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

} 