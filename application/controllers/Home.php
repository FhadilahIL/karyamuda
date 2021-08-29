<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('SettingsModel');
		$this->load->model('UserModel');
		$this->load->model('SuratModel');
		$this->load->model('BeritaModel');
		$this->settings = $this->SettingsModel->getSettings()->row();
		$this->sosmed =
			[
				[
					'icon'	=> 'fab fa-instagram',
					'link'	=> 'https://www.instagram.com/karyamuda_21/'
				],
				[
					'icon'	=> 'fab fa-youtube',
					'link'	=> 'https://www.youtube.com/channel/UCHGIAn2QRnqViMaRbJuGAmQ'
				]
			];
	}

	function index()
	{
		$data['title'] = 'Beranda';
		$data['settings'] = $this->settings;
		$data['sosmed'] = $this->sosmed;

		$ketua = $this->UserModel->getUserByIdJabatan('2', '1')->row();
		$wakilKetua = $this->UserModel->getUserByIdJabatan('3', '1')->row();
		$sekretaris = $this->UserModel->getUserByIdJabatan('4', '1')->row();
		$bendahara = $this->UserModel->getUserByIdJabatan('5', '1')->row();
		$superadmin = $this->UserModel->getUserByIdJabatan('1', '1')->row();

		if ($ketua && $wakilKetua && $sekretaris && $bendahara) {
			$data['team'] = [
				['jabatan' => 'Ketua Karang Taruna', 'nama' => $ketua->nama, 'foto' => $ketua->foto, 'deskripsi' => 'Ini adalah Deskripsi Ketua Karang Taruna'],
				['jabatan' => 'Wakil Ketua Karang Taruna', 'nama' => $wakilKetua->nama, 'foto' => $wakilKetua->foto, 'deskripsi' => 'Ini adalah Deskripsi Wakil Ketua Karang Taruna'],
				['jabatan' => 'Sekretaris Karang Taruna', 'nama' => $sekretaris->nama, 'foto' => $sekretaris->foto, 'deskripsi' => 'Ini adalah Deskripsi Sekretaris Karang Taruna'],
				['jabatan' => 'Bendahara Karang Taruna', 'nama' => $bendahara->nama, 'foto' => $bendahara->foto, 'deskripsi' => 'Ini adalah Deskripsi Bendahara Karang Taruna'],
				['jabatan' => 'Superadmin Karang Taruna', 'nama' => $superadmin->nama, 'foto' => $superadmin->foto, 'deskripsi' => 'Ini adalah Deskripsi Superadmin Karang Taruna'],
			];
		} else {
			$data['team'] = 'belum tersedia';
		}


		$this->load->view('home/header', $data);
		$this->load->view('home/index');
		$this->load->view('home/footer');
	}

	function berita()
	{
		$data['title'] = 'Berita';
		$data['settings'] = $this->settings;
		$data['sosmed'] = $this->sosmed;

		$banyak_berita = $this->BeritaModel->getBeritaAll()->num_rows();

		if ($banyak_berita > 0) {
			$this->load->library('pagination');
			$config['base_url'] = base_url('home/berita');
			$config['total_rows'] = $banyak_berita;
			$config['per_page'] = 7;
			$from = $this->uri->segment(3);
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['full_tag_open'] = '<ul class="pagination justify-content-end">';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li class="page-item page-link">';
			$config['num_tag_close'] = '</a></li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['prev_tag_open'] = '<li class="page-item page-link">';
			$config['prev_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li class="page-item page-link">';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li class="page-item page-link">';
			$config['last_tag_open'] = '<li>';
			$config['first_tag_open'] = '<li class="page-item page-link">';
			$config['first_tag_open'] = '<li>';
			$this->pagination->initialize($config);

			$data['tampil_berita'] = $this->BeritaModel->getBeritaHome($config['per_page'], $from)->result();
		} else {
			$data['tampil_berita'] = 'belum tersedia';
		}

		$this->load->view('home/header', $data);
		$this->load->view('home/berita');
		$this->load->view('home/footer');
	}

	function detail_berita($id_berita)
	{
		$data['title'] = 'Berita';
		$data['settings'] = $this->settings;
		$data['berita'] = $this->BeritaModel->getBeritaId($id_berita)->row();

		$this->load->view('home/tampil_berita', $data);
	}

	function pengajuan_surat()
	{
		$data['title'] = 'Form Pengajuan';
		$data['settings'] = $this->settings;
		$data['sosmed'] = $this->sosmed;
		$data['allTemplate'] = $this->SuratModel->getTemplateAll()->result();

		$this->load->view('home/header', $data);
		$this->load->view('home/form_pengajuan_surat');
		$this->load->view('home/footer');
	}
}
