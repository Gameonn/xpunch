  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Time Punch</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
    <!-- Custom CSS -->
        <!-- <link href="css/agency.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/agency.css') ?>">
 <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">
    <!-- Custom Fonts -->
    <!-- <link href="<?//php echo asset_url();?>font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
          <![endif]-->
<style type="text/css">
  .btn-primary {
color: #fff;
background-color: #428bca;
border-color: #357ebd;
}
</style>
        </head>

        <body id="page-top" class="index">

          <!-- Navigation -->
          <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a> -->
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li class="hidden">
                    <a href="#page-top"></a>
                  </li>

                  <li>
                    <a class="page-scroll" href="http://www.poplify.com">Poplify</a>
                  </li>
                  <li>
                    <?php echo anchor(base_url().'index.php','Home','class="page-scroll"');?>
                  </li>

                <?php  ?> 
                  <?php if($this->session->userdata('is_logged_in')):
                  { 
                    $user=$this->session->userdata["username"];
                     ?>
                   <li><a class="page-scroll" style="pointer-events: none;" >Welcome <?php echo $user; ?></a>
                   </li>
                    <li>
              <?php echo anchor(base_url().'index.php'.'/login/Logout','Logout','class=""');?></li>
               <li><a href="login/change"> Change Password</a>
                            </li>
                 <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="login/change"><i class="fa fa-eraser fa-fw"></i> Change Password</a>
                            </li>
                            <li class="divider"></li>
                            <li><?php echo anchor(base_url().'index.php'.'/login/Logout',' Logout ','class="fa fa-sign-out fa-fw"');?>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                <?php } ?>
                 <?php else:
                 { ?>
                 <li><?php echo anchor(base_url().'index.php'.'/login/signup','Signup','class=""');?></li>
                 <li>
                   <a href="" class="page-scroll" data-toggle="modal" data-target="#login">Login  </a>
                 </li>
                 <?php  }

                 ?>
               <?php endif; ?>
             </li>
            
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To Our Studio!</div>
          <div class="intro-heading">It's Nice To Meet You</div>
    
      <?php if((isset($username)) && ($username=='admin')): ?>
        <a href="<?php echo base_url().'index.php' ?>/login/all_users">All Users</a>
      <?php else: 
      {?>
          <?php if((isset($set)) && ($set=='1')): ?>
            <div class="page-scroll btn btn-primary" style="pointer-events:none;"><?php echo $time;?></div><br><br>
               <a href="<?php echo base_url().'index.php' ?>/login/punch_out" class="page-scroll btn btn-primary btn-lg" >Punch Out</a>
            <!-- target="_blank" -->
         <?//php echo $punch_time; ?>
         <?php elseif(((isset($set)) && ($set=='0'))||(isset($username))): ?>
             <a href="<?php echo base_url().'index.php' ?>/login/punch_in/<?php echo $flag=1; ?> " class="page-scroll btn btn-primary btn-lg">Punch In</a>
          <?php else: ?>
           <a href="" class="page-scroll btn btn-primary btn-lg" style="pointer-events:none;">Poplify Commands</a>
          <?php endif; ?>
          <?php } ?>
         <?php endif; ?>   
        </div>
      </div>
    </header>
  </body>
  </html>

  <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Xpunch</h4>
        </div>
        <div class="modal-body">
          <!-- <h3>Login with CodeIgniter</h3> -->
          <div id="login_form">
            <?php if (isset($account_created)){ ?>
            <h3> <?php echo $account_created; ?></h3>

            <?php } else { ?>
            <h1> Login Please </h1>

            <?php } ?>

            <?php echo validation_errors('<p class="error">'); ?>
            <?php 

            echo form_open(base_url().'index.php'.'/login/validate_credentials');
            echo form_input('username','','placeholder="Username" class="form-control" id="username"');?><br>
            <?php
            echo form_password('password','','placeholder="Password" class="form-control" id="password"');?><br>
            <?php
            echo form_submit('submit','Login','class="btn btn-primary btn-cons" id="submit"');?>  &nbsp; &nbsp;
            <?php
            echo anchor('login/signup','Create Account','class="btn btn-primary btn-cons"');
            echo form_close();
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script>

  // $('#submit').click(function(){

    // var form_data={
    //   username: $("#username").val(),
    //   password: $('#password').val(),
    // };
    // alert(form_data['username']);
    // // alert( form_data['password']);
    // $.ajax({

    //          type:'post',
    //          url:"<?//php echo base_url().'index.php'?>/login/track",
    //          data: form_data,
    //          success: function(msg){
    //             alert('fds');
    //             alert(msg);
    //          }
    //        });


  // });
  </script>