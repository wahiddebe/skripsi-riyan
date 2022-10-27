<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BerkasKP extends CI_Model
{
    function __construct()
    {
      parent::__construct();
    }

    public function getAllData()
    {
      $this->db->order_by("Judul","asc");
      $query = $this->db->get('berkaskp');
      return $query->result();
    }

    public function getDataByID($id)
    {
      $query = $this->db->get_where("berkaskp",array("IdBerkas"=>$id));
      return $query->first_row();
    }

    public function update($id,$data)
    {
      $this->db->where('IdBerkas',$id);
      $this->db->update('berkaskp',$data);
    }

    public function insert($data)
    {
      if($this->db->insert("berkaskp",$data))
      {
        return true;
      }
    }

    public function delete($id)
    {
      $this->db->where('IdBerkas',$id);
      $this->db->delete('berkaskp');
    }
    function ambil_data($table){
      return $this ->db->get($table);
    }
  
    function cari($berdasarkan,$yangdicari){
      $this->db->from("berkaskp");
  
      switch($berdasarkan){
        case "":
          $this->db->or_like('Judul',$yangdicari);
          $this->db->or_like('TanggalPembuatan',$yangdicari);
          $this->db->or_like('File',$yangdicari);
           break;
        
        default:
         $this->db->like($berdasarkan,$yangdicari);   
  
      }
      return $this->db->get();
    }
}

?>