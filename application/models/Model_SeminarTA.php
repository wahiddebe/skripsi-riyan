<?php 

class Model_SeminarTA extends CI_Model
{
  function ambil_data($table){
    return $this ->db->get($table);
  }

  function cari($berdasarkan,$yangdicari){
    $this->db->from("seminar");

    switch($berdasarkan){
      case "":
        $this->db->or_like('NIM',$yangdicari);
        $this->db->or_like('TanggalDaftar',$yangdicari);
        $this->db->or_like('TanggalSeminar',$yangdicari);
        $this->db->or_like('DosenPenguji1',$yangdicari);
        $this->db->or_like('DosenPenguji2',$yangdicari);
        $this->db->or_like('Lokasi',$yangdicari);
        $this->db->or_like('Jam',$yangdicari);
         break;
      
      default:
       $this->db->like($berdasarkan,$yangdicari);   

    }
    return $this->db->get();
  }
     
}
?>