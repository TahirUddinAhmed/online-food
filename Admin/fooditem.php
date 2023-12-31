<?php require_once "includes/header.php" ?>
<?php
 if(isset($_GET['source'])) {
    $source = $_GET['source'];

    switch($source) {
        case 'add': 
            require_once 'includes/add_food.php';
            break;
    }

 }
?>
<div id="layoutSidenav_content">
    <main>
          
    </main>
    
<?php require_once 'includes/footer.php' ?>