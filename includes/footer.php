<?php
//  query 
    $query = "SELECT * FROM category";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("QUERY FAILED" . mysqli_error($conn));
    } 
?>
<footer class="text-center text-lg-start bg-dark text-muted">
      <div class="upper-footer">
        <div class="footer-a">
          <h3>Quick Link</h3>
          <div class="footer-link">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="shop.php">Shop</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="./Admin/index.php">My Account</a></li>
            </ul>
          </div>
        </div>

        <div class="footer-b">
          <h3>Top Category</h3>
          <div class="footer-link">
            <ul>
          <?php
              while($data=mysqli_fetch_assoc($result)) {
                $cat_id = $data['cat_id'];
                $cat_name = $data['name'];
                // number of food items added 
                $FoodQuery = "SELECT * FROM menuitems WHERE categoryID = $cat_id";
                $FoodRes = mysqli_query($conn, $FoodQuery);
                $num_of_items = mysqli_num_rows($FoodRes);

            if($num_of_items > 0) {
                
           
          ?>
                <form action="shopCat.php" method="POST">
                  <input type="hidden" name="categories" value="<?= $cat_id ?>">
                  <li>
                    <input type="submit" value="<?= $cat_name ?>" style="border: none; background: none; color: white;">
                  </li>
                </form>

          <?php
           }
              }
          ?>
            </ul>
          </div>
        </div>
        <div class="footer-c">
          <h3>Address</h3>
          <div class="footer-link">
            <ul>
              <li><a href="#">148, Morigaon, Assam</a></li>
              <li>Email: <a href="#">barasha163@gmail.com</a></li>
              <li>Mobile: <a href="#">7099608976</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div
        class="text-center p-4"
        style="background-color: rgba(0, 0, 0, 0.05)"
      >
        © 2023 Copyright:
        <a class="text-reset fw-bold" href="#">My Restaurant</a>
      </div>
    </footer>

    <!-- bootstrap js cdn -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>

    <!-- jquery cdn -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-compat/3.0.0-alpha1/jquery.min.js"
      integrity="sha512-4GsgvzFFry8SXj8c/VcCjjEZ+du9RZp/627AEQRVLatx6d60AUnUYXg0lGn538p44cgRs5E2GXq+8IOetJ+6ow=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <!-- owl carousel cdn -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
      integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

    <!-- custom js -->
    <script src="./js/script.js"></script>
  </body>
</html>
