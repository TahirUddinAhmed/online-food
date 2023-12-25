<?php require_once "includes/header.php" ?>

    <div id="addCart" class="container mt-5">
      <h2>Cart Items</h2>
      <div class="shopping-cart mt-4">
        <div class="product-list">
          <div class="list-items">
            <div class="product-details">
              <img src="./assets/Restaurant/10.jpeg" alt="" />
              <div class="product-content">
                <p class="product-title">Dosa</p>
                <div class="cart-action">
                    <a href="#" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
              </div>
            </div>
            <p class="product-price">299</p>
          </div>
          <div class="list-items">
            <div class="product-details">
              <img src="./assets/Restaurant/10.jpeg" alt="" />
              <div class="product-content">
                <p class="product-title">Dosa</p>
                <div class="cart-action">
                    <a href="#" class="btn btn-sm btn-primary">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-danger">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </div>
              </div>
            </div>
            <p class="product-price">299</p>
          </div>
        </div>
        <div class="prodct-summary">
           <h3>Summary</h3>
           <hr>
           <div class="summary-details">
            <p>No. of Item: 2</p>
            <p>Price: 599</p>
            <p>GST: 0</p>
            <hr/>
            <p>Total Amount: 599</p>
           </div>
          
           <div class="checkout-option">
            <p>
                <input type="radio" name="cash on delivery" id="" />Cash On Delivery

            </p>
               <button type="submit" class="btn btn-primary">Checkout</button>
           </div>
        </div>
      </div>
    </div>

<?php require_once "includes/footer.php" ?>