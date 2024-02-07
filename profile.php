<?php require_once "includes/header.php" ?>
<?php
 if(!isset($_SESSION['u_id'])) {
    header("Location: index.php");
    exit();
 }

 $user_id = $_SESSION['u_id'];

 $query = "SELECT * FROM users WHERE UserID = $user_id";
 $result = mysqli_query($conn, $query);

 if(!$result) {
    die("QUERY FAILED" . mysqli_error($conn));
 }

 while($data=mysqli_fetch_assoc($result)) {
    $fullname = $data['Fullname'];
    $email = $data['Email'];
    $phone = $data['Phone'];
    $address = $data['address'];
 }


//  Update info
 if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['fullname'];
    $userEmail = $_POST['email'];
    $userPhone = $_POST['phone'];
    $userAddr = $_POST['addr'];

    // validate the form 
    $errors = []; // empty array

    if(empty($userName)) {
        $errors['emptyName'] = "Name is required!";
    }

    if(empty($userEmail)) {
        $errors['emptyEmail'] = "Email is required!";
    }

    if(empty($userPhone)) {
        $errors['emptyPhone'] = "Phone number is required";
    }

    if(empty($userAddr)) {
        $errors['emptyAddr'] = "Address is required";
    }

    if(empty($errors)) {
        // update query 
        $update = "UPDATE users SET `Fullname` = '$userName', `Email` = '$userEmail', `Phone` = '$userPhone', `address` = '$userAddr' WHERE `UserID` = '$user_id'";
        $updateRes = mysqli_query($conn, $update);

        if(!$updateRes) {
            die("QUERY FAILED" . mysqli_error($conn));
        } else {
            header("location: profile.php?updated");
        }
    }

 }
?>

<div class="container mb-4 mt-4">
    <?php
        if(isset($_GET['updated'])) {
    ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check me-2"></i>User information updated successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        }
    ?>
    <h2>My Profile</h2>
    <hr>
    <div class="row">
      <div class="col-lg-6">
        <div class="row mb-5">
            <div class="col-6">
                <div class="bg-warning" style="
                /* width: 230px;  */
                min-height: 150px; 
                border-radius: 7px;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                font-size: 25px;
                color: white;
                ">
                   <i class="fa-solid fa-truck-fast me-4"></i> <h2>Orders</h2>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-secondary" style="
                /* width: 230px;  */
                min-height: 150px; 
                border-radius: 7px;
                display: flex;
                justify-content: center;
                align-items: center;
                ">
                    <h2>How are you</h2>
                </div>
            </div>
        </div>
        
        
      </div>

      <div class="col-lg-6 gap-4">
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="mb-2 form-group">
                <label for="name" class="mb-2">Full Name</label>
                <input type="text" name="fullname" class="form-control" value="<?= $fullname ?? null ?>">
                <?php
                    if(isset($errors['emptyName'])) {
                ?>
                    <span class="text-muted text-danger"><?= $errors['emptyName'] ?></span>
                <?php
                    }
                ?>
            </div>
            <div class="mb-2 form-group">
                <label for="email" class="mb-2">Email</label>
                <input type="text" name="email" class="form-control" value="<?= $email ?? null ?>">
                <?php
                    if(isset($errors['emptyEmail'])) {
                ?>
                    <span class="text-danger"><?= $errors['emptyEmail'] ?></span>
                <?php
                    }
                ?>
            </div>
            <div class="mb-2 form-group">
                <label for="phone" class="mb-2">phone</label>
                <input type="phone" name="phone" class="form-control" value="<?= $phone ?? null ?>">
                <?php
                    if(isset($errors['emptyPhone'])) {
                ?>
                    <span class="text-danger"><?= $errors['emptyPhone'] ?></span>
                <?php
                    }
                ?>
            </div>
            <div class="mb-2 form-group">
                <label for="addr" class="mb-2">Address</label>
                <input type="text" name="addr" class="form-control" value="<?= $address ?? null ?>">
                <?php
                    if(isset($errors['emptyAddr'])) {
                ?>
                    <span class="text-danger"><?= $errors['emptyAddr'] ?></span>
                <?php
                    }
                ?>
            </div>
            <input type="submit" value="Save Changes" class="btn btn-primary">
        </form>
      </div>
    </div>
</div>
<?php require_once "includes/footer.php" ?>