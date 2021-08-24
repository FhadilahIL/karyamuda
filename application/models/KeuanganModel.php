<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KeuanganModel extends CI_Model
{
    function getKeuanganAll()
    {
        $this->db->select('id_keuangan, jumlah, jenis_kas, keterangan, tanggal, a.id_user as id_user, nama');
        $this->db->order_by('id_keuangan', 'DESC');
        $this->db->join('tb_user b', 'a.id_user = b.id_user', 'inner');
        return $this->db->get('tb_keuangan a');
    }
    function jumlahSaldo()
    {
        return $this->db->query("SELECT SUM(IF(jenis_kas = 'M', + jumlah, - jumlah)) as saldo_akhir FROM tb_keuangan");
    }

    function getKeuanganId($id_keuangan)
    {
        $this->db->select('id_keuangan, jumlah, jenis_kas, keterangan, tanggal, a.id_user as id_user, nama');
        $this->db->where('a.id_keuangan', $id_keuangan);
        $this->db->join('tb_user b', 'a.id_user = b.id_user', 'inner');
        return $this->db->get('tb_keuangan a');
    }

    function addKeuangan($data)
    {
        return $this->db->insert('tb_keuangan', $data);
    }

    function deleteKeuangan($id_keuangan)
    {
        return $this->db->delete('tb_keuangan', ['id_keuangan' => $id_keuangan]);
    }

    function changeKeuangan($data, $id_keuangan)
    {
        return $this->db->update('tb_keuangan', $data, ['id_keuangan' => $id_keuangan]);
    }
}
