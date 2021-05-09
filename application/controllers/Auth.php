<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load form validation library
        $this->load->library('form_validation');
        // Load session library
        $this->load->library('session');

        // Load the captcha helper
        $this->load->helper('captcha');
    }


    public function index()
    {
        if (isset($_SESSION['email'])) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        //PREVENT SQL INJECTION HERE !!
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //If user exist
        if ($user) {

            //If user active
            if ($user['is_active'] == 1) {
                //Check Password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'name' => $user['name'],
                        'is_active' => $user['is_active'],
                        'login_time' => time(),
                        'work_time' => 120 // 2 MINUTE WORKING TIME 
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password !</div>');
                    redirect('auth');
                }
            } else if ($user['is_active'] == 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Account is not Activated !</div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your Account has been Blocked ! </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account is not Registered !</div>');
            redirect('auth');
        }
    }

    public function viewRegis()
    {
        // Captcha configuration
        $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url() . 'captcha_images/',
            'font_path'     => DEFAULT_INCLUDE_PATH,
            'img_width'     => '340',
            'img_height'    => 50,
            'word_length'   => 8,
            'font_size'     => 18
        );
        $captcha = create_captcha($config);

        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);

        // Pass captcha image to view
        $datacaptcha['captchaImg'] = $captcha['image'];

        $data['title'] = 'User Registration';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/registration', $datacaptcha);
        $this->load->view('templates/auth_footer');
    }

    public function registration()
    {
        if (isset($_SESSION['email'])) {
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email Address have been used'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password is too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[6]|matches[password1]');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required');

        //Captcha----------------------------



        if ($this->form_validation->run() == false) {
            // Captcha configuration
            $config = array(
                'img_path'      => 'captcha_images/',
                'img_url'       => base_url() . 'captcha_images/',
                'font_path'     => DEFAULT_INCLUDE_PATH,
                'img_width'     => '340',
                'img_height'    => 50,
                'word_length'   => 8,
                'font_size'     => 18
            );
            $captcha = create_captcha($config);

            // Unset previous captcha and set new captcha word
            $this->session->unset_userdata('captchaCode');
            $this->session->set_userdata('captchaCode', $captcha['word']);

            // Pass captcha image to view
            $datacaptcha['captchaImg'] = $captcha['image'];

            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration', $datacaptcha);
            $this->load->view('templates/auth_footer');
        } else {
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            if ($inputCaptcha == $sessCaptcha) {
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => 2,
                    'is_active' => 0,
                    'date_created' => time()
                ];
                $this->security->xss_clean($data);
                $this->load->model('member');
                $this->member->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Yay ! your account has been created, Please wait admin approval </div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Captcha does not match ! </div>');
                // Captcha configuration
                $config = array(
                    'img_path'      => 'captcha_images/',
                    'img_url'       => base_url() . 'captcha_images/',
                    'font_path'     => DEFAULT_INCLUDE_PATH,
                    'img_width'     => '340',
                    'img_height'    => 50,
                    'word_length'   => 8,
                    'font_size'     => 18
                );
                $captcha = create_captcha($config);

                // Unset previous captcha and set new captcha word
                $this->session->unset_userdata('captchaCode');
                $this->session->set_userdata('captchaCode', $captcha['word']);

                // Pass captcha image to view
                $datacaptcha['captchaImg'] = $captcha['image'];

                $data['title'] = 'User Registration';
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/registration', $datacaptcha);
                $this->load->view('templates/auth_footer');
            }
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
        redirect('auth');
    }



    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('is_active');
        $this->session->unset_userdata('login_time');
        $this->session->unset_userdata('work_time');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
}
