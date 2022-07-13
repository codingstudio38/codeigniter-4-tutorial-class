<?= $this->extend('template/base'); ?>
<?= $this->section('title'); ?>
<?= $title; ?>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<!-- content -->
<style type="text/css">
   .col-md-8 form input,textarea {
    background: #ffffff !important;
    border-color: #ffffff !important;
    border: 2px solid !important;
    }
</style>
 <div class="col-md-8">
    <h1>Hello, This is contact page</h1>


<?php if (session()->getFlashdata('statusER') !== NULL) : ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Status</strong> <?php echo session()->getFlashdata('statusER'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>

<br>
<form action="contactInser" method="post" enctype="multipart/form-data">
<?= csrf_field(); ?>
<div class="form-group">
   <?= $c_f['name']; ?>
</div>
<div class="form-group">
   <?= $c_f['email']; ?>
</div>
<div class="form-group">
   <?= $c_f['phone']; ?>
</div>
 <div class="input-group mb-3">
  <div class="custom-file">
    <?= $c_f['file']; ?>
    <label class="custom-file-label" id="filename" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
  </div>
</div>
<div class="form-group">
   <?= form_submit(['type'=>'submit','value'=>'Contact Us','name'=>'Contact Us','class'=>'btn']); ?>
</div>

<?= $c_f['form_close'] ?>
</div>
<script type="text/javascript">
   $("#photo").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
 $("#filename").html(fileName);
});
</script>
<div class="col-md-4">
     <?= $this->include('partial/sidebar');?>
</div>
<!-- content --> 
<?= $this->endSection(); ?>  