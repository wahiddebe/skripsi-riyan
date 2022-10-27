<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  //functions
  public function insert($data)
  {
    if($this->db->insert("dosen",$data))
    {
      return true;
    }
  }

  public function getAllData()
  {
    $this->db->order_by("KodeDosen","asc");
    $query = $this->db->get("dosen");
    return $query->result();
  }

  public function delete($id)
  {
    $this->db->where('KodeDosen',$id);
    $this->db->delete('dosen');
  }

  public function update($id,$data)
  {
    $this->db->where('KodeDosen',$id);
    $this->db->update('dosen',$data);
  }

  public function getDataBy($id)
  {
    $query = $this->db->get_where("dosen",array("KodeDosen"=>$id));
    return $query->first_row();
  }

  public function get_all_dosen()
 	{
 	$query = $this->db->order_by('KodeDosen','DESC')->get('dosen');
 	return $query->result();
 	}
}

?>