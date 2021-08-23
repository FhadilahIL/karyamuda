<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JabatanModel extends CI_Model
{
    function getJabatanAll()
    {
        return $this->db->get('tb_jabatan');
    }
}
