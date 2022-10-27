<?php

class Model_PerusahaanMagang extends CI_Model
{
  function ambil_data($table)
  {
    return $this->db->get($table);
  }

  function cari($berdasarkan, $yangdicari)
  {
    $this->db->from("suratmagang");

    switch ($berdasarkan) {
      case "":
        $this->db->or_like('NIM', $yangdicari);
        $this->db->or_like('Perusahaan_1', $yangdicari);
        $this->db->or_like('Bidang_Perusahaan1', $yangdicari);
        $this->db->or_like('Perusahaan_2', $yangdicari);
        $this->db->or_like('Bidang_Perusahaan2', $yangdicari);
        $this->db->or_like('Perusahaan_3', $yangdicari);
        $this->db->or_like('Bidang_Perusahaan3', $yangdicari);
        $this->db->or_like('Perusahaan_4', $yangdicari);
        $this->db->or_like('Bidang_Perusahaan4', $yangdicari);
        $this->db->or_like('Perusahaan_5', $yangdicari);
        $this->db->or_like('Bidang_Perusahaan5', $yangdicari);
        break;

      default:
        $this->db->like($berdasarkan, $yangdicari);
    }
    return $this->db->get();
  }
}
