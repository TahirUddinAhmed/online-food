<?php require_once "includes/header.php" ?>
<?php
  $query = "SELECT * FROM users";
  $result = mysqli_query($conn, $query);
  $no_of_users = mysqli_num_rows($result);

//   delete user 
   if(isset($_GET['id'])) {
    $u_id = $_GET['id'];

    // query to delete user
    $query = "DELETE FROM users WHERE UserID = $u_id";
    $result = mysqli_query($conn, $query);

    if(!$result) {
        die("QUERY FAILED" . mysqli_error($conn));
    } else {
        header("Location: users.php");
    }
   }

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container mt-3">
            <h3>All Users</h3>
            <hr>

            <div class="card mb-4">
                
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SNO</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php
                            if($no_of_users > 0) {
                                $sno = 1;
                                while($row= mysqli_fetch_assoc($result)) {
                                    $user_id = $row['UserID'];
                                    $fullname = $row['Fullname'];
                                    $email = $row['Email'];
                                    $phone = $row['Phone'];
                                    $role = $row['role'];
                                
                            ?>
                                <tr>
                                    <td><?= $sno ?></td>
                                    <td>
                                        <p><strong><?= $fullname ?></strong></p>
                                    </td>
                                    <td>
                                        <p>
                                            <a href="mailto:<?= $email ?>"><?= $email ?></a>
                                        </p>
                                        <p>
                                            <a href="tel:<?= $phone ?>"><?= $phone ?></a>
                                        </p>
                                    </td>
                                    <td><?= $role ?></td>
                                    <td>
                                        <!-- edit and delete user -->
                                        <a href="?id=<?= $user_id ?>" class="btn btn-sm btn-danger">Delete</a>
                                        <a href="?eid=<?= $user_id ?>" class="btn btn-sm btn-info">Edit</a>
                                    </td>
                                </tr>
                            <?php
                            $sno++;
                        }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php require_once 'includes/footer.php' ?>