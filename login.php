<?php require_once "includes/header.php" ?>
<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // grab the data 
  $email = check_input($_POST['email']);
  $password = $_POST['password'];

  // validate the form 
  if(empty($email)) {
    $emailErr = "Email is required!";
  } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailInvalid = "Please enter a valid email id";
  }

  if(empty($password)) {
    $passErr = "Password is required!";
  }

  if(!empty($email) && !empty($password)) {
    // validate if email id is exists in the db or not 
    $uiExists = uiExist($conn, $email);

    if($uiExists == false) {
      $wrongEmail = "Email ID not exists, create an account first";
    } else {
      $sql = "SELECT * FROM `users` WHERE `Email` = '$email' AND `role` = 'buyer'";
      $result = mysqli_query($conn, $sql);
  
      while($row=mysqli_fetch_assoc($result)) {
        $user_id = $row['UserID'];
        $fullname = $row['Fullname'];
        $email = $row['Email'];
        $phone = $row['Phone'];
        $hash_pass = $row['Password'];
      }
  
      $check_pwd = password_verify($password, $hash_pass); // it returns true or false
      
      if($check_pwd == false) {
        $wrongPwd = "Password is incorrect";
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
  
 }

?>
    <section id="login" class="container mt-5">
        <h2>Login</h2>

        <div class="login-form">
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="mb-3">
                    <label for="username">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $email ?? null ?>" id="username">
                    <span class="text-danger"><?= $emailErr ?? null ?></span>
                    <span class="text-danger"><?= $emailInvalid ?? null ?></span>
                    <span class="text-danger"><?= $wrongEmail ?? null ?></span>
                  </div>
                <div class="mb-3">
                    <label for="pwd">Password</label>
                    <div class="pwd-field">
                      <input type="password" name="password" class="form-control" value="<?= $password ?? null ?>" id="pwd">
                      <span id="pwd-check">Show</span>
                    </div>
                    <span class="text-danger"><?= $passErr ?? null ?></span>
                    <span class="text-danger"><?= $wrongPwd ?? null ?></span>
                </div>
                <div class="row mb-4">
                  <div class="col d-flex justify-content-between">
                    <!-- Checkbox -->
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                      <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                  </div>
              
                  <div class="col text-end">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                  </div>
                </div>
                <input type="submit" value="Login" class="btn btn-primary btn-block mb-4 login-btn">
            </form>
            <div class="notregister">
              <p>Don't have an account?<a href="register.php" class="reg-redirect">Create</a></p>
          </div>
        </div>

        
    </section>

<?php require_once "includes/footer.php" ?>