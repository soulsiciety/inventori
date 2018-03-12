<?php
class C_peminjaman extends CI_Controller{

    function __construct()
	{
        parent::__construct();
        $this->load->model(array('m_barang','m_peminjaman'));
        $this->load->library(array('form_validation','upload'));
		$this->load->helper('text');	  

        if(!$this->session->userdata('username'))
        {
            redirect('masuk');
        } 
    } 

    function index()
	{
        $data['peminjaman'] = $this->m_peminjaman->all()->result();
        if($this->uri->segment(3)=="delete_success")
        {
            $data['message']="<div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Barang Berhasil Dihapus!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success_edit")
        {
            $data['message']="<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Barang Berhasil Diubah!
                            </div>";
        }
        else if($this->uri->segment(3)=="add_success")
        {
            $data['message']="<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Barang Berhasil Ditambah!
                            </div>";
        }
        else
        {
            $data['message'] ="";
        }
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        
        $data['barang']     = $this->m_barang->all()->result();

        $this->load->view('header',$data);
        $this->load->view('peminjaman/view',$data);
        $this->load->view('footer',$data);
    }

    function list_barang()
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $data['id_p_new']   = $this->m_peminjaman->get_no();
        $data['barang']     = $this->m_barang->all()->result();
            
        $this->load->view('header',$data);
        $this->load->view('peminjaman/list_barang',$data);
        $this->load->view('footer',$data);
    }

    function input_detail($id_barang)
    {
        $this->m_peminjaman->input_detail($id_barang);
        redirect('C_peminjaman/list_barang');
    }

    function delete()
    {
        $kode=$this->input->post('kode');
        $detail=$this->m_barang->cek($kode)->result();
        $this->m_barang->delete($kode);
    }

    function edit($id_barang)
    {
       $this->_set_rules();
        if($this->form_validation->run()==true)
        {
            $data['nama_barang']    = $this->input->post('nama_barang');
            $data['harga_satuan']   = str_replace(".", "", $this->input->post('harga_satuan'));
            $data['stok_awal']      = $this->input->post('stok_awal');
            $data['deskripsi']      = $this->input->post('deskripsi');

            
            //simpang data edit
            $this->m_barang->edit($id_barang,$data);
            
            redirect('c_barang/index/add_success_edit');
        }
        else
        {
            $data['barang'] = $this->m_barang->cek($id_barang)->row_array();
            
            $this->load->view('header',$data);
            $this->load->view('barang/edit',$data);
            $this->load->view('footer',$data);
        }
    }

    function _set_rules(){
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('harga_satuan', ' Harga Satuan', 'trim|required');
        $this->form_validation->set_rules('stok_awal', 'Stok Awal', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

} 