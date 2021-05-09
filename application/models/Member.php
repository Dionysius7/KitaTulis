<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Model
{

    public function insert($data)
    {
        $this->db->insert('user', $data);
    }
}
