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
<table class="table myData">
  <thead>
    <tr class='bg-primary'>
      <th>ID CASE</th>
      <!-- <th>MSISDN</th> -->
      <th>Nama Agent</th>
      <!-- <th>Nama TL(Pengawakan)</th> -->
      <th>Alasan Update</th>
      <th>Notes Update</th>
      <th>Aksi</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $no = 0;
        foreach ($agent as $row):
              $no++ ?>
      <tr>
        <td><?=$row->id_case ?></td>
                <td><?= $row->nama_agent ?></td>
                <td><?= $row->alasan_update ?></td>
                <td><?= $row->notes_update ?></td>
                <td><a class="print" href="<?php echo $url_cetak; ?>"><i class="glyphicon glyphicon-print"></i></a>
                  |
                  <a class="edit" href="<?php echo base_url("user/dashboard/editcase/".$row->id_case); ?>">
                      <i class="glyphicon glyphicon-edit"></i>
                  </a>
                  <br /><br /></td>

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
