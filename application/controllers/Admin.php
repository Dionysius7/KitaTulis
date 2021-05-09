<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load form validation library
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (!isset($_SESSION['email'])) {
            redirect('super');
        }
        if (isset($_SESSION['email'])) {
            $now_time = time();
            $login_time = $_SESSION['login_time'];
            $work_time = $_SESSION['work_time'];

            // SESSION TIME_OUT CONTROL
            if ($now_time >= $login_time + $work_time) {
                redirect('super/time_out');
            }
        }
        $data['title'] = 'KitaTulis.Com';
        $data['user'] = $this->db->get_where('superadmin', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function listuser()
    {
        $data['title'] = 'List User';
        $data['user'] = $this->db->get_where('superadmin', ['email' => $this->session->userdata('email')])->row_array();
        $data['listuser'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/listuser', $data);
        $this->load->view('templates/footer');
    }
    public function listpost()
    {
        $data['title'] = 'List User';
        $data['user'] = $this->db->get_where('superadmin', ['email' => $this->session->userdata('email')])->row_array();
        $data['listpost'] = $this->db->get('post')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/listpost', $data);
        $this->load->view('templates/footer');
    }

    public function viewDashboard()
    {

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('superadmin', ['email' => $this->session->userdata('email')])->row_array();
        $data['listuser'] = $this->db->get('user')->result_array();
        $data['active_user'] = $this->db->get_where('user', ['is_active' => 1])->num_rows();
        $data['deactive_user'] = $this->db->get_where('user', ['is_active' => 0])->num_rows();
        $data['blocked_user'] = $this->db->get_where('user', ['is_active' => 2])->num_rows();
        $data['post_count'] = $this->db->get('post')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }
    //--------------LIST POST CONTROL----------------
    public function addpost()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">All field must be filled !</div>');
            redirect('admin/listpost');
        } else {
            $data = [
                'title' => htmlspecialchars($this->input->post('title')),
                'author' => $this->input->post('author'),
                'post_date' => time(),
                'content' => htmlspecialchars($this->input->post('content'))
            ];
            $this->security->xss_clean($data);
            $this->db->insert('post', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your post have been published !</div>');
            redirect('admin/listpost');
        }
    }
    public function editpost($id)
    {
        $this->db->where(['id' => $id]);
        $data = [
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'post_date' => time(),
            'content' => $this->input->post('content')
        ];
        $this->security->xss_clean($data);
        $this->db->update('post', $data);
        redirect('admin/listpost');
    }
    public function deletepost($id)
    {
        $this->db->delete('post', ['id' => $id]);
        redirect('admin/listpost');
    }
    //-------------END OF LIST POST------------------


    //-------------- LIST USER CONTROL----------------
    public function activateuser($id)
    {
        $this->db->where(['id' => $id]);
        $this->db->update('user', ['is_active' => 1]);
        redirect('admin/listuser');
    }
    public function blockuser($id)
    {
        $this->db->where(['id' => $id]);
        $this->db->update('user', ['is_active' => 2]);
        redirect('admin/listuser');
    }
    public function deleteuser($id)
    {
        $this->db->delete('user', ['id' => $id]);
        redirect('admin/listuser');
    }
    //-------------- END OF USER CONTROL--------------
}
