<?php

class Dashboard extends CI_Controller
{
    var $userloggedin;
    var $data = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_ListCase');
        $this->is_logged();

    }
    protected function is_logged()
    {
        # if not loggedin
        if (!$this->session->is_logged){
            redirect(base_url('auth/signin'));
        }
        $this->userloggedin = $this->session->id;
    }
    public function index()
    {
        if ($this->session->user_level == "members"){
            $layout = array(
            'title' => 'Form Update Case',
            'content'   => 'user/members_dashboard',
        );
        $this->load->view('user_template', $layout);
      }elseif ($this->session->user_level == "TLCHO"){
          $layout = array(
          'title' => 'Form Update Case',
          'content'   => 'user/TLCHO_dashboard',

      );
      $this->load->view('template_', $layout);

    }elseif ($this->session->user_level == "CHOMDN"){
        $layout = array(
        'title' => 'Form Update Case',
        'content'   => 'user/CHOMDN_dashboard',
    );
    $this->load->view('template_', $layout);

  }else{
            $layout = array(
                'title' => 'Selamat Datang ',
                'content'   => 'user/admin_dashboard',
            );
            $this->load->view('template_', $layout);

        }
    }
    public function account()
    {
        $layout = array(
            'title' => 'Setelan Akun',
            'content'   => 'user/user_setting'
        );
        $this->load->view('user_template'. $layout);
    }
    /*
     * User Management
     */

    public function profilesetting($userid=null)
    {
        $this->load->model('user_model','user');
        if (is_null($userid)){
            $userid = $this->userloggedin;
        }
        $params = array(
            'profile.user_id' => $userid,
        );
        $profile    = $this->user->user_profile($params);
        $layout = array(
            'title' => 'Ubah Detail Data Akun',
            'content'   => 'user/user_update',
            'data'  => $profile
        );
        $this->load->view('user_template', $layout);
    }
    public function profilesettingedit()
    {
        $this->load->model('user_model','user');
        $this->form_validation->set_rules('user_id', 'ID Pelanggan','required');
        $this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required');
        if ($this->form_validation->run()){
            $params = array(
                'user_id'   => $this->input->post('user_id'),
                'nama'  => $this->input->post('nama'),
                'alamat'    => $this->input->post('alamat'),
                'fakultas'  => $this->input->post('area'),
                'prodi' => $this->input->post('rayon')
            );
            $queryupdate    = $this->user->user_update($params, $this->input->post('kode'));
            if ($queryupdate){
                $this->session->set_flashdata('status_update', '<p class="alert alert-success">Data berhasil diperbaharui</p>');
                redirect(base_url('user/dashboard/profilesetting/'.$this->input->post('kode')));
            }else{
                $this->session->set_flashdata('status_update', '<p class="alert alert-danger">Terjadi Kesalahan. Data gagal diperbaharui</p>');
                redirect(base_url('user/dashboard/profilesetting/'.$this->input->post('kode')));
            }
        }else{
            $params = array(
                'profile.user_id'   => $this->input->post('kode')
            );
            $profile    = $this->user->user_profile($params);
            $layout = array(
                'title' => 'Ubah Detail Data Akun',
                'content'   => 'user/user_update',
                'data'  => $profile
            );
            $this->load->view('user_template', $layout);
        }
    }
    public function userdetail($userid=null)
    {
        $this->load->model('user_model','user');
        if (is_null($userid)){
            $userid = $this->userloggedin;
        }
        $params = array(
            'profile.user_id' => $userid,
        );
        $profile    = $this->user->user_profile($params);
        $layout = array(
            'title' => 'Setelan Akun',
            'content'   => 'user/user_setting',
            'data'  => $profile
        );
        $this->load->view('user_template', $layout);
    }
    public function listuser()
    {
        $draw   = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start  = $_REQUEST['start'];
        $search = $_REQUEST['search']["value"];

        $total  = $this->db->count_all_results("profile");
        $output = array();

        $output['draw'] = $draw;
        $output['recordsTotal'] = $output['recordsFiltered']    = $total;
        $output['data'] = array();

        if ($search != ""){
            $this->db->like("nama", $search);
            $this->db->or_like("profile.user_id", $search);
        }
        $this->db->select('*');
        $this->db->from('profile');
        $this->db->join('user', 'user.user_id = profile.user_id');
        $this->db->limit($length, $start);
        $this->db->order_by("nama", "DESC");
        #$query  = $this->db->get("profile");
        $query  = $this->db->get();
        if ($search != ""){
            $this->db->like("nama", $search);
            $this->db->or_like("profile.user_id", $search);
            $sum    = $this->db->get("profile");
            $output['recordsTotal'] = $output['recordsFiltered'] = $sum->num_rows();
        }
        foreach ($query->result() as $value){
            $output['data'][]   = array(
                $value->user_id,
                $value->nama,
                $value->username,
                $value->user_status==1?'<span class="label label-success">Active</span>':'<span class="label label-danger">Banned</span>',
                '<a class="btn btn-info btn-sm" href="'.base_url('user/dashboard/userdetail/'.$value->user_id).'"><i class="glyphicon glyphicon-eye-open"></i></a>'
            );
        }

        echo json_encode($output);
    }

    /*
     * My Account
     */
    public function accountsetting()
    {
        $params = array(
            'user_id'   => $this->userloggedin
        );
        $this->load->model('model_auth','auth');
        $data   = $this->auth->get_user($params);
        if ($data){
            $layout = array(
                'title' => 'Setting Account',
                'content'   => 'user/account_setting',
                'data'  => $data
            );
            $this->load->view('user_template', $layout);
        }
    }
    public function editcaseprocess()
    {
        $this->load->model('model_case', 'case');

        $this->form_validation->set_rules('id_case','ID CASE','required');
        // $this->form_validation->set_rules('MSISDN','MSISDN','required');
        $this->form_validation->set_rules('nama_agent','Nama Agent','required');
        // $this->form_validation->set_rules('nama_TL','Nama TL(Pengawakan)','required');
        $this->form_validation->set_rules('alasan_update','Alasan Update','required');
        $this->form_validation->set_rules('notes_update','Notes Update','required');
        if ($this->form_validation->run()){
            $params = array(
                'id_case' => $this->input->post('id_case'),
                // 'MSISDN'   => $this->input->post('MSISDN'),
                'nama_agent' => $this->input->post('nama_agent'),
                // 'nama_TL' => $this->input->post('nama_TL'),
                'alasan_update' => $this->input->post('alasan_update'),
                'notes_update' => $this->input->post('notes_update')
            );
            $query  = $this->case->editcase($params, $this->input->post('id_case'));
            if ($query){
                $this->session->set_flashdata('status_create','<p class="alert alert-info">Berhasil mengubah kuesioner</p>');
                redirect(base_url('user/listcase/index/'.$this->input->post('id_case')));
            }else{
                $this->session->set_flashdata('status_create','<p class="alert alert-danger">Gagal mengubah kuesioner</p>');
                redirect(base_url('user/dashboard/editcase/'.$this->input->post('id_case')));
            }
        }else{
            redirect(base_url("user/listcase/index"));
        }
    }
    public function v_tampil(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Dokumen Rapat';
            $url_cetak = 'user/dokumenrapat/cetak';
            $dokumenrapat = $this->Model_ListCase->view_all(); // Panggil fungsi view_all yang ada di Model_ListCase
        }
        $this->load->model('m_data');
         if ($this->session->user_level == "members")
            $layout = array(
            'title' => 'Dokumentasi Rapat',
            'content'   => 'user/list_daftar_rapat_admin',
        // 'tabel_coba' => $this->Model_ListCase->view_d3ti()->result(),
        'agent' => $dokumenrapat,
        'ket' => $ket,
        'url_cetak' => base_url('index.php/'.$url_cetak),
        'option_tahun' => $this->Model_ListCase->option_tahun(),
        'anggota_program_studi' => $this->m_data->view_anggota_rapat()->result()
            // 'tabel_coba' => $this->m_data->view_d3ti()->result()
            // 'rapat_dokumentasi' => $this->m_data->tampil_data()->result()
        );
        else
           $layout = array(
            'title' => 'Dokumentasi Rapat',
            'content'   => 'user/v_tampil',
            // 'notulen_rapat' => $this->m_data->view_notulen_rapat(),
            'anggota_program_studi' => $this->m_data->view_anggota_rapat()->result()
            // 'tabel_coba' => $this->m_data->view_d3ti()->result()
            // 'rapat_dokumentasi' => $this->m_data->tampil_data()->result()
        );
        $this->load->view("user_template", $layout);
    }
    function tambah(){
        $this->load->model('m_data');
        if ($this->session->user_level == "TLCHO")
                $layout = array(
                'content'   => 'user/list_file',
                'query'=>$this->db->get('agent')
            );
            else
               $layout = array(
                'title' =>'Form Case',
                'content'   => 'user/v_input',
                'query'=>$this->db->get('agent'),
                'users'=>$this->m_data->view_pengawakan()->result()
            );
            $this->load->view("user_template", $layout);
    }

    function tambah_aksi(){
          $this->load->model('m_data');
      		$id_case = $this->input->post('id_case');
      		$MSISDN = $this->input->post('MSISDN');
          $nama_agent = $this->input->post('nama_agent');
          $nama_TL = $this->input->post('nama_TL[]');

          $data_serialize = json_encode($nama_TL);

  		$data = array(
  			'id_case' => $id_case,
  			'MSISDN' => $MSISDN,
              'nama_agent' => $nama_agent,
              'nama_TL' => $data_serialize,
  			);
          $this->m_data->input_data($data,'agent');
          redirect('user/dashboard/');
      }

	function hapus($id){
        $this->load->model('m_data');
		$where = array('id' => $id);
		$this->m_data->hapus_anggota_rapat($where,'anggota_program_studi');
		redirect('user/dashboard/v_tampil');
	}

    public function create(){
         if ($this->session->level == "members"){
            $layout = array(
            'title' => 'Upload File',
            'error' => $this->upload->display_errors(),
            'content'   => 'user/list_file_user',
            'query'=>$this->db->get('file_case')
        );
        $this->load->view("user_template", $layout);
      }else{
           $layout = array(
            'title' => 'Upload File',
            'content'   => 'user/create',
            'error' => $this->upload->display_errors(),
            'query'=>$this->db->get('file_case')
        );
        $this->load->view("template_", $layout);
      }
    }

    public function uploadfile(){

        if($this->input->post('file_submit') && !empty($_FILES['file_upload']['name'])){
			$number_of_files = sizeof($_FILES['file_upload']['tmp_name']);
            $files = $_FILES['file_upload'];

			for($i = 0 ; $i<$number_of_files;$i++){
				if($_FILES['file_upload']['error'][$i]!=0){
					$this->form_validation->set_message('file_upload','Couldn\'t upload the files');
					return false;
				}
			}

			$config['upload_path']= FCPATH.'uploads/';
            $config['allowed_types']='doc|docx|jpg|jpeg|png|pdf|mp4|txt|xlsx|pptx|gif';

			for($i=0;$i<$number_of_files;$i++){
				$_FILES['file_upload']['name'] = $files['name'][$i];
				$_FILES['file_upload']['type'] = $files['type'][$i];
				$_FILES['file_upload']['tmp_name'] = $files['tmp_name'][$i];
				$_FILES['file_upload']['error'] = $files['error'][$i];
                $_FILES['file_upload']['size'] = $files['size'][$i];

				$this->upload->initialize($config);
				if($this->upload->do_upload('file_upload')){
                    $data = $this->upload->data();

					chmod($data['full_path'],0777);

					//inser to database
					$insert[$i]['file_name']=$data['file_name'];
                    $insert[$i]['file_size']=$data['file_size'];
                }
            }

            $this->db->insert_batch('file_case',$insert);
            $data=array(
                'query' => $this->db->get('file_case')
            );
            echo json_encode($output);
            redirect(base_url('user/dashboard/create',$data));
		        }
    }



    function delete_file($id){

        $this->db->where('file_ID',$id);
        $query = $this->db->get('file_case');
        $row = $query->row();

        unlink("./uploads/$row->file_name");

        $this->db->delete('file_case', array('file_ID' => $id));
        redirect(base_url('user/dashboard/create',$data));
   }

   public function editcase($id)
   {
       $this->load->model('model_case', 'case');
       $params = array(
           'id_case'   => $id
       );
       $data   = $this->case->getagent($params);
       $layout = array(
           'title' => 'Edit Case',
           'content'   => 'user/editcase',
           'data'  => $data
       );
       $this->load->view('template_', $layout);
   }

   public function selesai()
    {
        $this->load->model('Model_ListCase','case');
        $status = $this->input->get('olddata') == 1? 0:1;
        $idcase = $this->input->get('id_case');
        $params = array(
            'status' => $status
        );
        $data   = $this->case->case_selesai($params, $idcase);
        if ($data) {
            redirect(base_url('user/listcase/index/'.$idcase));
        } else {
            redirect(base_url('user/listcase/index/'.$idcase));
        }
    }
}
