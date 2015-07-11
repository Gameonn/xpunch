    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Messages</title>

    </head>

    <body>

        <div id="wrapper">

          <?php $this->load->view('top-nav'); ?>
          <?php $this->load->view('sidebar');  ?>   
                <!-- /.navbar-static-side -->
           

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <h1 class="page-header">Tables</h1> -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Messages
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <?php foreach ($message as $row) 
                                           {
                                 
                                  	  		// $re=$m/86400%7;
                                  	  		 ?>
                                      
                                           
                            <div class="alert alert-success">
                                <?php  echo $row->username. " ". $row->message; ?>
                             
                                
                            </div>
                            <?php

                                        } ?>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


</body>

</html>

