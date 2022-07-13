<!-- content -->
<div class="container">
<div class="row" style="margin-top: 20px;">

<div class="col-md-8">
  <style type="text/css">
   #asfds input {
    background: #ffffff !important;
    border-color: #ffffff !important;
    border: 2px solid !important;
    }
    </style>
<br>
<br>
<div class="alert alert-primary alert-dismissible fade show" role="alert" style="text-align: center;">
  <strong>Edit User Details- <?php echo $datae['id']; ?></strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  </button>
</div>
<form id="asfds" action="<?= base_url().'/modelUpdate'; ?>" method="POST">
  <?= csrf_field(); ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Name">Name</label>
      <input type="text" class="form-control" id="title" name="title" value="<?php echo $datae['title']; ?>" placeholder="Title">
      <input type="hidden" class="form-control" id="UP_id" name="UP_id" value="<?php echo $datae['id']; ?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="Email">Email</label>
      <input type="text" class="form-control" id="content" name="content" value="<?php echo $datae['content']; ?>" placeholder="Content">
    </div>
  </div>
 <!--  <div class="form-group">
    <label for="Pass">Passowrd</label>
    <input type="password" class="form-control" id="" name="" value="<?php echo $datae['thumbnail']; ?>" value="" placeholder="Password">
  </div> -->
  <button type="submit" class="btn btn-primary">Upload</button>
</form>

 
</div>

<div class="col-md-4">
     <?= $this->include('partial/sidebar'); ?>
</div>

</div> 
</div>
<!-- content -->
