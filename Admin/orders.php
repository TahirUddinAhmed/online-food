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

//   Confirm a order: Mark as delivered
 if(isset($_GET['confirm_id'])) {
    $theId = $_GET['confirm_id'];

    // update the status column to 'delivered'
    $confirmQ = "UPDATE orders SET status = 'delivered' WHERE order_id = $theId";
    $confirmRes = mysqli_query($conn, $confirmQ);

    if(!$confirmRes) {
        die("QUERY FAILED" . mysqli_error($conn));
    } else {
        header("Location: orders.php?confirmed");
    }
 }

//  Cancel a Order
 if(isset($_GET['cancel'])) {
    $orderId = $_GET['cancel'];

    // cancel query: Update status 
    $cancelQ = "UPDATE orders SET `status` = 'canceled' WHERE `order_id` = $orderId";
    $cancelRes = mysqli_query($conn, $cancelQ);

    if(!$cancelRes) {
        die("QUERY FAILED" . mysqli_error($conn));
    } else {
        header("Location: orders.php?canceled");
    }
 }


?>
<div id="layoutSidenav_content">
    <main>
    

        <div class="container mt-3">
        <!-- Delete alert -->
        <?php
        if(isset($_GET['deleted'])) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            The Order has been deleted.
        </div>
        <?php
            }
        ?>
        <!-- confirmed(Delivered) alert -->
        <?php
        if(isset($_GET['confirmed'])) {
        ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            The Order has been delivered.
        </div>
        <?php
            }
        ?>
        <!-- Cancel Alert -->
        <?php
        if(isset($_GET['canceled'])) {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            The Order has been canceled.
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
                                        <a href="../food-items.php?id=<?= $foodID ?>">
                                         <img src="../assets/Restaurant/<?= $foodImg ?>" width="180" class="img-fluid" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <p><strong>
                                            <a href="../food-items.php?id=<?= $foodID ?>">
                                              <?= $foodTitle ?>
                                            </a>
                                        </strong></p>
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
                                        <a href="?confirm_id=<?= $orderID ?>" class="btn btn-sm btn-success" onclick="return confirm('Mark As Delivered')">Confirm</a>
                                        <!-- cancel -->
                                        <a href="?cancel=<?= $orderID ?>" class="btn btn-sm btn-warning" onclick="return confirm('Want to cancel this order?')">Cancel</a>
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