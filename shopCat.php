<?php require_once "includes/header.php" ?>
<?php 
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      // grab the category id 
      // if(isset($_POST['categories'])) {
      //   $cat_id =$_POST['categories'];
      // } else {
      //   // header("Location: shop.php?err=empty");
      //   echo "Category is required";
      // }
      $cat_id =$_POST['categories'];

      if(empty($cat_id)) {
        $emptyCat = "Please select a category";
        // exit();
      } else {
        $catSql = "SELECT * FROM category WHERE cat_id = $cat_id";
        $cat_result = mysqli_query($conn, $catSql);
  
        if(!$cat_result) {
          die("QUERY FAILED" . mysqli_error($conn));
        }
  
        while($data=mysqli_fetch_assoc($cat_result)) {
          $categoryName = $data['name'];
        }
      }
      // echo $cat_id;

  
    }

 // select the category table 
 $category_table = "SELECT * FROM category";
 $category_result = mysqli_query($conn, $category_table);
 $no_of_category = mysqli_num_rows($category_result);

 // grab all the menu items
 if(isset($cat_id) && !empty($cat_id)) {
   $query = "SELECT * FROM menuitems WHERE CategoryID = $cat_id";
  } else {
   $query = "SELECT * FROM menuitems";
 }
 $result = mysqli_query($conn, $query);
 $no_foods = mysqli_num_rows($result);

?>
    <section id="shop">
        <div class="shop-header">
            <h2>Shop <?= $categoryName ?? "Category"; ?></h2>
            <p>Order your favourite food</p>
        </div>
        
        <div class="container shop-body mt-5">

            <div class="shop-product">
                <div class="shop-category">
                    <h3>Food Categories</h3>
                    <span class="mt-2 mb-2 text-danger"><?= $emptyCat ?? null ?></span>
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