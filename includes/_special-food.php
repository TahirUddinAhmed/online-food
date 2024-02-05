<?php
  // grab all the menu items
  $query = "SELECT * FROM menuitems LIMIT 10";
  $result = mysqli_query($conn, $query);
  $no_foods = mysqli_num_rows($result);

?>
<div class="container mt-4" id="foods">
    <h2>Special Offer</h2>
    <div class="owl-carousel owl-theme mt-4">
    <?php
        if($no_foods > 0) {
            while($data = mysqli_fetch_assoc($result)) {
                $food_id = $data['ItemID'];
              $food_name = $data['Name'];
              $category_id = $data['CategoryID'];
              $original_price = $data['Price'];
              $offer_price = $data['offer-price'];
              $food_image = $data['food_img'];
        ?>
            <div class="food-item">
            <a href="food-items.php?id=<?= $food_id ?>">
             <img src="./assets/Restaurant/<?= $food_image ?>" alt="" />
            </a>
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
                <a href="order.php?id=<?= $food_id ?>" class="order-btn">Order Now</a>
            </div>
        </div>
        <?php
            }
        }
    ?>
    </div>
</div>

</div>