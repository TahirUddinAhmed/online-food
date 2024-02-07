<?php
    //  query 
    $query = "SELECT * FROM category";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("QUERY FAILED" . mysqli_error($conn));
    }
?>
<div class="container mt-4">
    <h2 class="text-center">Top Food Items</h2>
    <div class="food-category">
    <?php
     if(mysqli_num_rows($result)) {
        while($data=mysqli_fetch_assoc($result)) {
            $catID = $data['cat_id'];
            $catName = $data['name'];

            // number of food items added 
            $FoodQuery = "SELECT * FROM menuitems WHERE categoryID = $catID";
            $FoodRes = mysqli_query($conn, $FoodQuery);

            if(mysqli_num_rows($FoodRes) > 0) {
                while($row=mysqli_fetch_assoc($FoodRes)) {
                    $Food_cat_id = $row['CategoryID'];
                    $foodImg = $row['food_img'];
                }
        ?>
            <div class="category-items">
                <div class="cat-img">
                    <img src="./assets/Restaurant/<?= $foodImg ?>" alt="" />
                </div>
                <div class="cat-content">
                    <h4><?= $catName ?></h4>
                </div>
           </div>
        <?php
        
            }
        }
     }
    ?>
        
        <!-- <div class="category-items">
            <div class="cat-img">
                <img src="./assets/Restaurant/9.jpg" alt="" />
            </div>
            <div class="cat-content">
                <div class="starr">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
                <h4>Veg Thali</h4>
            </div>
        </div>
        <div class="category-items">
            <div class="cat-img">
                <img src="./assets/Restaurant/pasta3.jpg" alt="" />
            </div>
            <div class="cat-content">
                <div class="starr">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
                <h4>Veg Momo</h4>
            </div>
        </div>
        <div class="category-items">
            <div class="cat-img">
                <img src="./assets/Restaurant/ch5.jpg" alt="" />
            </div>
            <div class="cat-content">
                <div class="starr">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
                <h4>Pizza</h4>
            </div>
        </div>
        <div class="category-items">
            <div class="cat-img">
                <img src="./assets/Restaurant/s4.jpg" alt="" />
            </div>
            <div class="cat-content">
                <div class="starr">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
                <h4>Veg Soup</h4>
            </div>
        </div>
        <div class="category-items">
            <div class="cat-img">
                <img src="./assets/Restaurant/pasta1.jpg" alt="" />
            </div>
            <div class="cat-content">
                <h4>Dosasss</h4>
            </div>
        </div>
        <div class="category-items">
            <div class="cat-img">
                <img src="./assets/Restaurant/n7.jpg" alt="" />
            </div>
            <div class="cat-content">
                <div class="starr">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
                <h4>Non-Veg Thali</h4>
            </div>
        </div>
        <div class="category-items">
            <div class="cat-img">
                <img src="./assets/Restaurant/para6.jpg" alt="" />
            </div>
            <div class="cat-content">
                <div class="starr">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
                <h4>Roti Thali</h4>
            </div>
        </div> -->
    </div>
</div>