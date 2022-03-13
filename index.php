<?php
$title = 'Home';
require_once 'db/connection.php';
require_once 'includes/header.php';
?>


<div class="row g-3">

  <div class="col-md-4">
 
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="index.php" class="nav-link link-dark" aria-current="page">
            Home
          </a>
        </li>
        <li>
          <a href="data.php" class="nav-link link-dark">
            Data
          </a>
        </li>
        <li>
          <a href="newquery.php" class="nav-link link-dark">
            New Query
          </a>
        </li>
      <hr>
  </div>


  <div class="col-md-8 vertical-center">
  <div class="card text-center  ">
  <div class="card-header">
    Expert Systems
  </div>
  <div class="card-body" style="height: 500px;">
    <h5 class="card-title mx-auto" style="    margin-top: 20%;">Case Based Reasoning System</h5>
    <p class="card-text">Know your Website AD cost.</p>
    <a href="newquery.php" class="btn btn-dark">Start</a>
  </div>
  <div class="card-footer text-muted">
    Homework
  </div>
</div>
  </div>

</div>




<?php
    require_once 'includes/footer.php';
?>