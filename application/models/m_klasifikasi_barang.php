<?php 
class M_klasifikasi_barang extends CI_Model{
private $table = "klasifikasi_barang";
private $primary ="id_klasifikasi";
    function all()
    {
        $query = $this->db->query("select klasifikasi_barang.*, kategori_barang.* from klasifikasi_barang LEFT JOIN kategori_barang ON klasifikasi_barang.id_kategori = kategori_barang.id_kategori GROUP BY id_klasifikasi ASC");
        return $query;
    }

    function get_last_no()
    {
        $query  = $this->db->query("select max(id_klasifikasi) as last from klasifikasi_barang");
        $row    = $query->row_array();
        $baru = $row['last']+1;
        return $baru;
    }

    function input($data)
    {
        $query = $this->db->query("insert into klasifikasi_barang values('', '$data[nama_klasifikasi]','$data[id_kategori]')");
    }
    function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->table);
        
        return $query;
    }

    function edit($id, $data)
    {
        $query  = $this->db->query("update klasifikasi_barang set nama_klasifikasi = '$data[nama_klasifikasi]', id_kategori = '$data[id_kategori]' where id_klasifikasi= '$id'");
    }
    function delete($kode){
        $this->db->where($this->primary,$kode);
        $this->db->delete($this->table);
    }
    function get_kla($id_kategori){
        $query = $this->db->query("select *from klasifikasi_barang WHERE id_kategori='".$id_kategori."' GROUP BY id_klasifikasi ASC");
        return $query;
    }

    
}