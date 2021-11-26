<?php

include 'header.php';

if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
  header("location: index.php");
  exit;
}

if(!isset($_SESSION['cart']) || count($_SESSION['cart']) < 1) {
  echo "<h3>Cart is empty</h3>";
  
  include 'footer.php';
  exit;
}
?>

<div class="container" id="checkout">
      <h3>Checkout</h3>
      <br />
      <div class="row">
        <div class="col-md-4 order-md-12">
          <h4 style="padding-left: 10px">Cart</h4>
          <div id = 'cart'></div>
          </br>
        </div> 
        <div class="col-md-8 order-md-1">
          <h4>Billing Information</h4>
          <form id='checkoutForm' target="_blank" action="submit.php" method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputFirstName">First Name</label>
                <input name='fname' type="text" class="form-control" id="inputFirstName" required/>
              </div>
              <div class="form-group col-md-6">
                <label for="inputLastName">Last Name</label>
                <input name='lname' type="text" class="form-control" id="inputLastName" required/>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input name='email'
                type="email"
                class="form-control"
                id="inputEmail"
                placeholder="your_name@email.com" required
              />
            </div>
            <div class="form-group">
              <label for="inputAddress2">Address</label>
              <input
                name='address'
                type="text"
                class="form-control"
                id="inputAddress2"
                placeholder="1234 Main St" required
              />
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputDistrict">District</label>
                <select name='district' id="inputDistrict" class="form-control" required>
                  <option value="" selected>Choose...</option>
                  <option>Belize</option>
                  <option>Cayo</option>
                  <option>Corozal</option>
                  <option>Orange Walk</option>
                  <option>Stann Creek</option>
                  <option>Toledo</option>
                </select>
              </div>
              <div class="form-group col-md-8">
                <label for="inputPhoneNumber">Phone Number</label>
                <input type="text" class="form-control" id="inputPhoneNumber" required/>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="gridCheck" 
                />
                <label class="form-check-label" for="gridCheck">
                  Shipping outside Belize?
                </label>
              </div>
            </div>
            <div class="form-row" id="outside">
              <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" />
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" />
              </div>
            </div>

            <h4>Payment Information</h4>


            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="btn btn-nav nav-link active" id="credit-card-tab" data-toggle="tab" role="tab" aria-controls="credit-card" aria-selected="true">Credit Card</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="btn btn-nav nav-link" id="debit-card-tab" data-toggle="tab" role="tab" aria-controls="debit-card" aria-selected="false">Debit Card</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="btn btn-nav nav-link disabled" id="contact-tab" data-toggle="tab" role="tab" aria-controls="contact" aria-selected="false">Paypal</button>
              </li>
            </ul>
            <br>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="credit-card" role="tabpanel" aria-labelledby="credit-card-tab">
                <div class="row">
                  <div class="col-md-12">
                    <label for="cc-name">Name on card</label>
                    <input type="text" class="form-control" id="cc-name" placeholder="" required>
                    <small class="text-muted">Full name as displayed on card</small>
                  </div>
                  <div class="col-md-12">
                    <label for="cc-number">Credit card number</label>
                    <input type="text" class="form-control" id="cc-number" placeholder="" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="cc-expiration">Expiration</label>
                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                  </div>
                  <div class="col-md-6">
                    <label for="cc-expiration">CVV</label>
                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                  </div>
                </div>                
              </div>
              <div class="tab-pane fade show" id="debit-card" role="tabpanel" aria-labelledby="debit-card-tab"><div class="display-1">Under Construction</div></div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-success btn-lg btn-block" type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>

<script src="./js/checkout.js"></script>
<?php

include 'footer.php';

?>