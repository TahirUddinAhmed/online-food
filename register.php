<?php require_once "includes/header.php" ?>
<?php
 if($_SERVER['REQUEST_METHOD'] == "POST") {
    // grab all the form data 
    $fullName = check_input($_POST['fullname']);
    $email = check_input($_POST['email']);
    $phone = check_input($_POST['phone']);
    $pass = $_POST['password'];
    $conPass = check_input($_POST['retype-password']);

    // validate the form 
    if(empty($fullName) || empty($email) || empty($phone) || empty($pass) || empty($conPass)) {
        $formErr = "All fields are required";
    } else {
        if($pass !== $conPass) {
            $passErr = "Password not match";
        } else {
            // register the user 
            // password hash code 
            $passHash = password_hash($pass, PASSWORD_DEFAULT);

            $reg = "INSERT INTO `users` (`Fullname`, `Email`, `Password`, `Phone`, `role`, `Create_at`) VALUES ('$fullName', '$email', '$passHash', '$phone', 'buyer', current_timestamp());";
            $result = mysqli_query($conn, $reg);

            if(!$result) {
                die("QUERY FAILED" . mysqli_error($conn));
            } else {
                header("location: index.php?reg=success");
            }
        }
    }

    
 }

?>

    <section id="register" class="container mt-5">
        <h2>Register</h2>

        <div class="register-form">
            <div class="mb-3">
                <span class="text-danger"><?= $formErr ?? null ?></span>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="mb-3">
                    <label for="fullname">Fullname</label>
                    <input type="text" name="fullname" class="form-control" value="<?= $fullName ?? null ?>" id="fullname">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $email ?? null ?>" id="email">
                </div>
                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input type="phone" name="phone" class="form-control" value="<?= $phone ?? null ?>" id="phone">
                </div>
                 <div class="mb-3">
                   <label for="pwd">Password</label>
                    <input type="password" name="password" class="form-control" value="<?= $pass ?? null ?>" id="pwd">
                </div>
                 <div class="mb-3">
                   <label for="con_pwd">Retype Password</label>
                    <input type="password" name="retype-password" class="form-control" value="<?= $conPass ?? null ?>" id="con_pwd">
                    <span class="text-danger"><?= $passErr ?? null ?></span>
                </div>

                <input type="submit" value="Register" class="btn btn-primary register-btn">
            </form>

            <div class="notregister">
              <p>Already have an account?<a href="login.html" class="reg-redirect">Login</a></p>
          </div>
        </div>

        
    </section>

<?php require_once "includes/footer.php" ?>