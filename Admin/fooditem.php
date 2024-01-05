<?php require_once "includes/header.php" ?>
<?php
 if(isset($_GET['source'])) {
    $source = $_GET['source'];
 } else {
    $source = '';
 }

 switch($source) {
    case 'add': 
        include 'includes/add_food.php';
        break;
    case 'edit':
        include 'includes/edit_food-items.php';
        break;
    default: 
        include 'includes/view_all_food.php';
        // break;
  }


?>
<div id="layoutSidenav_content">
    <main>
          <!-- <h1>Main page</h1> -->
          
    </main>
    
<?php require_once 'includes/footer.php' ?>