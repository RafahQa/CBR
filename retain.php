<?php
$title = 'Retain';
require_once 'includes/header.php';
?>

<!-- HTML -->
<div class="card border-primary" style="width: 20rem; margin: auto;  ">
    <h4 class="card-header text-primary ">Solved Case</h4>
      <div class="card ">
        <div class="card-body">
          <p class="card-text">keyword: <?php if(!isset($_COOKIE['keyword'])) {echo " 'unknown' ";} else { echo $_COOKIE['keyword']; }?>
           <br /><br /> Search_Volume: <?php if(!isset($_COOKIE['serachV'])) {echo " 'unknown' ";} else {  echo $_COOKIE['serachV'];}?>
           <br /><br />Paid_Difficulity: <?php if(!isset($_COOKIE['paid'])) {echo " 'unknown' ";} else {  echo $_COOKIE['paid'];}?>
             <br /><br />Search_Difficulity: <?php if(!isset($_COOKIE['searchD'])) {echo " 'unknown' ";} else { echo $_COOKIE['searchD'];} ?> 
             <br /><br />CPC: <?php echo $_COOKIE['cpc']?>  </p>
        </div>
      </div>

    
  </div>


    <div class="card-body text-center "style="width: 20rem; margin: auto"; >
      <a href="success.php" class="btn btn-dark"><h5>Retain</h5></a>
    </div>



<?php
    require_once 'includes/footer.php';
?>