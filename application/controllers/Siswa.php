<?php

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa');
        $this->load->library('form_validation');
        date_default_timezone_set("Asia/Jakarta");
        is_logged_in_siswa();
    }

    public function index()
    {
        $data['judul'] = 'E-Sakola Siswa';
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarSiswaAwal');
        $this->load->view('siswa/v_mulaiSiswa', $data);
        $this->load->view('templates/footer');
    }

    public function presensi($id_kelas, $id, $pertemuan, $id_file)
    {
        $data['judul'] = 'Presensi';
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_siswa->getMapelById($id);
        $data['id_mapel'] = null;
        if ($query) {
            $data['id_mapel'] = $query;
        }
        $data['id'] = $id;
        $data['pertemuan'] = $pertemuan;
        $data['id_file'] = $id_file;
        $data['id_kelas'] = $id_kelas;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarSiswaMB');
        $this->load->view('siswa/v_presensi', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['presensi'])) {
            $data = [
                "id_file" => $this->input->post('id_file'),
                "id_siswa" => $this->input->post('id_siswa'),
                "id_mapel" => $this->input->post('id_mapel'),
                "tanggal" => date(DATE_RFC1123, time()),
                "pertemuan" => $this->input->post('pertemuan')
            ];
            $this->db->insert('presensi', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil presensi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // var_dump($data);
            // die;
        }
    }

    public function login()
    {
        $data['judul'] = 'E-Sakola Siswa Login';
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/v_loginSiswa');
        $this->load->view('templates/footer');
    }

    public function kelas($id)
    {
        $data['judul'] = 'E-Sakola Kelas';
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_siswa->getKelas($id);
        $data['kelas'] = null;
        if ($query) {
            $data['kelas'] = $query;
        }
        $query = $this->M_siswa->getMapel($id);
        $data['guru'] = null;
        if ($query) {
            $data['guru'] = $query;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarSiswaMB');
        $this->load->view('siswa/v_kelasSiswa', $data);
        $this->load->view('templates/footer');
    }

    public function mapel($id_kelas, $id)
    {
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
        $data['judul'] = 'Mata Pelajaran';
        $data['id_kelas'] = $id_kelas;

        $query = $this->M_siswa->getMateri($id);
        $data['materi'] = null;
        if ($query) {
            $data['materi'] = $query;
        }

        $query = $this->M_siswa->getMapelById($id);
        $data['id_mapel'] = null;
        if ($query) {
            $data['id_mapel'] = $query;
        }

        $query = $this->M_siswa->getMateriBtn($id);
        $data['materi_btn'] = null;
        if ($query) {
            $data['materi_btn'] = $query;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarSiswaMB');
        $this->load->view('siswa/v_mapelSiswa', $data);
        $this->load->view('templates/footer');
    }

    public function tugas($id_kelas, $id_mapel, $pertemuan, $id_file, $id_siswa)
    {
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
        $data['judul'] = 'Tugas';
        $query = $this->M_siswa->getMapelById($id_mapel);
        $data['id'] = null;
        if ($query) {
            $data['id'] = $query;
        }
        $query = $this->M_siswa->getTugas($id_mapel, $id_file);
        $data['tugas'] = null;
        if ($query) {
            $data['tugas'] = $query;
        }
        $query = $this->M_siswa->getFileSubmit($id_file, $id_siswa);
        $data['file_submit'] = null;
        if ($query) {
            $data['file_submit'] = $query;
        }
        $query = $this->M_siswa->getFileSubmitId($id_siswa, $pertemuan);
        $data['file_submit_id'] = null;
        if ($query) {
            $data['file_submit_id'] = $query;
        }

        $data['pertemuan'] = $pertemuan;
        $data['id_kelas'] = $id_kelas;
        $data['id_mapel'] = $id_mapel;
        //POST
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarSiswaMB');
        $this->load->view('siswa/v_tugas');
        $this->load->view('templates/footer');

        if (isset($_POST['tambah'])) {
            $upload_file = $_FILES['file_submit']['name'];

            if ($upload_file) {
                $config['upload_path'] = './assets/file/submit/';
                $config['allowed_types'] = 'doc|docx|pdf|ppt|pptx';
                $config['max_size']     = '10000';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_submit')) {
                    $old_file = $this->input->post('old_name');
                    if ($old_file != null) {
                        unlink(FCPATH . 'assets/file/submit/' . $old_file);
                    }

                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_submit', $new_file);

                    $data = [
                        "file_submit" => $this->upload->data('file_name'),
                        "tgl_submit" => null,
                        "status" => 0

                    ];
                    $this->db->where('id_siswa', $this->input->post('id_siswa'));
                    $this->db->where('id_tugas', $this->input->post('id_tugas'));
                    $this->db->update('file_submit', $data);

                    header("Refresh:0");
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil mengunggah file tugas<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
                    // var_dump($this->input->post('id_siswa'));
                    // var_dump($this->input->post('id_tugas'));
                    // var_dump($data);
                    // die;
                }
            }
        }

        if (isset($_POST['edit'])) {
            $upload_file = $_FILES['file_submit']['name'];

            if ($upload_file) {
                $config['upload_path'] = './assets/file/submit/';
                $config['allowed_types'] = 'doc|docx|pdf|ppt|pptx';
                $config['max_size']     = '10000';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_submit')) {
                    $old_file = $this->input->post('old_name');
                    if ($old_file != null) {
                        unlink(FCPATH . 'assets/file/submit/' . $old_file);
                    }

                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_submit', $new_file);

                    $data = [
                        "file_submit" => $this->upload->data('file_name'),
                        "tgl_submit" => null,
                        "status" => 0

                    ];
                    $this->db->where('id_submit', $this->input->post('id_submit'));
                    $this->db->update('file_submit', $data);

                    header("Refresh:0");
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil mengedit file tugas<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
                    // var_dump($data);
                    // die;
                }
            }
        }


        if (isset($_POST['submit'])) {
            $data = [
                "tgl_submit" => date(DATE_RFC1123, time()),
                "status" => 1
            ];
            $this->db->where('id_submit', $this->input->post('id_submit'));
            $this->db->update('file_submit', $data);

            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil submit file tugas<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            // var_dump($data);
            // die;
        }

        if (isset($_POST['hapus'])) {
            $old_file = $this->input->post('old_name');
            if ($old_file != null) {
                unlink(FCPATH . 'assets/file/submit/' . $old_file);
            }
            $data = [
                "file_submit" => null,
                "tgl_submit" => null,
                "nilai" => null,
                "status" => 0
            ];
            $this->db->where('id_submit', $this->input->post('id_submit'));
            $this->db->update('file_submit', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menghapus file unggahan<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            //var_dump($data);
            // die;
        }
    }

    public function nilai($id_kelas, $id_siswa)
    {
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row_array();
        // $data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
        $data['judul'] = 'Nilai';
        $query = $this->M_siswa->getNilaiSiswa($id_kelas, $id_siswa);
        $data['nilai'] = null;
        if ($query) {
            $data['nilai'] = $query;
        }
        $query = $this->M_siswa->getGuruNilai($id_kelas);
        $data['guru'] = null;
        if ($query) {
            $data['guru'] = $query;
        }
        $data['id_kelas'] = $id_kelas;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarSiswaNB');
        $this->load->view('siswa/v_nilaiSiswa');
        $this->load->view('templates/footer');
    }
}
