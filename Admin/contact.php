<?php require_once "includes/header.php" ?>
<?php
  $query = "SELECT * FROM contact";
  $result = mysqli_query($conn, $query);
  $no_of_contact = mysqli_num_rows($result);

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container mt-3">
            <h3>Contact</h3>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Contact
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>SNO</th>
                                <th>Name</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>SNO</th>
                                <th>Name</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php
                            if($no_of_contact > 0) {
                                $sno = 1;
                                while($data= mysqli_fetch_assoc($result)) {
                                    $fullname = $data['fullname'];
                                    $email = $data['email'];
                                    $phone = $data['phone'];
                                    $message = $data['message'];
                                    $date = $data['added_on'];
                        ?>
                            <tr>
                                <td><?= $sno ?></td>
                                <td>
                                    <h6><?= $fullname ?></h6>
                                    <p>
                                        <a href="mailto: <?= $email ?>">
                                            <?= $email ?>
                                       </a>
                                    </p>
                                    <p><a href="tel: <?= $phone ?>"><?= $phone?></a></p>
                                </td>
                                <td>
                                    <p>
                                        <?= $message ?>
                                    </p>
                                </td>
                                <td>
                                    <?= $date ?>
                                </td>
                                <td>
                                    <a href="mailto:<?= $email ?>" class="btn btn-sm btn-primary">Reply</a>
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