<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!--
table:requisition
r_id auto incrment
date_of_requsition date
from_section varchar2 dropdown
subject text
to_whom varchar2 dropdown
forword_to varchar2 dropdown
dealing_section varchar2 dropdown
recieve_date date
status (Pending,Recieved) dropdown
supply_date date
remarks text

table:requisition_files
requisition_id foreign key of requisition table
filename varchar2

table:requistition_items
requisition_id foreign key of requisition table
item_id int
qty int

table:items
item_id autoincrment
item_name varchar2
-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>assets/images/favicon.png">
    <title><?=$this->title?></title>

    <!-- Bootstrap -->
    <link href="<?=base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url()?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=base_url()?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=base_url()?>assets/build/css/custom.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/build/css/mycss.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Damion&display=swap" rel="stylesheet">

    

    <style>
    .login
    {      
      background-image: url('<?=base_url()?>assets/images/bg.jpg');
    }
    

    .login_form
    {
      box-shadow: 1px 0 20px rgba(0,0,0,.08);
      border-radius:4px;     
      color:#000;
      padding:2% 12%;
      background: #D3CCE3;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #E9E4F0, #D3CCE3);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #E9E4F0, #D3CCE3); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    .damion{
        font-family: 'Damion', cursive;
      }

    </style>

    <script src="https://www.google.com/recaptcha/api.js?render=6LfRx6cZAAAAAC1nQadE104fLGoxZfxgOIOXErg2"></script>

  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
                  
          <h1 class="text-center"><?=$this->title?></h1>

          <section class="login_content">
            <form action="<?=base_url('Login/checklogin')?>" method="post">
                                <!-- CRSF -->
                                <?php 
                                $csrf = array(
                                        'name' => $this->security->get_csrf_token_name(),
                                        'hash' => $this->security->get_csrf_hash()
                                );
                                ?>
                                <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                                <!-- CRSF -->

              <h5>Please Login</h5>
              <div class="text-left">
                <input type="text" class="form-control" placeholder="Username" autocomplete="off" id="username" name="username" />
                <?php echo form_error('username'); ?>
              </div>
              
              <div class="text-left">
                <input type="password" class="form-control" placeholder="Password" autocomplete="off" id="password" name="password"/>
                <?php echo form_error('password'); ?>  
              </div>             
              

              <div class="clearfix"></div>
              <div class="col-xs-12 text-danger font-weight-bold">
                                       <?=$this->session->flashdata('errmsg')?>
                                    </div>

              <div class="text-right">
              <button type="submit" class="btn btn-success text-left btn-sm">Login</button>
              </div>  
              <div class="separator">
                
                <div class="clearfix"></div>
                <br />
                <div>
                
                  <h4 class="damion">
                  <img src="<?=base_url()?>assets/images/logo-icon.png" alt="logo" width=50 class="img-fluid" /> Scientific Wing, DD </h4>
                  <p>©2020 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

<script>

grecaptcha.ready(function() {
        grecaptcha.execute('6LfRx6cZAAAAAC1nQadE104fLGoxZfxgOIOXErg2', {action: 'homepage'}).then(function(token) {
            // console.log(token);
            document.getElementById("token").value = token;
        });
    });

</script>