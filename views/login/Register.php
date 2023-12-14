<?php

require("./views/shared/header.php");

?>

<!-- Main -->
<main>
  <article class="text-center top-padding">
    <h1 class="h1-yellow margin-30">Create an account</h1>
    <div class="d-flex justify-content-center">
      <form id="registerForm" method="POST" action="<?php echo BASE_URL ?>/controllers/LoginController.php?action=register">
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

        <button name="register" type="submit" class="row text-center form-button-wrapper big-button form-button">Create account</button>
      </form>
    </div>
  </article>
</main>

<?php
require("./views/shared/footer.php")
?>