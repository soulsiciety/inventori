<?php 
class M_supplier extends CI_Model{
private $table = "supplier";
private $primary ="id_supplier";

    function get_last_no()
    {
        $query  = $this->db->query("select max(id_supplier) as last from supplier");
        $row    = $query->row_array();
        $baru = $row['last']+1;
        return $baru;
    }

    function all()
    {
        $query = $this->db->query("select *from supplier");
        return $query;
    }

    function input($data)
    {
        $query = $this->db->query("insert into supplier values('','$data[nama_supplier]', '$data[no_telp]', '$data[alamat]','$data[keterangan]')");
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
        $query  = $this->db->query("update supplier set nama_supplier = '$data[nama_supplier]', no_telp = '$data[no_telp]', alamat = '$data[alamat]', keterangan = '$data[keterangan]' where id_supplier= '$id'");
    }


}