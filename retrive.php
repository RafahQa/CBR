<?php
$title = 'Retrive';
require_once 'includes/header.php';
require_once 'db/connection.php';
require_once 'cbr.php';
$cbr = new CBR();
?>


<?php
if(isset($_POST['retrieve']))
    { //set params
        $keyword =$_POST['keyword'];
        $searchV=$_POST['serachV'];
        $paid=$_POST['paid'];
        $searchD=$_POST['searchD'];
        
    }

    //compute similarity with all cases
    $similarities = $cbr->retrieve($keyword, $searchV,$paid,$searchD);
    $similarCasesID = $cbr->similarCases($similarities);
    $result = $cases->get($similarCasesID[0]);
    $result1 = $cases->get($similarCasesID[1]);
    $result2 = $cases->get($similarCasesID[2]);

    // Solved Case
    setcookie('keyword', $keyword, time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie('serachV', $searchV, time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie('paid', $paid, time() + (86400 * 30), "/"); // 86400 = 1 day
    setcookie('searchD', $searchD, time() + (86400 * 30), "/"); // 86400 = 1 day
    $queryCaseCpc = ($result['CPC'] +  $result1['CPC'] +  $result2['CPC']) / 3;
    setcookie('cpc', round($queryCaseCpc,2), time() + (86400 * 30), "/"); // 86400 = 1 day




?>

<div class="card border-primary mb-3" >
    <h4 class="card-header text-primary card text-center">Similar Google Ad Costs</h4>
    <div class="card-group ">
      <div class="card ">
        <div class="card-body">
          <h5 class="card-title text-primary">Case1</h5>
          <p class="card-text">keyword: <?php echo $result['Keyword']; ?> <br /><br /> Search_Volume:  <?php echo $result['Search_Volume']; ?> <br /><br />Paid_Difficulity: 
            <?php echo $result['Paid_Difficulty']; ?><br /><br />Search_Difficulity: <?php echo $result['Search_Difficulty']; ?>  <br /><br />CPC: <?php echo $result['CPC']; ?>
            <br /><br />Similarity: <?php echo $similarities[$similarCasesID[0]] ; ?>  </p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-primary">Case2</h5>
          <p class="card-text">keyword: <?php echo $result1['Keyword']; ?> <br /><br /> Search_Volume: <?php echo $result1['Search_Volume']; ?> <br /><br />Paid_Difficulity: 
            <?php echo $result1['Paid_Difficulty']; ?><br /><br />Search_Difficulity: <?php echo $result1['Search_Difficulty']; ?>  <br /><br />CPC: <?php echo $result1['CPC']; ?>
            <br /><br />Similarity: <?php echo $similarities[$similarCasesID[1]] ; ?>  </p></p>
        </div>
      </div>
      <div class="card">
        <div class="card-body ">
          <h5 class="card-title text-primary">Case3</h5>
          <p class="card-text">keyword: <?php echo $result2['Keyword']; ?> <br /><br /> Search_Volume: <?php echo $result2['Search_Volume']; ?> <br /><br />Paid_Difficulty: 
            <?php echo $result2['Paid_Difficulty']; ?> <br /><br />Search_Difficulty:  <?php echo $result2['Search_Difficulty']; ?>  <br /><br />CPC:  <?php echo $result2['CPC']; ?>
            <br /><br />Similarity: <?php echo $similarities[$similarCasesID[2]] ; ?>  </p></p>
        </div>
      </div>
    </div>
  </div>


    <div class="card-body text-center">
      <a href="retain.php" class="btn btn-dark"><h5>Reuse</h5></a>
    </div>


