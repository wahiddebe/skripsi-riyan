<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  //functions
  public function insert($data)
  {
    if($this->db->insert("mahasiswa",$data))
    {
      return true;
    }
  }

  public function update($id,$data)
  {
    $this->db->where('NIM',$id);
    $this->db->update('mahasiswa',$data);
  }

  public function getDataByID($id)
  {
    $query = $this->db->get_where("mahasiswa",array("NIM"=>$id));
    return $query->first_row();
  }
  

  public function getAllData()
   {
     $this->db->order_by("NIM","desc");
     $query = $this->db->get('mahasiswa');
     return $query->result();
   }

   function select()
 {
  $this->db->order_by('NIM', 'DESC');
  $query = $this->db->get('mahasiswa');
  return $query->result();
 }

 function import($data)
 {
  $this->db->insert_batch('mahasiswa', $data);
 }

 function data($number,$offset){
  return $query = $this->db->get('mahasiswa',$number,$offset)->result();		
}

function jumlah_data(){
  return $this->db->get('mahasiswa')->num_rows();
}

}
?>