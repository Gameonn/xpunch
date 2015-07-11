      <div class="row">
                <div class="col-lg-12">
                    <?php 

                    if (isset($reset))
                    { echo '<div class="alert alert-success">'.'<strong>'.$reset.'</strong>'; }
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
   <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Change Password</h3>
                    </div>
                    <div class="panel-body">
                          <?php 
   
   echo form_open('login/password');
   $user=$this->session->userdata('username');
   echo form_input('username',$user,'placeholder="Username" class="form-control" disabled="true"');?><br>
   <?php
   echo form_password('password','','placeholder="Old Password" class="form-control"');?><br>
   <?php  echo form_password('password_new','','placeholder="New Password" class="form-control"');?><br>
   <?php  echo form_password('password_confirm','','placeholder="Confirm Password" class="form-control"');?><br>
   <?php
   echo form_submit('submit','Submit','class="btn btn-primary btn-cons"');?>&nbsp; &nbsp;
   <?php
   echo anchor('login','Home','class="btn btn-primary btn-cons"');
   echo form_close();
    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
