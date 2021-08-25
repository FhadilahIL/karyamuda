<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingsModel extends CI_Model
{
    function getSettings()
    {
        return $this->db->get('tb_settings');
    }

    function updateSettings($data, $settings_id)
    {
        return $this->db->update('tb_settings', $data, ['settings_id' => $settings_id]);
    }
}
