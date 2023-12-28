<?php require_once "includes/header.php" ?>
<?php
if (isset($_POST['add_category'])) {
    $cat_input = check_input($_POST['category']);

    // if cat_input is empty - "don't insert record"
    if (!empty($cat_input)) {
        // insert into db 
        $sql = "INSERT INTO `category` (`name`, `added_on`) VALUES ('$cat_input', current_timestamp());";
        $cat_res = mysqli_query($conn, $sql);

        if ($cat_res) {
            $cat_success = "Category is added.";
        } else {
            $cat_error = "Something went wrong";
        }
    } else {
        $cat_error = "This field is required";
    }
}


// retreive category 
$sql = "SELECT * FROM category ORDER BY `cat_id` DESC";
$result = mysqli_query($conn, $sql);

if(!$result) {
    die("QUERY FAILED");
}

$no_of_cat = mysqli_num_rows($result);


// delete a category 
if(isset($_GET['delete_id'])) {
    // grab the id 
    $cat_id = $_GET['delete_id'];

    // delete query 
    $delete_query = "DELETE FROM `category` WHERE `cat_id` = $cat_id";
    $delete_result = mysqli_query($conn, $delete_query);

    if(!$delete_result) {
        die("QUERY FAILED". mysqli_error($conn));
    } else {
        header("Location: category.php");
        exit(); 
    }
    
}

// edit category items 
if(isset($_GET['edit_id'])) {
    $edit_id = check_input($_GET['edit_id']);

    // grab the category row
    $cat_query = "SELECT * FROM category WHERE cat_id = $edit_id";
    $edit_result = mysqli_query($conn, $cat_query);
}

if(isset($_POST['edit_category'])) {
    $edit_cat_id = check_input($_POST['edit_cat_id']);
    $edit_cat_name = check_input($_POST['edit_category_name']); 

    // edit query 
    $edit_query = "UPDATE `category` SET `name` = '$edit_cat_name' WHERE `cat_id` = $edit_cat_id;";
    $edit_cat_result = mysqli_query($conn, $edit_query);

    if(!$edit_cat_result) {
        die("QUERY FAILED" . mysqli_error($conn));
    } else {
        $cat_success = "Category Updated Successfully";
        header("Location: category.php");
    }
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container">
            
            <h2 class="mt-4">Category->Page</h2>
            <p class="text-success"><?= $cat_success ?? null; ?></p>
            <div class="row mt-4 container">
                <div class="col-lg-5 gx-5">
                    <form action="" method="post" class="border p-3">
                        <input type="text" name="category" class="form-control" id="category" placeholder="Add a category">
                        <p class="text-danger cat-error"><?= $cat_error ?? null; ?></p>
                        <input type="submit" name="add_category" value="Add Category" class="btn btn-primary mt-2">
                    </form>

                    <?php
                    if(isset($_GET['edit_id'])) {
                        while($data=mysqli_fetch_assoc($edit_result)) {
                            $cat_id = $data['cat_id'];
                            $cat_name = $data['name'];
                        }
                     ?>
                     <div class="mt-4 border px-3 py-2">
                        <h4 class="mb-3">Edit Category</h4>
                        <form action="" method="post">
                            <input type="hidden" name="edit_cat_id" value="<?= $cat_id ?>">
                            <input type="text" name="edit_category_name" class="form-control" id="category" value="<?= $cat_name ?? null ?>">
                            <p class="text-danger cat-error"><?= $cat_error ?? null; ?></p>
                            <input type="submit" name="edit_category" value="Edit Category" class="btn btn-success mt-2">
                        </form>
                    </div>
                     <?php
                    }
                    ?>
                    
                </div>

                <div class="col-lg-7 gx-5 border p-3">
                    
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                           if($no_of_cat > 0) {
                               $sno = 1;
                               while($data = mysqli_fetch_assoc($result)) {
                                // grab data 
                                $cat_id = $data['cat_id'];
                                $cat_name = $data['name'];
                        ?>
                            <tr>
                                <td><?= $sno ?></td>
                                <td><?= $cat_name ?></td>
                                <td>
                                    <!-- delete button -->
                                    <a href="category.php?delete_id=<?= $cat_id ?>" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    <!-- edit button -->
                                    <a href="category.php?edit_id=<?= $cat_id ?>" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        <?php
                        $sno++;
                               }
                               
                           } else {
                            // no data found
                           }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php require_once 'includes/footer.php' ?>