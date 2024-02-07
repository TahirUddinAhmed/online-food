<?php require_once "includes/header.php" ?>
<?php
  $query = "SELECT * FROM orders ORDER BY `orders`.`order_id` DESC";
  $result = mysqli_query($conn, $query);
  $no_of_orders = mysqli_num_rows($result);

//   Delete order
  if(isset($_GET['o_id'])) {
    $o_id = $_GET['o_id'];

    // query to delete record
    $delete = "DELETE FROM orders WHERE order_id = $o_id";
    $deleteRes = mysqli_query($conn, $delete);

    if(!$deleteRes) {
        die("QUERY FAILED" . mysqli_error($conn));
    } else {
        header("location: orders.php?deleted");
    }

  }


?>
<div id="layoutSidenav_content">
    <main>
    

        <div class="container mt-3">
        <?php
        if(isset($_GET['deleted'])) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Order has been deleted.
            
        </div>
        <?php
            }
        ?>

            <h3>All Orders</h3>
            <hr>

            <div class="card mb-4">
                
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th># Order image</th>
                                <th># Buyer details</th>
                                <th># Customer Details</th>
                                <th>Status</th>
                                <th>Confirm order</th>
                                <th>Date and Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SNO</th>
                                <th># Order image</th>
                                <th># Buyer details</th>
                                <th># Customer Details</th>
                                <th>Status</th>
                                <th>Confirm order</th>
                                <th>Date and Time</th>
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
                                    $date = $row['order_date'];

                                    // query to retrieve the food details
                                    $foodQuery = "SELECT * FROM menuitems WHERE ItemID = $foodID";
                                    $foodResult = mysqli_query($conn, $foodQuery);

                                    while($data=mysqli_fetch_assoc($foodResult)) {
                                        $foodImg = $data['food_img'];
                                        $price = $data['offer-price'];
                                        $foodTitle = $data['Name'];
                                    }


                                    // $order_date = date_format($date, "d l");
                            ?>
                                <tr>
                                    <td><?= $sno ?></td>
                                    <td>
                                        <!-- image -->
                                        <img src="../assets/Restaurant/<?= $foodImg ?>" width="180" class="img-fluid" alt="">
                                    </td>
                                    <td>
                                        <p><strong><?= $foodTitle ?></strong></p>
                                        <p>Quantity: <?= $quantity ?></p>
                                        <p>Total Price: <?= $price * $quantity ?></p>
                                    </td>
                                    <td>
                                        <p><strong><?= $customer_name ?></strong></p>
                                        <p><a href="tel: <?= $phone ?>"><?= $phone ?></a></p>
                                        <p><a href="mailto: <?= $email ?> "><?= $email ?></a></p>
                                        <p>Address: <?= $address ?></p>
                                    </td>

                                    <td>
                                        <!-- status -->
                                       <?= $status ?>
                                    </td>

                                    <td>
                                        <!-- confirm button -->
                                        <a href="" class="btn btn-sm btn-success">Confirm</a>
                                        <!-- cancel -->
                                        <a href="" class="btn btn-sm btn-warning">Cancel</a>
                                    </td>
                                    <td>
                                        <?= date("d M Y h:i A", strtotime($date)) ?>
                                    </td>
                                    <td>
                                        <a href="?o_id=<?= $orderID ?>" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this order?')">delete</a>
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