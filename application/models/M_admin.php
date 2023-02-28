<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class M_admin extends CI_model
{
    public function getKelas()
    {
        $this->db->select("*");
        $this->db->from('kelas');
        return $this->db->get()->result_array();
    }
    public function getKelasById($id_kelas)
    {
        $this->db->select("*");
        $this->db->from('kelas');
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->get()->result_array();
    }
    public function getGuru()
    {
        $this->db->select("*");
        $this->db->from('guru');
        return $this->db->get()->result_array();
    }
    public function getGurubyId($id_guru)
    {
        $this->db->select("*");
        $this->db->from('guru');
        $this->db->where('id_guru', $id_guru);
        return $this->db->get()->result_array();
    }
    public function getMapel()
    {
        $this->db->select("*");
        $this->db->from('mapel');
        return $this->db->get()->result_array();
    }
    public function getSiswa()
    {
        $this->db->select("*");
        $this->db->from('siswa s, kelas k');
        $this->db->where('s.id_kelas=k.id_kelas');
        $this->db->order_by('s.id_kelas');
        return $this->db->get()->result_array();
    }

    public function getSiswaEdit($id_siswa)
    {
        $this->db->select("*");
        $this->db->from('siswa s, kelas k');
        $this->db->where('s.id_kelas=k.id_kelas');
        $this->db->where('s.id_siswa', $id_siswa);
        return $this->db->get()->result_array();
    }
    public function getGuruEdit($id_guru)
    {
        $this->db->select("*");
        $this->db->from('guru g, kelas k, mapel m, mapel_kelas mk');
        $this->db->where('k.id_kelas=mk.id_kelas AND g.id_guru=mk.id_guru AND mk.id_mapel=m.id_mapel');
        $this->db->where('g.id_guru', $id_guru);
        return $this->db->get()->result_array();
    }
    public function getMapelNilai($id)
    {
        $hasil = $this->db->query("SELECT * FROM mapel WHERE id_kelas='$id'");
        return $hasil->result();
    }
    public function tambahSiswa()
    {
        $data = [
            "id_siswa" => $this->input->post('id_siswa', true),
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "password" => $this->input->post('password1', true),
            "id_kelas" => $this->input->post('id_kelas', true)
        ];
        $this->db->insert('siswa', $data);
    }

    public function editSiswa($id_siswa)
    {
        $data = [
            "id_siswa" => $this->input->post('id_siswa', true),
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "id_kelas" => $this->input->post('id_kelas', true)
        ];
        $this->db->where('id_siswa', $id_siswa);
        $this->db->update('siswa', $data);
    }

    public function tambahGuru()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "password" => $this->input->post('password1', true),
            "nrp" => $this->input->post('nrp', true)
        ];
        $this->db->insert('guru', $data);
    }
    public function editGuru($id_guru)
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "nrp" => $this->input->post('nrp', true)
        ];
        $this->db->where('id_guru', $id_guru);
        $this->db->update('guru', $data);
    }
    public function tambahKelas()
    {
        $data = [
            "nama_kelas" => $this->input->post('nama_kelas', true),
            "id_guru" => $this->input->post('id_guru', true)
        ];
        $this->db->insert('kelas', $data);
    }
    public function editKelas($id_kelas)
    {
        $data = [
            "nama_kelas" => $this->input->post('nama_kelas', true),
            "id_guru" => $this->input->post('id_guru', true)
        ];
        $this->db->where('id_kelas', $id_kelas);
        $this->db->update('kelas', $data);
    }
    public function tambahMapel()
    {
        $data = [
            "nama_mapel" => $this->input->post('nama_mapel', true)
        ];
        $this->db->insert('mapel', $data);
    }
    public function editMapel($id_mapel)
    {
        $data = [
            "nama_mapel" => $this->input->post('nama_mapel', true)
        ];
        $this->db->where('id_mapel', $id_mapel);
        $this->db->update('mapel', $data);
    }

    public function getMapelById($id_mapel)
    {
        $this->db->select("*");
        $this->db->from('mapel');
        $this->db->where('id_mapel', $id_mapel);
        return $this->db->get()->result_array();
    }

    public function getKelasNilai2($id_kelas)
    {
        $this->db->select("*");
        $this->db->from('kelas');
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->get()->result_array();
    }
    public function getMapelNilai2($id)
    {
        $hasil = $this->db->query("SELECT * FROM mapel m, mapel_kelas mk WHERE mk.id_mapel=m.id_mapel AND mk.id_kelas='$id'");
        return $hasil->result();
    }
    public function dummy()
    {
        $this->db->distinct("");
        $this->db->select("");
        $this->db->from('');
        $this->db->where('');
        return $this->db->get()->result_array();
    }
}
