<?php
 if(isset($_GET['added'])) {
    $success = "Product has been added successfully";
 }

 $sql = "SELECT * FROM `menuitems` ORDER BY `menuitems`.`ItemID` DESC";
 $result = mysqli_query($conn, $sql);
 $no_of_row = mysqli_num_rows($result);

 if(!$result) {
    die("QUERY FAILED" . mysqli_error($conn));
 }
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container mt-4">
            <h3 class="mb-4">View all product</h3>

           
                <?php
                if(isset($success)) {
                    echo "<div class='alert alert-success'>".$success ."</div>";
                }
                ?>
            
            <div class="border p-2">
                <table id="datatablesSimple" class="mt-3">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Details</th>
                            <th>Category</th>
                            <th>Action</th>
                            <!-- <th>Start date</th>
                            <th>Salary</th> -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Image</th>
                            <th>Details</th>
                            <th>Category</th>
                            <th>Action</th>
                            <!-- <th>Start date</th>
                            <th>Salary</th> -->
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                     if($no_of_row > 0) {
                        while($data = mysqli_fetch_assoc($result)) {
                            $Item_id = $data['ItemID'];
                            $cat_id = $data['CategoryID'];
                            $name = $data['Name'];
                            $price = $data['original-price'];
                            $food_img = $data['food_img'];

                        $cat_query = "SELECT * FROM `category` WHERE `cat_id` = ?";
                        $stmt = mysqli_prepare($conn, $cat_query);
                        $stmt->bind_param('i', $cat_id);
                        $stmt->execute();
                        $category_result = $stmt->get_result();

                        if(!$category_result) {
                            die("QUERY FAILED" . mysqli_error($conn));
                        } 
                        

                        while($catData = mysqli_fetch_assoc($category_result)) {
                            $cat_name = $catData['name'];
                        }
                     ?>
                        <tr>
                            <td>
                                <img src="../assets/Restaurant/<?= $food_img ?>" width="120" alt="">
                            </td>
                            <td>
                                <h6><?= $name ?></h6>
                                <p><?= $price ?></p>
                            </td>
                            <td>
                                <h6><?= $cat_name ?></h6>
                            </td>
                            <!-- Delete & edit button -->
                            <td>
                                <a href="?" class="btn btn-sm btn-danger">Delete</a>
                                <a href="?" class="btn btn-sm btn-success">Edit</a>
                            </td>
                           
                        </tr>

                    <?php
                        }
                     }
                    ?>
                        
                        
                    </tbody>
                </table>

            </div>
        </div>
    </main>