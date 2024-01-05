<?php
  if(isset($_GET['id'])) {
    $food_id = $_GET['id'];
  } else {
    header("Location: fooditem.php");
  }

  // query to retreive data from DB
  $query = "SELECT * FROM menuitems WHERE itemID = $food_id";
  $result = mysqli_query($conn, $query);
  
  if(!$result) {
    die("QUERY FAILED" . mysqli_error($conn));
  }

  
  

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container mt-3">
            <h2 class="mb-5 text-center">Edit Food Item</h2>
            
            
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row container">
                    <div class="col-8 border p-3">
                        <!-- <h2>Form to add food item</h2> -->

                    <?php
                        while($data=mysqli_fetch_assoc($result)) {
                            $food_name = $data['Name'];
                            $category_id = $data['CategoryID'];
                            $price = $data['Price'];
                            $offer_price = $data['offer-price'];
                            $desc = $data['Description'];
                            $food_image = $data['food_img'];
                          }
                        
                          // query to retreive all category details
                          $cat_query = "SELECT * FROM category";
                          $cat_result = mysqli_query($conn, $cat_query);

                          // query to retreive the food category details
                          $food_cat = "SELECT * FROM category WHERE cat_id = $category_id";
                          $food_cat_result = mysqli_query($conn, $food_cat);

                          while($data=mysqli_fetch_assoc($food_cat_result)) {
                            $food_cat_name = $data['name'];
                          }

                          
                    ?>

                        <div class="mb-3">
                            <label for="food_name">Food Name</label>
                            <input type="text" name="food_name" class="form-control" value="<?= $food_name ?? null ?>" placeholder="Enter food name">
                        </div>

                        <div class="mb-3">
                            <label for="food_category">Category - [<?= $food_cat_name ?>]</label>
                            <select name="food-category" class="form-control" id="cat">
                            <option value="default">Choose Category</option>
                            <?php
                            while($catData=mysqli_fetch_assoc($cat_result)) {
                                $cat_id = $catData['cat_id'];
                                $cat_name = $catData['name'];
                                echo '<option value="<?= $cat_id ?>">'.$cat_name.'</option>';
                              }
                            ?>
                                
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="regular-price">Original Price</label>
                            <input type="number" name="regular-price" class="form-control" value="<?= $price ?? null ?>" placeholder="Enter the original Price">
                        </div>

                        <div class="mb-3">
                            <label for="offer-price">Offer Price</label>
                            <input type="number" name="offer-price" class="form-control" value="<?= $offer_price ?>" placeholder="Entter offer price">
                        </div>

                        
                        <div class="mb-3">
                            <label for="food-desc">Description</label>
                            <textarea name="food-desc" class="form-control" cols="30" rows="10"><?= $desc ?></textarea>
                        </div>

                    </div>

                    <div class="col-4 border">
                        <!-- <h2>Save</h2> -->
                        <div class="mb-3 mt-4">
                            <label for="food-image">Food Image</label>
                            <input type="file" name="food_image" class="form-control">

                            <div class="mt-2 text-center">
                                <img src="../assets/Restaurant/<?=$food_image?>" style="width:100%; margin: 0 auto;" class="img-fluid border" alt="">
                            </div>
                        </div>
                        <!-- <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg" name="add-food" type="submit">Add Food</button>
                        </div> -->
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-danger" style="width: 100%;">Delete</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">Edit & Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>