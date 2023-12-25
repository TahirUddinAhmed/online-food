<?php require_once "includes/header.php" ?>

    <!-- single item page -->
    <div class="container">
        <section id="product" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="./assets/Restaurant/2.jpg" alt="product" class="img-fluid">
                        <div class="row pt-4 font-16 font-balo">
                            <div class="col">
                                <button type="submit" class="btn btn-danger form-control">Buy Now</button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-warning form-control">Add to cart</button>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 py-3">
                        <h5 class="font-balo font-20">Hamburger</h5>
                        <small>Fast Food</small>

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
                                <P><strike>465</strike></P>
                            </div>
                            <div class="product-item d-flex">
                                <p class="w-25">Deal Price</p>
                                <P class=""><span class="font-20 text-danger font-rale">250</span> <small>include of all taxes</small></P>
                            </div>
                            <div class="product-item d-flex">
                                <p class="w-25">You Save</p>
                                <P class=""><span class="font-20 text-danger font-rale">251</span></P>
                            </div>
                        </div>
                        <!-- !product price -->

                        <!-- policy -->
                        <!-- <div id="policy">
                            <div class="d-flex">
                                <div class="return text-center me-5">
                                    <div class="font-20 my-2 color-second">
                                        <span class="fas fa-retweet border p-3 rounded-pill"></span>

                                    </div>
                                    <a href="" class="font-rale font-12">10 Days <br>Replacement</a>
                                </div>
                                <div class="return text-center me-5">
                                    <div class="font-20 my-2 color-second">
                                        <span class="fas fa-truck border p-3 rounded-pill"></span>

                                    </div>
                                    <a href="" class="font-rale font-12">Daily Tuition<br>Deliver</a>
                                </div>
                                <div class="return text-center">
                                    <div class="font-20 my-2 color-second">
                                        <span class="fas fa-check-double border p-3 rounded-pill"></span>

                                    </div>
                                    <a href="" class="font-rale font-12">1 year <br>Warrenty</a>
                                </div>
                            </div>
                        </div> -->
                        <!-- !policy -->
                        <hr>

                        <!-- order detail -->
                        <div id="order-detail" class="font-rale d-flex flex-column text-dark">
                          <small>Delivery By: Nov 21 - Nov - 26</small>
                          <small>₹23 Delivery fee will apply</small>
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


                    </div>

                    <div class="col-12 mt-2">
                      <h6 class="font-rubik">Product Description</h6>
                      <hr>
                      <p class="font-rale font-14">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci itaque obcaecati dignissimos provident animi et?</p>
                      <p class="font-rale font-14">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Adipisci itaque obcaecati dignissimos provident animi et?</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="relatedFood">
            <h2>Related Food</h2>
            <div class="owl-carousel owl-theme mt-4">
                <div class="food-item">
                  <img src="./assets/Restaurant/fast1.jpg" alt="" />
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
                    <a href="#" class="order-btn">Order Now</a>
                  </div>
                </div>
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
                    <a href="#" class="order-btn">Order Now</a>
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
                    <a href="#" class="order-btn">Order Now</a>
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
                    <a href="#" class="order-btn">Order Now</a>
                  </div>
                </div>
              </div>
        </section>
    </div>
    <!-- !single item page -->
<?php require_once "includes/footer.php" ?>