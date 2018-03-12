<?php 
class M_userpass extends CI_Model{
private $table = "userpass";
private $primary ="id_user";

    function get_last_no()
    {
        $today  = date('Ymd');
        $query  = $this->db->query("select max(id_user) as last from userpass 
                    where id_user like '$today%'");
        $data   = $query->row_array();
        $lastNoFaktur =$data['last'];
        $lastNoUrut=substr($lastNoFaktur,8,3);
        $nextNoUrut=$lastNoUrut+1;
        $nextNoRegistrasi=$today.sprintf('%03s',$nextNoUrut);
        return $nextNoRegistrasi; 
    }

    function get_password_new()
    {
        $id = $this->get_last_no();
        $pass_new = substr($id,5,6) + 222222;
        return $pass_new;

    }

    function get_username_new()
    {
        $query      = $this->db->query("select max(username) as last from userpass 
                        where username like 'user%'");
        $data       = $query->row_array();
        $username_new = substr($data['last'],4,1) + 1;
        return $username_new;
    }

    function all()
    {
        $query = $this->db->query("select userpass.*, departemen.*, prodi.* from userpass LEFT JOIN departemen ON userpass.id_departemen = departemen.id_departemen LEFT JOIN prodi ON userpass.id_prodi = prodi.id_prodi where level>1 ");
        return $query;
    }

    function input($data)
    {
        $query = $this->db->query("insert into userpass values('$data[id_user]','$data[nama_user]','$data[no_telp]','$data[id_departemen]','$data[id_prodi]','$data[username]','$data[password]','$data[level]')");
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
        $query  = $this->db->query("update userpass set nama_userpass = '$data[nama_userpass]', kode_userpass = '$data[kode_userpass]' where id_userpass= '$id'");
    }


}