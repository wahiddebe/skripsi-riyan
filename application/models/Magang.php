<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Magang extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  //functions
  public function insert($data)
  {
    if ($this->db->insert("magang", $data)) {
      return true;
    }
  }

  public function delete($id)
  {
    $this->db->where('IdMagang', $id);
    $this->db->delete('magang');
  }

  public function getDataByNIM($NIM)
  {
    $this->db->select('*');
    $this->db->from('magang');
    $this->db->where('NIM', $NIM);
    $this->db->order_by("Tanggal_Magang", "desc");
    $query = $this->db->get();
    return $query->first_row();
  }

  public function getDataByID($ID)
  {
    $query = $this->db->get_where("magang", array("IdMagang" => $ID));
    return $query->first_row();
  }

  public function getDataByDosen($ID)
  {
    $query = $this->db->get_where("magang", array("DosenPembimbing" => $ID));
    return $query->result();
  }

  public function update($id, $data)
  {
    $this->db->where('IdMagang', $id);
    $this->db->update('magang', $data);
  }

  public function getAllNonApproved()
  {
    $this->db->order_by("Tanggal_Magang", "desc");
    $query = $this->db->get_where("magang", array("Status" => ''));
    return $query->result();
  }

  public function getAllApproved()
  {
    $this->db->order_by("Tanggal_Magang", "desc");
    $query = $this->db->get_where("magang", array("Status" => 'setuju'));
    return $query->result();
  }
}
