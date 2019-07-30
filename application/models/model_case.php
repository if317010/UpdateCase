<?php

class model_case extends CI_Model
{
    var $agent;
    // var $id_case;
    // var $MSISDN;
    // var $nama_agent;
    // var $nama_TL;
    // var $alasan_update;
    // var $notes_update;
    // var $assessed;
    public function __construct()
    {
        parent::__construct();

        $this->agent   = "agent";
        // $this->id_case    = "id_case";
        // $this->MSISDN = "MSISDN";
        // $this->nama_agent   = "nama_agent";
        // $this->nama_TL  = "nama_TL";
        // $this->alasan_update = "alasan_update";
        // $this->notes_update = "notes_update";
          }
    public function editcase($data = array(), $id)
    {
        $this->db->where('id_case', $id);
        $query  = $this->db->update($this->agent, $data);
        return $query;
    }

    public function getagent($data = array())
    {
        $this->db->where($data);
        $query  = $this->db->get($this->agent);
        return $query->row();
    }
}
