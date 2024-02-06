<?php require_once "includes/header.php" ?>
<?php
  $query = "SELECT * FROM orders ORDER BY `orders`.`order_id` DESC";
  $result = mysqli_query($conn, $query);
  $no_of_orders = mysqli_num_rows($result);



?>
<div id="layoutSidenav_content">
    <main>
        <div class="container mt-3">
            <h3>All Orders</h3>
            <hr>

            <div class="card mb-4">
                
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th># Order image</th>
                                <th>Buyer details</th>
                                <th>Customer Details</th>
                                <th>Confirm order</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SNO</th>
                                <th># Order image</th>
                                <th>Customer details</th>
                                <th>Buyer Details</th>
                                <th>Confirm order</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                          <?php
                            if($no_of_orders > 0) {
                                $sno = 1;
                                while($row=mysqli_fetch_assoc($result)) {
                                    $orderID = $row['order_id'];
                                    $userID = $row['user_id'];
                                    $foodID = $row['food_id'];
                                    $quantity = $row['quantity'];
                                    $status = $row['status'];
                                    $customer_name = $row['customer_name'];
                                    $email = $row['email'];
                                    $phone = $row['phone'];
                                    $address = $row['address'];

                                    // query to retrieve the food details
                                    $foodQuery = "SELECT * FROM menuitems WHERE ItemID = $foodID";
                                    $foodResult = mysqli_query($conn, $foodQuery);

                                    while($data=mysqli_fetch_assoc($foodResult)) {
                                        $foodImg = $data['food_img'];
                                        $price = $data['offer-price'];
                                        $foodTitle = $data['Name'];
                                    }

                            ?>
                                <tr>
                                    <td><?= $sno ?></td>
                                    <td>
                                        <!-- image -->
                                        <img src="../assets/Restaurant/<?= $foodImg ?>" width="180" class="img-fluid" alt="">
                                    </td>
                                    <td>
                                        <p><strong><?= $foodTitle ?></strong></p>
                                        <p>Price: <?= $price ?></p>
                                        <p>Quantity: <?= $quantity ?></p>
                                    </td>
                                    <td>
                                        <p><strong><?= $customer_name ?></strong></p>
                                        <p><a href="tel: <?= $phone ?>"><?= $phone ?></a></p>
                                        <p><a href="mailto: <?= $email ?> "><?= $email ?></a></p>
                                        <p>Address: <?= $address ?></p>
                                    </td>

                                    <td>
                                        <!-- confirm button -->
                                        <a href="">confirm</a>
                                    </td>
                                    <td>
                                        <a href="">delete</a>
                                        <a href="">edit</a>
                                    </td>
                                    
                                </tr>

                            <?php
                                $sno++;
                                }
                            }
                          ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php require_once 'includes/footer.php' ?>