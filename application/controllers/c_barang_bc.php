<?php
class C_barang extends CI_Controller{

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
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada

        $data['barang']         = $this->m_barang->all()->result();
        
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
        else if($this->uri->segment(3)=="failed_image")
        {
            $data['message']="<div class='alert alert-warning'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Silahkan cek kembali format file dan size gambar anda
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
        else if($this->uri->segment(3)=="add_success_tambah_stok")
        {
            $data['message']="<div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Perhatian!</h4>
                            Tambah Stok Barang Berhasil Ditambah!
                            </div>";
        }
        else
        {
            $data['message'] ="";
        }
        $this->load->view('header',$data);
        $this->load->view('barang/view',$data);
        $this->load->view('footer',$data);
    }

    function input()
    {

        $this->load->model('m_barang','',TRUE);
        $this->load->library('form_validation');
        

        $data['nama_barang']        = $this->input->post('nama_barang');
        $data['id_kategori']        = $this->input->post('id_kategori');
        $data['id_jenis']           = $this->input->post('id_jenis');
        //images
        $config['upload_path'] = './assets_1/img_barang/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '5000';
           

        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
        $this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
        $this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
        $this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
        $this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
        
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required|is_unique[barang.nama_barang]|min_length[5]');

        if ($this->form_validation->run() == FALSE)
        {
            //selalu ada
            $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
            //close selalu ada
            $data['id_new']     = $this->m_barang->get_last_no();
            $data['message']    ="";
            $data['barang']     = $this->m_barang->all()->result();
            $data['kategori']   = $this->m_kategori_barang->all()->result();
            $data['jenis']      = $this->m_jenis_barang->all()->result();
            $this->load->view('header',$data);
            $this->load->view('barang/input',$data);
            $this->load->view('footer',$data);
        }
        else
        {
            //jika field sudah terisi semua, baru image bisa di pindahkan ke folder img 
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar_barang'))
            {
                redirect('c_barang/index/failed_image');
            }
            else
            {
                $gambar_barang = $this->upload->file_name;
                $data['gambar_barang'] = $gambar_barang;
                $this->m_barang->input($data);
                redirect('c_barang/index/add_success');
            }  
        }
    }

    function delete()
    {
        $kode=$this->input->post('kode');
        $detail=$this->m_barang->cek($kode)->result();
        foreach($detail as $det):
        unlink("assets_1/img_barang/".$det->gambar);
        endforeach; 
        $this->m_barang->delete($kode);
    }

    function detail($id_barang)
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $data['barang'] = $this->m_barang->detail_barang($id_barang)->row_array();
        $data['h_b']    = $this->m_barang->get_h_p_barang($id_barang)->result();
        $data['h_b_m']  = $this->m_barang->get_h_barang_masuk($id_barang)->result();
        $data['total_stok'] = $this->m_barang->total_stok($id_barang);
        $this->load->view('header',$data);
        $this->load->view('barang/detail',$data);
        $this->load->view('footer',$data);
    }
    function edit($id_barang)
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $this->_set_rules();
        if($this->form_validation->run()==true)
        {
            $data['nama_barang']        = $this->input->post('nama_barang');
            $data['id_kategori']        = $this->input->post('id_kategori');
            $data['id_jenis']           = $this->input->post('id_jenis');
            //images
            $config['upload_path'] = './assets_1/img_barang/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '5000';

            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar_barang'))
            {
                $gambar= $this->input->post('gambar_barang_lama');
            }
            else
            {
                $detail = $this->m_barang->cek($id_barang)->result();
                foreach($detail as $det):
                unlink("assets_1/img_barang/".$det->gambar);
                endforeach; 
                $gambar=$this->upload->file_name;
            }
            $data['gambar'] = $gambar;

            $this->m_barang->edit($id_barang,$data);
            //select barang berdasarkan id barang masuk
            $data['barang']=$this->m_barang->cek($id_barang)->row_array();
            redirect('c_barang/index/add_success_edit');
        }
        else
        {
            $data['kategori']   = $this->m_kategori_barang->all()->result();
            $data['jenis']      = $this->m_jenis_barang->all()->result();
            $data['barang'] = $this->m_barang->cek($id_barang)->row_array();
            
            $this->load->view('header',$data);
            $this->load->view('barang/edit',$data);
            $this->load->view('footer',$data);
        }
    }
    function tambah_stok($id_barang)
    {
        $this->load->library('form_validation');
        
        $data['harga_satuan']   = str_replace(".", "", $this->input->post('harga_satuan'));
        $data['qty_masuk']      = $this->input->post('qty_masuk');
        $data['umur_manfaat']   = $this->input->post('umur_manfaat');
        $data['tgl_entry']      = date("Y-m-d", strtotime($this->input->post('tgl_entry')));

        $this->form_validation->set_message('required', '%s Harus Diisi.');
        $this->form_validation->set_message('min_length', '%s Minimal %s Karakter.');
        $this->form_validation->set_message('max_length', '%s Maksimal %s Karakter.');
        $this->form_validation->set_message('is_unique', '%s Telah Terdaftar');
        $this->form_validation->set_message('matches', '%s Tidak Cocok dengan %s.');
        $this->form_validation->set_message('numeric', '%s Harus diisi Angka.');
        
        $this->form_validation->set_rules('qty_masuk', 'Jumlah Barang', 'trim|required');

        if ($this->form_validation->run() == FALSE)
        {
            //selalu ada
            $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
            //close selalu ada
            $data['barang'] = $this->m_barang->cek($id_barang)->row_array();
            $this->load->view('header',$data);
            $this->load->view('barang/stok_tambah',$data);
            $this->load->view('footer',$data);
        }
        else
        {
           
            $this->m_barang->tambah_stok($id_barang,$data);
            redirect('c_barang/index/add_success_tambah_stok');
         
        }
    }

    function edit_stok($id_b_masuk)
    {
        //selalu ada
        $data['jumlah_peminjaman'] = $this->m_peminjaman->jumlah_peminjaman();
        //close selalu ada
        $this->_set_rules();
        if($this->form_validation->run()==true)
        {
            $data['harga_satuan']   = str_replace(".", "", $this->input->post('harga_satuan'));
            $data['qty_masuk']      = $this->input->post('qty_masuk');
            $data['umur_manfaat']   = $this->input->post('umur_manfaat');
            $data['tgl_entry']      = date("Y-m-d", strtotime($this->input->post('tgl_entry')));

            $this->m_barang->edit_stok($id_b_masuk,$data);
            
            redirect('c_barang/index/add_success_edit');
        }
        else
        {
            $data['barang'] = $this->m_barang->get_detail_stok($id_b_masuk)->row_array();
            
            $this->load->view('header',$data);
            $this->load->view('barang/stok_edit',$data);
            $this->load->view('footer',$data);
        }
    }

    function _set_rules(){
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|required|min_length[5]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }

} 