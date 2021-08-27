<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    function getUserAll()
    {
        $this->db->order_by('nama', 'asc');
        $this->db->select('id_user, username, nama, alamat, jenis_kelamin, foto, status, tb_user.id_jabatan as id_jabatan, jabatan');
        $this->db->join('tb_jabatan', 'tb_user.id_jabatan = tb_jabatan.id_jabatan', 'inner');
        return $this->db->get('tb_user');
    }

    function getUser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('tb_user');
    }

    function getUserByIdJabatan($id_jabatan)
    {
        $this->db->select('nama');
        $this->db->order_by('id_user', 'desc');
        $this->db->where('id_jabatan', $id_jabatan);
        return $this->db->get('tb_user', 1);
    }

    function getUserId($id_user)
    {
        $this->db->select('id_user, username, nama, alamat, jenis_kelamin, foto, status, tb_user.id_jabatan as id_jabatan, jabatan');
        $this->db->where('tb_user.id_user', $id_user);
        $this->db->join('tb_jabatan', 'tb_user.id_jabatan = tb_jabatan.id_jabatan', 'inner');
        return $this->db->get('tb_user');
    }

    function changeUser($data, $id_user)
    {
        return $this->db->update('tb_user', $data, ['id_user' => $id_user]);
    }

    function addUser($data)
    {
        return $this->db->insert('tb_user', $data);
    }

    function deleteUser($id_user)
    {
        return $this->db->delete('tb_user', ['id_user' => $id_user]);
    }
}
