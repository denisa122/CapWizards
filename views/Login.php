<body>
<div class="container">
    <div class="card">
        <div class="card-header bg-light mb-3">
            Login
        </div>
        <div class="card-body">
            <form method="POST" id="loginForm" action="<?php echo BASE_URL ?>/controllers/LoginController.php?action=login">
                <div class="form-group">
                    <label for="userEmail">Email</label>
                    <input type="email" name="userEmail" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <br/>
                    <?php if(isset($loginWrong)) { ?>
                        <p style="color: red;"><?php echo $loginWrong; ?></p>
                        <?php } ?>
                </div>
                <button name="login" type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<a href="http://localhost/CapWizards/Register">Register here</a>