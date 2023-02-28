<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'E-Sakola';
        $this->load->view('templates/header', $data);
        $this->load->view('auth/v_auth');
        $this->load->view('templates/footer');
    }

    //login siswa
    public function siswa()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Format Email tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'E-Sakola Login Siswa';
            $this->load->view('templates/header', $data);
            $this->load->view('siswa/v_loginSiswa');
            $this->load->view('templates/footer');
        } else {
            $this->_loginSiswa();
        }
    }

    private function _loginSiswa()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $siswa = $this->db->get_where('siswa', ['email' => $email])->row_array();
        //$kelas = $this->db->get_where('kelas', ['id_kelas'])->row_array();
        // var_dump($password);
        // die;

        if ($siswa) {
            if ($siswa['password'] == $password) {
                $data = [
                    'email' => $siswa['email'],
                    'id_kelas' => $siswa['id_kelas'],
                    'id_siswa' => $siswa['id_siswa']
                ];
                $this->session->set_userdata($data);
                redirect('siswa');
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect('auth/siswa');
            }
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Email belum pernah terdaftar!</div>');
            redirect('auth/siswa');
        }
    }

    //login guru
    public function guru()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Format Email tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'E-Sakola Login Guru';
            $this->load->view('templates/header', $data);
            $this->load->view('guru/v_loginGuru');
            $this->load->view('templates/footer');
        } else {
            $this->_loginGuru();
        }
    }

    private function _loginGuru()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $guru = $this->db->get_where('guru', ['email' => $email])->row_array();
        var_dump($guru);
        // die;

        if ($guru) {
            if ($guru['password'] == $password) {
                $data = [
                    'email' => $guru['email'],
                    'nrp' => $guru['nrp'],
                    'id_guru' => $guru['id_guru']
                ];
                $this->session->set_userdata($data);
                redirect('guru');
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect('auth/guru');
            }
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Email belum pernah terdaftar!</div>');
            redirect('auth/guru');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Anda berhasil keluar</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('templates/blocked');
    }
}
// if ($siswa['id_kelas'] == 1) {
//     redirect('siswa/kelas10');
// } else if ($siswa['id_kelas'] == 2) {
//     redirect('siswa/kelas11');
// } else {
//     redirect('siswa/kelas12');
// }
