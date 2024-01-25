
<?php
  require_once 'functions.php';
  require_once '../config/DB.php';

 if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // grab the form data 
    $email_addr = check_input($_POST['email']);
    $password = check_input($_POST['password']);

    // validate the form 
    if(empty($email_addr)) {
        $emptyEmail = "Email is required!";
    } else if(!filter_var($email_addr, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Please Enter a valid email ID";
    }

    if(empty($password)) {
        $passErr = "Password is required!";
    }

    if(!empty($email_addr)) {
        // email is exits or not
        $uiExits = uiExist($conn, $email_addr);
        if($uiExits === false) {
            $uiErr = "Email is not registred as admin";
        }

        $sql = "SELECT * FROM `users` WHERE `Email` = '$email_addr' AND `role` = 'admin'";
        $result = mysqli_query($conn, $sql);

        if(!$result) {
            die("QUERY FAILED" . mysqli_error($conn));
        }


        while($row=mysqli_fetch_assoc($result)) {
            $user_id = $row['UserID'];
            $fullname = $row['Fullname'];
            $db_password = $row['Password'];
            $phone = $row['Phone'];
        }

        if($password !== $db_password) {
            $wrongPass = "Password is incorrect";
        } else {
            // login successfully
            $_SESSION['u_id'] = $user_id;
            $_SESSION['fullname'] = $fullname;

            // redirect to the admin home page
            header("location: index.php");
            exit();

        }
    }
    
 }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Online Food</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">

                                       <!-- Login Form -->
                                            <div class="mb-3">
                                                <span class="text-danger"><?= $uiErr ?? null ?></span>
                                            </div>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="inputEmail" type="email" value="<?= $email_addr ?? null ?>" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                                <span class="text-danger"><?= $emptyEmail ?? null; ?></span>
                                                <span class="text-danger"><?= $emailErr ?? null; ?></span>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" value="<?= $password ?? null ?>" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                                <span class="text-danger"><?= $passErr ?? null ?></span>
                                                <span class="text-danger"><?= $wrongPass ?? null ?></span>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <input type="submit" name="admin-login" value="Login" class="btn btn-primary">
                                            </div>
                                        </form>

                                         <!-- !Login Form -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Online Food 2024</div>
                            <div>
                                Developed by Tahir Uddin Ahmed
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
