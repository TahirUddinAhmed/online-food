<?php require_once "includes/header.php" ?>
<?php 
 // select the category table 
 $category_table = "SELECT * FROM category";
 $category_result = mysqli_query($conn, $category_table);
 $no_of_category = mysqli_num_rows($category_result);

 // grab all the menu items
 $query = "SELECT * FROM menuitems";
 $result = mysqli_query($conn, $query);
 $no_foods = mysqli_num_rows($result);

?>
    <section id="shop">
        <div class="shop-header">
            <h2>Shop</h2>
            <p>Order your favourite food</p>
        </div>
        
        <div class="container shop-body mt-5">

            <div class="shop-product">
                <div class="shop-category">
                    <h3>Food Categories</h3>
                    <?php include('includes/_searchCategory.php') ?>
                    
                </div>
                <div class="products">
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
                    <div class="shop-food">
                      <a href="food-items.php?id=<?= $food_id ?>">
                        <img src="./assets/Restaurant/<?= $food_image ?>" alt="" />
                      </a>
                        <div class="product-details">
                          <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <p class="price"><?= $offer_price ?> <span class="or-price"><?= $original_price ?></span></p>
                          <h5 class="text-center"><?= $food_name ?></h5>
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
    </section>

<?php require_once "includes/footer.php" ?>