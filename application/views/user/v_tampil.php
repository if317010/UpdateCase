
</form>
	<h1>Dokumentasi Rapat.</h1>
	<div class="col-sm-6 btn btn-default">
        <?php echo anchor('user/dashboard/tambah','Buat Rapat'); ?>
    </div>
	<div class="col-sm-6 btn btn-default">
	<?php echo anchor('user/dokumenrapat/index','Cetak Dokumen'); ?>
	</div>
<br><br>
	<h3 class="text">Data Semua Anggota Unit</h3>
 
 <table class="table table-dark myData">
	 <thead>
		 <tr class='bg-primary'>
			 <th>No</th>
			 <th>Nama</th>
			 <th>Jabatan</th>
			 <th>Unit Kerja</th>
			 <th>Inisial</th>
		 </tr>
	 </thead>
	 <tbody>
		 <!--Fetch data dari database-->
		 <?php $no=1; foreach ($anggota_program_studi as $row) :?>
		 <tr>
	<td class='bg-danger'><?= $no++?></td>
	<td><?=$row->nama_anggota ?></td>
	<td class='bg-success'><?= $row->jabatan?></td>
	<td class='bg-info'><?= $row->unit_kerja ?></td>
	<td class='bg-warning'><?= $row->inisial ?></td>
	</tr>
		 <?php endforeach; ?>
	 </tbody>
 </table>

  <script type="text/javascript">
	$(document).ready(function(){
		$('.myData').DataTable();
	});
</script>