<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SuratKP extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

   //functions
   public function insert($data)
   {
     if($this->db->insert("suratkp",$data))
     {
       return true;
     }
   }

   public function delete($id)
   {
     $this->db->where('IdKP',$id);
     $this->db->delete('suratkp');
   }

   public function getDataByNIM($NIM)
   {
     $query = $this->db->get_where("suratkp",array("NIM" => $NIM));
     return $query->first_row();
   }

   public function getDataByID($ID)
   {
     $query = $this->db->get_where("suratkp",array("IdKP" => $ID));
     return $query->first_row();
   }

   public function update($id,$data)
   {
     $this->db->where('IdKP',$id);
     $this->db->update('suratkp',$data);
   }

   public function getAllNonApproved()
   {
     $this->db->order_by("NIM","desc");
     $query = $this->db->get_where("suratkp",array("NIM" => ''));
     return $query->result();
   }

   public function getAllApproved()
   {
     $this->db->order_by("NIM","desc");
     $query = $this->db->get_where("suratkp",array("NIM <>" => ''));
     return $query->result();
   }
  
   public function getAllData()
   {
     $this->db->order_by("NIM","asc");
     $query = $this->db->get('suratkp');
     return $query->result();
   }
}

?>