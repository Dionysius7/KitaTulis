<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function getall()
	{
        return $this->db->query("SELECT * FROM user");
    }

    public function getss($where)
	{
        //$this->db->insert("user",$data);
        $this->db->get("user");
        
    }

    public function insert($data)
	{
        //$this->db->insert("user",$data);
        $this->db->insert("user",$data);
        //$this->db->get_all
        
    }
    public function getData()
    {
        //Cara 1:
        //return $this->db->query('SELECT * FROM user');

        //Cara 2:
        return $this->db->get('User');
    }
    public function deleteData($deletedata)
    {
        $this->db->delete('user',$deletedata);
    }
    public function updateData($data,$where){
        $this->db->update('user',$data,$where);
    }

    public function loadData($where){
        return $this->db->get_where('user',$where);
    }

    
}
