<style type="text/css">
	.image-container {
            position: relative;
        }

        .image {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }

        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .image-container:hover .image {
            opacity: 0.3;
        }

        .image-container:hover .middle {
            opacity: 1;
        }
     .img-thumbnail {
    border-radius: 0px !important;
    background-color: #f4086f !important;
    border: 0  !important;
	}
	.Forminput input {
    background: #ffffff;
    border-color: #ffffff !important;
    border: 2px solid !important;
    }
    #changePasswordform input {
    background: #ffffff !important;
    border-color: #ffffff !important;
    border: 2px solid !important;
    }

.enable{
 background: #ffffff !important; 
}
.disable{
   background: #e9ecef !important; 
}
</style>

<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        
                        <div class="card-title mb-4" style="background-color: #ffbefb;">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
<?php if($user['pthumbnail'] == null ){ ?>
    <p id="cPname" style="display:none;">http://placehold.it/150x150</p>
<img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
<?php } else { ?>
    <p id="cPname" style="display:none;"><?php echo base_url().'/uploads/images/'.$user['pthumbnail'];?></p>
<img src="<?php echo base_url().'/uploads/images/'.$user['pthumbnail'];?>" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
 <?php } ?>                                   
                                    <div class="middle">
<form class="form Forminput" action="updateThumbnail" method="post" id="editphotoForm" enctype="multipart/form-data">
      <?= csrf_field() ?>
 <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
<input type="file" style="display: none;" id="thumbnail" name="thumbnail"  /> 
 <input type="hidden"  value="<?= $user['pId'];?>" id="thumbnail_id" name="thumbnail_id"  /> 
 </form>                                       
                                    </div>
                                </div>
<div class="userData ml-3">
<h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);"><?php echo $user['uname']; ?></a></h2>
<h6 class="d-block"><a href="javascript:void(0)">Created At- </a>
<?= view_cell('App\Libraries\UsefulSnippets::human',['dt'=> $user['uupdated_at'],'timezone'=>'Asia/Kolkata'])  ?>
</h6>
</div>
                                <div class="ml-auto">
                                    <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
<?php if(session()->getFlashdata('errors') != null) : 
$errors = session()->getFlashdata('errors');
?>
<div class="alert alert-danger"><?=  $errors; ?></div>
<?php endif ;?>  
<?php if(session()->getFlashdata('message') != null) : ?>
<div class="alert alert-success"><?php echo session()->getFlashdata('message') ?></div>
<?php endif ; ?> 
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">User Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="editprofile-tab" data-toggle="tab" href="#editprofile" role="tab" aria-controls="editprofile" aria-selected="false">Edit Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="changePassword-tab" data-toggle="tab" href="#changePassword" role="tab" aria-controls="changePassword" aria-selected="false">Change Password</a>
                                    </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="Services-tab" data-toggle="tab" href="#Services" role="tab" aria-controls="Services" aria-selected="false">Others Profiles</a>
                                    </li>
                                </ul>
<div class="tab-content ml-1" id="myTabContent">
<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<div class="row">
<div class="col-sm-3 col-md-2 col-5">
<label style="font-weight:bold;">Full Name</label>
</div>
<div class="col-md-8 col-6">
<?= $user['pname']? $user['pname'] : 'N/A'; ?>
</div>
</div>
<hr />
<div class="row">
<div class="col-sm-3 col-md-2 col-5">
<label style="font-weight:bold;">Email Id</label>
</div>
<div class="col-md-8 col-6">
<?= $user['uemail']? $user['uemail'] : 'N/A'; ?>
</div>
</div>
<hr />
<div class="row">
<div class="col-sm-3 col-md-2 col-5">
<label style="font-weight:bold;">Phone No</label>
</div>
<div class="col-md-8 col-6">
<?= $user['uphone']? $user['uphone'] : 'N/A'; ?>
</div>
</div>
<hr />
<div class="row">
<div class="col-sm-3 col-md-2 col-5">
<label style="font-weight:bold;">Address</label>
</div>
<div class="col-md-8 col-6">
<?= $user['paddress']? $user['paddress'] : 'N/A'; ?>
</div>
</div>
<hr />
<div class="row">
<div class="col-sm-3 col-md-2 col-5">
<label style="font-weight:bold;">Country</label>
</div>
<div class="col-md-8 col-6">
<?= $user['pcountry']? $user['pcountry'] : 'N/A'; ?>
</div>
</div>
<hr />
<div class="row">
<div class="col-sm-3 col-md-2 col-5">
<label style="font-weight:bold;">State</label>
</div>
<div class="col-md-8 col-6">
<?= $user['pstate']? $user['pstate'] : 'N/A'; ?>
</div>
</div>
<hr />
<div class="row">
<div class="col-sm-3 col-md-2 col-5">
<label style="font-weight:bold;">City</label>
</div>
<div class="col-md-8 col-6">
<?= $user['pcity']? $user['pcity'] : 'N/A'; ?>
</div>
</div>
<hr />
 <button type="button" class="btn btn-danger btn-block" onclick="deleteThis(<?php echo $user['uId']; ?>);" >
    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
</div>


<div class="tab-pane fade" id="editprofile" role="tabpanel" aria-labelledby="editprofile-tab">
<button type="button" class="btn btn-danger" style="float:right;" id="edit_btn" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
<button type="button" class="btn btn-primary" style="float:right; display: none;" id="cancel_btn" ><i class="fa fa-window-close" aria-hidden="true"></i>
</button>
<form class="form Forminput" action="update_profile" method="post" id="editprofileForm">
      <?= csrf_field() ?>
      <input type="hidden" name="Uid" id="Uid" value="<?php echo $user['uId']; ?>">
       <input type="hidden" name="Pid" id="Pid" value="<?php echo $user['pId']; ?>">
<div class="row">

<div class="col-md-6">
<div class="form-group">
<div class="col-xs-6">
<label for="name"><h4>Full Name</h4></label>
<input type="text" class="form-control ef_" name="name" id="name" placeholder="Full Name" value="<?= $user['pname']? $user['pname'] : 'N/A'; ?>" disabled>
</div>
</div>
<div class="form-group">

<div class="col-xs-6">
<label for="phone"><h4>Phone No</h4></label>
<input type="text" class="form-control ef_" name="phone" id="phone" placeholder="Phone No" value="<?= $user['uphone']? $user['uphone'] : 'N/A'; ?>" disabled onkeypress="return isNumberKey(event)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10">
</div> 
</div>

<div class="form-group">

<div class="col-xs-6">
<label for="city"><h4>City</h4></label>
<input type="text" class="form-control ef_" name="city" id="city" placeholder="City" value="<?= $user['pcity']? $user['pcity'] : 'N/A'; ?>" disabled>
</div>
</div>
<div class="form-group">
<div class="col-xs-6">
<label for="country"><h4>Country</h4></label>
<input type="text" class="form-control ef_" name="country" id="country" placeholder="Country" value="<?= $user['pcountry']? $user['pcountry'] : 'N/A'; ?>" disabled>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group">

<div class="col-xs-6">
<label for="email"><h4>Email</h4></label>
<input type="email" class="form-control ef_" name="email" id="email" placeholder="Email Id" value="<?= $user['uemail']? $user['uemail'] : 'N/A'; ?>" disabled>
</div>
</div>
<div class="form-group">

<div class="col-xs-6">
<label for="address"><h4>Address</h4></label>
<input type="text" class="form-control ef_" id="address" placeholder="Address" name="address" value="<?= $user['paddress']? $user['paddress'] : 'N/A'; ?>" disabled>
</div>
</div>
<div class="form-group">

<div class="col-xs-6">
<label for="state"><h4>State</h4></label>
<input type="text" class="form-control ef_" name="state" id="state" placeholder="State" value="<?= $user['pstate']? $user['pstate'] : 'N/A'; ?>" disabled>
</div>
</div>
</div>

</div>

<button type="submit" class="btn btn-success btn-block" name="profileUpdate" id="profileUpdate" disabled>Save</button>
</form>
</div>

<div class="tab-pane fade" id="changePassword" role="tabpanel" aria-labelledby="changePassword-tab">
	<form class="form Forminput" action="update_password" method="post" id="changePasswordform">
            <?= csrf_field() ?>
             <input type="hidden" name="CE_id" id="CE_id" value="<?php echo $user['uId']; ?>">
	<div class="form-group">
<div class="col-xs-6">
<label for="Current_Password"><h4>Current Password</h4></label>
<input type="password" class="form-control" name="Current_Password" id="Current_Password" placeholder="Current Password" >
</div>
</div>
<div class="form-group">
<div class="col-xs-6">
<label for="New_Password"><h4>New Password</h4></label>
<input type="password" class="form-control" name="New_Password" id="New_Password" placeholder="New Password" >
</div>
</div>
<div class="form-group">
<div class="col-xs-6">
<label for="Confirm_Password"><h4>Confirm Password</h4></label>
<input type="password" class="form-control" name="Confirm_Password" id="Confirm_Password" placeholder="Confirm Password" >
</div>
</div>
<div class="form-group">
	<button type="submit" class="btn btn-success btn-block" name="passUpdate">Update</button>
</div>	
	</form>
</div>


  <div class="tab-pane fade" id="Services" role="tabpanel" aria-labelledby="Services-tab">
  	<table class="table table-striped table-dark">
  		<thead>
  			<tr>
  				<th>Id</th>
                <th>Total</th>
  				<th>Name</th>
  				<th>Email</th>
                <th>Phone</th>
  				<th>User Name</th>
  				<th>Address</th>
  				<th>City</th>
  				<th>State</th>
  				<th>Country</th>
                <th>Photo</th>
  			</tr>
  		</thead>
  		<tbody>

<?php foreach($Alluser as $row):?>
  			<tr>
  				<td><?= $row['proId']; ?>/<?= $row['userId']; ?></td>
  				<td><?php echo $totalUser; ?></td> 
                <td><?= $row['proname']? $row['proname'] : 'N/A'; ?></td>
  				<td><?= $row['useremail']? $row['useremail'] : 'N/A'; ?></td>
                <td><?= $row['userphone']? $row['userphone'] : 'N/A'; ?></td>
  				<td><?= $row['username']? $row['username'] : 'N/A'; ?></td>
  				<td><?= $row['proaddress']? $row['proaddress'] : 'N/A'; ?></td>
  				<td><?= $row['procity']? $row['procity'] : 'N/A'; ?></td>
  				<td><?= $row['prostate']? $row['prostate'] : 'N/A'; ?></td>
  				<td><?= $row['procountry']? $row['procountry'] : 'N/A'; ?></td>
                <td><img src="<?= $row['thum']==null ? 'http://placehold.it/150x150' : base_url().'/uploads/images/'.$row['thum'];?>" style="width: 30px; height: 30px;" /></td> 
  			</tr>
<?php endforeach; ?>  	
  		</tbody>
  	</table>
  </div>



                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
      function isNumberKey(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
          return true;
    }
    function deleteThis(id) {
      let con = confirm("Are You Sure..?");
      if(con == true){
        window.location.href="delete_profile/"+id;
      } else {
        return;
      }
    }
$(document).ready(function () {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgProfile').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#btnChangePicture').on('click', function () {
        if (!$('#btnChangePicture').hasClass('changing')) {
            $('#thumbnail').click();
        } else {
           return;
        }
    });
    $('#thumbnail').on('change', function () {
        readURL(this);
        $('#btnChangePicture').addClass('changing');
        $('#btnChangePicture').attr('value', 'Confirm');
        $('#btnDiscard').removeClass('d-none');
        $('#btnChangePicture').attr('type', 'submit');
    });
    $('#btnDiscard').on('click', function () {
        $('#btnChangePicture').removeClass('changing');
        $('#btnChangePicture').attr('value', 'Change');
        $('#btnDiscard').addClass('d-none');
        $('#imgProfile').attr('src', $('#cPname').html());
        $('#thumbnail').val('');
        $('#btnChangePicture').attr('type', 'button');
    });

     $("#edit_btn").click(function(){
        $("#edit_btn").css('display','none');
        $("#cancel_btn").css('display','block');
        $("#profileUpdate").removeAttr('disabled');
        $(".ef_").removeClass("disable").addClass("enable");
        let elm1 = document.getElementsByClassName("ef_");
        for (let i = 0; i < elm1.length; i++) {
            elm1[i].removeAttribute("disabled");
        }
      });  

      $("#cancel_btn").click(function(){
        $("#cancel_btn").css('display','none');
        $("#edit_btn").css('display','block');
        $("#profileUpdate").attr('disabled', true);
        $(".ef_").removeClass("enable").addClass("disable");
        let elmc = document.getElementsByClassName("ef_");
        for (let j = 0; j < elmc.length; j++) {
            elmc[j].setAttribute("disabled", true);
        }
      });

});
</script>