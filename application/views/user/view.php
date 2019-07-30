<html>
<head>
  <title>PDF</title>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css');   ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.ui.timepicker.css?v=0.3.3'); ?>" type="text/css" />

    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.8.2.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ui.timepicker.js?v=0.3.3'); ?>"></script>

</head>
<body>


    <h2>List Case</h2><hr>
<table class="table table-dark myData" cellpadding="8">
  <thead>
    <tr class='bg-primary'>
      <th>ID CASE</th>
      <th>MSISDN</th>
      <th>Nama Agent</th>
      <th>Nama TL(Pengawakan)</th>
      <th>Alasan Update</th>
      <th>Notes Update</th>
      <th>Aksi</th>
      <th>Status</th>


    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
        foreach ($agent as $row):
    ?>
      <tr>
                <td><?=$row->id_case ?></td>
                <td><?= $row->MSISDN ?></td>
                <td><?= $row->nama_agent ?></td>
                <td><?= $row->nama_TL ?></td>
                <td><?= $row->alasan_update ?></td>
                <td><?= $row->notes_update ?></td>
                <td><a class="btn btn-primary" href="<?php echo $url_cetak; ?>"><i class="glyphicon glyphicon-print"></i></a><br /><br /></td>
                <td><a class="" <?php
                if ($this->session->user_level != "TLCHO"){
              if ($row->status == 1) {
                  echo "<a href='".base_url("user/dashboard/selesai?olddata=1&id_case=".$row->id_case)."' class='btn btn-danger'>Selesai</a>";
              } else {
                  echo "<a href='".base_url("user/dashboard/selesai?olddata=0&id_case=".$row->id_case)."' class='btn btn-success'>Belum Selesai</a>";
                      }
                }
                            ?>
                </a></td>
      </tr>
    <?php endforeach; ?>
  <tbody>
</table>
<!--Load file bootstrap.js-->
<script type="text/javascript">
  $(document).ready(function(){
    $('.myData').DataTable();
  });
</script>
</body>
</html>
