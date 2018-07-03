<html lang="en">
<head>
  <title>form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
 
  <link href="<?= base_url(); ?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' />



</head>
<body>

<div class="container">
  <h2 align="center"> form</h2>

  <?php echo form_open(base_url() . '#' , array('class' => 'form-horizontal'));?>
   <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
   <?php echo form_close();?>
</div>
<script src="<?= base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
</body>
</html>
