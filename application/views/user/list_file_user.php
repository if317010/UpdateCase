    <h1><strong>Dokumen Rapat</strong></h1>

    <table class="table table-striped myData">
        <thead>
            <tr class="bg-primary">
                <th>No</th>
                <th>Nama File</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <!--Fetch data dari database-->
			<?php $data = $query->result();?>
            <?php $no=1; foreach ($data as $row) :?>
                <tr>
                    <td class='bg-danger'><?= $no++?></td>
                    <td><a href="<?= base_url('uploads/' . $row->file_name); ?>"><?= $row->file_name; ?></a></td>
                    <td class='bg-info'><?php echo $row->created_at; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.myData').DataTable();
	});
</script>
