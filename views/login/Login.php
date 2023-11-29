<?php
require("./views/shared/header.php") 
?>

<!-- Main -->
<main>
    <article class="text-center ">
        <h1 class="h1-yellow margin-30">Log In</h1>
        <div class="d-flex justify-content-center">
            <form method="POST" id="loginForm" action="<?php echo BASE_URL ?>/Controllers/LoginController.php?action=login">
            <input type="email" name="userEmail" class="row input-color input-size-b margin-15 text-center" placeholder="Email" required>
            <input type="password" name="password" class="row input-color input-size-b margin-15 text-center" placeholder="Password" required>
            <br/>
                    <?php if (isset($loginWrong)) { ?>
                        <p style="color: red;"><?php echo $loginWrong; ?></p>
                    <?php } ?>

            <button type="submit" name="login" class="row text-center form-button-wrapper margin-30 big-button form-button">Login</button>

            <label style="display: flex; flex-direction: row; align-items: center;">
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
          </form>
        </div>
        <div class="d-flex justify-content-center">
          <p class="gap-15">Don't have an account?</p>
          <a href="http://localhost/CapWizards/Register">Sign Up</a>
        </div>
    
    </article>
  </main>

<?php
require("./views/shared/footer.php") 
?>
 