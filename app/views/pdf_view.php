<!doctype html>
<html lang="en">
 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">

    <h2>Generate PDF in Codeigniter from View</h2>

    <div class="d-flex flex-row-reverse bd-highlight">
      <a href="<?php echo base_url('pdfexport') ?>" class="btn btn-primary">
        Download PDF
      </a>
    </div>

    <table class="table table-striped table-hover mt-4" width="100%" border="0">
      <thead style="background: #0aa015;">
        <tr>
          <th>Sl No</th>
          <th>Title</th>
          <th>Content</th>
          <th>Thumbnail</th>
          <th>Category Id</th>
          <th>Created Date</th>
        </tr>
      </thead>
      <tbody>
<?php 
$i=1; 
foreach($dataPdf as $rowP){ ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $rowP['title']; ?></td>
          <td><?= $rowP['content']; ?></td>
          <td><img src="<?php echo base_url('/uploads/images/'.$rowP['thumbnail']);?>" width="30" height="30"></td>
          <td><?= $rowP['category_id']; ?></td>
          <td><?= $rowP['created_at']; ?></td>
        </tr>
<?php  }?>        
      </tbody>
      <tfoot style="background: #0aa015;">
        <tr>
          <th>Sl No</th>
          <th>Title</th>
          <th>Content</th>
          <th>Thumbnail</th>
          <th>Category Id</th>
          <th>Created Date</th>
        </tr>
      </tfoot>
    </table>
  </div>
</body>

</html>