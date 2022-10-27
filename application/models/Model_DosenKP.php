<?php 

class Model_DosenKP extends CI_Model
{
  function ambil_data($table){
    return $this ->db->get($table);
  }

  function cari($berdasarkan,$yangdicari){
    $this->db->from("dosen");

    switch($berdasarkan){
      case "":
        $this->db->or_like('KodeDosen',$yangdicari);
        $this->db->or_like('Nama',$yangdicari);
        $this->db->or_like('BebanKP',$yangdicari);
         break;
      
      default:
       $this->db->like($berdasarkan,$yangdicari);   

    }
    return $this->db->get();
  }
     
}
?>