<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('SettingsModel');
		$this->settings = $this->SettingsModel->getSettings()->row();
	}

	function index()
	{
		$data['title'] = 'Beranda';
		$data['settings'] = $this->settings;

		$this->load->view('home/index', $data);
	}
}
