<?php require_once "includes/header.php" ?>
<?php
 // get the food id
 if(isset($_GET['id'])) {
    $foodID = $_GET['id'];

 }

//  check whether user logged in to the system or not
 if(isset($_SESSION['u_id'])) {
    $uId = $_SESSION['u_id'];
    // query 
    $user = "SELECT * FROM users WHERE userID = $uId";
    $userRes = mysqli_query($conn, $user);

 } else {
    header("location: index.php?notLogged");
    exit();
 }

 // query to retrieve food details using foodID
 $query = "SELECT * FROM menuitems WHERE ItemID = $foodID";
 $result = mysqli_query($conn, $query);

 if(!$result) {
    die("QUERY failed" . mysqli_error($conn));
 }

 // food details
 while($data=mysqli_fetch_assoc($result)) {
    $food_id = $data['ItemID'];
    $food_name = $data['Name'];
    $category_id = $data['CategoryID'];
    $original_price = $data['Price'];
    $offer_price = $data['offer-price'];
    $food_image = $data['food_img'];        
 }

 // user details
 while($row=mysqli_fetch_assoc($userRes)) {
    $user_id = $row['UserID'];
    $fullname = $row['Fullname'];
    $email = $row['Email'];
    $phone = $row['Phone'];
 }



//  order form 
 if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['fullname'];
    $userEmail = $_POST['email'];
    $userPhone = $_POST['phone'];
    $userAddress = $_POST['address'];
    $quantity = $_POST['quantity'];

    // validate the form 
    $error = []; // an empty array

    if(empty($username)) {
        $error['emptyName'] = "Fullname is required!";
    }

    if(empty($userEmail)) {
        $error['emptyEmail'] = "Email is required";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['invalidEmail'] = "Enter a valid email ID";
    }

    if(empty($userPhone)) {
        $error['emptyPhone'] = "Phone number is required";
    }

    if(empty($userAddress)) {
        $error['emptyAddr'] = "Address is required";
    }

    if(empty($quantity)) {
        $error['emptyQuantity'] = "Quantity is required";
    }


    // if there is no error. 
    if(empty($error)) {
        // insert into data base 
        
        $sql = "INSERT INTO `orders` (`user_id`, `customer_name`, `email`, `phone`, `address`, `quantity`, `total_price`, `order_date`, `food_id`) VALUES ('$uId', '$username', '$userEmail', '$userPhone', '$userAddress', '$quantity', '$offer_price', current_timestamp(), '$food_id')";
        $result = mysqli_query($conn, $sql);

        if(!$result) {
            die("QUERY FAILED" . mysqli_error($conn));
        } else {
            header("location: index.php?ordered");
        }


    }
 }  
?>

<div class="container">
    <h2 class="text-center mt-4">Order</h2>
    <hr>

    <form action="" method="post">
    <div class="row">
        <div class="col col-lg-7 border p-3">
            <div class="form-group mb-2">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" class="form-control" value="<?= $fullname ?? null ?>">
            <?php
                if(isset($error['emptyName'])) {
            ?>
                <span class="text-danger"><?= $error['emptyName'] ?></span>
            <?php
                }
            ?>
            </div> 

            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $email ?? null ?>">
                <?php
                if(isset($error['emptyEmail'])) {
               ?>
                   <span class="text-danger"><?= $error['emptyEmail'] ?></span>
                <?php
                }
                ?>
            </div>        
            <div class="form-group mb-2">
                <label for="phone">Phone</label>
                <input type="phone" name="phone" class="form-control" value="<?= $phone ?? null ?>">
                <?php
                if(isset($error['emptyPhone'])) {
               ?>
                   <span class="text-danger"><?= $error['emptyPhone'] ?></span>
                <?php
                }
                ?>
            </div>               
            <div class="form-group mb-2">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" value="<?= $userAddress ?? null ?>">
            
                <?php
                if(isset($error['emptyAddr'])) {
               ?>
                   <span class="text-danger"><?= $error['emptyAddr'] ?></span>
                <?php
                }
                ?>
            </div>        
            <div class="form-group mb-2">
                <label for="quantity">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="">
            
                <?php
                if(isset($error['emptyQuantity'])) {
               ?>
                   <span class="text-danger"><?= $error['emptyQuantity'] ?></span>
                <?php
                }
                ?>
            </div>        

            <button type="submit" name="ordernow" class="btn btn-primary mx-auto d-block mt-4" style="width: 40%;">Order Now</button>
        </div>
        

        <div class="col col-lg-5 border p-3">
                <!-- food image -->
            <div class="food-img">
                <img src="./assets/Restaurant/<?= $food_image ?>" style="width: 70%;" class="rounded mx-auto d-block" alt="">
            </div>
            <div class="container text-center">
                <h3 class="mt-2"><?= $food_name ?></h3>
                <p>Price: <?= $offer_price ?></p>
                <p>You Saved: <?= $original_price - $offer_price ?> </p>
               
            </div>
        </div>
    </div>
</form>
</div>

<?php require_once "includes/footer.php" ?>