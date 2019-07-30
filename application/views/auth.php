<style>
body{
    background-repeat:no-repeat;
    background-size:cover;
    }
html,body{
    position: relative;
    height: 100%;
}

.login-container{
    position: relative;
    width: 600px;
    margin: 80px auto;
    padding: 20px 40px 40px;
    text-align: center;
    background: #fff;
    border: 1px solid #ccc;
}

#output{
    position: absolute;
    width: 300px;
    top: -75px;
    left: 0;
    color: #fff;
}

#output.alert-success{
    background: rgb(206, 255, 174);
}

#output.alert-danger{
    background: rgb(228, 105, 105);
}


.login-container::before,.login-container::after{
    content: "";
    position: absolute;
    width: 100%;height: 100%;
    top: 3.5px;left: 0;
    background: #fff;
    z-index: -1;
    -webkit-transform: rotateZ(4deg);
    -moz-transform: rotateZ(4deg);
    -ms-transform: rotateZ(4deg);
    border: 1px solid #ccc;

}

.login-container::after{
    top: 5px;
    z-index: -2;
    -webkit-transform: rotateZ(-2deg);
     -moz-transform: rotateZ(-2deg);
      -ms-transform: rotateZ(-2deg);

}

.form-box input{
    width: 100%;
    padding: 10px;
    text-align: center;
    height:40px;
    border: 1px solid #ccc;;
    background: #fafafa;
    transition:0.2s ease-in-out;

}

.form-box input:focus{
    outline: 0;
    background: #eee;
}

.form-box input[type="text"]{
    border-radius: 5px 5px 0 0;
    text-transform: lowercase;
}

.form-box input[type="password"]{
    border-radius: 0 0 5px 5px;
    border-top: 0;
}

.form-box button.login{
    margin-top:15px;
    padding: 10px 20px;
}

.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

@-webkit-keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    -ms-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}

</style>

    <div class="container">
	<div style="box-shadow: -27px 27px 30px;" class="login-container">
            <div id="output"></div>
            <div class="text-center panel-heading"><strong><h2 style="color:lightblue;">LOGIN</strong></div>
            <div class="btn btn-primary btn-lg">

            <span class="glyphicon glyphicon-user glyphicon-lg"></span>

            </div>
            <div class="form-box">
            <?php
            echo validation_errors();
            if ($this->session->flashdata()){
                // echo '<p class="alert alert-danger">'.$this->session->flashdata('no_user').'</p>';

            ?>
                <p class="alert alert-danger"><?= $this->session->flashdata('no_user'); ?></p>
        <?php }?>
                <form action="<?php echo base_url('auth/signin_process'); ?>" method="post">
                <br>
                <label class="badge" for="username">Username</label>
                    <input name="username" type="text" class="form-control" placeholder="Username">
                <label class="badge" for="password">Password</label>
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <button class="btn btn-info btn-block login" type="submit">Login</button>
                </form>
            </div>
        </div>

</div>
