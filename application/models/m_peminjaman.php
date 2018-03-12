<?php
class M_peminjaman extends CI_Model{
private $table = "peminjaman";
private $primary ="id_p";
    function all()
    {
        $query = $this->db->query("select peminjaman.*, ruangan.* from peminjaman 
                LEFT JOIN ruangan ON peminjaman.id_ruangan = ruangan.id_ruangan");
        return $query;
    }
    function jumlah_peminjaman()
    {
        $query  = $this->db->query("select count(id_p) as qty from peminjaman");
        $row    = $query->row_array();
        $qty = $row['qty'];
        return $qty;
    }
    function input_peminjaman($id_det)
    {
        $query = $this->db->query("select peminjaman.*, ruangan.* from peminjaman 
                LEFT JOIN ruangan ON peminjaman.id_ruangan = ruangan.id_ruangan");
    }

    function input_detail($id_barang)
    {
        $query = $this->db->query("insert into detail_peminjaman(id_p,id_barang,qty) values('1','$id_barang','1')");
    }

    function get_no()
    {
        $today  = date('Ymd');
        $query  = $this->db->query("select max(id_p) as last from peminjaman where id_p like '$today%'");
        $row    = $query->row_array();

        $lastNoFaktur   = $row['last'];
        $lastNoUrut     = substr($lastNoFaktur,8,2);
        $nextNoUrut     = $lastNoUrut+1;
        
        $nextNoRegistrasi=$today.sprintf('%02s',$nextNoUrut);
        
        return $nextNoRegistrasi; 
  }
   
}