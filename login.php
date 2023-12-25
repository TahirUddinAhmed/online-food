<?php require_once "includes/header.php" ?>

    <section id="login" class="container mt-5">
        <h2>Login</h2>

        <div class="login-form">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username">Username or Email</label>
                    <input type="text" name="username" class="form-control" id="username">
                </div>
                <div class="mb-3">
                    <label for="pwd">Password</label>
                    <div class="pwd-field">
                      <input type="password" name="password" class="form-control" id="pwd">
                      <span id="pwd-check">Show</span>
                    </div>
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