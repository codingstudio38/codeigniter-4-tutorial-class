<!-- content -->

<div class="container">
<div class="row" style="margin-top: 20px;">

<div class="col-md-8">
<h1>MULTIPLE ROW</h1>
<style type="text/css">
  #multipleUpdate input{
     padding: 5px;
      margin: 5px;
  }
</style>
<form action="multipleUpdate" id="multipleUpdate" method="POST" autocomplete="off"> 
    <?= csrf_field(); ?>
<table width="100%" border="0" align="center">
        <tr>
          <td colspan="6" align="center">

            <div id="all_inputs" style="margin-top: 10px; margin-bottom:10px;">
              <?php foreach($EditData as $rowE){ ?>
              <div class="row">
                <div class="col-sm-3">
                  <input type="text" placeholder="Title" class="form-control title" name="title[]" required="" value="<?= $rowE['title']; ?>">
                  <input type="hidden" name="update_id[]" value="<?= $rowE['id']; ?>">
                </div>
                <div class="col-sm-3">
                  <input type="text" placeholder="Content" class="form-control content" name="content[]" required="" value="<?= $rowE['content']; ?>">
                </div>
                 <div class="col-sm-3">
                  <input type="text" placeholder="Thumbnail" class="form-control thumbnail" name="thumbnail[]" required="" value="<?= $rowE['thumbnail']; ?>">
                </div>
                <div class="col-sm-3">
                  <select class="form-control categoryid" name="categoryid[]" required="">
                    <optgroup label="Already Selected">
                      <option value="<?= $rowE['category_id']; ?>" ><?= $rowE['category_id']; ?></option>
                    </optgroup>
                    <optgroup label="Select New">
                    <?php foreach($AllUser as $rowU){ ?>
                      <option value="<?= $rowU['id']; ?>"><?= $rowU['id']; ?></option>
                    <?php  }?>
                    </optgroup>
                  </select>
                </div>
                </div>
                <?php  }?>
            </div>

          </td>
        </tr>
        <tr>
           <td colspan="6"> <button type="submit"  class="btn btn-primary btn-block">UPDATE</button></td>
         </tr>
      </table>
       </form>
</div>

<div class="col-md-4">
     <?= $this->include('partial/sidebar'); ?>
</div>

</div>
</div>
<!-- content -->
