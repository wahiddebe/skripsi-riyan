<?php 

class Model_seminar extends CI_Model
{
  function ambil_data($table){
    return $this ->db->get($table);
  }

  function cari($berdasarkan,$yangdicari){
    $this->db->from("seminar");

    switch($berdasarkan){
      case "":
        $this->db->or_like('KodeDosen',$yangdicari);
        $this->db->or_like('Nama',$yangdicari);
        $this->db->or_like('Beban',$yangdicari);
        $this->db->or_like('Beban2',$yangdicari);
         break;
      
      default:
       $this->db->like($berdasarkan,$yangdicari);   

    }
    return $this->db->get();
  }
     
}
?>