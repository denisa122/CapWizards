<div class="container">
    <div class="card">
        <div class="card-header bg-light mb-3">
            Register
        </div>
        <div class="card-body">
            <form id="registerForm" method="POST" action="<?php echo BASE_URL ?>/controllers/LoginController.php?action=register">
                <div class="form-group">
                    <label for="userName">Username</label>
                    <input type="text" name="userName" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="userEmail">Email</label>
                    <input type="email" name="userEmail" class="form-control" required>
                    <br/>
                    <?php if(isset($emailTaken)) { ?>
                        <p style="color: red;"><?php echo $emailTaken; ?></p>
                        <?php } ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button name="register" type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>