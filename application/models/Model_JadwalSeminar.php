<?php 

class Model_JadwalSeminar extends CI_Model
{
  function ambil_data($table){
    return $this ->db->get($table);
  }

  function cari($berdasarkan,$yangdicari){
    $this->db->from("seminar");

    switch($berdasarkan){
      case "":
        $this->db->or_like('NIM',$yangdicari);
        $this->db->or_like('Nama',$yangdicari);
        $this->db->or_like('Judul',$yangdicari);
        $this->db->or_like('TanggalSeminar',$yangdicari);
        $this->db->or_like('Jam',$yangdicari);
        $this->db->or_like('Lokasi',$yangdicari);
         break;
      
      default:
       $this->db->like($berdasarkan,$yangdicari);   

    }
    return $this->db->get();
  }
     
}
?>