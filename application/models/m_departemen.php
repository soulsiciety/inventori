<?php 
class M_departemen extends CI_Model{
private $table = "departemen";
private $primary ="id_departemen";

    function get_last_no()
    {
        $query  = $this->db->query("select max(id_departemen) as last from departemen");
        $row    = $query->row_array();
        $baru = $row['last']+1;
        return $baru;
    }

    function all()
    {
        $query = $this->db->query("select *from departemen");
        return $query;
    }

    function input($data)
    {
        $query = $this->db->query("insert into departemen values('','$data[kode_departemen]', '$data[nama_departemen]')");
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
        $query  = $this->db->query("update departemen set nama_departemen = '$data[nama_departemen]', kode_departemen = '$data[kode_departemen]' where id_departemen= '$id'");
    }


}