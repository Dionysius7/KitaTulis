<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Admin Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('super/superlogin');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('superadmin', ['email' => $email])->row_array();

        //If user exist
        if ($user) {
            //Check Password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'login_time' => time(),
                    'work_time' => 120 // 2 MINUTE WORKING TIME 
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                redirect('super');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not Registered!</div>');
            redirect('super');
        }
    }

    public function time_out()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('is_active');
        $this->session->unset_userdata('login_time');
        $this->session->unset_userdata('work_time');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Session TimeOut !</div>');
        redirect('super');
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('is_active');
        $this->session->unset_userdata('login_time');
        $this->session->unset_userdata('work_time');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('super');
    }
}
