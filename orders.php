<?php require_once "includes/header.php" ?>
<?php
 if(!isset($_SESSION['u_id'])) {
    header("Location: index.php");
    exit();
 }

 $user_id = $_SESSION['u_id'];

//  query to retreive the orders 
 $query = "SELECT * FROM orders WHERE user_id = $user_id";
 $result = mysqli_query($conn, $query);

 if(!$result) {
    die("QUERY FAILED" . mysqli_error($conn));
 }


?>
<div class="container mt-4">
    <h2>My Orders</h2>
    <hr>
    <div class="row">
    <?php
        if(mysqli_num_rows($result) > 0) {
            while($data=mysqli_fetch_assoc($result)) {
                $order_id = $data['order_id'];
                $quantity = $data['quantity'];
                $total_price = $data['total_price'];
                $status = $data['status'];
                $food_id = $data['food_id'];
                $order_date = $data['order_date'];

                // query to retrieve the food image 
                $foodQ = "SELECT * FROM menuitems WHERE `ItemID` = $food_id";
                $foodRes = mysqli_query($conn, $foodQ);

                while($row=mysqli_fetch_assoc($foodRes)) {
                    $food_img = $row['food_img'];
                    $food_name = $row['Name'];
                }
    ?>
    <div class="col-lg-6 border mb-3">
            <div class="mb-2">
                <div class="row">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <a href="./food-items.php?id=<?= $food_id ?>">
                         <img src="./assets/Restaurant/<?= $food_img ?>" class="img-fluid rounded-pill border" alt="">
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="./food-items.php?id=<?= $food_id ?>">
                          <h5 class="mt-2"><?= $food_name ?></h5>
                        </a>
                        <p>
                            <strong class="text-muted">Quantity</strong>:
                             <?= $quantity ?></p>
                        <p>
                            <strong class="text-muted">Total price</strong>:
                             <?= $total_price * $quantity ?>
                        </p> 
                        <p>
                            <strong class="text-muted">Order Time</strong>:
                            <?= date("d M Y h:i A", strtotime($order_date)) ?>
                        </p>
                    </div>
                    <div class="col-2">
                        <strong class="text-center">Status</strong>
                        <hr>
                        <?php
                            if($status == 'pending') {
                        ?>
                                <span class="badge text-bg-warning rounded-pill text-white p-2"><?= $status ?></span>
                        <?php
                            } else if($status == 'delivered'){
                        ?>  
                                <span class="badge text-bg-success rounded-pill text-white p-2"><?= $status ?></span>
                        <?php
                            } else {
                        ?>
                            <span class="badge text-bg-danger rounded-pill text-white p-2"><?= $status ?></span>
                        <?php
                            }
                        ?>
                        <p class="mt-2"></p>
                    </div>
                </div>
                <div class="food-img">
                </div>

            </div>
        </div>
    <?php

            }
        }
    ?>
        
    </div>
</div>
<?php require_once "includes/footer.php" ?>