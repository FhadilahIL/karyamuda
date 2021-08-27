<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->model('SuratModel');
	}

	function upload_template_surat()
	{
		$data = ['nama_surat' => $this->input->post('nama_surat', TRUE)];
		if ($_FILES['template_surat']['name']) {
			$config['upload_path']          = './assets/file/';
			$config['allowed_types']        = 'docx|doc';
			$config['file_name']        	= $data['nama_surat'];
			$config['max_size']             = 1024;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('template_surat')) {
				$this->session->set_flashdata('notif', 'gagal');
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				echo '<script>history.go(-1)</script>';
				return false;
			} else {
				$dataUpload = $this->upload->data();
				$dataSurat = array_merge($data, ['nama_template' => $dataUpload['file_name']]);
			}
		}

		if ($this->SuratModel->addTemplate($dataSurat)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', "Berhasil Upload Template Surat.");
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', "Gagal Upload Template Surat.");
		}
		echo '<script>history.go(-1)</script>';
	}

	function change_template_surat($id_template)
	{
		$data = ['nama_surat' => $this->input->post('nama_surat', TRUE)];

		if ($_FILES['template_surat']['name']) {
			$dataTamplate = $this->SuratModel->getTemplateById($id_template)->row();
			unlink('./assets/file/' . $dataTamplate->nama_template);
		}

		if ($_FILES['template_surat']['name']) {
			$config['upload_path']          = './assets/file/';
			$config['allowed_types']        = 'docx|doc';
			$config['file_name']        	= $data['nama_surat'];
			$config['max_size']             = 1024;

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('template_surat')) {
				$this->session->set_flashdata('notif', 'gagal');
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				echo '<script>history.go(-1)</script>';
				return false;
			} else {
				$dataUpload = $this->upload->data();
				$data = array_merge($data, ['nama_template' => $dataUpload['file_name']]);
			}
		}

		if ($this->SuratModel->changeTemplate($data, $id_template)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', "Berhasil Ubah Template Surat.");
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', "Gagal Ubah Template Surat.");
		}
		echo '<script>history.go(-1)</script>';
	}

	function delete_template_surat($id_template)
	{
		$cari_template = $this->SuratModel->getTemplateById($id_template)->row();
		if ($this->SuratModel->deleteTemplate($id_template)) {
			// Jika berhasil hapus pengguna
			unlink('./assets/file/' . $cari_template->nama_template);
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Template Surat Berhasil Dihapus');
		} else {
			// Jika gagal hapus pengguna
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Template Surat Gagal Dihapus');
		}
		echo '<script>history.go(-1)</script>';
	}

	function add_surat()
	{
		$data = [
			'no_surat' => $this->input->post('no_surat', TRUE),
			'keterangan_surat' => $this->input->post('keterangan_surat', TRUE),
			'tanggal_surat' => date('Y-m-d H:i:s'),
			'id_user'	=> $this->session->id
		];
		if ($this->SuratModel->addSurat($data)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Pengguna Berhasil Dihapus');
		} else {
			// Jika gagal hapus pengguna
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Pengguna Gagal Dihapus');
		}
		echo '<script>history.go(-1)</script>';
	}

	function change_surat($id_surat)
	{
		$data = [
			'no_surat' => $this->input->post('no_surat', TRUE),
			'keterangan_surat' => $this->input->post('keterangan_surat', TRUE),
			'tanggal_surat' => date('Y-m-d H:i:s'),
			'id_user'	=> $this->session->id
		];
		if ($this->SuratModel->changeSurat($data, $id_surat)) {
			// Jika berhasil ubah
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Pengguna Berhasil Diubah');
		} else {
			// Jika gagal ubah
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Pengguna Gagal Diubah');
		}
		echo '<script>history.go(-1)</script>';
	}

	function delete_surat($id_surat)
	{
		if ($this->SuratModel->deleteSurat($id_surat)) {
			$this->session->set_flashdata('notif', 'berhasil');
			$this->session->set_flashdata('pesan', 'Data Surat Berhasil Dihapus');
		} else {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Surat Gagal Dihapus');
		}
		echo '<script>history.go(-1)</script>';
	}

	function pengajuan_surat()
	{
		$ketua = $this->UserModel->getUserByIdJabatan(2)->row();
		$sekretaris = $this->UserModel->getUserByIdJabatan(4)->row();
		if (!$ketua || !$sekretaris) {
			$this->session->set_flashdata('notif', 'gagal');
			$this->session->set_flashdata('pesan', 'Data Ketua atau Sekretaris Tidak Ditemukan');
			echo '<script>history.go(-1)</script>';
			return false;
		}
		$tanggal_sekarang = explode('-', date('d-m-Y'));
		$pelaksanaan = explode('-', date('l-d-m-Y', strtotime($this->input->post('tanggal_pelaksanaan', TRUE))));
		$hari = [
			'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => "Jum'at", 'Saturday' => "Sabtu", 'Sunday' => "Minggu"
		];
		$bulan = [
			'01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => "Juli", '08' => "Agustus", '09' => "September", '10' => "Oktober", '11' => "November", '12' => "Desember"
		];
		$bulanRomawi = [
			'01' => 'I', '02' => 'II', '03' => 'III', '04' => 'IV', '05' => 'V', '06' => 'VI', '07' => "VII", '08' => "VIII", '09' => "IX", '10' => "X", '11' => "XI", '12' => "XII"
		];
		$tanggal_surat = $tanggal_sekarang[0] . ' ' . $bulan[$tanggal_sekarang[1]] . ' ' . $tanggal_sekarang[2];
		$tanggal_pelaksanaan = $hari[$pelaksanaan[0]] . ', ' . $pelaksanaan[1] . ' ' . $bulan[$pelaksanaan[2]] . ' ' . $pelaksanaan[3];
		$kode_surat = 'KTKM/' . $bulanRomawi[$tanggal_sekarang[1]] . '/' . $tanggal_sekarang[2];
		$data_surat = [
			'kode_surat'	 		=> $kode_surat,
			'perihal_surat' 		=> $this->input->post('perihal_surat', TRUE),
			'lampiran' 				=> $this->input->post('lampiran', TRUE),
			'tujuan_surat' 			=> $this->input->post('tujuan_surat', TRUE),
			'tanggal_pelaksanaan' 	=> $tanggal_pelaksanaan,
			'waktu_pelaksanaan' 	=> $this->input->post('waktu_pelaksanaan', TRUE),
			'tempat_pelaksanaan' 	=> $this->input->post('tempat_pelaksanaan', TRUE),
			'tanggal_surat' 		=> $tanggal_surat,
			'nama_ketua' 			=> $ketua->nama,
			'nama_sekretaris'		=> $sekretaris->nama,
		];

		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(base_url('/assets/file/') . $this->input->post('nama_template'));
		$templateProcessor->setValues($data_surat);

		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . time() . ' - ' . $this->input->post('perihal_surat', TRUE) . '.docx"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');

		$templateProcessor->saveAs('php://output');
	}
}
