<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
	}
	function update_profile()
	{
		if ($this->session->flashdata('password') != '') {
			// jika password ada
			$data = [
				'nama'			=> $this->session->flashdata('nama'),
				'alamat'		=> $this->session->flashdata('alamat'),
				'jenis_kelamin'	=> $this->session->flashdata('jenis_kelamin'),
				'password'		=> password_hash($this->session->flashdata('password'), PASSWORD_BCRYPT),
				'updated_at'	=> date('Y-m-d H:i:s')
			];
		} else {
			// jika password tidak ada
			$data = [
				'nama'			=> $this->session->flashdata('nama'),
				'alamat'		=> $this->session->flashdata('alamat'),
				'jenis_kelamin'	=> $this->session->flashdata('jenis_kelamin'),
				'updated_at'	=> date('Y-m-d H:i:s')
			];
		}

		if ($this->UserModel->changeUser($data, $this->session->flashdata('id_user'))) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Profile Berhasil Diubah');
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Profile Gagal Diubah');
		}
		echo '<script>history.go(-1)</script>';
	}
}
