<?php
$title = 'VIEW DATA';
require_once 'includes/header.php';
require_once 'db/connection.php';
$loop = $cases->countData();
?>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">KEYWORD</th>
      <th scope="col">SEARCH_VOLUME</th>
      <th scope="col">PAID_DIFFICULTY</th>
      <th scope="col">SEARCH_DIFFICULTY</th>
      <th scope="col">CPC</th>
    </tr>
  </thead>
  <tbody>
        <?php
          for ($i=1; $i<= $loop ; $i++) 
          { 
             $result = $cases->get($i);
               ?>
    <tr>
        <td><?php echo $result['id'] ?></td>
        <td><?php echo $result['Keyword'] ?></td>
        <td><?php echo $result['Search_Volume'] ?></td>
        <td><?php echo $result['Paid_Difficulty'] ?> </td>
        <td><?php echo $result['Search_Difficulty'] ?> </td>
        <td><?php echo $result['CPC'] ?> </td>

    </tr>


        <?php
           }
        ?>
    
    </table>
  </tbody>
</table>
</div>
