<?php

class ListCase extends CI_Controller {
    var $userloggedin;
    var $data = array();

  public function __construct(){
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
        $this->userloggedin = $this->session->user_id;
    }

  public function index(){
            $ket = '';
            $url_cetak = 'user/listcase/cetak';
            $edit_case = 'user/listcase/editCase';
            $case = $this->Model_ListCase->view_all(); // Panggil fungsi view_all yang ada di Model_ListCase

if ($this->session->user_level == "members"){
$layout = array(
    'title' => 'Cetak Dokumen Rapat',
    'content'   => 'user/view',
    'agent' => $case,
    'ket' => $ket,
    'url_cetak' => base_url('index.php/'.$url_cetak),
);
$this->load->view("user_template", $layout);
}else if ($this->session->user_level == "CHOMDN"){
$layout = array(
    'title' => 'Cetak Dokumen Rapat',
    'content'   => 'user/view_spv',
    'agent' => $case,
    'ket' => $ket,
    'url_cetak' => base_url('index.php/'.$url_cetak),
);
$this->load->view("template_", $layout);
}else{
        $layout = array(
            'title' => 'Cetak Case',
            'content'   => 'user/view_',
            'agent' => $case,
            'ket' => $ket,
            'url_cetak' => base_url('index.php/'.$url_cetak),
            'edit_case' => $edit_case,

        );
        $this->load->view("template_", $layout);
      }

  }

  public function cetak(){
        $ket = 'Semua Data Dokumen Rapat';
        $case = $this->Model_ListCase->cetak_by_id($this->session->id_case); // Panggil fungsi cetak_by_id yang ada di Model_ListCase

        $data['ket'] = $ket;
        $data['agent'] = $case;

        $data = array(
            'ket' => $ket,
            'agent' => $case
            // 'tabel_coba' =>$this->Model_ListCase->view_d3ti()->result()
        );

    ob_start();
    $data['agent'] = $this->Model_ListCase->cetak_by_id(1);
    $this->load->view('user/print', $data);
    $html = ob_get_contents();
        ob_end_clean();

        require_once('assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('FormUpdateCase.pdf', 'D');
  }

  public function editCase(){
    if ($this->session->level == "TLCHO"){
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
}
