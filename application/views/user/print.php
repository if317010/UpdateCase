<html>
<head>
  <title>Cetak PDF</title>
  <title><?php echo $title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap.min.css'); ?>">
<!--    <link rel="stylesheet" href="--><?php //echo base_url('assets/font-awesome.min.css'); ?><!--">-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url('assets/styles.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/dataTables.bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/jquery.dataTables.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-confirm.min.css'); ?>">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/jamaahicon.png'); ?>">
    <script src="<?php echo base_url('assets/jquery-1.12.4.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dataTables.bootstrap.min.js'); ?>"></script>
<!--    <script src="--><?php //echo base_url('assets/bootstrap.min.js'); ?><!--"></script>-->
    <script src="<?php echo base_url('assets/Chart.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('assets/Chart.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/Chart.js'); ?>"></script>
    <script src="<?php echo base_url('assets/Chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jquery-confirm.min.js'); ?>"></script>

    <style>
    .table1,.table2 {

    border-collapse: collapse;
    width: 50%;
    border: 1px solid #f2f5f7;
}

.table1,.table2, tr th{
    font-weight: normal;
}

.table1,.table2, th, td,h4 {
    padding: 8px 20px;
    text-align: left;
}

.table1,.table2, tr:hover {
}

.table1,.table2 tr:nth-child(even) {
}
.hide-text {
  text-indent: -9999em;
  outline: 0;
  overflow: hidden;
  position: absolute;
}

    </style>
</head>
<body>
    <div class="container-fluid">
      <div class="row">
    <table class="table1">
    <tr>
      <th> <img width="80px;margin-right:50px;" src="images/infomedia.png" class="images">
      </th>
      <th></th>
      <th> <h1 align="center" style="margin-right:140px;">Form Update Case</h1>
          <h1 align="center" style="margin-top:20px;">infomedia</h1></th>
    </tr>
    </table>
        <div class="col-sm-6">
        </div>
      </div>
    <table class="table table-dark">
      <tr>
        <td>ID CASE</td>
        <td>:</td>
          <td>
            <?php
            if( ! empty($agent)){
              $no = 1;
              foreach($agent as $data){
              }
              echo $data->id_case;
            }
          ?>
      </td>
    </tr>
    <tr>
      <td>MSISDN</td>
      <td>:</td>
        <td>
          <?php
          if( ! empty($agent)){
            $no = 1;
            foreach($agent as $data){
            }
            echo $data->MSISDN;
          }
        ?>
      </td>
    </tr>
    <tr>
      <td>Nama Agent</td>
      <td>:</td>
        <td>
          <?php
          if( ! empty($agent)){
            $no = 1;
            foreach($agent as $data){
            }
            echo $data->nama_agent;
          }
        ?>
        </td>
    </tr>
    <tr>
      <td>Nama TL(Pengawakan)</td>
      <td>:</td>
        <td>
          <?php
          if( ! empty($agent)){
            $no = 1;
            foreach($agent as $data){
            }
            echo $data->nama_TL;
          }
        ?>
        </td>
    </tr>
    <tr>
      <td>Alasan Update</td>
      <td>:</td>
        <td>
          <?php
          if( ! empty($agent)){
            $no = 1;
            foreach($agent as $data){
            }
            echo $data->alasan_update;
          }
        ?>
        </td>
    </tr>
    <tr>
      <td>Notes Update</td>
      <td>:</td>
        <td>
          <?php
          if( ! empty($agent)){
            $no = 1;
            foreach($agent as $data){
            }
            echo $data->notes_update;
          }
        ?>
        </td>
    </tr>
      </table>
  <table class="table2">
    <tr>
      <th> </th>
      <th> </th>
      <th> </th>
      <th> </th>
      <th> </th>
    </tr>
    <tr>
      <td>Mengetahui,</td>
      <td><h1 class="hide-text"></h1></td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td>..........,......... 20.....
        <!-- <?php
            if( ! empty($rapat_dokumentasi)){
              $no = 1;
              foreach($rapat_dokumentasi as $data){

              }
              echo namahari($data->tanggal);
              echo $data->tanggal;
            }
            ?> -->
      </td>
    </tr>
    <tr>
      <td style="text-align:center;">SPV Complaint Handling CCMDN</td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td style="text-align:center;">PIC Tiket</td>
    </tr>
    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
    </tr>
    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
    </tr>
    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
    </tr>
    <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
    </tr>
    <tr>
            <td style="text-align:center;">
              ...................................
              <!-- <?php
            if( ! empty($rapat_dokumentasi)){
              $no = 1;
              foreach($rapat_dokumentasi as $data){

              }
              echo $data->sekretaris_rapat;
            }
          ?> -->
        </td>

      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>



            <td>
              ...................................
            <!-- <?php
            if( ! empty($rapat_dokumentasi)){
              $no = 1;
              foreach($rapat_dokumentasi as $data){

              }
              echo $data->ketua_rapat;
            }
          ?> -->
            </td>
    </tr>
  </table>

<table>
  <tr>
    <td>
    <p>SUP.MDN.TSEL.03.01.Rev.02 / 08-03-2017</p>
    </td>
  </tr>
  </table>
  </div>
  <br>
  <br>
</body>
</html>
