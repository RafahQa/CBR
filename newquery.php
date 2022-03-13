<?php
$title = 'Retrieve';
require_once 'db/connection.php';
require_once 'includes/header.php';
?>

<!-- HTML form to input new case -->

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

  <div class="col-md-8">
  <form class="row g-3" method="post" action="retrive.php">
  <div class="col-md-12">
    <label for="Keyword" class="form-label">Keyword</label>
    <input type="text" class="form-control" id="keyword" name="keyword">
  </div>
  <div class="col-md-12">
    <label for="Search_Volume" class="form-label">Search_Volume</label>
    <input type="number" min="50000" max="100000000" class="form-control" id="serachV" name="serachV">
  </div>
  <div class="col-12">
    <label for="Paid_Difficulity" class="form-label">Paid_Difficulity</label>
    <input type="number" min="1" max="100" class="form-control" id="paid" name="paid">
  </div>
  <div class="col-12">
    <label for="search_Difficulity" class="form-label">search_Difficulity</label>
    <input type="number" min="1" max="100" class="form-control" id="searchD" name="searchD">
  </div>
 
  <div class="col-12 text-center">
    <button type="submit" name="retrieve" class="btn btn-dark">Retrive</button>
  </div>
</form>
</div>
</div>




<?php
    require_once 'includes/footer.php';
?>

