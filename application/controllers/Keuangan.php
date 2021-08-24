<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('KeuanganModel');
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
		echo '<script>history.go(-1)</script>';
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
}
