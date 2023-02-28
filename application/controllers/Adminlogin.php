<?php

class Adminlogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Format Email tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password tidak boleh kosong'
        ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'E-Sakola Admin';
            $this->load->view('templates/header', $data);
            $this->load->view('admin/v_login');
            $this->load->view('templates/footer');
        } else {
            $this->_loginAdmin();
        }
    }


    private function _loginAdmin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($admin) {
            if ($admin['password'] == $password) {
                $data = [
                    'email' => $admin['email'],
                    'id_admin' => $admin['id_admin']
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect('adminlogin');
            }
        } else {
            $this->session->set_flashdata('flash', '<div class="alert alert-danger" role="alert">Email belum pernah terdaftar!</div>');
            redirect('adminlogin');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">Anda berhasil keluar</div>');
        redirect('adminlogin');
    }
}
