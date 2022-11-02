<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Seminar extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function insert($data)
  {
    if ($this->db->insert("seminar", $data)) {
      return true;
    }
  }

  public function delete($id)
  {
    $this->db->where('IdSeminar', $id);
    $this->db->delete('seminar');
  }

  public function update($id, $data)
  {
    $this->db->where('IdSeminar', $id);
    $this->db->update('seminar', $data);
  }

  public function getDataByNIM($NIM)
  {
    $query = $this->db->get_where("seminar", array("NIM" => $NIM));
    return $query->first_row();
  }

  public function getDataByDosen($ID)
  {
    $this->db->select('*');
    $this->db->from('seminar');
    // $this->db->where('TanggalSeminar >=', date("d/m/Y"));
    // $where = "(DosenPengunji1=" . $ID . " OR DosenPenguji2=" . $ID . ")";
    $this->db->where('TanggalSeminar !=', "");
    $where = "(DosenPenguji1='" . $ID . "' OR DosenPenguji2='" . $ID . "')";
    $this->db->where($where);
    $this->db->order_by('TanggalSeminar', 'asc');

    $query = $this->db->get();
    return $query->result();
  }

  public function getDataByTAandNIM($IdTA, $NIM)
  {
    $query = $this->db->get_where("seminar", array("NIM" => $NIM, "IdTA" => $IdTA));
    return $query->first_row();
  }

  public function getAllDataNonApprove()
  {
    $this->db->order_by("TanggalDaftar", "desc");
    $query = $this->db->get_where("seminar", array("DosenPenguji1" => ''));
    return $query->result();
  }

  public function getDataByID($ID)
  {
    $query = $this->db->get_where("seminar", array("IdSeminar" => $ID));
    return $query->first_row();
  }
  public function getAllApproved()
  {
    $this->db->order_by("TanggalDaftar", "desc");
    $query = $this->db->get_where("seminar", array("DosenPenguji1 <>" => ''));
    return $query->result();
  }

  public function getTASeminar($id)
  {
    $this->db->select('*');
    $this->db->from('seminar');
    $this->db->join('tugasakhir', 'tugasakhir.idTA = seminar.idTA');
    $this->db->where('seminar.TanggalSeminar !=', "");
    $where = "(tugasakhir.Pembimbing1='" . $id . "' OR tugasakhir.Pembimbing2='" . $id . "' OR seminar.DosenPenguji1='" . $id . "' OR seminar.DosenPenguji2='" . $id . "')";
    $this->db->where($where);
    $this->db->order_by('seminar.TanggalSeminar', 'asc');
    $query = $this->db->get();
    return $query->result();
  }
}
