<?php
class select extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_select');
    }
    function index()
    {
        $x['data'] = $this->M_select->get_kategori();
        $this->load->view('v_select', $x);
    }
    function coba($id)
    {
        $data['guru'] = $this->db->get_where('guru', ['email' => $this->session->userdata('email')])->row_array();
        $x['data'] = $this->M_select->get_kelas($id);
        $this->load->view('v_selectCoba', $x);
    }

    function get_subkelas()
    {
        $id = $this->input->post('id');
        $data = $this->M_select->get_subkelas($id);
        echo json_encode($data);
    }
    function get_subkategori()
    {
        $id = $this->input->post('id');
        $data = $this->M_select->get_subkategori($id);
        echo json_encode($data);
    }
}
