<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->status == '0' || $this->session->status == NULL) {
            if ($this->session->role != 2 && $this->session->role != 3) {
                redirect('auth/cek_session');
            }
            redirect('auth/cek_session');
        }

        $this->load->model('UserModel');
        $this->load->model('BeritaModel');
        $this->load->model('JabatanModel');
        $this->load->model('KeuanganModel');
        $this->load->model('PinjamanModel');
        $this->load->model('SuratModel');
        $this->load->model('SettingsModel');
        $this->menu = [
            [
                'icon'  => 'fas fa-users fa-fw',
                'label' => 'Data Pengguna',
                'link'  => base_url('admin/pengguna')
            ],
            [
                'icon'  => 'fas fa-newspaper fa-fw',
                'label' => 'Data Berita',
                'link'  => base_url('admin/berita')
            ],
            [
                'icon'  => 'fas fa-dollar-sign fa-fw',
                'label' => 'Data Keuangan',
                'link'  => base_url('admin/keuangan')
            ],
            [
                'icon'  => 'fas fa-envelope-open-text fa-fw',
                'label' => 'Data Surat Menyurat',
                'link'  => base_url('admin/surat')
            ]
        ];

        $this->settings = $this->SettingsModel->getSettings()->row();
    }

    function index()
    {
        $data['title'] = 'Superadmin - Superadmin';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();
        $data['settings'] = $this->settings;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('ketuaWakil/index');
        $this->load->view('templates/footer');
    }

    function pengguna()
    {
        $data['title'] = 'Superadmin - Data Pengguna';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();
        $data['settings'] = $this->settings;
        $data['allUser'] = $this->UserModel->getUserAll()->result();
        $data['allJabatan'] = $this->JabatanModel->getJabatanAll()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('ketuaWakil/data_pengguna');
        $this->load->view('templates/footer');
    }

    function berita()
    {
        $data['title'] = 'Superadmin - Data Berita';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();
        $data['settings'] = $this->settings;
        $data['allBerita'] = $this->BeritaModel->getBeritaAll()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('ketuaWakil/data_berita');
        $this->load->view('templates/footer');
    }

    function tambah_berita()
    {
        $data['title'] = 'Superadmin - Tambah Data Berita';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();
        $data['settings'] = $this->settings;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('ketuaWakil/tambah_berita');
        $this->load->view('templates/footer');
    }

    function ubah_berita($id_berita)
    {
        $data['title'] = 'Superadmin - Ubah Data Berita';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();
        $data['settings'] = $this->settings;
        $data['berita'] = $this->BeritaModel->getBeritaId($id_berita)->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('ketuaWakil/ubah_berita');
        $this->load->view('templates/footer');
    }

    function keuangan()
    {
        $data['title'] = 'Superadmin - Data Keuangan';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();
        $data['settings'] = $this->settings;
        $data['allKeuangan'] = $this->KeuanganModel->getKeuanganAll()->result();
        $data['jumlahSaldo'] = $this->KeuanganModel->jumlahSaldo()->row();
        $data['allPinjaman'] = $this->PinjamanModel->getPinjamanAll()->result();
        $data['jumlahPinjaman'] = $this->PinjamanModel->jumlahPinjaman()->row();
        $data['saldoSaatIni'] = intval($data['jumlahSaldo']->saldo_akhir) - intval($data['jumlahPinjaman']->jumlah_pinjaman);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('ketuaWakil/data_keuangan');
        $this->load->view('templates/footer');
    }

    function surat()
    {
        $data['title'] = 'Superadmin - Data Surat';
        $data['menu'] = $this->menu;
        $data['user'] = $this->UserModel->getUserId($this->session->id)->row();
        $data['settings'] = $this->settings;
        $data['allTemplate'] = $this->SuratModel->getTemplateAll()->result();
        $data['allSurat'] = $this->SuratModel->getSuratAll()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('ketuaWakil/data_surat');
        $this->load->view('templates/footer');
    }

    function my_profile()
    {
        $form_config = [
            [
                'field'     => 'nama',
                'label'     => 'Nama Lengkap',
                'rules'     => 'required|max_length[100]',
                'errors'    => [
                    'required'      => 'Username harus diisi',
                    'max_length'    => 'Username maksimal 100 karakter'
                ]
            ],
            [
                'field'     => 'password',
                'label'     => 'Password',
                'rules'     => 'min_length[8]',
                'errors'    => [
                    'min_length'    => 'Password minimal 8 karakter'
                ]
            ],
            [
                'field'     => 'passwordConfirm',
                'label'     => 'Konfirmasi Password',
                'rules'     => 'min_length[8]|matches[password]',
                'errors'    => [
                    'min_length'    => 'Password minimal 8 karakter',
                    'matches'       => 'Password harus sama'
                ]
            ],
            [
                'field'     => 'alamat',
                'label'     => 'Alamat',
                'rules'     => 'required|max_length[255]',
                'errors'    => [
                    'required'      => 'Alamat harus diisi',
                    'max_length'    => 'Password minimal 255 karakter'
                ]
            ],
            [
                'field'     => 'jenis_kelamin',
                'label'     => 'Jenis Kelamin',
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Jenis Kelamin harus dipilih'
                ]
            ],
        ];
        $this->form_validation->set_rules($form_config);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Superadmin - My Profile';
            $data['menu'] = $this->menu;
            $data['user'] = $this->UserModel->getUserId($this->session->id)->row();
            $data['settings'] = $this->settings;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('ketuaWakil/my_profile');
            $this->load->view('templates/footer');
        } else {

            $this->session->set_flashdata('id_user', $this->input->post('id_user', TRUE));
            $this->session->set_flashdata('nama', $this->input->post('nama', TRUE));
            $this->session->set_flashdata('alamat', $this->input->post('alamat', TRUE));
            $this->session->set_flashdata('jenis_kelamin', $this->input->post('jenis_kelamin', TRUE));
            $this->session->set_flashdata('password', $this->input->post('password', TRUE));

            redirect('user/update_profile');
        }
    }

    function ubah_pengguna($id_pengguna)
    {
        $form_config = [
            [
                'field'     => 'nama',
                'label'     => 'Nama Lengkap',
                'rules'     => 'required|max_length[100]',
                'errors'    => [
                    'required'      => 'Username harus diisi',
                    'max_length'    => 'Username maksimal 100 karakter'
                ]
            ],
            [
                'field'     => 'alamat',
                'label'     => 'Alamat',
                'rules'     => 'max_length[255]',
                'errors'    => [
                    'max_length'    => 'Password minimal 255 karakter'
                ]
            ],
            [
                'field'     => 'jenis_kelamin',
                'label'     => 'Jenis Kelamin',
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Jenis Kelamin harus dipilih'
                ]
            ],
            [
                'field'     => 'id_jabatan',
                'label'     => 'Jabatan',
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Jabatan harus dipilih'
                ]
            ],
        ];
        $this->form_validation->set_rules($form_config);
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Superadmin - My Profile';
            $data['menu'] = $this->menu;
            $data['user'] = $this->UserModel->getUserId($this->session->id)->row();
            $data['settings'] = $this->settings;
            $data['pengguna'] = $this->UserModel->getUserId($id_pengguna)->row();
            $data['allJabatan'] = $this->JabatanModel->getJabatanAll()->result();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/sidebar');
            $this->load->view('ketuaWakil/ubah_pengguna');
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('id_user', $this->input->post('id_user', TRUE));
            $this->session->set_flashdata('nama', $this->input->post('nama', TRUE));
            $this->session->set_flashdata('alamat', $this->input->post('alamat', TRUE));
            $this->session->set_flashdata('jenis_kelamin', $this->input->post('jenis_kelamin', TRUE));
            $this->session->set_flashdata('password', $this->input->post('password', TRUE));
            $this->session->set_flashdata('id_jabatan', $this->input->post('id_jabatan', TRUE));

            redirect('user/update_profile');
        }
    }
}
