<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

</head>

<body>

    <div id="wrapper">

         <?php $this->load->view('top-nav'); ?>
          <?php $this->load->view('sidebar');  ?> 
        
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <?php 

                    if (isset($reset))
                    { echo '<div class="alert alert-success">'.'<strong>'.$reset.'</strong>'; }
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo count($all_users)-1 ?></div>
                                    <div>Registered Employees</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url().'index.php' ?>/login/all_users">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo count($present_today) ?></div>
                                    <div>Present Today</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url().'index.php'?>/login/users_present">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <!-- <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> -->
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               
                </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <!-- <th>#</th> -->
                                                    <th>Date</th>
                                                    <th>Absent</th>
                                                    <th>Present</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             <?php foreach($present_each_day as $row){?>
                                                <tr>
                                               
                                                    <td><?php echo $row->my_date ?></td>
                                                    <td><?php echo count($all_users)-($row->count)-1 ?></td>
                                                    <td><?php echo $row->count  ?></td>
                                                 
                                                </tr>
                                                   <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->


                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="<?php echo base_url().'index.php'?>/login/users_present" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> 
                                    <?php echo count($present_today) ?> Punch In
                                   
                                </a>

                                <?php if(count($approval)):
                                { ?>
                                   <a href="<?php echo base_url().'index.php'?>/login/approve" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> <?php echo count($approval) ?> Account Approval Pending</a>
                                <?php } ?>
                              <?php else: { ?>
                                <div  class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> No Account Approval Pending</div>
                                  <?php }
                                  endif;

                                    ?> 

                                
                                <a href="<?php echo base_url().'index.php' ?>/login/all_users" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> <?php echo count($all_users)-1 ?> Registered Users
                                   
                                </a>
                                <div class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> 

                                     <?php
                                     if(count($punch_out)){
                                      echo count($punch_out)." Punch Out";
                                      }
                                    else{
                                      echo "No Punch Out Till Yet";
                                      }
                                          ?>                                    
                                </div>

                                 <?php if(count($message)):
                                { ?>
                                   <a href="<?php echo base_url().'index.php'?>/login/message_show" class="list-group-item">
                                    <i class="fa fa-chain-broken fa-fw"></i> <?php echo count($message) ?> Messages</a>
                                <?php } ?>
                              <?php else: { ?>
                                <div  class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> No Messages</div>
                                  <?php }
                                  endif;

                                    ?> 
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                
                            </div>
                            <!-- /.list-group -->
                            <!-- <a href="#" class="btn btn-default btn-block">View All Alerts</a> -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Pie Chart
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut1-chart"></div>
                            <!-- <a href="#" class="btn btn-default btn-block">View Details</a> -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
   

</body>

</html>

<script>

$(document).ready(function() {

    Morris.Donut({
        element: 'morris-donut1-chart',
        data: [{
            label: "Registered Users",
            value: "<?php echo count($all_users)-1 ?>"
        }, {
            label: "Present Users",
            value: "<?php echo count($present_today) ?>"
        }, {
            label: "Absent Users",
            value: "<?php echo (count($all_users) - count($present_today))-1 ?>"
        }],
        resize: true
    });

      


    Morris.Bar({
       element: 'morris-bar-chart',
        data: [
        <?php foreach($present_each_day as $row){ ?> 
        {
            y: "<?php echo $row->my_date ?>",
            a: "<?php echo ($row->count) ?>",
            b: "<?php echo (count($all_users))- ($row->count)-1 ?>"
        }, 
        <?php } ?>

        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Present', 'Absent'],
        hideHover: 'auto',
        resize: true
       

      
    });

   Morris.Area({
        element: 'morris-area-chart',
        data: [
        <?php foreach($present_each_day as $row){ ?> 
        {
            period: "<?php echo $row->my_date ?>",
            total: "<?php echo (count($all_users)-1) ?>",
            absent: "<?php echo (count($all_users))- ($row->count)-1 ?>",
            present: "<?php echo ($row->count) ?>"
        },
        <?php } ?>
       ],
        xkey: 'period',
        ykeys: ['total', 'absent', 'present'],
        labels: ['Total Users', 'Absent', 'Present'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });

});
</script>
