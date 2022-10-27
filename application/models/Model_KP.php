<?php 

class Model_KP extends CI_Model
{
  function ambil_data($table){
    return $this ->db->get($table);
  }

  function cari($berdasarkan,$yangdicari){
    $this->db->from("kp");

    switch($berdasarkan){
      case "":
        $this->db->or_like('NIM',$yangdicari);
        $this->db->or_like('Kajian_KP',$yangdicari);
        $this->db->or_like('Nama_Perusahaan',$yangdicari);
        $this->db->or_like('Tanggal_KP',$yangdicari);
        $this->db->or_like('DosenPembimbing',$yangdicari);
         break;
      
      default:
       $this->db->like($berdasarkan,$yangdicari);   

    }
    return $this->db->get();
  }
     
}
?>