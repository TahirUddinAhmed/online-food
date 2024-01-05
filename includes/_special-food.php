<?php
  // grab all the menu items
  $query = "SELECT * FROM menuitems";
  $result = mysqli_query($conn, $query);
  $no_foods = mysqli_num_rows($result);

?>
<div class="container mt-4" id="foods">
    <h2>Special Offer</h2>
    <div class="owl-carousel owl-theme mt-4">
    <?php
        if($no_foods > 0) {
            while($data = mysqli_fetch_assoc($result)) {
              $food_name = $data['Name'];
              $category_id = $data['CategoryID'];
              $original_price = $data['Price'];
              $offer_price = $data['offer-price'];
              $food_image = $data['food_img'];
        ?>
            <div class="food-item">
            <img src="./assets/Restaurant/<?= $food_image ?>" alt="" />
            <div class="food-details">
                <div class="ratings">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p class="price"><?= $offer_price ?> <span class="or-price"><?= $original_price ?></span></p>
                <h3><?= $food_name ?></h3>
                <a href="food-items.html" class="order-btn">Order Now</a>
            </div>
        </div>
        <?php
            }
        }
    ?>
<!--         
        <div class="food-item">
            <img src="./assets/Restaurant/n1.jpg" alt="" />
            <div class="food-details">
                <div class="ratings">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p class="price">210 <span class="or-price">360</span></p>
                <h3>Chicken With Curd</h3>
                <a href="#" class="order-btn">Order Now</a>
            </div>
        </div>
        <div class="food-item">
            <img src="./assets/Restaurant/5.jpg" alt="" />
            <div class="food-details">
                <div class="ratings">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p class="price">98 <span class="or-price">180</span></p>
                <h3>Special Roti Thali</h3>
                <a href="food-items.php" class="order-btn">Order Now</a>
            </div>
        </div>
        <div class="food-item">
            <img src="./assets/Restaurant/6.jpg" alt="" />
            <div class="food-details">
                <div class="ratings">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p class="price">150 <span class="or-price">168</span></p>
                <h3>With Gulub Jamun</h3>
                <a href="food-items.html" class="order-btn">Order Now</a>
            </div>
        </div>
        <div class="food-item">
            <img src="./assets/Restaurant/2.jpg" alt="" />
            <div class="food-details">
                <div class="ratings">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <p class="price">160 <span class="or-price">220</span></p>
                <h3>Dosa</h3>
                <a href="food-items.html" class="order-btn">Order Now</a>
            </div>
        </div> -->
    </div>
</div>

</div>