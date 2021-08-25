<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('SettingsModel');
        $this->settings = $this->SettingsModel->getSettings()->row();
    }

    function index()
    {
        if ($this->session->role) {
            redirect('auth/cek_session');
        }

        $form_config = [
            [
                'field'     => 'username',
                'label'     => 'Username',
                'rules'     => 'required|max_length[20]',
                'errors'    => [
                    'required'      => 'Username harus diisi',
                    'max_length'    => 'Username maksimal 20 karakter'
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
            $data['settings'] = $this->settings;
            $this->load->view('auth/auth-login', $data);
        } else {
            $this->_login();
        }
    }

    function _login()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $cariUser = $this->UserModel->getUser($username);
        if ($cariUser->num_rows()) {
            $cariDataUser = $cariUser->row();
            if (password_verify($password, $cariDataUser->password)) {
                // jika benar
                $dataUser = [
                    'id'    => $cariDataUser->id_user,
                    'role'  => $cariDataUser->id_jabatan,
                ];
                $this->session->set_userdata($dataUser);
                redirect('auth/cek_session');
            } else {
                // jika password salah
                $this->session->set_flashdata('notif', 'gagal');
                $this->session->set_flashdata('pesan', 'Password yang anda masukkan salah');
                redirect('auth');
            }
        } else {
            // jika username tidak terdaftar
            $this->session->set_flashdata('notif', 'gagal');
            $this->session->set_flashdata('pesan', 'Username yang anda masukan tidak terdaftar');
            redirect('auth');
        }
    }

    function cek_session()
    {
        if ($this->session->role == '1') {
            redirect('superadmin');
        } else if ($this->session->role == '2' || $this->session->role == '3') {
            redirect('admin');
        } else if ($this->session->role == '4') {
            redirect('bendahara');
        } else if ($this->session->role == '5') {
            redirect('sekretaris');
        } else if ($this->session->role == '6') {
            redirect('anggota');
        } else {
            $this->session->set_flashdata('notif', 'gagal');
            $this->session->set_flashdata('pesan', 'Anda Tidak Punya Akses. Silahkan Login Terlebih Dahulu');
            redirect('auth');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
