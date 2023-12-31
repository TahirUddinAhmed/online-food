<?php require_once "includes/header.php" ?>
<?php 
 // select the category table 
 $category_table = "SELECT * FROM category";
 $category_result = mysqli_query($conn, $category_table);
 $no_of_category = mysqli_num_rows($category_result);
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
                    <select name="categories" id="" class="form-control">
                    <option value="">Choose Category</option>
                    <?php
                      if($no_of_category > 0) {
                        while($data = mysqli_fetch_assoc($category_result)) {
                          // grab the category name
                          $categoryName = $data['name'];
                        ?>
                            <option value="<?=$categoryName?>"><?= $categoryName ?></option>
                        <?php
                        }
                      }
                    ?>
                        
                        <!-- <option value="">Pizza</option>
                        <option value="">Veg Thali</option>
                        <option value="">Non-veg Thali</option>
                        <option value="">Soup</option>
                        <option value="">Fast Food</option> -->
                    </select>
                </div>
                <div class="products">
                    <div class="shop-food">
                        <img src="./assets/Restaurant/fast1.jpg" alt="" />
                        <div class="product-details">
                          <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <p class="price">160 <span class="or-price">220</span></p>
                          <h3>Dosa</h3>
                          <a href="#" class="order-btn">Order Now</a>
                        </div>
                    </div>
                    <div class="shop-food">
                        <img src="./assets/Restaurant/fast1.jpg" alt="" />
                        <div class="product-details">
                          <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <p class="price">160 <span class="or-price">220</span></p>
                          <h3>Dosa</h3>
                          <a href="#" class="order-btn">Order Now</a>
                        </div>
                    </div>
                    <div class="shop-food">
                        <img src="./assets/Restaurant/fast1.jpg" alt="" />
                        <div class="product-details">
                          <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <p class="price">160 <span class="or-price">220</span></p>
                          <h3>Dosa</h3>
                          <a href="#" class="order-btn">Order Now</a>
                        </div>
                    </div>
                    
                    <div class="shop-food">
                        <img src="./assets/Restaurant/fast1.jpg" alt="" />
                        <div class="product-details">
                          <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <p class="price">160 <span class="or-price">220</span></p>
                          <h3>Dosa</h3>
                          <a href="#" class="order-btn">Order Now</a>
                        </div>
                    </div>
                    <div class="shop-food">
                        <img src="./assets/Restaurant/fast1.jpg" alt="" />
                        <div class="product-details">
                          <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <p class="price">160 <span class="or-price">220</span></p>
                          <h3>Dosa</h3>
                          <a href="#" class="order-btn">Order Now</a>
                        </div>
                    </div>
                    <div class="shop-food">
                        <img src="./assets/Restaurant/fast1.jpg" alt="" />
                        <div class="product-details">
                          <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <p class="price">160 <span class="or-price">220</span></p>
                          <h3>Dosa</h3>
                          <a href="#" class="order-btn">Order Now</a>
                        </div>
                    </div>
                    <div class="shop-food">
                        <img src="./assets/Restaurant/fast1.jpg" alt="" />
                        <div class="product-details">
                          <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <p class="price">160 <span class="or-price">220</span></p>
                          <h3>Dosa</h3>
                          <a href="#" class="order-btn">Order Now</a>
                        </div>
                    </div>
                    <div class="shop-food">
                        <img src="./assets/Restaurant/fast1.jpg" alt="" />
                        <div class="product-details">
                          <div class="ratings">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <p class="price">160 <span class="or-price">220</span></p>
                          <h3>Dosa</h3>
                          <a href="#" class="order-btn">Order Now</a>
                        </div>
                    </div>
                </div>
                
           
            </div>
            
        </div>
    </section>

<?php require_once "includes/footer.php" ?>