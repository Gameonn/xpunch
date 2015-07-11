  <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                               <a href="<?php echo base_url().'index.php' ?>">
                               <i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="<?php echo base_url().'index.php' ?>/login/all_users">Registered Employees</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url().'index.php'?>/login/users_present">Present Today</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a class="active" href="<?php echo base_url().'index.php'?>/login/notification"><i class="fa fa-table fa-fw"></i> Notifications</a>
                            </li>
                            <li>
                            <a href="" data-toggle="modal" data-target="#reset" class=""> 
                                <i class="fa fa-edit fa-fw"></i> Reset Punch Out</a>
                            </li>
                            <!-- <li>
                                <a href="<?//php echo base_url().'index.php'?>/login/signup"><i class="fa fa-user fa-fw"></i> Add User</a>
                                
                            </li> -->

                            
                            <li>
                                <a href="" data-toggle="modal" data-target="#delete"><i class="fa fa-bitbucket fa-fw"></i> Delete User</a>
                                
                            </li>
                             <li>
                                <a class="active" href="<?php echo base_url().'index.php'?>/login/approve"><i class="fa fa-thumbs-up fa-fw"></i> Approve User</a>
                                
               
                            </li>
                            <!-- <li> -->
                                <!-- <a class="active" href="<?//php echo base_url().'index.php'?>/login/timespan"><i class="fa fa-sitemap fa-fw"></i> Timespan</a></li> -->
                              
                                <!-- /.nav-second-level -->
                            
                         <!--       <li> <span class="fa fa-sitemap fa-fw" value="21" onclick="edit(21)"> Crmap
                                </span></li> -->
                            <li>
                                <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="blank.html">Blank Page</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Login Page</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>


<div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Reset Punch Out State</h4>
      </div>
      <div class="modal-body">
        
          <?php 
   
   echo form_open('login/reset');

   echo form_input('username','','placeholder="Username You Want to Reset" class="form-control"');?><br>
      </div>
      <div class="modal-footer">
       <?php
   echo form_submit('submit','Reset','class="btn btn-primary btn-cons"');?>&nbsp; &nbsp;
   <?php
   echo anchor('login','Cancel','class="btn btn-primary btn-cons"');
   echo form_close();
    ?>
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<!-- wish i could live this time forever
but i was lost in no time -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete User</h4>
      </div>
      <div class="modal-body">
        
          <?php 
   
   echo form_open('login/delete');

   echo form_input('username','','placeholder="Username You Want to Delete" class="form-control"');?><br>
   
  


      </div>
      <div class="modal-footer">
       <?php
   echo form_submit('submit','Delete','class="btn btn-primary btn-cons"');?>&nbsp; &nbsp;
   <?php
   echo anchor('login','Cancel','class="btn btn-primary btn-cons"');
   echo form_close();
    ?>
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script>

  function edit(value){
alert('fsds');
alert(value);
              $.ajax({

             type:'post',
             url:"<?php echo base_url().'index.php'?>/login/track",
             data: {value: value},
             success: function(msg){
                alert('fds');
                alert(msg);
             }
           });

          }
        </script>