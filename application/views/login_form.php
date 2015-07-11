<div id="login_form">
<?php if (isset($account_created)){ ?>
<h3> <?php echo $account_created; ?></h3>

<?php } else { ?>
<h1> Login Please </h1>
<div class="col-md-12">
<div class="col-md-5 well">
<?php } ?>

<?php echo validation_errors('<p class="error">'); ?>
   <?php 
   
   echo form_open('login/validate_credentials');
   echo form_input('username','','placeholder="Username" class="form-control"');?><br><br>
   <?php
   echo form_password('password','','placeholder="Password" class="form-control"');?><br><br>
   <?php
   echo form_submit('submit','Login','class="btn btn-primary btn-cons"');?>&nbsp; &nbsp;
   <?php
   echo anchor('login/signup','Create Account','class="btn btn-primary btn-cons"');
   echo form_close();
    ?>
</div>
   </div>
   </div>