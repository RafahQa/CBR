<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/connection.php';
?>

    <?php

        
        if(!isset($_COOKIE['keyword'])) {$keyword ='unknown';} else { $keyword = $_COOKIE['keyword']; }
        if(!isset($_COOKIE['serachV'])) {$serachV =0;} else { $serachV = $_COOKIE['serachV']; }
        if(!isset($_COOKIE['paid'])) {$paid =0;} else { $paid = $_COOKIE['paid']; }
        if(!isset($_COOKIE['searchD'])) {$searchD =0;} else { $searchD = $_COOKIE['searchD']; }
        $cpc = $_COOKIE['cpc'];


        $isSuccess = $cases->insert($keyword,$serachV,$paid,$searchD,$cpc);


    ?>

    
<?php if($isSuccess)
        {
           
            //print success
            include 'includes/successmessage.php';
        }
        else
        {
            //print error
            include 'includes/errormessage.php';
        }
?>
    
    <div class="card-body text-center">
      <a href="data.php" class="btn btn-dark"><h5>View Data</h5></a>
    </div>

<?php
    require_once 'includes/footer.php';
?>