<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PinjamanModel extends CI_Model
{
    function getPinjamanAll()
    {
        $this->db->select('id_pinjaman, nama_peminjam, jumlah_pinjaman, keterangan, tanggal_pinjaman, status_pinjaman, a.id_user as id_user, nama');
        $this->db->order_by('id_pinjaman', 'DESC');
        $this->db->join('tb_user b', 'a.id_user = b.id_user', 'inner');
        return $this->db->get('tb_pinjaman a');
    }

    function getPinjamanId($id_pinjaman)
    {
        $this->db->where('id_pinjaman', $id_pinjaman);
        $this->db->select('id_pinjaman, nama_peminjam, jumlah_pinjaman, keterangan, tanggal_pinjaman, status_pinjaman, a.id_user as id_user, nama');
        $this->db->order_by('id_pinjaman', 'DESC');
        $this->db->join('tb_user b', 'a.id_user = b.id_user', 'inner');
        return $this->db->get('tb_pinjaman a');
    }

    function jumlahPinjaman()
    {
        return $this->db->query("SELECT SUM(jumlah_pinjaman) as jumlah_pinjaman FROM tb_pinjaman WHERE status_pinjaman = '0'");
    }

    function ubahPinjaman($id_pinjaman, $data)
    {
        return $this->db->update('tb_pinjaman', $data, ['id_pinjaman' => $id_pinjaman]);
    }

    function addPinjaman($data)
    {
        return $this->db->insert('tb_pinjaman', $data);
    }
}
