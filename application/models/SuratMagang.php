<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SuratMagang extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  //functions
  public function insert($data)
  {
    if ($this->db->insert("suratmagang", $data)) {
      return true;
    }
  }

  public function delete($id)
  {
    $this->db->where('IdMagang', $id);
    $this->db->delete('suratmagang');
  }

  public function getDataByNIM($NIM)
  {
    $query = $this->db->get_where("suratmagang", array("NIM" => $NIM));
    return $query->first_row();
  }

  public function getDataByID($ID)
  {
    $query = $this->db->get_where("suratmagang", array("IdMagang" => $ID));
    return $query->first_row();
  }

  public function update($id, $data)
  {
    $this->db->where('IdMagang', $id);
    $this->db->update('suratmagang', $data);
  }

  public function getAllNonApproved()
  {
    $this->db->order_by("NIM", "desc");
    $query = $this->db->get_where("suratmagang", array("NIM" => ''));
    return $query->result();
  }

  public function getAllApproved()
  {
    $this->db->order_by("NIM", "desc");
    $query = $this->db->get_where("suratmagang", array("NIM <>" => ''));
    return $query->result();
  }

  public function getAllData()
  {
    $this->db->order_by("NIM", "asc");
    $query = $this->db->get('suratmagang');
    return $query->result();
  }
}
