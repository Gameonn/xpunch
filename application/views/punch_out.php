  <!DOCTYPE html>
  <html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TPunch</title>
<style type="text/css">
  
  .m-l-10{
    margin-left: 10px;
  }
</style>
    <!-- Bootstrap Core CSS -->
    <!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>">
    <!-- Custom CSS -->
        <!-- <link href="css/agency.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/agency.css') ?>">
    <script src="<?php echo base_url('assets/js/jquery-1.11.0.js') ?>"></script>
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
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
                <li>
                   <a href="" class="page-scroll" data-toggle="modal" data-target="#message">Message  </a>
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
                <?php } ?>
                 <?php else:
                 { ?>
                 <li><?php echo anchor(base_url().'index.php'.'/login/signup','Signup','class=""');?></li>
                 <li>
                   <a href="" class="page-scroll" data-toggle="modal" data-target="#myModal1">Login  </a>
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
     <?php 

                    if (isset($exit))
                    { echo '<h3 class="">'.'<strong>'.$exit.'</strong>'.'</h1>'; }
                    ?>
     <!--  <h1 > You have punched out for the day. <br>
      </h1>

      <h1 > You account confirmation is pending. After your account is confirmed, login again. <br>
      </h1> -->
      <h4>For any help <a href="" data-toggle="modal" data-target="#contact" style="text-decoration:none;">contact </a> your admin or message to the admin </h4>   
      <!-- <a href="#myodal" role="button" data-target="#myodal" data-toggle="modal">Launch demo modal</a> -->
        </div>
      </div>
    </header>

   <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
   </body>
   </html>

<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Contact</h4>
      </div>
      <div class="modal-body">
       <h5 align="center">Admin Details</h5>
       <h6>Name: Ankit Jindal<br><br>
       Position: Manager<br><br>
       Contact: 9653783614
        </h6>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Message</h4>
      </div>
      <div class="modal-body">
          <div id="login_form">
          <?php $user=$this->session->userdata('username');
            $userid=$this->session->userdata('user_id');
           ?>
           <?php echo validation_errors('<p class="error">'); ?>
            <?php 

            echo form_open(base_url().'index.php'.'/login/msg');
            echo form_input('username',$user,'placeholder="Username" class="form-control" disabled="true"');
            echo form_hidden('userid', $userid);
            ?><br>
            <?php
            echo form_input('email','','placeholder="email" class="form-control"');
            echo "<br>";
            //echo form_textarea('message','','class="form-control"');
            //echo "<br>";
            ?>
            <label>Message</label>
                  <div class="radio">
              <label>
          <input type="radio" name="options" id="optionsRadios1" value="Approve Registration" checked>
         Approve registration. 
        </label>
      </div>
      <div class="radio">
        <label>
          <input type="radio" name="options" id="optionsRadios2" value="Reset Punch out">
         Reset punch out.
        </label>
      </div>
            <div class="modal-footer">
            <button type='button' class='btn btn-default btn-cons pull-right m-l-10' data-dismiss='modal'>Close</button> 
            <?php
            echo form_submit('submit','Submit','class="btn btn-default btn-cons pull-right"'); 
             
            echo form_close();

            ?>

          </div>
</div>
      </div>
     
    </div>
  </div>
</div>