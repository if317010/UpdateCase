<div class="panel panel-default">
    <div class="panel-body">
        <?php
        echo validation_errors();
        if ($this->session->flashdata()){
            echo $this->session->flashdata('status_create');
        }
        ?>
        <form action="<?php echo base_url('user/dashboard/editcaseprocess'); ?>" method="post">
            <div class="form-group">
                <label for="">ID Case</label>
                <input value="<?php echo $data->id_case; ?>" type="text" class="form-control input-sm" name="id_case">
            </div>
            <!-- <div class="form-group">
                <label for="">MSISDN</label>
                <input type="hidden" name="MSISDN" id="MSISDN" value="<?php echo $this->uri->segment(4); ?>">
                <input value="<?php echo $data->MSISDN; ?>" type="text" class="form-control input-sm" name="MSISDN">
            </div> -->
            <div class="form-group">
                <label for="">Nama Agent</label>
                <input type="hidden" name="nama_agent" id="nama_agent" value="<?php echo $this->uri->segment(4); ?>">
                <input value="<?php echo $data->nama_agent; ?>" type="text" class="form-control input-sm" name="nama_agent">
            </div>
            <!-- <div class="form-group">
                <label for="">Nama TL</label>
                <input type="hidden" name="nama_TL" id="nama_TL" value="<?php echo $this->uri->segment(4); ?>">
                <input value="<?php echo $data->nama_TL; ?>" type="text" class="form-control input-sm" name="nama_TL">
            </div> -->
            <div class="form-group">
                <label for="">Alasan Update</label>
                <input type="hidden" name="alasan_update" id="alasan_update" value="<?php echo $this->uri->segment(4); ?>">
                <input value="<?php echo $data->alasan_update; ?>" type="text" class="form-control input-sm" name="alasan_update">
            </div>
            <div class="form-group">
                <label for="">Note Update</label>
                <input type="hidden" name="notes_update" id="notes_update" value="<?php echo $this->uri->segment(4); ?>">
                <input value="<?php echo $data->notes_update; ?>" type="text" class="form-control input-sm" name="notes_update">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-success">Update Case</button>
                <a href="<?php echo base_url('user/listcase/index'); ?>" class="batal btn btn-sm btn-default">Batal</a>
            </div>
        </form>
    </div>
</div>
<script>
    // Batal
    $('a.batal').confirm({
        title   : 'Konfirmasi',
        content : 'Apakah Anda Yakin Untuk Batal Mengubah ?',
        buttons : {
            iya : function () {
                location.href   = this.$target.attr('href');
            },
            tidak   : function () {
                return;
            }
        }
    });
</script>
