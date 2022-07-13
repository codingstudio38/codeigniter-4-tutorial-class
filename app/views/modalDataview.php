<!-- content -->

<div class="container">
<div class="row" style="margin-top: 20px;">

<div class="col-md-8">
  <table width="60%" align="right">
  <tr>
    <td><h3>Export Pdf</h2></td>
    <td> 
      <a href="pdfview" class="btn btn-success"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
    </td>
    <td><h3>Export Data</h2></td>
    <td> 
      <a href="xlfiledownload" class="btn btn-primary"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></a>
    </td>
  </tr>
</table>
<br>
<br>
<div style="overflow-x: scroll; height:400px;" >
<?php if (session()->getFlashdata('statusAN') !== NULL) : ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Status</strong> <?php echo session()->getFlashdata('statusAN'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>

   <table border="1" class="table table-striped table-bordered">
 <thead class="thead-dark">
  <tr>
    <th scope="col">Action</th>
    <th scope="col">Sl</th>
    <th scope="col">id</th>
    <th scope="col">title</th>
    <th scope="col">content</th>
    <th scope="col">thumbnail</th>
    <th scope="col">created_at</th>
  </tr>
 </thead>
 <tbody>
<?php
  $i=1;
  foreach($data as $row)
{ ?>
   <tr scope="row">
    <td>
      <a class="btn btn-danger" style="padding: 0.3rem 0.6rem;" href="daletedata/<?= $row['id']; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
      <a class="btn btn-success" style="padding: 0.3rem 0.6rem;" href="editdata/<?= $row['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    </td>
    <td><?= $i++; ?></td>
    <td><?= $row['id']; ?></td>
    <td><?= $row['title']; ?></td>
    <td><textarea><?= $row['content']; ?></textarea></td>
    <td><img src="<?php echo base_url('/uploads/images/'.$row['thumbnail']);?>" width="30" height="30"></td>
    <td><?= $row['created_at']; ?></td>
  </tr>
<?php  }?>
</tbody> 
<tfoot>
  <tr>
    <td colspan="7" align="right">
      <?= $pager->links('default','boorstrap_full'); ?>
    </td>
  </tr>
</tfoot>
 </table>  
</div>
  <style type="text/css">
   #asfds input {
    background: #ffffff !important;
    }
    </style>
<br>
<br>
<?php if (session()->getFlashdata('status') !== NULL) : ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Status</strong> <?php echo session()->getFlashdata('status'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>

<div class="card border-success mb-3">
  <div class="card-header bg-transparent border-success"  style="background-color: #ebffe5 !important; text-align: center;">
    <h2>UPLOAD</h2>
  </div>
 
  <div class="card-body text-success">
    <form id="asfds" action="<?= base_url().'/modelInsert'; ?>" method="POST" enctype="multipart/form-data">
   <?= csrf_field(); ?>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title," name="title" value="<?=old('title') ?>" placeholder="Title">
    </div>
    <div class="form-group col-md-6">
      <label for="content">Content</label>
      <input type="text" class="form-control" id="content" name="content" value="<?=old('content') ?>" placeholder="Content">
    </div>
  </div>
  <div class="form-group">
    <label for="thumb">Thumbnail</label>
    <input type="file" class="form-control" id="thumb" name="thumb"  required>
  </div>
  <button type="submit" class="btn btn-success btn-block">Upload</button>
</form>
  </div>
 
</div>

<br>

<div class="card border-warning mb-3">
  <div class="card-header bg-transparent border-warning"  style="background-color: #fff9d3 !important; text-align: center;">
    <h2>EXCEL UPLOAD</h2>
  </div>
 
  <div class="card-body text-success">
<?php if (session()->getFlashdata('error_msg') !== NULL) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Status</strong> <?php $errors = session()->getFlashdata('error_msg'); echo $errors['fileimport']; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } else if(session()->getFlashdata('postSuccess') !== NULL) {?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Status</strong> <?php echo session()->getFlashdata('postSuccess'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } else if(session()->getFlashdata('postFailed') !== NULL) {?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Status</strong> <?php echo session()->getFlashdata('postFailed'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
     <?= form_open_multipart('/xlInsert'); ?>
    <h5 class="card-title">Select File</h5>
    <input type="file" class="form-control" id="fileimport" name="fileimport" >
    <br>
    <button type="submit" class="btn btn-warning btn-block">Upload</button>
     <?=  form_close(); ?>
  </div>
 
</div>
<br>
<div class="card border-primary mb-3">
  <div class="card-header bg-transparent border-primary"  style="background-color: #d4e9fa !important; text-align: center;">
    <h2>PROFILE EXCEL UPLOAD</h2>
  </div>
 
  <div class="card-body text-primary">
<?php if (session()->getFlashdata('proFileerror') !== NULL) { ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Status</strong> <?php $errors = session()->getFlashdata('proFileerror'); echo $errors['profileimport']; ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } else if(session()->getFlashdata('prosuccess') !== NULL) {?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Status</strong> <?php echo session()->getFlashdata('prosuccess'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } else if(session()->getFlashdata('profailed') !== NULL) {?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Status</strong> <?php echo session()->getFlashdata('profailed'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } else if(session()->getFlashdata('checkdataerror') !== NULL) {?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Status</strong> <br>
<?php foreach(session()->getFlashdata('checkdataerror') as $key => $error) { ?>
<td><?= $error; ?></td>
<?php  }?>      
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
     <?= form_open_multipart('/proxlfileimport'); ?>
    <h5 class="card-title">Select File</h5>
    <input type="file" class="form-control" id="profileimport" name="profileimport" >
    <br>
    <button type="submit" class="btn btn-primary btn-block">Upload</button>
     <?=  form_close(); ?>
  </div>
 
</div>
<br>
</div>

<div class="col-md-4">
     <?= $this->include('partial/sidebar'); ?>
</div>

</div>
</div>
<!-- content -->
