<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
  <script src="<?= base_url(); ?>/assets/js/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="<?= base_url(); ?>/assets/css/popper.min.js"></script>
  <script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>

    <title><?= $title; ?></title>
  
  </head>  
  <body> 
   <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<?php if(loggedIn() == true):?>
  <a class="navbar-brand" href="javascript:void(0)"><?php $user = session()->get('user'); echo $user['user_name']; ?></a>
<?php else: ?>  
  <a class="navbar-brand" href="#">Menu</a>
<?php endif; ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
<?php if(loggedIn() == true): ?>
      <li class="nav-item">
        <a class="nav-link" href="modelTest">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile">Profile</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="multiple">Multiples</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="logout">Logout</a>
      </li>
<?php else : ?>
     <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userlogin">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register">Register</a>
      </li>
<?php endif; ?>
       

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-dark" type="submit">Search</button>
    </form>
  </div>
</nav>
</header> 