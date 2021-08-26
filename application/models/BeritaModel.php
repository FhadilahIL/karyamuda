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

    function getBeritaId($id_berita)
    {
        $this->db->select('id_berita, judul_berita, thumbnail, isi_berita, publish_at, a.id_user as id_user, nama');
        $this->db->where('id_berita', $id_berita);
        $this->db->join('tb_user b', 'a.id_user = b.id_user', 'inner');
        return $this->db->get('tb_berita a');
    }

    function addBerita($data)
    {
        return $this->db->insert('tb_berita', $data);
    }

    function changeBerita($data, $id_berita)
    {
        return $this->db->update('tb_berita', $data, ['id_berita' => $id_berita]);
    }

    function deleteBerita($id_berita)
    {
        return $this->db->delete('tb_berita', ['id_berita' => $id_berita]);
    }
}
