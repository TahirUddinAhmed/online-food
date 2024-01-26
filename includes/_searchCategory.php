<form action="shopCat.php" method="post">
                    <select name="categories" class="form-control">
                    <option value="">Choose Category</option>
                    <?php
                      if($no_of_category > 0) {
                        while($data = mysqli_fetch_assoc($category_result)) {
                          // grab the category name
                          $cat_id = $data['cat_id'];
                          $categoryName = $data['name'];
                        ?>
                            <option value="<?=$cat_id?>"><?= $categoryName ?></option>
                        <?php
                        }
                      }
                    ?>
                      
                    </select>
                    <!-- <button type="submit" class="btn btn-primary btn-block mt-3">Search</button> -->
                    <input type="submit" name="searchCategory" class="mt-3 btn btn-primary" value="Search Food">

                    </form>