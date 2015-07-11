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