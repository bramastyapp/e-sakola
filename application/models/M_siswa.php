<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class M_siswa extends CI_model
{

    public function getKelas($id)
    {
        $this->db->select("k.*, g.*");
        $this->db->from('kelas k, guru g');
        $this->db->where('k.id_guru=g.id_guru');
        return $this->db->get_where('kelas', ['k.id_kelas' => $id])->row_array();
    }

    public function getMapel($id)
    {
        $this->db->select("*");
        $this->db->from('mapel m, guru g, mapel_kelas mk');
        $this->db->where('mk.id_guru=g.id_guru AND mk.id_mapel=m.id_mapel');
        $this->db->where('mk.id_kelas', $id);
        return $this->db->get()->result_array();
    }

    public function getGuruNilai($id_kelas)
    {
        $this->db->select("*");
        $this->db->from('mapel m, guru g, mapel_kelas mk');
        $this->db->where('mk.id_guru=g.id_guru AND mk.id_mapel=m.id_mapel');
        $this->db->where('mk.id_kelas', $id_kelas);
        return $this->db->get()->result_array();
    }

    public function getNilaiSiswa($id_kelas, $id_siswa)
    {
        $this->db->distinct("nama_mapel");
        $this->db->select("*, g.nama as namaguru");
        $this->db->from('mapel_kelas mk, mapel m, kelas k, siswa s, guru g');
        $this->db->where('mk.id_kelas=k.id_kelas AND s.id_kelas=k.id_kelas AND mk.id_guru=g.id_guru AND m.id_mapel=mk.id_mapel');
        $this->db->where('k.id_kelas', $id_kelas);
        $this->db->where('s.id_siswa', $id_siswa);
        return $this->db->get()->result_array();
    }

    public function getMapelById($id)
    {
        $this->db->select("*");
        $this->db->from('mapel m, guru g, mapel_kelas mk');
        $this->db->where('mk.id_guru=g.id_guru AND mk.id_mapel=m.id_mapel');
        return $this->db->get_where('mapel_kelas', ['mk.id_mapel' => $id])->row_array();
    }

    public function getGuru()
    {
        $query = $this->db->get('guru');
        return $query->result_array();
    }

    public function getMateri($id)
    {
        $this->db->select("m.*, k.*");
        $this->db->from('materi m, mapel k');
        $this->db->WHERE('m.id_mapel=k.id_mapel');
        $this->db->WHERE('m.id_mapel', $id);
        return $this->db->get()->result_array();
    }

    public function getTugas($id_mapel, $id_file)
    {
        $this->db->select("m.*, t.*");
        $this->db->from('materi m, tugas t');
        $this->db->WHERE('m.id_file=t.id_file');
        $this->db->where('m.id_file', $id_file);
        $this->db->where('m.id_mapel', $id_mapel);;
        return $this->db->get()->result_array();
    }

    public function getFileSubmit($id_file, $id_siswa)
    {
        $this->db->select("t.*, fs.*");
        $this->db->from('tugas t, file_submit fs');
        $this->db->WHERE('t.id_tugas=fs.id_tugas');
        $this->db->where('t.id_file', $id_file);
        $this->db->where('fs.id_siswa', $id_siswa);
        return $this->db->get()->result_array();
    }

    public function getFileSubmitId($id_siswa, $pertemuan)
    {
        $this->db->select("*");
        $this->db->from('file_submit');
        $this->db->where('id_siswa', $id_siswa);
        $this->db->where('pertemuan', $pertemuan);
        return $this->db->get()->result_array();
    }

    public function getMateriBtn($id)
    {
        $this->db->select("*");
        $this->db->from('materi');
        $this->db->WHERE('id_mapel', $id);
        // $this->db->WHERE('id_tugas', $pertemuan);
        return $this->db->get()->result_array();
    }

    public function cekPresensiStatus($id, $pertemuan)
    {
        $this->db->select("status");
        $this->db->from('status_presensi');
        $this->db->where('id_mapel', $id);
        $this->db->where('pertemuan', $pertemuan);
        return $this->db->get()->result_array();
    }
}
