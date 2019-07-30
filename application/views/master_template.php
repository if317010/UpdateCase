<!DOCTYPE html>
<html>
    <?php $this->load->view('template/header'); ?>
<body>
    <div id="wrap">
        <?php $this->load->view('template/navbar_page'); ?>
        <div class="container">
            <?php $this->load->view($content); ?>
        </div>
    </div>   
</body>
<?php $this->load->view('template/footer'); ?>
</html>