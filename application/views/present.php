    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Registered Employees</title>

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
                                <h4 align="center">EMPLOYEES PRESENT TODAY</h4>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Name</th>
                                                <!-- <th>Last Name</th> -->
                                                <th>Email</th>
                                                <th> Punch Type</th>
                                                <th> Punch Time </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?//php print_r($query);?> 
                                         <?php foreach ($query as $row) 
                                           {
                                              ?>
                                              <tr class="gradeA">
                                                <td>
                                                <a href="" data-toggle="modal" data-target="#<?php echo $row->id ?>" class="">    
                                                <?php  echo $row->username; ?>
                                                </a>
                                                </td>
                                                <td><?php echo $row->first_name; ?> 
                                                <?php echo $row->last_name; ?> </td>
                                                <td><?php echo $row->email; ?> </td>
                                                <td> <?php echo $row->punch_type; ?></td>
                                                <td> <?php echo $row->punch_time; ?> </td>
                                                  <!-- <td> <a href="" data-toggle="modal" data-target="#details" class="btn btn-primary btn-sm fa fa-bars">  Details</a></td> -->
                                                </tr>
                                            <?php

                                        }



                                        ?>

                                    </tbody>
                                </table>
                            </div>
                    
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
  <?php foreach ($query as $row) 
    {
     ?>

<div class="modal fade" id="<?php echo $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Details</h4>
      </div>
      <div class="modal-body">
            <h5><?php echo $row->first_name; ?>
             <?php echo $row->last_name; ?> <br>
             <?php echo $row->email; ?> <br>
            <?php echo $row->punch_time; ?> <br>
             <?php echo $row->punch_type; ?> <br>
             </h5>
             
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<?php } ?>

</body>

</html>

