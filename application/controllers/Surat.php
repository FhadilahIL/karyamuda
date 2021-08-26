<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
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

		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(base_url('/assets/file/template_surat_undangan.docx'));
		$templateProcessor->setValues($data_surat);

		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="' . time() . ' - ' . $this->input->post('perihal_surat', TRUE) . '.docx"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		header('Content-Transfer-Encoding: binary');

		$templateProcessor->saveAs('php://output');
	}
}
