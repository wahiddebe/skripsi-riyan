<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TugasAkhir extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  //functions
  public function insert($data)
  {
    if ($this->db->insert("tugasakhir", $data)) {
      return true;
    }
  }

  public function delete($id)
  {
    $this->db->where('IdTA', $id);
    $this->db->delete('tugasakhir');
  }

  public function getDataByNIM($NIM)
  {
    $this->db->order_by("TanggalDaftar", "desc");
    $query = $this->db->get_where("tugasakhir", array("NIM" => $NIM));
    return $query->first_row();
  }

  public function getDataByID($ID)
  {
    $this->db->order_by("TanggalDaftar", "desc");
    $query = $this->db->get_where("tugasakhir", array("IdTA" => $ID));
    return $query->first_row();
  }

  public function getDataByDosen($ID)
  {
    $this->db->select('*');
    $this->db->from('tugasakhir');
    $this->db->where('Pembimbing1', $ID);
    $this->db->or_where('Pembimbing2', $ID);
    $this->db->order_by('NIM', 'desc');

    $query = $this->db->get();
    return $query->result();
  }

  public function getDataByDosenDetail($ID)
  {
    $this->db->select('*');
    $this->db->from('tugasakhir');
    $this->db->where('Pembimbing1', $ID);
    $this->db->or_where('Pembimbing2', $ID);
    $this->db->or_where('DosenUsul1', $ID);
    $this->db->or_where('DosenUsul2', $ID);
    $this->db->order_by('NIM', 'desc');

    $query = $this->db->get();
    return $query->result();
  }

  public function update($id, $data)
  {
    $this->db->where('IdTA', $id);
    $this->db->update('tugasakhir', $data);
  }

  public function getAllNonApproved()
  {
    $this->db->order_by("TanggalDaftar", "desc");
    $query = $this->db->get_where("tugasakhir", array("Status" => ''));
    return $query->result();
  }

  public function getAllApproved()
  {
    $this->db->order_by("TanggalDaftar", "desc");
    $query = $this->db->get_where("tugasakhir", array("Status" => 'setuju'));
    return $query->result();
  }
}
