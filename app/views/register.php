<!-- content -->
<div class="container">
  <style type="text/css">
    .gradient-custom-2 {
  /* fallback for old browsers */
  background: #fccb90;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}
.error {
    color: red !important;
    text-align: center !important;
  }

@media (min-width: 768px) {
  .gradient-form {
    height: 100vh !important;
  }
}
@media (min-width: 769px) {
  .gradient-custom-2 {
    border-top-right-radius: .3rem;
    border-bottom-right-radius: .3rem;
  }
}

#register_form input{
 background: #ffffff !important;
    }

}

  </style>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/lotus.png" style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">CodeIgniter 4 Login</h4>
<?php 
$errors = null;
if(session()->getFlashdata('error_msg') != null) : 
$errors = session()->getFlashdata('error_msg');
endif ;
$cssvalid = "style='border: 2px solid #198754 !important;
    padding-right: calc(1.5em + 0.75rem) !important;
    background-image: url(public/css/download.svg) !important;
    background-repeat: no-repeat !important;
    background-position: right calc(0.375em + 0.1875rem) center !important;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem) !important;'";
$cssinvalid = "style='border: 2px solid #dc3545 !important;
    padding-right: calc(1.5em + 0.75rem) !important;
    background-image: url(public/css/error.png) !important;
    background-repeat: no-repeat !important;
    background-position: right calc(0.375em + 0.1875rem) center !important;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem) !important;'";
?>  
 
               
                </div>

                <form id="register_form" name="register_form" method="post" action="<?= base_url().'/userregister'; ?>">
                  <?= csrf_field() ?>
                  <p>Please Create Your Account</p>
                   <div class="form-outline mb-4">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" value="<?=old('name') ?>" <?php if(!$errors==null){ if(isset($errors['name'])){echo $cssinvalid;} else { echo $cssvalid;}} ?>   />
                    <?php if(isset($errors['name'])){ ?> 
                    <div class="error"><?= $errors['name']; ?></div>
                    <?php }  ?>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?=old('username') ?>" <?php if(!$errors==null){ if(isset($errors['username'])){echo $cssinvalid;} else { echo $cssvalid;}} ?>/> 
                    <?php if(isset($errors['username'])){ ?> 
                    <div class="error"><?= $errors['username']; ?></div>
                    <?php }  ?>
                  </div>
                   <div class="form-outline mb-4">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Id" value="<?=old('email') ?>" <?php if(!$errors==null){ if(isset($errors['email'])){echo $cssinvalid;} else { echo $cssvalid;}} ?>/>
                    <?php if(isset($errors['email'])){ ?> 
                    <div class="error"><?= $errors['email']; ?></div>
                    <?php }  ?>
                  </div>
                   <div class="form-outline mb-4">
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone No" value="<?=old('phone') ?>"  onkeypress="return isNumberKey(event)" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10" <?php if(!$errors==null){ if(isset($errors['phone'])){echo $cssinvalid;} else { echo $cssvalid;}} ?>  />
                    <?php if(isset($errors['phone'])){ ?> 
                    <div class="error"><?= $errors['phone']; ?></div>
                    <?php }  ?>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" value="<?=old('password') ?>" <?php if(!$errors==null){ if(isset($errors['password'])){echo $cssinvalid;} else { echo $cssvalid;}} ?>  />
                    <?php if(isset($errors['password'])){ ?> 
                    <div class="error"><?= $errors['password']; ?></div>
                    <?php }  ?>
                  </div>
                   <div class="form-outline mb-4">
                    <input type="password" id="con_password" class="form-control" name="con_password" placeholder="Confirm Password" value="<?=old('con_password') ?>" <?php if(!$errors==null){ if(isset($errors['con_password'])){echo $cssinvalid;} else { echo $cssvalid;}} ?>/>
                    <?php if(isset($errors['con_password'])){ ?> 
                    <div class="error"><?= $errors['con_password']; ?></div>
                    <?php }  ?>
                  </div>
                   <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Create</button>
                  </div>
                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2" >Have an Account Already ? </p>
                    <a href="<?= base_url(); ?>/userlogin"  class="btn btn-outline-danger">Login</a>
                  </div>
                </form>
 
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


</div>
<!-- content -->
<script type="text/javascript">
  function isNumberKey(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
          return true;
}
</script>
