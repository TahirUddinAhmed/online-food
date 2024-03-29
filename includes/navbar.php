<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">My Restaurant</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
              <?php
                if(isset($_SESSION['u_id'])) {
              ?>
                  <li class="nav-item">
                    <a class="nav-link" href="orders.php">Order</a>
                  </li>
              <?php
                }
              ?>
            </ul>

            <?php
              if(isset($_SESSION['u_id'])) {
                ?>
                  <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> <?= $_SESSION['fullname'] ?? null ?></a>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            
                              <li><a class="dropdown-item" href="profile.php">profile</a></li>
                              <li><hr class="dropdown-divider" /></li>
                              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                          </ul>
                      </li>
                  </ul>

                <?php
              } else {
                ?>

                  <div class="d-flex align-items-center">
                    <a href="login.php" id="register" class="btn btn-primary">
                      <i class="fa-solid fa-user fa-2xs me-2"></i> Log In / Register
                    </a>
                  </div>

                <?php
              }
            ?>
          </div>
        </div>
      </nav>
      <!-- !navbar -->