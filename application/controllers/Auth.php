<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    function index()
    {
        if ($this->session->role) {
            redirect('auth/cek_session');
        }

        $form_config = [
            [
                'field'     => 'email',
                'label'     => 'Email',
                'rules'     => 'required|valid_email',
                'errors'    => [
                    'required'      => 'Email harus diisi',
                    'valid_email'   => 'Email harus tidak valid'
                ]
            ],
            [
                'field'     => 'password',
                'label'     => 'Password',
                'rules'     => 'required|min_length[8]',
                'errors'    => [
                    'required'      => 'Password harus diisi',
                    'min_length'    => 'Password minimal 8 karakter'
                ]
            ]
        ];
        $this->form_validation->set_rules($form_config);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/auth-login');
        } else {
            $this->_login();
        }
    }

    function _login()
    {
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        $cariUser = $this->UserModel->getUser($email);
        if ($cariUser->num_rows()) {
            $cariDataUser = $cariUser->row();
            if (password_verify($password, $cariDataUser->password)) {
                // jika benar
                $dataUser = [
                    'id'    => $cariDataUser->id,
                    'email' => $cariDataUser->email,
                    'role'  => $cariDataUser->role_id,
                ];
                $this->session->set_userdata($dataUser);
                redirect('auth/cek_session');
            } else {
                // jika password salah
                $this->session->set_flashdata('pesan', 'Password yang anda masukkan salah');
                redirect('auth');
            }
        } else {
            // jika email tidak terdaftar
            $this->session->set_flashdata('pesan', 'Email yang anda masukan tidak terdaftar');
            redirect('auth');
        }
    }

    function cek_session()
    {
        if ($this->session->role == '1') {
            redirect('superadmin');
        } else if ($this->session->role == '2' && $this->session->role == '3') {
            redirect('admin');
        } else if ($this->session->role == '4') {
            redirect('bendahara');
        } else if ($this->session->role == '5') {
            redirect('sekretaris');
        } else if ($this->session->role == '6') {
            redirect('anggota');
        } else {
            $this->session->set_flashdata('pesan', 'Anda Buka Anggota Karang Taruna Karya Muda');
            redirect('auth');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
