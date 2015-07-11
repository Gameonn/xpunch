 <!-- <div id="wrapper"> -->
 <!-- <?//php $this->load->view('includes/top'); ?> -->
       <!--   <?//php $this->load->view('top-nav'); ?> -->
       <!--    <?//php $this->load->view('sidebar');  ?> -->
<!-- <div id="page-wrapper"> -->
<div class="container">

<div class="page-header">
    <h1><small>Registration form </small></h1>
</div>

<!-- Registration form - START -->
<div class="container">
    <div class="row">
    <?php
         echo form_open_multipart("index.php".'/login/create_member'); ?>
            <div class="col-lg-6">
                <!-- <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div> -->
                <div class="form-group">
                    <label for="InputName">Enter First Name</label>
                    <div class="input-group">
                   <?php  echo form_input('first_name','','placeholder="First Name" class="form-control"'); ?>
                        <!-- <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required> -->
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputName">Enter Last Name</label>
                    <div class="input-group">
                   <?php  echo form_input('last_name','','placeholder="Last Name" class="form-control"'); ?>
                        <!-- <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required> -->
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Enter Email</label>
                    <div class="input-group">
                    <?php    echo form_input('email','','placeholder="email" class="form-control"');    ?>
                        <!-- <input type="email" class="form-control" id="InputEmailFirst" name="InputEmail" placeholder="Enter Email" required> -->
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="InputEmail">Enter Username</label>
                    <div class="input-group">
                   <?php echo form_input('username','','placeholder="username" class="form-control"'); ?>
                        <!-- <input type="email" class="form-control" id="InputEmailFirst" name="InputEmail" placeholder="Enter Email" required> -->
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                   
                <div class="form-group">
                    <label for="InputEmail">Enter Password</label>
                    <div class="input-group">
                      <?php    echo form_password('password','','placeholder="Password" class="form-control"');    ?>
                        <!-- <input type="email" class="form-control" id="InputEmailSecond" name="InputEmail" placeholder="Confirm Email" required> -->
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputMessage">Enter Confirmation Password</label>
                    <div class="input-group">      
   <?php echo form_password('password_confirm','','placeholder="Create Account" class="form-control"');  ?>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
               <!--  <div class="form-group">
                    <label for="InputMessage">Profile Picture</label>
                    <div class="input-group">      
   <input type="file" name="user_pic" size="20" class='form-control' />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div> -->
              
                  <?php
   echo form_submit('submit','Create Account','class ="btn btn-primary pull-right"'); 

   // echo anchor('login/signup','Create Account');
   echo form_close();
    ?>
  <?php     echo anchor('login','Home ','class="btn btn-primary "'); ?>
                <!-- <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right"> -->
            </div>
        </form>
        <div class="col-lg-5 col-md-push-1">
            <div class="col-md-12">
                <!-- <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent.</strong>
                </div> -->
                <?php if(validation_errors()!= false): { ?>
                <div class="alert alert-danger">
                  <!--   <span class="glyphicon glyphicon-remove"></span> -->
                  <strong>  <?php echo validation_errors('<p class="error">'); ?></strong>
                </div>
                <?php } ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Registration form - END -->

</div>
<!-- </div> -->
 <!-- </div>    -->
       <!--    <?//php $this->load->view('includes/bottom');  ?>  -->

 <script>

  // $('#submit').click(function(){

  //   var form_data={
  //     username: $("#username").val(),
  //     password: $('#password').val(),
  //   };
  //   alert(form_data['username']);
  //   // alert( form_data['password']);
  //   $.ajax({

  //            type:'post',
  //            url:"<?//php echo base_url().'index.php'?>/login/create_member",
  //            data: form_data,
  //            success: function(msg){
  //               alert('fds');
  //               alert(msg);
  //            }
  //          });


  // });
  </script>