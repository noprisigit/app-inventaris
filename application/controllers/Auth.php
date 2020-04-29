<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
        $this->form_validation->set_rules('username', 'username', 'trim|required', [
            'required'  => 'Please fill your %s',
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required', [
            'required'  => 'Please fill your %s'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $data = [
                'username'  => htmlspecialchars($this->input->post('username'), true),
                'password'  => htmlspecialchars($this->input->post('password'), true)
            ];

            $user = $this->db->get_where('users', ['username' => $data['username']])->row_array();

            if ($user) {
                if (password_verify($data['password'], $user['password'])) {
                    $session = [
                        'id_user'       => $user['id_user'],
                        'full_name'     => $user['full_name'],
                        'username'      => $user['username'],
                    ];

                    $this->session->set_userdata($session);

                    redirect('home');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                        Password is wrong.
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                    This account is not registered.
                </div>');
                redirect('auth');
            }
        }
    }
    
    public function registration()
    {
        $this->form_validation->set_rules('full_name', 'full name', 'trim|required', [
            'required'  => 'Please fill your %s'
        ]);
        $this->form_validation->set_rules('username', 'username', 'trim|required', [
            'required'  => 'Please fill your %s'
        ]);
        $this->form_validation->set_rules('password', 'password', 'trim|required', [
            'required'  => 'Please fill your %s'
        ]);
        $this->form_validation->set_rules('confirm_password', 'retype password', 'trim|required|matches[password]', [
            'required'  => 'Please fill your %s',
            'matches'   => 'Password does not match'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registration');
        } else {
            $data = [
                'full_name'         => htmlspecialchars($this->input->post('full_name'), TRUE),
                'username'          => htmlspecialchars($this->input->post('username'), TRUE),
                'password'          => password_hash(htmlspecialchars($this->input->post('password'), TRUE), PASSWORD_DEFAULT),
            ];

            $this->db->insert('users', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
                Your account has been created.
            </div>');
            redirect('auth');
        }
    }

    public function logout() {
        $data = [
            'id_user',
            'full_name',
            'username',
        ];
        $this->session->unset_userdata($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            You have been logout.
        </div>');
        redirect('auth');
    }

    public function blocked() {
        $this->load->view('auth/404');
    }
}
