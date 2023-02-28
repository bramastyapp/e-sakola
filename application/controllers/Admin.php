<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->library('form_validation');
        is_logged_in_admin();
    }

    public function index()
    {
        $data['judul'] = 'E-Sakola Home';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header_admin', $data);
        $this->load->view('admin/v_home');
        $this->load->view('templates/footer_admin');
    }
    public function siswa()
    {
        $data['judul'] = 'E-Sakola Siswa';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $query = $this->M_admin->getSiswa();
        $data['siswa'] = null;
        if ($query) {
            $data['siswa'] = $query;
        }
        $this->load->view('templates/header_adminSiswa', $data);
        $this->load->view('admin/v_siswa');
        $this->load->view('templates/footer_admin');
    }

    public function hapus_siswa($id_siswa)
    {
        $this->db->where('id_siswa', $id_siswa);
        $this->db->delete('siswa');
        header("Refresh:0");
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menghapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/siswa');
    }


    public function tambah_siswa()
    {
        $data['judul'] = 'E-Sakola Tambah Siswa';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_admin->getKelas();
        $data['kelas'] = null;
        if ($query) {
            $data['kelas'] = $query;
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Format Email tidak valid'
        ]);
        $this->form_validation->set_rules('id_siswa', 'NIS', 'trim|required', [
            'required' => 'NIS tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu sedikit',
            'required' => 'Password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_adminSiswa', $data);
            $this->load->view('admin/v_siswaTambah', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $this->M_admin->tambahSiswa();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menambah siswa<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/siswa');
        }
    }
    public function edit_siswa($id_siswa)
    {
        $data['judul'] = 'E-Sakola Edit Siswa';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_admin->getKelas();
        $data['kelas'] = null;
        if ($query) {
            $data['kelas'] = $query;
        }
        $query = $this->M_admin->getSiswaEdit($id_siswa);
        $data['getsiswa'] = null;
        if ($query) {
            $data['getsiswa'] = $query;
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Format Email tidak valid'
        ]);
        $this->form_validation->set_rules('id_siswa', 'NIS', 'trim|required', [
            'required' => 'NIS tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_adminSiswa', $data);
            $this->load->view('admin/v_siswaEdit');
            $this->load->view('templates/footer_admin');
        } else {
            $this->M_admin->editSiswa($id_siswa);
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil megedit siswa<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/siswa');
        }
    }
    public function guru()
    {
        $data['judul'] = 'E-Sakola Guru';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_admin->getGuru();
        $data['guru'] = null;
        if ($query) {
            $data['guru'] = $query;
        }
        $this->load->view('templates/header_adminGuru', $data);
        $this->load->view('admin/v_guru');
        $this->load->view('templates/footer_admin');
    }

    public function hapus_guru($id_guru)
    {
        $this->db->where('id_guru', $id_guru);
        $this->db->delete('guru');
        header("Refresh:0");
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menghapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/guru');
    }

    public function tambah_guru()
    {
        $data['judul'] = 'E-Sakola Tambah Guru';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_admin->getKelas();
        $data['kelas'] = null;
        if ($query) {
            $data['kelas'] = $query;
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Format Email tidak valid'
        ]);
        $this->form_validation->set_rules('nrp', 'NIP', 'trim|required', [
            'required' => 'NIP tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama',
            'min_length' => 'Password terlalu sedikit',
            'required' => 'Password tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_adminGuru', $data);
            $this->load->view('admin/v_guruTambah');
            $this->load->view('templates/footer_admin');
        } else {
            $this->M_admin->tambahGuru();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menambah guru<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/guru');
        }
    }
    public function edit_guru($id_guru)
    {
        $data['judul'] = 'E-Sakola Edit Guru';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_admin->getKelas();
        $data['kelas'] = null;
        if ($query) {
            $data['kelas'] = $query;
        }
        $query = $this->M_admin->getGurubyId($id_guru);
        $data['guruid'] = null;
        if ($query) {
            $data['guruid'] = $query;
        }
        $query = $this->M_admin->getGuruEdit($id_guru);
        $data['getguru'] = null;
        if ($query) {
            $data['getguru'] = $query;
        }
        $data['id_guru'] = $id_guru;

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Format Email tidak valid'
        ]);
        $this->form_validation->set_rules('nrp', 'NIP', 'trim|required', [
            'required' => 'NIP tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_adminGuru', $data);
            $this->load->view('admin/v_guruEdit');
            $this->load->view('templates/footer_admin');
        } else {
            $this->M_admin->editGuru($id_guru);
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil mengedit data guru<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/guru');
        }
    }

    function get_mapel()
    {
        $id = $this->input->post('id_kelas');
        $data = $this->M_admin->getMapelNilai($id);
        echo json_encode($data);
    }

    public function kelas()
    {
        $data['judul'] = 'E-Sakola Kelas';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_admin->getKelas();
        $data['kelas'] = null;
        if ($query) {
            $data['kelas'] = $query;
        }
        $this->load->view('templates/header_adminKelas', $data);
        $this->load->view('admin/v_kelas');
        $this->load->view('templates/footer_admin');
    }

    public function hapus_kelas($id_kelas)
    {
        $this->db->where('id_kelas', $id_kelas);
        $this->db->delete('kelas');
        header("Refresh:0");
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menghapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/kelas');
    }

    public function tambah_kelas()
    {
        $data['judul'] = 'E-Sakola Tambah kelas';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_admin->getGuru();
        $data['guru'] = null;
        if ($query) {
            $data['guru'] = $query;
        }

        $this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'trim|required', [
            'required' => 'Nama kelas tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_adminKelas', $data);
            $this->load->view('admin/v_kelasTambah');
            $this->load->view('templates/footer_admin');
        } else {
            $this->M_admin->tambahKelas();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menambah kelas<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/kelas');
        }
    }
    public function edit_kelas($id_kelas)
    {
        $data['judul'] = 'E-Sakola Edit Kelas';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_admin->getKelasById($id_kelas);
        $data['kelas'] = null;
        if ($query) {
            $data['kelas'] = $query;
        }
        $query = $this->M_admin->getGuru();
        $data['guru'] = null;
        if ($query) {
            $data['guru'] = $query;
        }
        $query = $this->M_admin->getMapel();
        $data['mapel'] = null;
        if ($query) {
            $data['mapel'] = $query;
        }

        $this->form_validation->set_rules('nama_kelas', 'nama_kelas', 'trim|required', [
            'required' => 'Nama kelas tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_adminKelas', $data);
            $this->load->view('admin/v_kelasEdit');
            $this->load->view('templates/footer_admin');
        } else {
            $this->M_admin->editKelas($id_kelas);
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil mengedit kelas<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/kelas');
        }

        if (isset($_POST['tambahmapel'])) {
            $data = [
                "id_kelas" => $this->input->post('id_kelas'),
                "id_mapel" => $this->input->post('id_mapel'),
                "id_guru" => $this->input->post('id_guru')
            ];
            $this->db->insert('mapel_kelas', $data);

            header("Refresh:0");
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menambah mata pelajaran<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
        }
    }
    public function hapus_mapel_kelas($id_mk, $id_kelas)
    {
        $this->db->where('id_mk', $id_mk);
        $this->db->delete('mapel_kelas');
        // header("Refresh:0");
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menghapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect("admin/edit_kelas/$id_kelas");
    }
    public function mapel()
    {
        $data['judul'] = 'E-Sakola Mapel';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_admin->getMapel();
        $data['mapel'] = null;
        if ($query) {
            $data['mapel'] = $query;
        }
        $this->load->view('templates/header_adminMapel', $data);
        $this->load->view('admin/v_mapel');
        $this->load->view('templates/footer_admin');
    }

    public function hapus_mapel($id_mapel)
    {
        $this->db->where('id_mapel', $id_mapel);
        $this->db->delete('mapel');
        header("Refresh:0");
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menghapus<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/mapel');
    }

    public function tambah_mapel()
    {
        $data['judul'] = 'E-Sakola Tambah Mapel';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_mapel', 'nama_mapel', 'trim|required', [
            'required' => 'Nama mata pelajaran tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_adminMapel', $data);
            $this->load->view('admin/v_mapelTambah');
            $this->load->view('templates/footer_admin');
        } else {
            $this->M_admin->tambahMapel();
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil menambah mata pelajaran<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/mapel');
        }
    }
    public function edit_mapel($id_mapel)
    {
        $data['judul'] = 'E-Sakola Edit Mapel';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->M_admin->getMapelById($id_mapel);
        $data['mapel'] = null;
        if ($query) {
            $data['mapel'] = $query;
        }

        $this->form_validation->set_rules('nama_mapel', 'nama_mapel', 'trim|required', [
            'required' => 'Nama mata pelajaran tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_adminMapel', $data);
            $this->load->view('admin/v_mapelEdit');
            $this->load->view('templates/footer_admin');
        } else {
            $this->M_admin->editMapel($id_mapel);
            $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Berhasil mengedit mata pelajaran<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/mapel');
        }
    }

    public function nilai()
    {
        $data['judul'] = 'E-Sakola Nilai';
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $id_kelas = $this->input->post('kategori');
        $id_mapel = $this->input->post('subkategori');
        $data['id_kelas'] = $id_kelas;
        $data['id_mapel'] = $id_mapel;

        $query = $this->M_admin->getKelas();
        $data['kelas'] = null;
        if ($query) {
            $data['kelas'] = $query;
        }
        $query = $this->M_admin->getKelasNilai2($id_kelas);
        $data['kelas2'] = null;
        if ($query) {
            $data['kelas2'] = $query;
        }
        $query = $this->M_admin->getMapelById($id_kelas, $id_mapel);
        $data['mapel2'] = null;
        if ($query) {
            $data['mapel2'] = $query;
        }

        $this->load->view('templates/header_adminNilai', $data);
        $this->load->view('admin/v_nilai', $data);
        if ($id_kelas != null) {
            $this->load->view('guru/v_daftarNilai', $data);
        }
        $this->load->view('templates/footerNilaiAdmin');
    }
    function get_mapelNilai()
    {
        $id = $this->input->post('id');
        $data = $this->M_admin->getMapelNilai2($id);
        echo json_encode($data);
    }
}
