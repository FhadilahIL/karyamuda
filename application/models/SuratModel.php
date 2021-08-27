<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratModel extends CI_Model
{
    // Template
    function getTemplateAll()
    {
        $this->db->order_by('id_template_surat', 'desc');

        return $this->db->get('tb_template_surat');
    }

    function getTemplateById($id_template)
    {
        $this->db->where('id_template_surat', $id_template);
        return $this->db->get('tb_template_surat');
    }

    function addTemplate($data)
    {
        return $this->db->insert('tb_template_surat', $data);
    }

    function changeTemplate($data, $id_template)
    {
        return $this->db->update('tb_template_surat', $data, ['id_template_surat' => $id_template]);
    }

    function deleteTemplate($id_template)
    {
        return $this->db->delete('tb_template_surat', ['id_template_surat' => $id_template]);
    }

    // Surat
    function getSuratAll()
    {
        $this->db->order_by('id_surat', 'desc');
        return $this->db->get('tb_surat');
    }

    function addSurat($data)
    {
        return $this->db->insert('tb_surat', $data);
    }

    function changeSurat($data, $id_surat)
    {
        return $this->db->update('tb_surat', $data, ['id_surat' => $id_surat]);
    }

    function deleteSurat($id_surat)
    {
        return $this->db->delete('tb_surat', ['id_surat' => $id_surat]);
    }
}
