<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SeminarKP extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function insert($data)
  {
    if ($this->db->insert("seminarKP", $data)) {
      return true;
    }
  }

  public function delete($id)
  {
    $this->db->where('IdSeminarKP', $id);
    $this->db->delete('seminarKP');
  }

  public function update($id, $data)
  {
    $this->db->where('IdSeminarKP', $id);
    $this->db->update('seminarKP', $data);
  }

  public function getDataByNIM($NIM)
  {
    $query = $this->db->get_where("seminarKP", array("NIM" => $NIM));
    return $query->first_row();
  }

  public function getDataByDosen($ID)
  {
    $this->db->select('*');
    $this->db->from('seminarKP');
    $this->db->where('TanggalSeminarKP >=', date("d/m/Y"));
    $where = "(DosenPengunji1=" . $ID . " OR DosenPenguji2=" . $ID . ")";
    $this->db->order_by('TanggalSeminarKP', 'asc');

    $query = $this->db->get();
    return $query->result();
  }

  public function getDataByTAandNIM($IdKP, $NIM)
  {
    $query = $this->db->get_where("seminarKP", array("NIM" => $NIM, "IdKP" => $IdKP));
    return $query->first_row();
  }

  public function getAllDataNonApprove()
  {
    $this->db->order_by("TanggalDaftar", "desc");
    $query = $this->db->get_where("seminarKP", array('TanggalSeminarKP' => ''));
    return $query->result();
  }

  public function getDataByID($ID)
  {
    $query = $this->db->get_where("seminarKP", array("IdSeminarKP" => $ID));
    return $query->first_row();
  }
  public function getAllApproved()
  {
    $this->db->order_by("TanggalDaftar", "desc");
    $query = $this->db->get_where("seminarKP", array("TanggalSeminarKP <>" => ''));
    return $query->result();
  }
}
