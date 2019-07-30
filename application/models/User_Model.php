<?php

class User_Model extends CI_Model
{
    var $tablename;
    var $tableaccount;
    public function __construct()
    {
        parent::__construct();
        $this->tablename    = "profile";
        $this->tableaccount = "user";
    }
    /*
     * Get Detail User Profile
     */
    public function user_profile($data = array())
    {
        $this->db->select('*');
        $this->db->from($this->tablename);
        $this->db->join('user', 'user.user_id = profile.user_id','LEFT');
        $this->db->where($data);
        $query  = $this->db->get();

        return $query->row();
    }

    public function user_update($data = array(), $olddata)
    {
        $this->db->where('user_id', $olddata);
        $query = $this->db->update($this->tablename, $data);
        return $query;
    }

    public function user_banned($data = array(), $olddata) {
        $this->db->where('user_id', $olddata);
        $query = $this->db->update($this->tableaccount, $data);
        return $query;
    }

    public function user_create($data = array())
    {
        if ($data['level']=='admin'){
            $paramsuser = array(
                'user_id'   => $data['username'],
                'username'  => $data['username'],
                'password'  => md5($data['username']),
                'user_level'    => $data['level']
            );
            $queryuser  = $this->db->insert('user', $paramsuser);
            if ($queryuser)
                return true;
            else
                return false;
        }else{
            $paramsuser = array(
                'id'   => $data['username'],
                'username'  => $data['username'],
                'password'  => md5($data['username']),
                'user_level'    => $data['level']
            );
            $queryuser  = $this->db->insert('users', $paramsuser);
            $paramprofile   = array(
                'id'   => $data['username'],
                'full_name'  => 'full_name',
                'alamat'    => '-'
            );
            $queryprofile   = $this->db->insert($this->tablename, $paramprofile);
            if ($queryprofile && $queryuser){
                return true;
            }else{
                return false;
            }
        }
    }
}
