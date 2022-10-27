<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InstruksiKerja extends CI_Model
{
    function __construct()
    {
      parent::__construct();
    }

    public function getAllData()
    {
      $this->db->order_by("Judul","asc");
      $query = $this->db->get('instruksikerja');
      return $query->result();
    }

    public function getDataByID($id)
    {
      $query = $this->db->get_where("instruksikerja",array("IdInstruksi"=>$id));
      return $query->first_row();
    }

    public function update($id,$data)
    {
      $this->db->where('IdInstruksi',$id);
      $this->db->update('instruksikerja',$data);
    }

    public function insert($data)
    {
      if($this->db->insert("instruksikerja",$data))
      {
        return true;
      }
    }

    public function delete($id)
    {
      $this->db->where('IdInstruksi',$id);
      $this->db->delete('instruksikerja');
    }
    
    function ambil_data($table){
      return $this ->db->get($table);
    }
  
    function cari($berdasarkan,$yangdicari){
      $this->db->from("instruksikerja");
  
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