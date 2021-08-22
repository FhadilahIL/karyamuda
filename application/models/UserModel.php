<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    function getUserAll()
    {
        $this->db->select('id_user, username, nama, alamat, jenis_kelamin, foto, status, tb_user.id_jabatan as id_jabatan, jabatan');
        $this->db->join('tb_jabatan', 'tb_user.id_jabatan = tb_jabatan.id_jabatan', 'inner');
        return $this->db->get('tb_user');
    }

    function getUser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('tb_user');
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
}
