<!DOCTYPE html>
<html>
<?php $this->load->view('template/header'); ?>
<body>
<div id="wrap">
    <?php $this->load->view('template/user_navbar_page'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div style="box-shadow: -7px 7px 17px;" class="panel panel-success">
                    <div class="panel-heading">Menu Management</div>
                    <div class="list-group">
                        <a href="<?php echo base_url('user/dashboard/tambah'); ?>" class="list-group-item">Case</a>
                        <a href="<?php echo base_url('user/listcase/index'); ?>" class="list-group-item">List Case</a>

                    </div>
                </div>
               <div style="box-shadow: -7px 7px 17px;" class="panel panel-success">
                    <div class="list-group">
                        <a href="<?php echo base_url('auth/signout'); ?>" class="keluar list-group-item">Keluar</a>
                    </div>
                </div>
            </div>
            <div style="box-shadow: 7px 7px 17px;" class="col-sm-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php $this->load->view($content); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">

    </div>
</div>
<div class="clearfix"></div>

<script>
    // for delete
    $('a.keluar').confirm({
        title   : 'Konfirmasi',
        content : 'Apakah Anda Ingin Keluar ?',
        type: 'green',
        typeAnimated: true,
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
</body>
</html>
<?php $this->load->view('template/footer'); ?>
