<?php require_once "includes/header.php" ?>
<?php
 if(isset($_GET['reg'])) {
  if($_GET['reg'] == 'success') {
    $reg_success = "Your account has been created successfully";
  }
 }
?>
<!-- account modal -->
<?php
 if(isset($reg_success)) {
  ?>
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <?= $reg_success ?>
  <a href="login.php" class="ms-4">login</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  <?php
 }

?>
<!-- account modal -->
<!-- account modal -->
<?php
 if(isset($_GET['notLogged'])) {
  ?>
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <?php echo "Please Create OR login to an existing account ? " ?>
  <a href="login.php" class="ms-4">login</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  <?php
 }

?>
<!-- account modal -->
  <?php
  // <!-- header carousal -->
  include('includes/_header-carousel.php');
  // <!-- !header carousal -->

  // <!-- top food category section -->
  include('includes/_top_food_items.php');
  // <!-- !top food category section -->

  // <!-- food carousel -->
  include('includes/_special-food.php');
  // <!-- !food carousel -->

  // Our Localtion
  include('includes/_our-location.php');
  // Our Localtion
  ?>
  
<?php require_once "includes/footer.php" ?>