<?php require_once "includes/header.php" ?>

<div class="container">
    <h2 class="text-center">Order</h2>
    <hr>

    <form action="" method="post">
    <div class="row">
        <div class="col col-lg-7 border p-3">
            <div class="form-group mb-2">
                <label for="fullname">Full Name</label>
                <input type="text" name="fullname" class="form-control" id="">
            </div> 

            <div class="form-group mb-2">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="">
            </div>        
            <div class="form-group mb-2">
                <label for="phone">Phone</label>
                <input type="phone" name="phone" class="form-control" id="">
            </div>               
            <div class="form-group mb-2">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="">
            </div>        

            <button type="submit" name="ordernow" class="btn btn-primary mx-auto d-block mt-4" style="width: 40%;">Order Now</button>
        </div>
        

        <div class="col col-lg-5 border p-3">
                <!-- food image -->
            <div class="food-img">
                <img src="./assets/Restaurant/1.jpg" style="width: 70%;" class="rounded mx-auto d-block" alt="">
            </div>
            <div class="container">
                <h3 class="mt-2">Roti & Chicken</h3>
                <p>Price: </p>
                <p>You Saved: </p>
                <p>Quantity: </p>
            </div>
        </div>
    </div>
</form>
</div>

<?php require_once "includes/footer.php" ?>