<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->role != 1) {
            redirect('auth/cek_session');
        }
        $this->load->model('UserModel');
        $this->load->model('BeritaModel');
        $this->menu = [
            [
                'icon'  => 'fas fa-users fa-fw',
                'label' => 'Data Pengguna',
                'link'  => base_url('superadmin/pengguna')
            ],
            [
                'icon'  => 'fas fa-newspaper fa-fw',
                'label' => 'Data Berita',
                'link'  => base_url('superadmin/berita')
            ],
            [
                'icon'  => 'fas fa-dollar-sign fa-fw',
                'label' => 'Data Keuangan',
                'link'  => base_url('superadmin/keuangan')
            ],
            [
                'icon'  => 'fas fa-envelope-open-text fa-fw',
                'label' => 'Data Surat Menyurat',
                'link'  => base_url('superadmin/surat')
            ],
            [
                'icon'  => 'fas fa-cog fa-fw',
                'label' => 'Settings',
                'link'  => base_url('superadmin/settings')
            ]
        ];
    }

    function index()
    {
        $data['title'] = 'Superadmin - Superadmin';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('superadmin/index');
        $this->load->view('templates/footer');
    }

    function pengguna()
    {
        $data['title'] = 'Superadmin - Data Pengguna';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();
        $data['allUser'] = $this->UserModel->getUserAll()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('superadmin/data_pengguna');
        $this->load->view('templates/footer');
    }

    function berita()
    {
        $data['title'] = 'Superadmin - Data Berita';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();
        $data['allBerita'] = $this->BeritaModel->getBeritaAll()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('superadmin/data_berita');
        $this->load->view('templates/footer');
    }

    function keuangan()
    {
        $data['title'] = 'Superadmin - Data Keuangan';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('superadmin/data_keuangan');
        $this->load->view('templates/footer');
    }

    function surat()
    {
        $data['title'] = 'Superadmin - Data Surat';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('superadmin/data_surat');
        $this->load->view('templates/footer');
    }

    function settings()
    {
        $data['title'] = 'Superadmin - Settings';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('superadmin/settings');
        $this->load->view('templates/footer');
    }

    function my_profile()
    {
        $data['title'] = 'Superadmin - My Profile';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('superadmin/my_profile');
        $this->load->view('templates/footer');
    }
}
