<?php	echo form_open_multipart('user/dashboard/uploadfile'); ?>

   <?php
   echo form_upload(array(
     'multiple'=>'',
     'name'=>'file_upload[]',
     'class' => 'btn btn-outline-warning btn-rounded waves-effect btn-lg float-left',
     'required'=>''
   ));
   echo form_error('file_upload');
   echo "&nbsp;&nbsp;&nbsp;&nbsp;";
   echo form_submit(array(
     'name'=>'file_submit',
     'value'=>'Upload File',
     'class' => 'btn btn-outline-warning btn-danger waves-effect btn-lg float-left'
   ));
 ?>

  <?php echo form_close(); ?>

   <h1><strong>Case Update</strong></h1>

   <table class="table table-dark myData">
       <thead>
           <tr class='bg-primary'>
               <th>No</th>
               <th>Nama File</th>
               <th>Tanggal</th>
       <th>Action</th>
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
         <td><?php echo anchor('user/dashboard/delete_file/'.$row->file_ID,'Hapus'); ?>		</td>
               </tr>
           <?php endforeach; ?>
       </tbody>
   </table>

<!--Load file bootstrap.js-->
<script type="text/javascript">
 $(document).ready(function(){
   $('.myData').DataTable();
 });
</script>
