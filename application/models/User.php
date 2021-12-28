<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
    
    public $table ='users';
	public $id = 'id';
    
    public function getData($id) 
	{
		$this->db->where('name', $id);
		return $this->db->get('users')->row();
	}	
    
	public function get()
	{
		return $this->db->get('users');
	}	

    function cek_login($table,$where)
    {
		return $this->db->get_where($table,$where);
	}

    public function insert($data, $table)
    {
        return $this->db->insert($table, $data);
    }
	
	public function insertToken($tokens, $table)
	{
		$this->db->insert($table, $tokens);
	}

	public function authentication($email)
	{
		return $this->db->get_where('users', ['email' => $email])->row_array();
		
	}

	public function authToken($token)
	{
		return $this->db->get_where('tokens', ['token' => $token])->row_array();
	}
	
	public function transferPass($table, $data)
	{
		$this->db->set('password', $data['password']);
		$this->db->where('email', $data['email']);
		return $this->db->update($table);
	}

    public function delete($where,$table)	
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}