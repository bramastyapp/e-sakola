<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class M_guru extends CI_model
{

    public function getKelas($id)
    {
        $this->db->distinct("k.nama_kelas");
        $this->db->select("g.id_guru, mk.id_kelas, k.nama_kelas");
        $this->db->from('kelas k, guru g, mapel m, mapel_kelas mk');
        $this->db->where('k.id_kelas=mk.id_kelas AND mk.id_guru=g.id_guru AND mk.id_mapel=m.id_mapel');
        $this->db->where('mk.id_guru', $id);
        return $this->db->get()->result_array();
    }

    public function getKelasNilai2($id_kelas)
    {
        $this->db->select("*");
        $this->db->from('kelas');
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->get()->result_array();
    }

    function get_kelasById($id)
    {
        $hasil = $this->db->query("SELECT DISTINCT mk.id_kelas, k.nama_kelas, mk.id_guru FROM kelas k, mapel m, mapel_kelas mk WHERE k.id_kelas=mk.id_kelas AND mk.id_mapel=m.id_mapel AND mk.id_guru='$id'");
        return $hasil;
    }


    public function getMapelNilai($id, $id_guru)
    {
        $hasil = $this->db->query("SELECT * FROM mapel m, mapel_kelas mk WHERE mk.id_mapel=m.id_mapel AND mk.id_kelas='$id' AND mk.id_guru='$id_guru'");
        return $hasil->result();
    }
    public function getsubMapelNilai($id, $id_guru)
    {
        $hasil = $this->db->query("SELECT * FROM mapel WHERE id_mapel='$id' AND id_guru='$id_guru'");
        return $hasil->result();
    }
    public function getKelasNilai($id)
    {
        $hasil = $this->db->query("SELECT * FROM kelas WHERE id_kelas='$id'");
        return $hasil->result();
    }

    public function getDaftarSiswa($id_kelas, $id_mapel)
    {
        $hasil = $this->db->query("SELECT * FROM nilai n, siswa s WHERE n.id_siswa=s.id_siswa AND n.id_kelas='$id_kelas' AND n.id_mapel='$id_mapel'");
        return $hasil->result();
    }

    public function get_nilaiSiswa($id_kelas, $id_mapel)
    {
        $this->db->select("*");
        $this->db->from('nilai n, siswa s');
        $this->db->where('n.id_siswa=s.id_siswa');
        $this->db->where('n.id_kelas', $id_kelas);
        $this->db->where('n.id_mapel', $id_mapel);
        $this->db->order_by('n.id_siswa');
        return $this->db->get()->result_array();
    }

    public function get_nilaiTampilSiswa($id_kelas)
    {
        $this->db->select("*");
        $this->db->from('kelas k, siswa s');
        $this->db->where('k.id_kelas=s.id_kelas');
        $this->db->where('k.id_kelas', $id_kelas);
        // $this->db->where('n.id_mapel', $id_mapel);
        return $this->db->get()->result_array();
    }

    public function get_nilaiSiswabyKelas($id_kelas, $id_mapel)
    {
        $this->db->select("*");
        $this->db->from('nilai n, siswa s');
        $this->db->where('n.id_siswa=s.id_siswa');
        $this->db->where('n.id_kelas', $id_kelas);
        $this->db->where('n.id_mapel', $id_mapel);
    }

    public function getMapelByIdKelas($id_guru, $id_kelas)
    {
        $this->db->select("*");
        $this->db->from('mapel_kelas mk, mapel m');
        $this->db->where('mk.id_mapel=m.id_mapel');
        $this->db->where('mk.id_guru', $id_guru);
        $this->db->where('mk.id_kelas', $id_kelas);
        return $this->db->get()->result_array();
    }

    public function getMapelById($id_kelas, $id_mapel)
    {
        $this->db->select("*");
        $this->db->from('mapel_kelas mk, mapel m');
        $this->db->where('mk.id_mapel=m.id_mapel');
        $this->db->where('mk.id_kelas', $id_kelas);
        $this->db->where('mk.id_mapel', $id_mapel);
        return $this->db->get()->result_array();
    }

    public function getKelasById($id_kelas)
    {
        $this->db->select("*");
        $this->db->from('kelas');
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->get()->result_array();
    }

    public function getMateri($id_mapel)
    {
        $this->db->select("*");
        $this->db->from('materi');
        $this->db->where('id_mapel', $id_mapel);
        return $this->db->get()->result_array();
    }

    public function getTipeMateri()
    {
        $this->db->select("*");
        $this->db->from('tipe_materi');
        return $this->db->get()->result_array();
    }

    // "id_mapel" => $id_mapel //cara default atau cara memberikan value get utk image => 'default.jpg'
    public function tambahMateri()
    {
        $data = [
            "file" => $this->input->post('file')
        ];
        $this->db->insert('file_materi', $data);
    }
    public function getPresensi($id_mapel, $ptm)
    {
        $this->db->select("p.*, s.*");
        $this->db->from('presensi p, siswa s');
        $this->db->where('p.id_siswa=s.id_siswa');
        $this->db->where('p.id_mapel', $id_mapel);
        $this->db->where('p.pertemuan', $ptm);
        return $this->db->get()->result_array();
    }
    public function cekPresensiStatus($id_mapel, $ptm)
    {
        $this->db->select("*");
        $this->db->from('status_presensi');
        $this->db->where('id_mapel', $id_mapel);
        $this->db->where('pertemuan', $ptm);
        return $this->db->get()->result_array();
    }
    public function cekTugas($id_file)
    {
        $this->db->select("*");
        $this->db->from('tugas');
        $this->db->where('id_file', $id_file);
        return $this->db->get()->result_array();
    }

    public function getTugas($id_mapel, $id_file)
    {
        $this->db->select("m.*, t.*");
        $this->db->from('materi m, tugas t');
        $this->db->WHERE('m.id_file=t.id_file');
        $this->db->where('m.id_file', $id_file);
        $this->db->where('m.id_mapel', $id_mapel);
        return $this->db->get()->result_array();
    }
    public function getFileSubmit($id_file)
    {
        $this->db->select("t.*, fs.*");
        $this->db->from('tugas t, file_submit fs');
        $this->db->WHERE('t.id_tugas=fs.id_tugas');
        $this->db->where('t.id_file', $id_file);
        return $this->db->get()->result_array();
    }
    public function getFileSubmitHapus($id_file)
    {
        $this->db->select("t.*, fs.*");
        $this->db->from('tugas t, file_submit fs');
        $this->db->WHERE('t.id_tugas=fs.id_tugas');
        $this->db->where('t.id_file', $id_file);
        return $this->db->get()->result_array();
    }
    public function getFileTugasSiswa($id_file)
    {
        $this->db->select("s.*, fs.*, t.*");
        $this->db->from('siswa s, file_submit fs, tugas t');
        $this->db->WHERE('s.id_siswa=fs.id_siswa AND t.id_tugas=fs.id_tugas');
        $this->db->where('t.id_file', $id_file);
        $this->db->where('fs.status', 1);
        return $this->db->get()->result_array();
    }
    public function getSiswaByKelas($id_kelas)
    {
        $this->db->select('id_siswa, nama, id_kelas');
        $this->db->from('siswa');
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->get()->result_array();
    }
}
