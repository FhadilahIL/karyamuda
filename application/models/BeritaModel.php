<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BeritaModel extends CI_Model
{
    function getBeritaAll()
    {
        $this->db->select('id_berita, judul_berita, thumbnail, publish_at, a.id_user as id_user, nama');
        $this->db->join('tb_user b', 'a.id_user = b.id_user', 'inner');
        return $this->db->get('tb_berita a');
    }

    function getBeritaId($id_user)
    {
        $this->db->select('id_berita, judul_berita, thumbnail, isi_berita, publish_at, a.id_user as id_user, nama');
        $this->db->where('a.id_user', $id_user);
        $this->db->join('tb_user b', 'a.id_user = b.id_user', 'inner');
        return $this->db->get('tb_berita');
    }
}
