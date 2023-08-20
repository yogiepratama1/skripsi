<?php

class Pengaturan_model extends CI_Model
{
    private $table = 'pengaturan';

    public function get_tahun_ajaran()
    {
        $this->db->where('id', 'tahun-ajaran');
        return $this->db->get($this->table)->row();
    }
    
}
