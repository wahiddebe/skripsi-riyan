<?php 

class Model_TA extends CI_Model
{
  function ambil_data($table){
    return $this ->db->get($table);
  }

  function cari($berdasarkan,$yangdicari){
    $this->db->from("tugasakhir");

    switch($berdasarkan){
      case "":
        $this->db->or_like('NIM',$yangdicari);
        $this->db->or_like('TanggalDaftar',$yangdicari);
        $this->db->or_like('Tema',$yangdicari);
        $this->db->or_like('Judul',$yangdicari);
        $this->db->or_like('Pembimbing1',$yangdicari);
        $this->db->or_like('Pembimbing2',$yangdicari);
         break;
      
      default:
       $this->db->like($berdasarkan,$yangdicari);   

    }
    return $this->db->get();
  }
     
}
?>