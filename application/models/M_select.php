<?php
class M_select extends CI_Model
{

    function get_kategori()
    {
        $hasil = $this->db->query("SELECT * FROM kategori");
        return $hasil;
    }
    // function get_kelas($id)
    // {
    //     $hasil = $this->db->query("SELECT * FROM kelas WHERE id_guru='$id'");
    //     return $hasil;
    // }
    function get_kelasById($id)
    {
        $hasil = $this->db->query("SELECT DISTINCT m.id_kelas, k.nama_kelas, m.id_guru FROM kelas k, mapel m WHERE k.id_kelas=m.id_kelas AND m.id_guru='$id'");
        return $hasil;
    }

    function get_subkelas($id)
    {
        $hasil = $this->db->query("SELECT * FROM mapel WHERE id_kelas='$id'");
        return $hasil->result();
    }
    function get_subkategori($id)
    {
        $hasil = $this->db->query("SELECT * FROM subkategori WHERE subkategori_kategori_id='$id'");
        return $hasil->result();
    }
}
