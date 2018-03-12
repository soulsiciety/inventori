<?php
class C_klasifikasi_barang extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_barang','m_peminjaman','m_klasifikasi_barang','m_kategori_barang'));
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

        $data['klasifikasi_barang']     = $this->m_klasifikasi_barang->all()->result();
        $data['id_new']                 = $this->m_klasifikasi_barang->get_last_no();
        if($this->uri->segment(3)=="delete_success")
        {
            $data['message']="<div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Klasifikasi Barang Berhasil Dihapus!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success_edit")
        {
            $data['message']="<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Klasifikasi Barang Berhasil Diubah!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success")
        {
            $data['message']="<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Klasifikasi Barang Berhasil Ditambah!
                            </div>";
        }
        else
        {
            $data['message'] ="";
        }
        $data['kategori_barang']       = $this->m_kategori_barang->all()->result();
        $this->load->view('header',$data);
        $this->load->view('klasifikasi_barang/view',$data);
        $this->load->view('footer',$data);
    }

    function input()
    {

        $this->load->library('form_validation');
        

        $data['nama_klasifikasi']  = $this->input->post('nama_klasifikasi');
        $data['id_klasifikasi']    = $this->input->post('id_klasifikasi');
        $data['id_kategori']       = $this->input->post('id_kategori');
    
        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
        $this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
        $this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
        $this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
        $this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
        
        $this->form_validation->set_rules('nama_klasifikasi', 'Nama klasifikasi', 'trim|required|is_unique[klasifikasi_barang.nama_klasifikasi]');

        if ($this->form_validation->run() == FALSE)
        {
            //selalu ada
            $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
            //close selalu ada
            $data['id_new']                 = $this->m_klasifikasi_barang->get_last_no();
            $data['klasifikasi_barang']     = $this->m_klasifikasi_barang->all()->result();
            $data['kategori_barang']        = $this->m_kategori_barang->all()->result();
            $data['message']    ="";
            $this->load->view('header',$data);
            $this->load->view('klasifikasi_barang/view',$data);
            $this->load->view('footer',$data);
        }
        else
        {
            $this->m_klasifikasi_barang->input($data);
            redirect('c_klasifikasi_barang/index/add_success');
             
        }
    }
    function detail($id_klasifikasi)
    {
        //selalu ada
        $data['jumlah_peminjaman']  = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $data['nama_klasifikasi']      = $this->m_klasifikasi_barang->cek($id_klasifikasi)->row_array();
        $data['total_barang_by_klasifikasi']  = $this->m_klasifikasi_barang->total_by_klasifikasi($id_klasifikasi)->row_array();
        $data['klasifikasi']          = $this->m_klasifikasi_barang->barang_by_klasifikasi($id_klasifikasi)->result();
        $this->load->view('header',$data);
        $this->load->view('klasifikasi_barang/detail',$data);
        $this->load->view('footer',$data);
    }

    function delete()
    {
        $kode=$this->input->post('kode');
        $detail=$this->m_klasifikasi_barang->cek($kode)->result();
        $this->m_klasifikasi_barang->delete($kode);
    }

    function edit($id_klasifikasi)
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $this->_set_rules();
        if($this->form_validation->run()==true)
        {
            $data['nama_klasifikasi']    = $this->input->post('nama_klasifikasi');
            $data['id_kategori']         = $this->input->post('id_kategori');
            $this->m_klasifikasi_barang->edit($id_klasifikasi,$data);
            
            redirect('c_klasifikasi_barang/index/add_success_edit');
        }
        else
        {
            $data['klasifikasi_barang'] = $this->m_klasifikasi_barang->cek($id_klasifikasi)->row_array();
            $data['kategori_barang']       = $this->m_kategori_barang->all()->result();
            $this->load->view('header',$data);
            $this->load->view('klasifikasi_barang/edit',$data);
            $this->load->view('footer',$data);
        }
    }


    function _set_rules(){
        $this->form_validation->set_rules('nama_klasifikasi', 'klasifikasi Barang', 'trim|required');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

} 