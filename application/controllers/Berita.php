<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('BeritaModel');
    }

    function add_berita()
    {
        $data = [
            'judul_berita'  => $this->input->post('judul_berita', TRUE),
            'isi_berita'    => $this->input->post('isi_berita'),
            'id_user'       => $this->session->id,
            'publish_at'    => date('Y-m-d H:i:s')
        ];

        if ($_FILES['thumbnail_berita']['name']) {
            $config['upload_path']      = './assets/img/berita/';
            $config['allowed_types']    = 'jpeg|jpg|png';
            $config['max_size']         = 2048;
            $config['encrypt_name']     = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('thumbnail_berita')) {
                $this->session->set_flashdata('notif', 'gagal');
                $this->session->set_flashdata('pesan', $this->upload->display_errors());
                echo '<script>history.go(-1)</script>';
                return false;
            } else {
                $dataUpload = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/berita/' . $dataUpload['file_name'];
                $config['width'] = 1280;
                $config['height'] = 720;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = './assets/img/berita/' . $dataUpload['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $dataFoto = ['thumbnail' => $dataUpload['file_name']];
                $data = array_merge($data, $dataFoto);
            }
        }

        if ($this->BeritaModel->addBerita($data)) {
            $this->session->set_flashdata('notif', 'berhasil');
            $this->session->set_flashdata('pesan', "Berita Berhasil Dipubllikasi.");
        } else {
            $this->session->set_flashdata('notif', 'gagal');
            $this->session->set_flashdata('pesan', "Berita Gagal Dipublikasi.");
        }
        echo '<script>history.go(-2)</script>';
    }

    function change_berita($id_berita)
    {
        $data = [
            'judul_berita'  => $this->input->post('judul_berita', TRUE),
            'isi_berita'    => $this->input->post('isi_berita'),
            'id_user'       => $this->session->id,
            'publish_at'    => date('Y-m-d H:i:s')
        ];

        if ($_FILES['thumbnail_berita']['name']) {
            $config['upload_path']      = './assets/img/berita/';
            $config['allowed_types']    = 'jpeg|jpg|png';
            $config['max_size']         = 2048;
            $config['encrypt_name']     = TRUE;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('thumbnail_berita')) {
                $this->session->set_flashdata('notif', 'gagal');
                $this->session->set_flashdata('pesan', $this->upload->display_errors());
                echo '<script>history.go(-1)</script>';
                return false;
            } else {
                $dataUpload = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/berita/' . $dataUpload['file_name'];
                $config['width'] = 1280;
                $config['height'] = 720;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = './assets/img/berita/' . $dataUpload['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $dataFoto = ['thumbnail' => $dataUpload['file_name']];
                $data = array_merge($data, $dataFoto);
            }
        }

        if ($this->BeritaModel->changeBerita($data, $id_berita)) {
            $this->session->set_flashdata('notif', 'berhasil');
            $this->session->set_flashdata('pesan', "Berita Berhasil Diubah.");
        } else {
            $this->session->set_flashdata('notif', 'gagal');
            $this->session->set_flashdata('pesan', "Berita Gagal Diubah.");
        }
        echo '<script>history.go(-2)</script>';
    }

    function delete_berita($id_berita)
    {
        $cari_berita = $this->BeritaModel->getBeritaId($id_berita)->row();
        if ($this->BeritaModel->deleteBerita($id_berita)) {
            unlink('./assets/img/berita/' . $cari_berita->thumbnail);
            $this->session->set_flashdata('notif', 'berhasil');
            $this->session->set_flashdata('pesan', "Data Berita Berhasil Dihapus.");
        } else {
            $this->session->set_flashdata('notif', 'gagal');
            $this->session->set_flashdata('pesan', "Data Berita Gagal Dihapus.");
        }
        echo '<script>history.go(-1)</script>';
    }
}
