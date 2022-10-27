<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BerkasTA extends CI_Model
{
    function __construct()
    {
      parent::__construct();
    }

    public function getAllData()
    {
      $this->db->order_by("Judul","asc");
      $query = $this->db->get('berkasta');
      return $query->result();
    }

    public function getDataByID($id)
    {
      $query = $this->db->get_where("berkasta",array("IdBerkas"=>$id));
      return $query->first_row();
    }

    public function update($id,$data)
    {
      $this->db->where('IdBerkas',$id);
      $this->db->update('berkasta',$data);
    }

    public function insert($data)
    {
      if($this->db->insert("berkasta",$data))
      {
        return true;
      }
    }

    public function delete($id)
    {
      $this->db->where('IdBerkas',$id);
      $this->db->delete('berkasta');
    }
    function ambil_data($table){
      return $this ->db->get($table);
    }
  
    function cari($berdasarkan,$yangdicari){
      $this->db->from("berkasta");
  
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