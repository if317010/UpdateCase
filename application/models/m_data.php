<?php
class M_data extends CI_Model{
	function tampil_data(){
		$sql    = "SELECT * FROM agent ORDER BY tanggal ASC";
        $query  = $this->db->query($sql);
        return $query->result();

	}

	public function tampil_members(){
   return $this->db->get('users');
  }

	function input_data($data,$table){
		return $this->db->insert($table,$data);

	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function view_pengawakan(){
		return $this->db->get('users');
	}
}
