<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('KeuanganModel');
		$this->load->model('PinjamanModel');
	}

	function add_keuangan()
	{
		$data = [
			'jumlah'		=> $this->input->post('jumlah', TRUE),
			'jenis_kas'		=> $this->input->post('jenis_kas', TRUE),
			'keterangan'	=> $this->input->post('keterangan', TRUE),
			'id_user'		=> $this->session->id,
			'tanggal'		=> date('Y-m-d H:i:s')
		];
		if ($this->KeuanganModel->addKeuangan($data)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Keuangan Berhasil Disimpan');
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Keuangan Gagal Disimpan');
		}
		echo '<script>history.go(-1)</script>';
	}

	function change_keuangan()
	{
		$data = [
			'jumlah'		=> $this->session->flashdata('jumlah'),
			'jenis_kas'		=> $this->session->flashdata('jenis_kas'),
			'keterangan'	=> $this->session->flashdata('keterangan'),
			'id_user'		=> $this->session->id,
			'tanggal'		=> date('Y-m-d H:i:s')
		];
		if ($this->KeuanganModel->changeKeuangan($data, $this->session->flashdata('id_keuangan'))) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Keuangan Berhasil Diubah');
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Keuangan Gagal Diubah');
		}
		echo '<script>history.go(-2)</script>';
	}

	function delete_keuangan($id_keuangan)
	{
		if ($this->KeuanganModel->deleteKeuangan($id_keuangan)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Keuangan Berhasil Dihapus');
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Keuangan Gagal Dihapus');
		}
		echo '<script>history.go(-1);</script>';
	}

	function add_pinjaman()
	{
		$data = [
			'nama_peminjam'		=> $this->input->post('nama_peminjam'),
			'jumlah_pinjaman'	=> $this->input->post('jumlah_pinjaman'),
			'keterangan'		=> $this->input->post('keterangan'),
			'tanggal_pinjaman'	=> date('Y-m-d H:i:s'),
			'status_pinjaman'	=> '1',
			'id_user'			=> $this->session->id
		];
		if ($this->PinjamanModel->addPinjaman($data)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Pinjaman Berhasil Ditambahkan');
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Pinjaman Gagal Ditambahkan');
		}
		echo '<script>history.go(-1);</script>';
	}

	function change_pinjaman($id_pinjaman)
	{
		$data = [
			'nama_peminjam'		=> $this->input->post('nama_peminjam'),
			'jumlah_pinjaman'	=> $this->input->post('jumlah_pinjaman'),
			'keterangan'		=> $this->input->post('keterangan'),
			'id_user'			=> $this->session->id
		];
		if ($this->PinjamanModel->ubahPinjaman($id_pinjaman, $data)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Pinjaman Berhasil Diubah');
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Pinjaman Gagal Diubah');
		}
		echo '<script>history.go(-1);</script>';
	}

	function change_status($id_pinjaman)
	{
		$data_pinjaman = $this->PinjamanModel->getPinjamanId($id_pinjaman)->row();
		$data_pinjaman->status_pinjaman == '1' ? $data = ['status_pinjaman' => '0'] : $data = ['status_pinjaman' => '1'];
		if ($this->PinjamanModel->ubahPinjaman($id_pinjaman, $data)) {
			// Jika berhasil ubah status_pinjaman
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Pinjaman Berhasil Diubah');
		} else {
			// Jika gagal ubah status_pinjaman
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Pinjaman Gagal Diubah');
		}
		echo '<script>history.go(-1)</script>';
	}
}
