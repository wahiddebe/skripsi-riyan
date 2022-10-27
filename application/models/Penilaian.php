<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Penilaian extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function insert($data)
  {
    if ($this->db->insert("penilaian", $data)) {
      return true;
    }
  }

  public function delete($id)
  {
    $this->db->where('IdPenilaian', $id);
    $this->db->delete('penilaian');
  }

  public function update($id, $data)
  {
    $this->db->where('IdPenilaian', $id);
    $this->db->update('penilaian', $data);
  }

  public function getDataByNIM($NIM)
  {
    $query = $this->db->get_where("seminar", array("NIM" => $NIM));
    return $query->first_row();
  }

  public function getDataByDosen($ID)
  {
    $this->db->select('*');
    $this->db->from('penilaian');
    $this->db->where('TanggalSeminar >=', date("d/m/Y"));
    $where = "(DosenPengunji1=" . $ID . " OR DosenPenguji2=" . $ID . ")";
    $this->db->order_by('TanggalSeminar', 'asc');

    $query = $this->db->get();
    return $query->result();
  }

  public function getDataBySidang($IdSidang)
  {
    $query = $this->db->get_where("penilaian", array("IdSidang" => $IdSidang));
    return $query->first_row();
  }

  public function getDataByID($ID)
  {
    $query = $this->db->get_where("penilaian", array("IdPenilaian" => $ID));
    return $query->first_row();
  }
}
