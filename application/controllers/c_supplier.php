<?php
class C_supplier extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model(array('m_supplier','m_peminjaman'));
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

        $data['supplier']              = $this->m_supplier->all()->result();
        $data['id_new']             = $this->m_supplier->get_last_no();
        if($this->uri->segment(3)=="delete_success")
        {
            $data['message']="<div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Supplier Berhasil Dihapus!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success_edit")
        {
            $data['message']="<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Supplier Berhasil Diubah!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success")
        {
            $data['message']="<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Supplier Berhasil Ditambah!
                            </div>";
        }
        else
        {
            $data['message'] ="";
        }
        $this->load->view('header',$data);
        $this->load->view('supplier/view',$data);
        $this->load->view('footer',$data);
    }

    function input()
    {
        $this->load->library('form_validation');
        
        $data['nama_supplier']  = $this->input->post('nama_supplier');
        $data['no_telp']        = $this->input->post('no_telp');
        $data['id_supplier']    = $this->input->post('id_supplier');
        $data['alamat']         = $this->input->post('alamat');
        $data['keterangan']    = $this->input->post('keterangan');

    
        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
        $this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
        $this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
        $this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
        $this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
        
        $this->form_validation->set_rules('nama_supplier', 'Nama supplier', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            //selalu ada
            $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
            //close selalu ada
            $data['id_new']             = $this->m_supplier->get_last_no();
            $data['supplier']              = $this->m_supplier->all()->result();
            $data['message']    ="";
            $this->load->view('header',$data);
            $this->load->view('supplier/input',$data);
            $this->load->view('footer',$data);
        }
        else
        {
            $this->m_supplier->input($data);
            redirect('c_supplier/index/add_success');
             
        }
    }

    function delete()
    {
        $kode=$this->input->post('kode');
        $detail=$this->m_supplier->cek($kode)->result();
        $this->m_supplier->delete($kode);
    }

    function edit($id_supplier)
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $this->_set_rules();
        if($this->form_validation->run()==true)
        {
            $data['nama_supplier']  = $this->input->post('nama_supplier');
            $data['no_telp']        = $this->input->post('no_telp');
            $data['id_supplier']    = $this->input->post('id_supplier');
            $data['alamat']         = $this->input->post('alamat');
            $data['keterangan']    = $this->input->post('keterangan');
            $this->m_supplier->edit($id_supplier,$data);
            $data['supplier']=$this->m_supplier->cek($id_supplier)->row_array();
            redirect('c_supplier/index/add_success_edit');
        }
        else
        {
            $data['supplier'] = $this->m_supplier->cek($id_supplier)->row_array();
            
            $this->load->view('header',$data);
            $this->load->view('supplier/edit',$data);
            $this->load->view('footer',$data);
        }
    }

    function _set_rules(){
        $this->form_validation->set_rules('nama_supplier', 'supplier Barang', 'trim|required|min_length[3]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

} 