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

		if ($this->session->flashdata('id_jabatan')) {
			$id_jabatan = ['id_jabatan' => $this->session->flashdata('id_jabatan')];
			$data = array_merge($data, $id_jabatan);
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

	function add_user()
	{
		$username = $this->input->post('username', TRUE);
		$id_jabatan = $this->input->post('id_jabatan', TRUE);
		if ($id_jabatan == '1') {
			$password = 'superadmin#' . $username;
		} else if ($id_jabatan == '2') {
			$password = 'ketua#' . $username;
		} else if ($id_jabatan == '3') {
			$password = 'wakilketua#' . $username;
		} else if ($id_jabatan == '4') {
			$password = 'sekretaris#' . $username;
		} else if ($id_jabatan == '5') {
			$password = 'bendahara#' . $username;
		} else if ($id_jabatan == '6') {
			$password = 'anggota#' . $username;
		}

		$data = [
			'username' => $username,
			'nama' => $this->input->post('nama', TRUE),
			'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
			'id_jabatan' => $id_jabatan,
			'password' => password_hash($password, PASSWORD_BCRYPT),
			'foto' => 'default.jpg',
			'status' => '1',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		];

		if ($this->UserModel->addUser($data)) {
			// jika berhasil menyimpan data
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Pengguna Berhasil Ditambahkan');
		} else {
			// jika gagal menyimpan data
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Pengguna Gagal Ditambahkan');
		}
		echo '<script>history.go(-1)</script>';
	}

	function change_status($id_pengguna)
	{
		$data_pengguna = $this->UserModel->getUserId($id_pengguna)->row();
		$data_pengguna->status == '1' ? $data = ['status' => '0'] : $data = ['status' => '1'];
		if ($this->UserModel->changeUser($data, $id_pengguna)) {
			// Jika berhasil ubah status
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Pengguna Berhasil Ditambahkan');
		} else {
			// Jika gagal ubah status
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Pengguna Gagal Ditambahkan');
		}
		echo '<script>history.go(-1)</script>';
	}

	function reset_password($id_pengguna)
	{
		$data_pengguna = $this->UserModel->getUserId($id_pengguna)->row();

		if ($data_pengguna->id_jabatan == '1') {
			$data = ['password' => password_hash('superadmin#' . $data_pengguna->username, PASSWORD_BCRYPT)];
		} else if ($data_pengguna->id_jabatan == '2') {
			$data = ['password' => password_hash('ketua#' . $data_pengguna->username, PASSWORD_BCRYPT)];
		} else if ($data_pengguna->id_jabatan == '3') {
			$data = ['password' => password_hash('wakilketua#' . $data_pengguna->username, PASSWORD_BCRYPT)];
		} else if ($data_pengguna->id_jabatan == '4') {
			$data = ['password' => password_hash('sekretaris#' . $data_pengguna->username, PASSWORD_BCRYPT)];
		} else if ($data_pengguna->id_jabatan == '5') {
			$data = ['password' => password_hash('bendahara#' . $data_pengguna->username, PASSWORD_BCRYPT)];
		} else if ($data_pengguna->id_jabatan == '6') {
			$data = ['password' => password_hash('anggota#' . $data_pengguna->username, PASSWORD_BCRYPT)];
		}

		if ($this->UserModel->changeUser($data, $id_pengguna)) {
			// Jika berhasil ubah status
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Password Berhasil Direset');
		} else {
			// Jika gagal ubah status
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Password Gagal Direset');
		}
		echo '<script>history.go(-1)</script>';
	}

	function delete_user($id_pengguna)
	{
		$cari_pengguna = $this->UserModel->getUserId($id_pengguna)->row();
		if ($this->UserModel->deleteUser($id_pengguna)) {
			// Jika berhasil hapus pengguna
			if ($cari_pengguna->foto != 'default.jpg') {
				unlink('./assets/img/users/' . $cari_pengguna->foto);
			}
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Pengguna Berhasil Dihapus');
		} else {
			// Jika gagal hapus pengguna
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Pengguna Gagal Dihapus');
		}
		echo '<script>history.go(-1)</script>';
	}

	function upload_foto($id_pengguna)
	{
		$cari_pengguna = $this->UserModel->getUserId($id_pengguna)->row();
		if ($_FILES['foto']['name']) {
			$config['upload_path']          = './assets/img/users/';
			$config['allowed_types']        = 'jpeg|jpg|png';
			$config['max_size']             = 2048;
			$config['encrypt_name']			= TRUE;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('notif', 'gagal');
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				echo '<script>history.go(-1)</script>';
			} else {
				if ($cari_pengguna->foto != 'default.jpg') {
					unlink('./assets/img/users/' . $cari_pengguna->foto);
				}
				$dataUpload = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/users/' . $dataUpload['file_name'];
				$config['width'] = 300;
				$config['height'] = 300;
				$config['maintain_ratio'] = FALSE;
				$config['new_image'] = './assets/img/users/' . $dataUpload['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$dataFoto = ['foto' => $dataUpload['file_name']];
			}
		}

		if ($this->UserModel->changeUser($dataFoto, $id_pengguna)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', "Berhasil mengubah foto profile.");
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', "Gagal mengubah foto profile.");
		}
		echo '<script>history.go(-1)</script>';
	}
}
