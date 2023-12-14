<?php

require("./views/shared/header.php");

?>

<!-- Main -->
<main>
  <article class="text-center top-padding">
    <h1 class="h1-yellow margin-30">Check Out</h1>
    <div class="d-flex justify-content-center">
      <form method="POST" action="http://denisaneagu.com/CapWizards/controllers/CheckOutController.php?action=Checkout">


        <div class="row margin-15">
          <p>Personal information</p>
          <input class="input-color input-size-s gap-15 text-center" type="text" placeholder="First Name" required name="firstName">
          <input class="input-color input-size-s  text-center" type="text" placeholder="Last Name" required name="lastName">
        </div>
        <input type="email" name="email" class="row input-color input-size-b margin-15 text-center" placeholder="Email" required>
        <input type="text" name="phoneNumber" class="row input-color input-size-b margin-15 text-center" placeholder="Phone Number" required>

        <p>Delivery address</p>
        <input type="text" name="country" class="row input-color input-size-b margin-15 text-center" placeholder="Country" required>
        <input type="text" name="city" class="row input-color input-size-b margin-15 text-center" placeholder="City" required>
        <input type="text" name="zipcode" class="row input-color input-size-b margin-15 text-center" placeholder="Zip-Code" required>
        <input type="text" name="street" class="row input-color input-size-b margin-15 text-center" placeholder="Street Name" required>
        <div class="row margin-15">
          <input class="input-color input-size-s gap-15 text-center" type="number" placeholder="House Number" name="houseNumber">
          <input class="input-color input-size-s  text-center" type="number" placeholder="Apartment Number" name="apartmentNumber">
        </div>

        <button name="Checkout" type="submit" class="row text-center form-button-wrapper big-button form-button">Order</button>
      </form>
    </div>
  </article>
</main>

<?php
require("./views/shared/footer.php")
?>