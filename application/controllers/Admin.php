<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $data['title'] = 'Admin';
        if (date('H') >= 0 && date('H') < 10) {
            $data['ucapan'] = 'Pagi';
        } else if (date('H') > 10 && date('H') < 15) {
            $data['ucapan'] = 'Siang';
        } else if (date('H') > 15 && date('H') < 20) {
            $data['ucapan'] = 'Sore';
        } else if (date('H') > 20 && date('H') < 24) {
            $data['ucapan'] = 'Malam';
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('ketuaWakil/index');
        $this->load->view('templates/footer');
    }
}
