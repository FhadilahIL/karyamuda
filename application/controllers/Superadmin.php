<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        // if ($this->session->role != 1) {
        //     redirect('auth/cek_session');
        // }
        $this->menu = [
            [
                'icon'  => 'fas fa-book fa-fw',
                'label' => 'Data Pengguna',
                'link'  => base_url('superadmin/pengguna')
            ],
            [
                'icon'  => 'fas fa-user fa-fw',
                'label' => 'Data Berita',
                'link'  => base_url('superadmin/berita')
            ],
            [
                'icon'  => 'fas fa-user fa-fw',
                'label' => 'Data Keuangan',
                'link'  => base_url('superadmin/keuangan')
            ],
            [
                'icon'  => 'fas fa-user fa-fw',
                'label' => 'Data Surat Menyurat',
                'link'  => base_url('superadmin/surat')
            ],
            [
                'icon'  => 'fas fa-user fa-fw',
                'label' => 'Settings',
                'link'  => base_url('superadmin/settings')
            ]
        ];
    }

    function index()
    {
        $data['title'] = 'Dashboard - Superadmin';
        $data['menu'] = $this->menu;
        // $data['user'] = $this->UserModel->getUserId($this->session->id)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('superadmin/index');
        $this->load->view('templates/footer');
    }
}
