<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css'); ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.ui.timepicker.css?v=0.3.3'); ?>" type="text/css" />

    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.8.2.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ui.timepicker.js?v=0.3.3'); ?>"></script>



<script src="<?php echo base_url('libs/jquery.multiple.select.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('libs/multiple-select.css'); ?>"/>
        <script>
			$(document).ready(function(){
				$('#demo3').multipleSelect({
					placeholder: "Pilih Nama",
					filter:true
				});
			});
		</script>
    <style>
	.btn_style{
		border: 1px solid #cecece;
		border-radius: 3px;
    float: right;
		padding: 3px 10px;
		box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
		color: white;
		background-color: red;

	}
	.btn_style:hover{
		border: 1px solid #b1b1b1;
		box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
	}
  .btn_style a{
    color: white;
  }
	</style>
</head>
<body>
	<h3 class="text-center">FORM UPDATE CASE</h3>

    <script type="text/javascript">
            $(document).ready(function() {
                $('#jam1').timepicker({
                    showPeriodLabels: false
                });
                $('#jam2').timepicker({
                    showPeriodLabels:false
                });
              });
    </script>
	<form action="<?php echo  base_url(). 'user/dashboard/tambah_aksi'; ?>" method="post">
		<table class="table table-dark">
			<tr>
				<td class="text-left">ID CASE</td>
				<td><input class="form-control input-sm" type="text" name="id_case">
        </td>
			</tr>
            <tr>
            <td>MSISDN</td>
				<td><input class="form-control input-sm" type="text" name="MSISDN"></td>
            </tr>
			<tr>

				<td>Nama Agent</td>
				<td><input class="form-control input-sm" type="text" name="nama_agent" value="<?php echo $this->session->username; ?>"></td>
			</tr>
      <tr>
				<td>Nama TL (Pengawakan)</td>
        <td><select name="nama_TL" multiple="multiple" id="demo3">
            <?php foreach($users as $list){ ?>
            <option value="<?php echo $list->full_name; ?>"><?php echo $list->full_name.'   ('.$list->id.')'; ?></option>
            <?php } ?></td>

            <option value="nama_TL"></option>

			</tr>
    <tr>
      <td>

      </td>
      <td>
        <td><input class="btn btn-success" type="submit" value="Kirim"></td>
      </td>
    </tr>

      <!-- <tr>
				<td>Alasan Update</td>
				<td><textarea class="form-control input-sm" type="text" name="sekretaris_rapat"></textarea></td>
			</tr>
      <tr>
				<td>Notes Update</td>
				<td><textarea class="form-control input-sm" type="text" name="sekretaris_rapat"></textarea></td>
			</tr>
      <tr>
        <td>Mengetahui,<br>
            SPV Complaint Handling CCMDN
            <br><br><br>
            ......................................
        </td>

        <td>
        ........,.......... 20....<br>
        PIC Ticket
        <br><br><br>
        ..........................................
        </td>

      </tr> -->

		</table>
	</form>
    <div class="copy hide">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="text" name="agenda_rapat[]" class="form-control" placeholder="Enter Name Here">
            <div class="input-group-btn">
              <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i>Hapus</button>
            </div>
          </div>
        </div>

        <script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){
          $(this).parents(".control-group").remove();
      });
    });
</script>
</body>
</html>
