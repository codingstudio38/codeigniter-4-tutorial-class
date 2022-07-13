<!-- content -->

<div class="container">
<div class="row" style="margin-top: 20px;">

<div class="col-md-12">
<div style="overflow-x: scroll; height:400px;" >
<?php if (session()->getFlashdata('massage') !== NULL) : ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Status</strong> <?php echo session()->getFlashdata('massage'); ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>

<form id="editform" method="post" action="editdataview">
  <?= csrf_field(); ?>
  <input type="hidden" name="edit_ids" value="" id="edit_ids">
</form>
<form id="deleteform" method="post" action="deleteData">
  <?= csrf_field(); ?>
  <input type="hidden" name="delete_ids" value="" id="delete_ids">
</form>
   <table border="1" class="table table-striped table-bordered">
 <thead class="thead-dark">
  <tr>
    <th scope="col">
    <button type="submit" name="edit-btn" id="edit-btn" class="btn btn-success" style="padding: 0.3rem 0.6rem;">
      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </button>
      <button type="submit" name="delete-btn" id="delete-btn" class="btn btn-danger" style="padding: 0.3rem 0.6rem;">
        <i class="fa fa-trash-o" aria-hidden="true"></i></i>
      </button>
    </th>
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
      <table>
        <tr>
          <td><input type="checkbox" class="eid" value="<?= $row['id']; ?>"></td>
          <td><input type="checkbox" class="did" value="<?= $row['id']; ?>"></td>
        </tr>
      </table>
    </td>
    <td><?= $i++; ?></td>
    <td><?= $row['id']; ?></td>
    <td><?= $row['title']; ?></td>
    <td><textarea><?= $row['content']; ?></textarea></td>
    <td>
      <img src="<?php echo base_url('/uploads/images/'.$row['thumbnail']);?>" width="30" height="30">
    </td>
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
<h2 style="text-align: center;">Insert Multiples Row</h2>
<style type="text/css">
  #MrowInsert,#fileInsert,#multipleUpload input{
     padding: 5px;
      margin: 5px;
  }
  #all_inputs .col-sm-3,.col-sm-2{
    margin-top: 10px;
  }
  #all_imginputs .col-sm-6{
    margin-top: 10px;
  }
  
</style>
<form action="multipleUpload" id="MrowInsert" method="POST" autocomplete="off" enctype="multipart/form-data"> 
    <?= csrf_field(); ?>
<table width="100%" border="0" align="center">
        <tr>
          <td colspan="6">
            <button type="button" onclick="generateInputs()" class="btn btn-info btn-block">ADD NEW</button>
          </td>
        </tr>
        <tr>
          <td colspan="6" align="center">

            <div id="all_inputs" style="margin-top: 10px; margin-bottom:10px;">
            </div>

          </td>
        </tr>
        <tr>
           <td colspan="6"> <button type="submit"  class="btn btn-primary btn-block">UPLOAD</button></td>
         </tr>
      </table>
       </form>
<br>
     <h2 style="text-align: center;">Insert Multiples Photo</h2>
<form action="multiplefileUpload" id="fileInsert" method="POST" autocomplete="off" enctype="multipart/form-data"> 
  <?= csrf_field(); ?>
<table width="100%" >
  <tr>
    <td>
      <button type="button" onclick="addInputs()" class="btn btn-info btn-block">ADD NEW</button>
    </td>
  </tr>
  <tr>
    <td>
      <div id="all_imginputs" style="margin-top: 10px; margin-bottom:10px;">

      </div>
    </td>
  </tr>
  <tr>
    <td>
       <button type="submit" class="btn btn-primary btn-block">UPDATE</button>
    </td>
  </tr>
</table>
</form>
<br> 
<h2 style="text-align: center;">Single File With Multiples Upload</h2>          
<form action="multiplePhoto" id="multiplePhoto" method="POST" autocomplete="off" enctype="multipart/form-data"> 
  <?= csrf_field(); ?>
    <div class="row">
      
        <div class="col-sm-6">
            <input type="file" class="form-control" name="photo[]" required="" multiple="multiple">
        </div>

        <div class="col-sm-6">
        <input type="submit" class="form-control btn btn-success" value="Submit" >
        </div>

      </div>
      
</form>
<br>
 
</div>


</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$(".did").click(function(){
  $('.eid').prop('checked',false);
});
$(".eid").click(function(){
  $('.did').prop('checked',false);
});

$("#delete-btn").click(function(){
  var deleteIds = [];
  $(".did:checked").each(function(i){
    deleteIds.push($(this).val());
  });
  if(deleteIds.length=="0"){
    $("#delete_ids").val("");
    alert("Sorry No Records Selected..");return;
  } else {
    $("#delete_ids").val("");
    $("#delete_ids").val(deleteIds);
    document.getElementById("deleteform").submit();
  }
});

$("#edit-btn").click(function(){
  var editIds = [];
  $(".eid:checked").each(function(i){
    editIds.push($(this).val());
  });
  if(editIds.length=="0"){
    $("#edit_ids").val("");
    alert("Sorry No Records Selected..");return;
  } else {
    $("#edit_ids").val("");
    $("#edit_ids").val(editIds);
    document.getElementById("editform").submit();
  }
});


});


  function generateInputs() {
        var a = Math.floor(Math.random() * 999);
        var element1 = document.createElement('input');
        element1.type = "text";
        element1.placeholder = "Title";
        element1.className = "form-control title";
        element1.name = "title[]";
        element1.required = "true";
        element1.id = "title_" + a;
        element1.onchange = function () {
          //alert(this.value);
          //alert(this.id);
        };


        var element2 = document.createElement('input');
        element2.type = "text";
        element2.placeholder = "Content";
        element2.className = "form-control content";
        element2.name = "content[]";
        element2.required = "true";
        element2.id = "content_" + a;
        element2.onchange = function () {
         //alert(this.value);
          //alert(this.id);
        };


        var element3 = document.createElement("select");
        element3.className = "form-control categoryid";
        element3.name = "categoryid[]";
        element3.required = "true";
        element3.id = "categoryid_" + a;
        element3.onchange = function () {
            //alert(this.value);
          //alert(this.id);
        }
        var optionAS = document.createElement("option");
        optionAS.value = "0";
        optionAS.text = "Category Id";
        element3.append(optionAS);
        $.ajax({
        method:"GET",
        url: '<?php echo base_url("getSelectids") ?>',
        success: function (data) {
          //console.log(data.AllData);return;
            data.AllData.forEach((i, key) => {
            var option = document.createElement("option");
            option.value = i.id;
            option.text = i.id;
            element3.append(option);
            });
          }
        });

        var elemfiles = document.createElement('input');
        elemfiles.type = "file";
        elemfiles.className = "form-control files";
        elemfiles.name = "files[]";
        elemfiles.required = "true";
        elemfiles.setAttribute("aria-describedby","inputGroupFileAddon04");
        elemfiles.id = "files_" + a;
        elemfiles.onchange = function () {
          //alert(this.value);
          //alert(this.id);
        };

        var element4 = document.createElement('input');
        element4.type = "button";
        element4.className = "form-control btn btn-danger";
        element4.value = "Remove";
        element4.id = element1.id + "," + element2.id + "," + element3.id + "," + elemfiles.id;
        element4.onclick = function () {
          var btm_id = this.id;
          const myArr = btm_id.split(",");
          var type_R = myArr[1];
          var re_idvalue = type_R.split("_");
          var get_value = re_idvalue[1];
          $("#board_"+get_value).remove();
        };


        var div1 = document.createElement('div');
        div1.className = "col-sm-3";
        var div2 = document.createElement('div');
        div2.className = "col-sm-3";
        var div3 = document.createElement('div');
        div3.className = "col-sm-2";
        var div4 = document.createElement('div');
        div4.className = "col-sm-2";
        var div5 = document.createElement('div');
        div5.className = "col-sm-2";
        div1.appendChild(element1);
        div2.appendChild(element2);
        div3.appendChild(element3);
        div4.appendChild(elemfiles);
        div5.appendChild(element4);
        var board = document.createElement('div');
        board.className = "row";
        board.id = "board_" + a;
        board.appendChild(div1);
        board.appendChild(div2);
        board.appendChild(div3);
        board.appendChild(div4);
        board.appendChild(div5);
        document.getElementById('all_inputs').appendChild(board);
        console.clear();
    }


function addInputs() {
var Rnd = Math.floor(Math.random() * 999);
        var elmsel = document.createElement("select");
        elmsel.className = "form-control slid";
        elmsel.name = "slid[]";
        elmsel.required = "true";
        elmsel.id = "slid_" + Rnd;
        elmsel.onchange = function () {
          //alert(this.value);
          //alert(this.id);
        }
        var opt = document.createElement("option");
        opt.value = "1";
        opt.text = "Select Id";
        elmsel.append(opt);
        $.ajax({
        method:"GET",
        url: '<?php echo base_url("getpostids") ?>',
        success: function (data) {
          //console.log(data.postData);return;
            data.postData.forEach((i, key) => {
            var option = document.createElement("option");
            option.value = i.id;
            option.text = i.id;
            elmsel.append(option);
            });
          }
        });

        var elemfile = document.createElement('input');
        elemfile.type = "file";
        elemfile.className = "custom-file-input thumbnail";
        elemfile.name = "thumbnail[]";
        elemfile.required = "true";
        elemfile.setAttribute("aria-describedby","inputGroupFileAddon04");
        elemfile.id = "thumbnail_" + Rnd;
        elemfile.onchange = function () {
          //alert(this.value);
          //alert(this.id);
        var lb_id = this.id;
        const Arr = lb_id.split("_");
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings("#label_"+Arr[1]).addClass("selected").html(fileName);
        };
        var elembtn = document.createElement('input');
        elembtn.type = "button";
        elembtn.className = "form-control btn btn-danger";
        elembtn.value = "Remove";
        elembtn.id = elmsel.id + "," + elemfile.id;
        elembtn.onclick = function () {
          var btm_id = this.id;
          const myArr = btm_id.split(",");
          var type_R = myArr[1];
          var re_idvalue = type_R.split("_");
          var get_value = re_idvalue[1];
          $("#boardimg_"+get_value).remove();
        };
var div12 = document.createElement('div');
div12.className = "col-sm-6";
var div22 = document.createElement('div');
div22.className = "col-sm-6";

var custom = document.createElement('div');
custom.className = "custom-file";
var filelabel = document.createElement('label');
filelabel.className = "custom-file-label";
filelabel.setAttribute("for",elemfile.id);
filelabel.innerHTML = "Choose file";
filelabel.id="label_"+Rnd;

custom.appendChild(elemfile);
custom.appendChild(filelabel);


div12.appendChild(elmsel);
div22.appendChild(custom);

var newdiv = document.createElement('div');
newdiv.className = "row";
newdiv.appendChild(div12);
newdiv.appendChild(div22);

var boardimg = document.createElement('div');
boardimg.id = "boardimg_" + Rnd;
boardimg.appendChild(newdiv);
boardimg.appendChild(elembtn);
       
document.getElementById('all_imginputs').appendChild(boardimg);

}

</script>

<!-- content -->
