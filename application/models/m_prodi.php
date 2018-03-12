<?php 
class M_prodi extends CI_Model{
private $table = "prodi";
private $primary ="id_prodi";

    function get_last_no()
    {
        $query  = $this->db->query("select max(id_prodi) as last from prodi");
        $row    = $query->row_array();
        $baru = $row['last']+1;
        return $baru;
    }

    function all()
    {
        $query = $this->db->query("select *from prodi");
        return $query;
    }

    function input($data)
    {
        $query = $this->db->query("insert into prodi values('','$data[kode_prodi]', '$data[nama_prodi]')");
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
        $query  = $this->db->query("update prodi set nama_prodi = '$data[nama_prodi]', kode_prodi = '$data[kode_prodi]' where id_prodi= '$id'");
    }


}