<?php
  include_once "includes/sessionHandler.php";
?>
<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#">Job Management</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <ul class="navbar-nav  pull-right">
      <li class="nav-item">
       <a href="" class=" nav-link"> <i class="fas fa-envelope"></i>  </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="?v=profile"> <i class="fas fa-user"></i>&nbsp;Profile</a>
          <a class="dropdown-item" href="?v=setting"> <i class="fas fa-cogs"></i>&nbsp;Setting</a>
          
        </div>
      </li>
      <li class="nav-item">
       <a href="?v=logout" class=" btn btn-outline-danger"> <i class="fas fa-sign-out-alt"></i> Logout </a>
      </li>
    </ul>
   
    
  </div>
</nav> 