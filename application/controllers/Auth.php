<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_Auth');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->M_Auth->cek_login(
            $username,
            $password
        );

        if($admin)
        {
            $session = array(
                'id_admin'   => $admin->id_admin,
                'nama_admin' => $admin->nama_admin,
                'login'      => TRUE
            );

            $this->session->set_userdata($session);

            redirect('dashboard');
        }
        else
        {
            $this->session->set_flashdata(
                'error',
                'Username atau Password salah!'
            );

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('auth');
    }

}