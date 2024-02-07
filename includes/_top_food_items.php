<?php
    //  query 
    $query = "SELECT * FROM category";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("QUERY FAILED" . mysqli_error($conn));
    }
?>
<div class="container mt-4">
    <h2 class="text-center">Top Food Categories</h2>
    <div class="food-category">
    <?php
     if(mysqli_num_rows($result)) {
        while($data=mysqli_fetch_assoc($result)) {
            $catID = $data['cat_id'];
            $catName = $data['name'];

            // number of food items added 
            $FoodQuery = "SELECT * FROM menuitems WHERE categoryID = $catID";
            $FoodRes = mysqli_query($conn, $FoodQuery);
            $num_of_items = mysqli_num_rows($FoodRes);

            if($num_of_items > 0) {
                while($row=mysqli_fetch_assoc($FoodRes)) {
                    $Food_cat_id = $row['CategoryID'];
                    $foodImg = $row['food_img'];
                }
        ?>
            <div class="category-items">
                <div class="cat-content">
                    <form action="shopCat.php" method="POST">
                        <input type="hidden" name="categories" value="<?= $catID ?>">
                        
                        <h4>
                        <input type="submit" value="<?= $catName ?>" style="border: none;">
                        </h4>
                    </form>
                    
                    <div class="mt-2 text-center">
                        <p class="text-muted"># items: <?= $num_of_items ?></p>
                    </div>
                </div>
           </div>
        <?php
        
            }
        }
     }
    ?>
    </div>
</div>