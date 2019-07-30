<?php
class Model_auth extends CI_Model {
    var $dbname;
    public function __construct()
    {
        parent::__construct();
        $this->dbname   = "users";
    }
    public function signin($data= array())
    {
        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);
        $query  = $this->db->get($this->dbname);
        return $query->row();
    }
    public function get_user($data = array())
    {
        $this->db->where($data);
        $query  = $this->db->get($this->dbname);
        return $query->row();
    }
    public function user_update($data = array())
    {
        $this->db->set('password', $data['newpassword']);
        $this->db->set('username', $data['username']);
        $this->db->where('id', $data['id']);
        $this->db->where('password', $data['password']);
        $query  = $this->db->update($this->dbname);
        return $query;
    }
}
