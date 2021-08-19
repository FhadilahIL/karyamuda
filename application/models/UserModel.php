<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    function getUserAll()
    {
        return $this->db->get('tb_user');
    }

    function getUser($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('tb_user');
    }

    function getUserId($id)
    {
        $this->db->where('tb_user.id', $id);
        $this->db->join('tb_role', 'tb_user.role_id = tb_role.id', 'inner');
        return $this->db->get('tb_user');
    }
}
