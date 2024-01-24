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
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Category
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Veg Thali</a></li>
                  <li><a class="dropdown-item" href="#">Non Veg Thali</a></li>
                  <li><a class="dropdown-item" href="#">Fast Food</a></li>
                  <li><a class="dropdown-item" href="#">Soup</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Order</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
            </ul>
            <!-- <form class="d-flex" role="search">
         <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
         <button class="btn btn-outline-success" type="submit">Search</button>
       </form> -->

            <!-- <a class="text-reset me-3" href="addtocart.php"  id="shopping-cart-btn">
              <i class="fa-solid fa-cart-shopping fa-lg"></i>
              <p class="cart-count">1</p>
            </a> -->

            <div class="d-flex align-items-center">
              <!-- <button data-mdb-ripple-init type="button" class="btn btn-primary me-3">
            
         </button> -->
              <a href="login.php" id="register" class="btn btn-primary">
                <i class="fa-solid fa-user fa-2xs me-2"></i> Log In / Register
              </a>
            </div>
          </div>
        </div>
      </nav>
      <!-- !navbar -->