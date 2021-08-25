<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('SettingsModel');
	}
	function ubah_data($settings_id)
	{
		$data = ['nama_kartun' => $this->input->post('nama_kartun', TRUE)];
		if ($this->SettingsModel->updateSettings($data, $settings_id)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Nama Karang Taruna Berhasil Diubah');
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Nama Karang Taruna Gagal Diubah');
		}
		redirect('superadmin/settings');
	}

	function upload_logo($settings_id)
	{
		if ($_FILES['logo']['name']) {
			$config['upload_path']		= './assets/img/settings/';
			$config['allowed_types']	= 'png';
			$config['max_size']			= 2048;
			$config['file_name']		= 'logo';
			$config['overwrite']		= TRUE;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('logo')) {
				$this->session->set_flashdata('notif', 'gagal');
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('superadmin/settings');
			} else {
				$dataUpload = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/settings/' . $dataUpload['file_name'];
				$config['width'] = 300;
				$config['height'] = 300;
				$config['maintain_ratio'] = FALSE;
				$config['new_image'] = './assets/img/settings/' . $dataUpload['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$data = ['logo_kartun' => $dataUpload['file_name']];
			}
		}
		if ($this->SettingsModel->updateSettings($data, $settings_id)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Upload Logo Berhasil Diubah');
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Upload Logo Taruna Gagal Diubah');
		}
		redirect('superadmin/settings');
	}

	function upload_logo_dashboard($settings_id)
	{
		if ($_FILES['logo_dashboard']['name']) {
			$config['upload_path']		= './assets/img/settings/';
			$config['allowed_types']	= 'png';
			$config['max_size']			= 2048;
			$config['file_name']		= 'logo-dashboard';
			$config['overwrite']		= TRUE;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('logo_dashboard')) {
				$this->session->set_flashdata('notif', 'gagal');
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('superadmin/settings');
			} else {
				$dataUpload = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/settings/' . $dataUpload['file_name'];
				$config['width'] = 1135;
				$config['height'] = 235;
				$config['maintain_ratio'] = FALSE;
				$config['new_image'] = './assets/img/settings/' . $dataUpload['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$data = ['logo_sidebar' => $dataUpload['file_name']];
			}
		}
		if ($this->SettingsModel->updateSettings($data, $settings_id)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Upload Logo Dashboard Berhasil Diubah');
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Upload Logo Dashboard Gagal Diubah');
		}
		redirect('superadmin/settings');
	}

	function upload_background_login($settings_id)
	{
		if ($_FILES['background_login']['name']) {
			$config['upload_path']		= './assets/img/settings/';
			$config['allowed_types']	= 'jpg';
			$config['max_size']			= 2048;
			$config['file_name']		= 'login';
			$config['overwrite']		= TRUE;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('background_login')) {
				$this->session->set_flashdata('notif', 'gagal');
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('superadmin/settings');
			} else {
				$dataUpload = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/img/settings/' . $dataUpload['file_name'];
				$config['width'] = 1920;
				$config['height'] = 1080;
				$config['maintain_ratio'] = FALSE;
				$config['new_image'] = './assets/img/settings/' . $dataUpload['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$data = ['background_login' => $dataUpload['file_name']];
			}
		}
		if ($this->SettingsModel->updateSettings($data, $settings_id)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Upload Background Login Berhasil Diubah');
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Upload Background Login Gagal Diubah');
		}
		redirect('superadmin/settings');
	}
}
