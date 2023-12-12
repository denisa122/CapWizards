<?php
require("./views/shared/header.php");
require_once("././dataaccess/db/DBConnector.php");
$customerID = $_SESSION['customerID'];
$orderID = $_SESSION['orderID'];
?>

<!-- Main -->
    <main>
        <section class="cart-item-section top-padding">
            <h1 class="text-center margin-50 h1-black">Checkout</h1>

            <article class="text-center top-padding">
                    <h1 class="h1-yellow margin-30">Create an account</h1>
                    <div class="d-flex justify-content-center">
                    <form method="POST" action="<?php echo BASE_URL ?>/Controllers/LoginController.php?action=register">
                        <!--To distinguish this post request from other post requests sent to the same file-->
                        <input type="hidden" name="type" value="register">
                    <div class="row margin-15"> 
                        <input class="input-color input-size-s gap-15 text-center" type="text" placeholder="First Name" required name="firstName">
                        <input class="input-color input-size-s  text-center" type="text" placeholder="Last Name" required name="lastName">
                    </div>
                    <input type="text" name="userName" class="row input-color input-size-b margin-15 text-center" placeholder="Username" required>
                    <input type="email" name="userEmail" class="row input-color input-size-b margin-15 text-center" placeholder="Email" required>
                    <?php if (isset($emailTaken)) { ?>
                                    <p style="color: red;"><?php echo $emailTaken; ?></p>
                                <?php } ?>
                    <input type="password" name="password" class="row input-color input-size-b margin-15 text-center" placeholder="Password" required>
                    <!-- <input class="row input-color input-size-b margin-15 text-center" type="password" placeholder="Repeat password" required name="passwordRepeat"> -->

                    <button name="register" type="submit" class="row text-center form-button-wrapper big-button form-button">Create account</button>
                    </form>
                </div>
            </article>
            <div class="text-center"><a href="" class="big-button btn-checkout">Go to checkout</a></div>
        </section>
    </main>

    <?php 
    require("./views/shared/footer.php");
?>