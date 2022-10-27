<?php 

class My_Model extends CI_Model
{
  function ambil_data($table){
    return $this ->db->get($table);
  }

  function ambil_datamahasiswa($mahasiswa){
    return $this ->db->get($mahasiswa);
  }

  function cari($berdasarkan,$yangdicari){
    $this->db->from("mahasiswa");

    switch($berdasarkan){
      case "":
        $this->db->like('Nama',$yangdicari);
        $this->db->or_like('NIM',$yangdicari);
        $this->db->or_like('TanggalLahir',$yangdicari);
        $this->db->or_like('Email',$yangdicari);
        $this->db->or_like('Status',$yangdicari);
         break;
      
      default:
       $this->db->like($berdasarkan,$yangdicari);   

    }
    return $this->db->get();
  }
     
}
?>