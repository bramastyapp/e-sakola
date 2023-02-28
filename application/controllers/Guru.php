<?php

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_guru');
        $this->load->library('form_validation');
        is_logged_in_guru();
        header('Cache-Control: no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    public function index()
    {
        $data['judul'] = 'E-Sakola Guru';
        $data['guru'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarGuruAwal');
        $this->load->view('guru/v_mulaiGuru', $data);
        $this->load->view('templates/footer');
    }

    public function login()
    {
        $data['judul'] = 'E-Sakola Guru Login';
        $this->load->view('templates/header', $data);
        //$this->load->view('templates/navbarSiswa');
        $this->load->view('guru/v_loginGuru');
        $this->load->view('templates/footer');
    }

    public function kelas($id)
    {
        $data['judul'] = 'E-Sakola Kelas';
        $data['guru'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_guru->getKelas($id);
        $data['kelas'] = null;
        if ($query) {
            $data['kelas'] = $query;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarGuruMM');
        $this->load->view('guru/v_kelasGuru', $data);
        $this->load->view('templates/footer');
    }

    public function pilih_mapel($id_guru, $id_kelas)
    {
        $data['judul'] = 'E-Sakola Pilih Mata Pelajaran';
        $data['guru'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_guru->getMapelByIdKelas($id_guru, $id_kelas);
        $data['mapel'] = null;
        if ($query) {
            $data['mapel'] = $query;
        }
        $data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarGuruMM');
        $this->load->view('guru/v_pilihMapelGuru', $data);
        $this->load->view('templates/footer');
    }

    public function materi($id_kelas, $id_mapel)
    {
        $data['judul'] = 'E-Sakola Materi Pembelajaran';
        $data['guru'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
        $data['mapel'] = $this->db->get_where('mapel', ['id_mapel' => $id_mapel])->row_array();

        $query = $this->M_guru->getMateri($id_mapel);
        $data['materi'] = null;
        if ($query) {
            $data['materi'] = $query;
        }

        $data['file_materi'] = $this->db->get_where('file_materi')->result_array();
        $data['id_kelas'] = $id_kelas;
        $data['id_mapel'] = $id_mapel;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarGuruMM');
        $this->load->view('guru/v_materiGuru', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['tambah'])) {
            $data = [
                "id_mapel" => $this->input->post('id_mapel')
            ];
            $this->db->insert('materi', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menambah materi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // echo var_dump($data);
            // die;
        }
        if (isset($_POST['simpan'])) {
            $data = [
                "id_file" => $this->input->post('id_file'),
                "deskripsi" => $this->input->post('deskripsi')
            ];
            $this->db->where('id_file', $this->input->post('id_file'));
            $this->db->update('materi', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil memperbarui deskripsi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // echo var_dump($data);
            // die;
        }
        if (isset($_POST['hapus'])) {
            $old_file = $this->input->post('old_name');
            if ($old_file != null) {
                unlink(FCPATH . 'assets/file/materi/' . $old_file);
            }
            $data = [
                "id_file" => $this->input->post('id_file')
            ];
            $this->db->where('id_file', $this->input->post('id_file'));
            $this->db->delete('materi', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menghapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // echo var_dump($data);
            // die;
        }
    }

    public function uploadMateri($id_file, $id_kelas, $id_mapel)
    {
        $data['judul'] = 'E-Sakola Upload Materi';
        $data['guru'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
        $data['id_kelas'] = $id_kelas;
        $data['id_mapel'] = $id_mapel;

        $data['id_file'] = $id_file;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarGuruMM');
        $this->load->view('guru/v_uploadMateriGuru', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['kirim_file'])) {
            $upload_file = $_FILES['file']['name'];

            if ($upload_file) {
                $config['upload_path'] = './assets/file/materi/';
                $config['allowed_types'] = 'doc|docx|pdf|ppt|pptx|jpg|jpeg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    // $old_file = $data['user']['image'];
                    // if ($old_file != 'default.jpg') {
                    //     unlink(FCPATH . 'assets/img/' . $old_file);
                    // }

                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file', $new_file);

                    $data = [
                        "file" => $this->upload->data('file_name'),
                        "id_file" => $this->input->post('id_file'),
                        "tipe" => 1
                    ];

                    $this->db->insert('file_materi', $data);
                    // var_dump($data);
                    // die;
                } else {
                    echo $this->upload->display_errors();
                }
            }


            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menambah file materi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // var_dump($data);
            // die;
        }
        if (isset($_POST['kirim_link'])) {
            $data = [
                "id_file" => $this->input->post('id_file'),
                "link" => $this->input->post('link'),
                "tipe" => 2
            ];
            $this->db->insert('file_materi', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menambah materi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // var_dump($data);
            // die;
        }
    }

    public function editMateri($id, $id_kelas, $id_mapel)
    {
        $data['judul'] = 'E-Sakola Edit Materi';
        $data['guru'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();

        $data['file_materi'] = $this->db->get_where('file_materi', ['id' => $id])->result_array();

        $data['id'] = $id;
        $data['id_kelas'] = $id_kelas;
        $data['id_mapel'] = $id_mapel;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarGuruMM');
        $this->load->view('guru/v_editMateriGuru', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['edit_file'])) {
            $upload_file = $_FILES['file']['name'];

            if ($upload_file) {
                $config['upload_path'] = './assets/file/materi/';
                $config['allowed_types'] = 'doc|docx|pdf|ppt|pptx|jpg|jpeg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $old_file = $this->input->post('old_name');
                    if ($old_file != null) {
                        unlink(FCPATH . 'assets/file/materi/' . $old_file);
                    }

                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file', $new_file);

                    $data = [
                        "file" => $this->upload->data('file_name'),
                        "link" => null,
                        "tipe" => 1
                    ];
                    $this->db->where('id', $this->input->post('id'));
                    $this->db->update('file_materi', $data);

                    header("Refresh:0");
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil mengedit file materi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
                    // var_dump($data);
                    // die;
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }

        if (isset($_POST['edit_link'])) {
            $old_file = $this->input->post('old_name');
            if ($old_file != null) {
                unlink(FCPATH . 'assets/file/materi/' . $old_file);
            }

            $data = [
                "file" => null,
                "link" => $this->input->post('link'),
                "tipe" => 2
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('file_materi', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil mengedit materi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // var_dump($data);
            // die;
        }
        if (isset($_POST['hapus'])) {
            $old_file = $this->input->post('old_name');
            if ($old_file != null) {
                unlink(FCPATH . 'assets/file/materi/' . $old_file);
            }
            $data = [
                "id" => $this->input->post('id')
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->delete('file_materi', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menghapus materi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // var_dump($data);
            // die;
        }
    }

    public function presensi($id_kelas, $id_mapel, $ptm, $id_file)
    {
        $data['judul'] = 'E-Sakola Presensi Siswa';
        $data['guru'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
        $data['mapel'] = $this->db->get_where('mapel', ['id_mapel' => $id_mapel])->row_array();
        $data['ptm'] = $ptm;
        $data['id_mapel'] = $id_mapel;
        $data['id_kelas'] = $id_kelas;
        $data['id_file'] = $id_file;

        $query = $this->M_guru->getPresensi($id_mapel, $ptm);
        $data['presensi'] = null;
        if ($query) {
            $data['presensi'] = $query;
        }
        $query = $this->M_guru->cekPresensiStatus($id_mapel, $ptm);
        $data['presensi_status'] = null;
        if ($query) {
            $data['presensi_status'] = $query;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarGuruMM');
        $this->load->view('guru/v_presensiGuru', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['buat_presensi'])) {
            $data = [
                "id_mapel" => $this->input->post('id_mapel'),
                "pertemuan" => $this->input->post('pertemuan'),
                "id_file" => $this->input->post('id_file'),
                "status" => 0
            ];
            $this->db->insert('status_presensi', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil membuat presensi<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // var_dump($id);
            // die;
        }
        if (isset($_POST['mulai'])) {
            $data = [
                "status" => 1
            ];
            $this->db->where('id_mapel', $this->input->post('id_mapel'));
            $this->db->where('pertemuan', $this->input->post('pertemuan'));
            $this->db->update('status_presensi', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Presensi dimulai<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // var_dump($id);
            // die;
        }
        if (isset($_POST['selesai'])) {
            $data = [
                "status" => 0
            ];
            $this->db->where('id_mapel', $this->input->post('id_mapel'));
            $this->db->where('pertemuan', $this->input->post('pertemuan'));
            $this->db->update('status_presensi', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-warning" role="alert">Presensi selesai<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // var_dump($id);
            // die;
        }
    }

    public function tugas($id_kelas, $id_mapel, $ptm, $id_file)
    {
        $data['judul'] = 'E-Sakola Upload Tugas Siswa';
        $data['guru'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $id_kelas])->row_array();
        $data['mapel'] = $this->db->get_where('mapel', ['id_mapel' => $id_mapel])->row_array();
        // $data['file_submit'] = $this->db->get_where('file_submit')->result_array();
        $data['ptm'] = $ptm;
        $data['id_mapel'] = $id_mapel;
        $data['id_kelas'] = $id_kelas;
        $data['id_file'] = $id_file;

        $query = $this->M_guru->getSiswaByKelas($id_kelas);
        $data['get_siswa'] = null;
        if ($query) {
            $data['get_siswa'] = $query;
        }
        $query = $this->M_guru->getFileSubmit($id_file);
        $data['file_submit'] = null;
        if ($query) {
            $data['file_submit'] = $query;
        }
        $query = $this->M_guru->getFileSubmitHapus($id_file);
        $data['file_submit_hapus'] = null;
        if ($query) {
            $data['file_submit_hapus'] = $query;
        }
        $query = $this->M_guru->getTugas($id_mapel, $id_file);
        $data['tugas'] = null;
        if ($query) {
            $data['tugas'] = $query;
        }

        $query = $this->M_guru->cekTugas($id_file);
        $data['cek_tugas'] = null;
        if ($query) {
            $data['cek_tugas'] = $query;
        }

        $query = $this->M_guru->getFileTugasSiswa($id_file);
        $data['file_tugas'] = null;
        if ($query) {
            $data['file_tugas'] = $query;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarGuruMM');
        $this->load->view('guru/v_tugasGuru', $data);
        $this->load->view('templates/footer');

        if (isset($_POST['buat_tugas'])) {
            $data = [
                "id_file" => $this->input->post('id_file')
            ];
            $this->db->insert('tugas', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil membuat tugas baru<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // var_dump($id);
            // die;
        }

        if (isset($_POST['unggah'])) {
            $upload_file = $_FILES['file_penugasan']['name'];

            if ($upload_file) {
                $config['upload_path'] = './assets/file/tugas/';
                $config['allowed_types'] = 'doc|docx|pdf|ppt|pptx|jpg|jpeg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_penugasan')) {
                    $old_file = $this->input->post('old_name');
                    if ($old_file != null) {
                        unlink(FCPATH . 'assets/file/tugas/' . $old_file);
                    }

                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_penugasan', $new_file);

                    $data = [
                        "deskripsi" => $this->input->post('deskripsi'),
                        "file_penugasan" => $this->upload->data('file_name'),
                        "tgl_deadline" => $this->input->post('tgl_deadline'),
                        "status" => 1

                    ];
                    $this->db->where('id_file', $this->input->post('id_file'));
                    $this->db->update('tugas', $data);

                    $result = array();
                    foreach ($_POST['id_siswa'] as $key => $val) {
                        $result[] = array(
                            'id_siswa' => $_POST['id_siswa'][$key],
                            'id_tugas' => $_POST['id_tugas'],
                            'id_mapel' => $_POST['id_mapel'],
                            'id_kelas' => $_POST['id_kelas'],
                            'pertemuan' => $_POST['pertemuan'],
                            "status" => 0
                        );
                    }

                    $this->db->insert_batch('file_submit', $result);

                    header("Refresh:0");
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil memperbarui file tugas<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {

                if ($this->input->post('deskripsi') or $this->input->post('tgl_deadline') != null) {
                    $data = [
                        "deskripsi" => $this->input->post('deskripsi'),
                        "tgl_deadline" => $this->input->post('tgl_deadline'),
                        "status" => 1

                    ];
                    $this->db->where('id_file', $this->input->post('id_file'));
                    $this->db->update('tugas', $data);

                    $result = array();
                    foreach ($_POST['id_siswa'] as $key => $val) {
                        $result[] = array(
                            'id_siswa' => $_POST['id_siswa'][$key],
                            'id_kelas' => $_POST['id_kelas'],
                            'id_mapel' => $_POST['id_mapel'],
                            'id_tugas' => $_POST['id_tugas'],
                            'pertemuan' => $_POST['pertemuan'],
                            "status" => 0
                        );
                    }

                    $this->db->insert_batch('file_submit', $result);

                    header("Refresh:0");
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil memperbarui file tugas<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
                } else {
                    $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">File tugas tidak boleh kosong<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
                }
            }
        }

        if (isset($_POST['hapus_isi_file'])) {
            $old_file = $this->input->post('old_name');
            if ($old_file != null) {
                unlink(FCPATH . 'assets/file/tugas/' . $old_file);
            }

            $data = [
                "file_penugasan" => null
            ];
            $this->db->where('id_tugas', $this->input->post('id_tugas'));
            $this->db->update('tugas', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menghapus file tugas<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
        }
        if (isset($_POST['edit'])) {
            $upload_file = $_FILES['file_penugasan']['name'];

            if ($upload_file) {
                $config['upload_path'] = './assets/file/tugas/';
                $config['allowed_types'] = 'doc|docx|pdf|ppt|pptx|jpg|jpeg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_penugasan')) {
                    $old_file = $this->input->post('old_name');
                    if ($old_file != null) {
                        unlink(FCPATH . 'assets/file/tugas/' . $old_file);
                    }

                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_penugasan', $new_file);

                    $data = [
                        "deskripsi" => $this->input->post('deskripsi'),
                        "file_penugasan" => $this->upload->data('file_name'),
                        "tgl_deadline" => $this->input->post('tgl_deadline')

                    ];
                    $this->db->where('id_file', $this->input->post('id_file'));
                    $this->db->update('tugas', $data);

                    header("Refresh:0");
                    $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil memperbarui file tugas<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $data = [
                    "deskripsi" => $this->input->post('deskripsi'),
                    "tgl_deadline" => $this->input->post('tgl_deadline')

                ];
                $this->db->where('id_file', $this->input->post('id_file'));
                $this->db->update('tugas', $data);

                header("Refresh:0");
                $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil memperbarui file tugas<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
            }
        }

        if (isset($_POST['hapus'])) {
            $old_file = $this->input->post('old_name');
            if ($old_file != null) {
                unlink(FCPATH . 'assets/file/tugas/' . $old_file);
            }
            $old_file1 = $this->input->post('old_name1');
            if ($old_file1 != null) {
                foreach ($_POST['old_name1'] as $key => $val) {
                    unlink(FCPATH . 'assets/file/submit/' . $_POST['old_name1'][$key]);
                }
            }

            $data = [
                "id_tugas" => $this->input->post('id_tugas')
            ];
            $this->db->where('id_tugas', $this->input->post('id_tugas'));
            $this->db->delete('tugas', $data);
            $this->db->delete('file_submit', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menghapus tugas<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            //var_dump($data);
            // die;
        }
        if (isset($_POST['save'])) {
            $data = [
                "nilai" => $this->input->post('nilai'),
                "pertemuan" => $ptm
            ];
            $this->db->where('id_submit', $this->input->post('id_submit'));
            $this->db->update('file_submit', $data);
            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil mengedit nilai<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');
            // var_dump($data);
            // die;
        }
    }

    public function nilai($id)
    {
        $data['judul'] = 'E-Sakola Laporan Nilai Siswa';
        $data['guru'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
        $id_kelas = $this->input->post('kategori');
        $id_mapel = $this->input->post('subkategori');
        $data['id_kelas'] = $id_kelas;
        $data['id_mapel'] = $id_mapel;
        $query = $this->M_guru->getKelas($id);
        $data['kelas'] = null;
        if ($query) {
            $data['kelas'] = $query;
        }
        $query = $this->M_guru->get_kelasById($id);
        $data['kelasid'] = null;
        if ($query) {
            $data['kelasid'] = $query;
        }

        // $query = $this->M_guru->get_listNilai($id_kelas);
        // $data['list_nilai'] = null;
        // if ($query) {
        //     $data['list_nilai'] = $query;
        // }

        $query = $this->M_guru->getKelasNilai2($id_kelas);
        $data['kelas2'] = null;
        if ($query) {
            $data['kelas2'] = $query;
        }
        $query = $this->M_guru->getMapelById($id_kelas, $id_mapel);
        $data['mapel2'] = null;
        if ($query) {
            $data['mapel2'] = $query;
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbarGuruNilai');
        $this->load->view('guru/v_nilaiGuru', $data);
        if ($id_kelas != null) {
            $this->load->view('guru/v_daftarNilai', $data);
        }
        $this->load->view('templates/footerNilai');
    }

    public function list_nilai($id)
    {
        $data['judul'] = 'E-Sakola Laporan Nilai Siswa';
        $data['guru'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
        $id_kelas = $this->input->post('kategori');
        $id_mapel = $this->input->post('subkategori');
        $data['id_kelas'] = $id_kelas;
        $data['id_mapel'] = $id_mapel;
        $query = $this->M_guru->getKelas($id);
        $data['kelas'] = null;
        if ($query) {
            $data['kelas'] = $query;
        }
        $query = $this->M_guru->get_kelasById($id);
        $data['kelasid'] = null;
        if ($query) {
            $data['kelasid'] = $query;
        }

        $query = $this->M_guru->get_listNilai($id_kelas);
        $data['list_nilai'] = null;
        if ($query) {
            $data['list_nilai'] = $query;
        }

        // $query = $this->M_guru->get_nilaiTampilSiswa($id_kelas);
        // $data['list_siswa'] = null;
        // if ($query) {
        //     $data['list_siswa'] = $query;
        // }
        $query = $this->M_guru->getKelasNilai2($id_kelas);
        $data['kelas2'] = null;
        if ($query) {
            $data['kelas2'] = $query;
        }
        $query = $this->M_guru->getMapelById($id_kelas, $id_mapel);
        $data['mapel2'] = null;
        if ($query) {
            $data['mapel2'] = $query;
        }
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/navbarGuruNilai');
        // $this->load->view('guru/v_nilaiGuru_list', $data);
        $this->load->view('guru/v_daftarNilai', $data);
        // if ($id_kelas != null) {
        // }
        // $this->load->view('templates/footerNilai');
    }

    // function daftarNilai($id)
    // {
    //     $data['guru'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
    //     $id_kelas = $this->input->post('kategori');
    //     $id_mapel = $this->input->post('subkategori');
    //     $data['id_kelas'] = $id_kelas;
    //     $data['id_mapel'] = $id_mapel;
    //     $query = $this->M_guru->getKelas($id);
    //     $data['kelas'] = null;
    //     if ($query) {
    //         $data['kelas'] = $query;
    //     }
    //     $query = $this->M_guru->getKelasNilai2($id_kelas);
    //     $data['kelas2'] = null;
    //     if ($query) {
    //         $data['kelas2'] = $query;
    //     }
    //     $query = $this->M_guru->getMapelById($id_kelas, $id_mapel);
    //     $data['mapel2'] = null;
    //     if ($query) {
    //         $data['mapel2'] = $query;
    //     }
    //     $query = $this->M_guru->get_kelasById($id);
    //     $data['kelasid'] = null;
    //     if ($query) {
    //         $data['kelasid'] = $query;
    //     }
    //     $query = $this->M_guru->get_nilaiSiswabyKelas($id_kelas, $id_mapel);
    //     $data['nilai'] = null;
    //     if ($query) {
    //         $data['nilai'] = $query;
    //     }
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/navbarGuruNilai');
    //     $this->load->view('guru/v_nilaiGuru', $data);
    //     $this->load->view('guru/v_daftarNilai', $data);
    //     $this->load->view('templates/footerNilai');
    //     // var_dump($id_kelas);
    //     // var_dump($id_mapel);
    // }

    function get_mapelNilai()
    {
        $id = $this->input->post('id');
        $id_guru = $this->input->post('id_guru');
        $data = $this->M_guru->getMapelNilai($id, $id_guru);
        echo json_encode($data);
    }
    function get_submapelNilai()
    {
        $id = $this->input->post('id');
        $id_guru = $this->input->post('id_guru');
        $data = $this->M_guru->getsubMapelNilai($id, $id_guru);
        echo json_encode($data);
    }
    function get_kelasNilai()
    {
        $id = $this->input->post('id');
        $id_guru = $this->input->post('id_guru');
        $data = $this->M_guru->getKelasNilai($id);
        echo json_encode($data);
    }
    function get_daftarSiswaNilai()
    {
        $id_kelas = $this->input->post('id_kelas');
        $id_mapel = $this->input->post('id_mapel');
        $data = $this->M_guru->getDaftarSiswa($id_kelas, $id_mapel);
        echo json_encode($data);
        // var_dump($_POST['json'], true);
    }
}
