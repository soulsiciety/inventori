<?php 
class M_gedung extends CI_Model{
private $table = "gedung";
private $primary ="id_gedung";

    function get_last_no()
    {
        $query  = $this->db->query("select max(id_gedung) as last from gedung");
        $row    = $query->row_array();
        $baru = $row['last']+1;
        return $baru;
    }

    function all()
    {
        $query = $this->db->query("select *from gedung");
        return $query;
    }

    function input($data)
    {
        $query = $this->db->query("insert into gedung values('','$data[nama_gedung]')");
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
        $query  = $this->db->query("update gedung set nama_gedung = '$data[nama_gedung]' where id_gedung= '$id'");
    }


}