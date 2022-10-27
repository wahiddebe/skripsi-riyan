<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KP extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

   //functions
   public function insert($data)
   {
     if($this->db->insert("kp",$data))
     {
       return true;
     }
   }

   public function delete($id)
   {
     $this->db->where('IdKP',$id);
     $this->db->delete('kp');
   }

   public function getDataByNIM($NIM)
   {
     $this->db->select('*');
     $this->db->from('kp');
     $this->db->where('NIM',$NIM);
     $this->db->order_by("Tanggal_KP","desc");
     $query = $this->db->get();
     return $query->first_row();
   }

   public function getDataByID($ID)
   {
     $query = $this->db->get_where("kp",array("IdKP" => $ID));
     return $query->first_row();
   }

   public function getDataByDosen($ID)
   {
    $query = $this->db->get_where("kp",array("DosenPembimbing" => $ID));
    return $query->result();
   }

   public function update($id,$data)
   {
     $this->db->where('IdKP',$id);
     $this->db->update('kp',$data);
   }

   public function getAllNonApproved()
   {
     $this->db->order_by("Tanggal_KP","desc");
     $query = $this->db->get_where("kp",array("Status" => ''));
     return $query->result();
   }

   public function getAllApproved()
   {
     $this->db->order_by("Tanggal_KP","desc");
     $query = $this->db->get_where("kp",array("Status" => 'setuju'));
     return $query->result();
   }

}

?>