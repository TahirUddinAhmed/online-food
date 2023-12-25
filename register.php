<?php require_once "includes/header.php" ?>

    <section id="register" class="container mt-5">
        <h2>Register</h2>

        <div class="register-form">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="fullname">Fullname</label>
                    <input type="text" name="fullname" class="form-control" id="fullname">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="phone">Phone</label>
                    <input type="phone" name="phone" class="form-control" id="phone">
                </div>
                 <div class="mb-3">
                   <label for="pwd">Password</label>
                    <input type="password" name="password" class="form-control" id="pwd">
                </div>
                 <div class="mb-3">
                   <label for="con_pwd">Retype Password</label>
                    <input type="password" name="retype-password" class="form-control" id="con_pwd">
                </div>

                <input type="submit" value="Register" class="btn btn-primary register-btn">
            </form>

            <div class="notregister">
              <p>Already have an account?<a href="login.html" class="reg-redirect">Login</a></p>
          </div>
        </div>

        
    </section>

<?php require_once "includes/footer.php" ?>