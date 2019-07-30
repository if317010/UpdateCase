<?php

class Model_ListCase extends CI_Model {

  var $tablename;
  var $case;
  public function __construct()
  {
      parent::__construct();
      $this->tablename    = "profile";
      $this->case = "agent";
  }

  function tampil_data(){
    $sql    = "SELECT * FROM agent ORDER BY id_case ASC";
        $query  = $this->db->query($sql);
        return $query->result();

  }
  public function view_all(){
    return $this->db->get('agent')->result(); // Tampilkan semua data ModelListCase
  }

  public function cetak_by_id($id)
  {
    $this->db->where('id_case',$id);
    return $this->db->get('agent')->result();
  }

  public function view_by_id($id=null)
  {
      $this->db->select('*');
      $this->db->from('agent');
      $this->db->join('users', 'users.id = agent.id', 'left');
      $query = $this->db->get();
      if($query->num_rows() != 0)
      {
          return $query->result_array();
      }
      else
      {
          return false;
      }
  }


  public function getmastercase($data = array())
  {
      $this->db->where($data);
      $query  = $this->db->get($this->kuesmaster);
      return $query->row();
  }
    function get_file_list($limit, $start){
      $query = $this->db->get('file_case', $limit, $start);
      return $query;
  }

    public function show_data(){
    $hasil = $this->db->query("SELECT * FROM agent");

    return $hasil;
    }
    public function case_selesai($data = array(), $olddata) {
        $this->db->where('id_case', $olddata);
        $query = $this->db->update($this->case, $data);
        return $query;
    }
}
