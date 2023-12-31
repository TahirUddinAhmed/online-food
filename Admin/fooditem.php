<?php require_once "includes/header.php" ?>
<?php
 if(isset($_GET['source'])) {
    $source = $_GET['source'];

    switch($source) {
        case 'add': 
            require_once 'includes/add_food.php';
            break;
        case 'view': 
            require_once 'includes/view_all_food.php';
            break;
        // default: 
        //     require_once 'fooditem.php';
    }

 }
?>
<div id="layoutSidenav_content">
    <main>
          <!-- <h1>Main page</h1> -->
    </main>
    
<?php require_once 'includes/footer.php' ?>