<?php require_once "includes/header.php" ?>
<?php
  if(isset($_GET['id'])) {
    $food_id = $_GET['id'];
  }

  $query = "SELECT * FROM menuitems WHERE ItemID = $food_id";
  $food_result = mysqli_query($conn, $query);

  if(!$food_result) {
    die("QUERY FAILED" . mysqli_error($conn));
  } 

  while($data=mysqli_fetch_assoc($food_result)) {
    $food_id = $data['ItemID'];
    $food_name = $data['Name'];
    $category_id = $data['CategoryID'];
    $original_price = $data['Price'];
    $offer_price = $data['offer-price'];
    $food_image = $data['food_img'];
    $desc = $data['Description'];

  }
  $total_save = $original_price - $offer_price;

  // query to retreive category id 
  $cat_query = "SELECT * FROM `category` WHERE cat_id = $category_id";
  $cat_result = mysqli_query($conn, $cat_query);

  while($data=mysqli_fetch_assoc($cat_result)) {
    $cat_name = $data['name'];
  }

  // related product 
  $related_product = "SELECT * FROM menuitems WHERE CategoryID = $category_id";
  $related_result = mysqli_query($conn, $related_product);

 


?>

    <!-- single item page -->
    <div class="container">
      
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
              
                    <div class="col-sm-6">
                        <img src="./assets/Restaurant/<?= $food_image ?>" alt="product" class="img-fluid">
                        <div class="row pt-4 font-16 font-balo">
                            
                            <!-- <div class="col">
                                <button type="submit" class="btn btn-warning form-control">Add to cart</button>

                            </div> -->

                        </div>
                    </div>
                    <div class="col-sm-6 py-3">
                        <h5 class="font-balo font-20"><?= $food_name ?></h5>
                        <small><?= $cat_name ?></small>

                        <div class="d-flex">
                            <div class="rating text-warning font-12">
                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star-half" aria-hidden="true"></i></span>
                                <a href="" class="font-14 font-rale">1548 ratings | 999+ answered question </a>
                                
                            </div>
                        </div>
                        <hr class="m-0">

                        <!-- product price -->
                        <div class="product-price font-rale mt-3">
                            <div class="product-item d-flex">
                                <p class="w-25">M.R.P</p>
                                <P><strike><?= $original_price ?></strike></P>
                            </div>
                            <div class="product-item d-flex">
                                <p class="w-25">Deal Price</p>
                                <P class=""><span class="font-20 text-danger font-rale"><?= $offer_price ?></span> <small>include of all taxes</small></P>
                            </div>
                            <div class="product-item d-flex">
                                <p class="w-25">You Save</p>
                                <P class=""><span class="font-20 text-danger font-rale"><?= $total_save ?></span></P>
                            </div>
                        </div>
                        <!-- !product price -->

                        
                        <hr>

                        <!-- order detail -->
                        <div id="order-detail" class="font-rale d-flex flex-column text-dark">
                          <!-- <small>Delivery By: Nov 21 - Nov - 26</small>
                          <small>₹23 Delivery fee will apply</small> -->
                          <!-- <small>Sold by <a href="#">Daily Electronics</a>(4.5 out of 5 | 19,752 ratings)</small> -->
                          <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 782105</small>
                        </div>
                        <!-- !order detail -->

                        <div class="row">
                          <div class="col-6">
                              <!-- product qty section -->
                              <div class="qty d-flex">
                                  <h6 class="font-baloo">Qty</h6>
                                  <div class="px-4 d-flex w-100 font-rale">
                                      <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                                      <input type="text" data-id="pro1" class="qty_input border px-2 w-75 bg-light" placeholder="1">
                                      <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                                  </div>
                              </div>
                              <!-- !product qty section -->
                          </div>
                      </div>

                      <div class="mt-3">
                                <!-- <button type="submit" class="btn btn-danger form-control">Buy Now</button> -->
                                <a href="order.php?id=<?= $food_id ?>" class="btn btn-danger" style="width: 100%;">Order Now</a>
                            </div>


                    </div>

                    <div class="col-12 mt-2">
                      <h6 class="font-rubik">Product Description</h6>
                      <hr>
                      <p class="font-rale font-14"><?= $desc ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section id="relatedFood">
            <h2>Related Food</h2>
            <div class="owl-carousel owl-theme mt-4">
            <?php
             while($data = mysqli_fetch_assoc($related_result)) {
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
                    <a href="#" class="order-btn">Order Now</a>
                  </div>
                </div>
            <?php
             }
            ?>
                
              </div>
        </section>
    </div>
    <!-- !single item page -->
<?php require_once "includes/footer.php" ?>