<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
            redirect('auth');
        }
        if (isset($_SESSION['email'])) {
            $now_time = time();
            $login_time = $_SESSION['login_time'];
            $work_time = $_SESSION['work_time'];

            // SESSION TIME_OUT CONTROL
            if ($now_time >= $login_time + $work_time) {
                redirect('auth/time_out');
            }
        }
        $data['title'] = 'KitaTulis.Com';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['listpost'] = $this->db->get('post')->result_array();
        $data['post_count'] = $this->db->get('post')->num_rows();
        $data['active_user'] = $this->db->get_where('user', ['is_active' => 1])->num_rows();

        $this->load->view('templates/header', $data); //done
        $this->load->view('templates/user_topbar', $data); //done
        $this->load->view('user/userpage', $data);
        $this->load->view('templates/user_footer');
    }

    public function addpost()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">All field must be filled !</div>');
            redirect('user/index');
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
            redirect('user/index');
        }
    }
}
