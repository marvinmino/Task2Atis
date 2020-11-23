
<?php require 'partials/head.php'; ?>


    <div id="content">
        <h1>Login</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">


                <form action="login" method="post">
                <?php
session_start();
            if (isset($_SESSION['error'])) {
            ?><div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']);
            }  ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password1">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" name='login_frm'>
                    </div>
                    <img src="" alt="" hidden style="height: 100px; width:100px">
                    <p>Don't have an account? <a href="/register">Register</a></p>
                </form>

            </div>
        </nav>

        <?php require 'partials/footer.php'; ?>
