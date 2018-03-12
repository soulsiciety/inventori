<?php 
class M_ruangan extends CI_Model{
private $table = "ruangan";
private $primary ="id_ruangan";

    function get_last_no()
    {
        $query  = $this->db->query("select max(id_ruangan) as last from ruangan");
        $row    = $query->row_array();
        $baru = $row['last']+1;
        return $baru;
    }

    function all()
    {
        $query = $this->db->query("select ruangan.*, gedung.* from ruangan LEFT JOIN gedung ON ruangan.id_gedung = gedung.id_gedung");
        return $query;
    }

    function input($data)
    {
        $query = $this->db->query("insert into ruangan values('','$data[id_gedung]','$data[nama_ruangan]','$data[keterangan]')");
    }

     function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->table);
        
        return $query;
    }

    function delete($kode){
        $this->db->where($this->primary,$kode);
        $this->db->delete($this->table);
    }

    function edit($id, $data)
    {
        $query  = $this->db->query("update ruangan set id_gedung = '$data[id_gedung]', nama_ruangan = '$data[nama_ruangan]', keterangan = '$data[keterangan]' where id_ruangan= '$id'");
    }


}