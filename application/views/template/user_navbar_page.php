
<nav class="navbar navbar-default">
    <div class="container">
   <div class="navbar-header">
        <img width="50px;" src="<?php echo base_url(); ?>images/infomedia.png">
    </div>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a style="color:darkblue;" class="navbar-brand" href="#"></kbd></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a style="color:darkblue;" href=""><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->username; ?></a></li>
            </ul>
        </div>
    </div>
</nav>
