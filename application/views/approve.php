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
                                <h4 align="center">APPROVE EMPLOYEES</h4>
                            </div>
                            <!-- /.panel-heading -->
                            
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                           <?php foreach ($query as $row) 
                                           {
                                              ?>
                                              <tr class="gradeA">
                                                <td><?php  echo $row->username; ?></td>
                                                <td><?php echo $row->first_name; ?> </td>
                                                <td> <?php echo $row->last_name; ?> </td>
                                                <td><?php echo $row->email; ?> </td>
                                                <!--<?//php echo $row->status; ?>
                                                        onclick="approval('<?//php echo $row->id; ?>')" -->
                                                 <td> <a href="<?php echo base_url().'index.php' ?>/login/awaited/<?php echo $row->id; ?> " class="btn btn-primary btn-sm fa fa-bars" 
                                                 >  Approve</a></td>
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
</body>

</html>

<script>
function approval(value){
    var id=value;
    var link = '<?php echo base_url(); ?>index.php/login/approval_awaited';
    alert(link);
$.ajax({
 type: 'POST',
 url: link, 
 data: 'id='+id, 
 success: function(resp) { 
 alert('fsd');
alert(id);
alert(resp);
 $('#'.id).attr('disabled',true);
 }
 });
return false;
    

}

</script>