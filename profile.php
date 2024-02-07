<?php require_once "includes/header.php" ?>
<div class="container mb-4 mt-4">
    <h2>My Profile</h2>
    <hr>
    <div class="row">
      <div class="col-lg-6">
        <div class="row mb-5">
            <div class="col-6">
                <div class="bg-warning" style="
                /* width: 230px;  */
                min-height: 150px; 
                border-radius: 7px;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                font-size: 25px;
                color: white;
                ">
                   <i class="fa-solid fa-truck-fast me-4"></i> <h2>Orders</h2>
                </div>
            </div>
            <div class="col-6">
                <div class="bg-secondary" style="
                /* width: 230px;  */
                min-height: 150px; 
                border-radius: 7px;
                display: flex;
                justify-content: center;
                align-items: center;
                ">
                    <h2>How are you</h2>
                </div>
            </div>
        </div>
        
        
      </div>
      <div class="col-lg-6 gap-4">
        <form action="" method="POST">
            <div class="mb-2 form-group">
                <label for="name" class="mb-2">Full Name</label>
                <input type="text" name="fullname" class="form-control" id="">
            </div>
            <div class="mb-2 form-group">
                <label for="email" class="mb-2">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="mb-2 form-group">
                <label for="phone" class="mb-2">phone</label>
                <input type="phone" name="email" class="form-control">
            </div>
            <div class="mb-2 form-group">
                <label for="addr" class="mb-2">Address</label>
                <input type="text" name="addr" class="form-control">
            </div>
            <input type="submit" value="Save Changes" class="btn btn-primary">
        </form>
      </div>
    </div>
</div>
<?php require_once "includes/footer.php" ?>