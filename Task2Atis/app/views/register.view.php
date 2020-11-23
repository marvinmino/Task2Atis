<?php require('partials/head.php'); ?>



<h1>Submit Your Name</h1>
<div id="content">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <form action="/register" method="post">
          
            <?php session_start();
            if (isset($_SESSION['error'])) {
            ?><div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
            <?php unset($_SESSION['error']);
            }  ?>

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input class="form-control" type="text" name="surname">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password1">
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input class="form-control" type="password" name="password2">
            </div>
            <div class="form-group">
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" value="Register" name='register_frm'>
            </div>
            <p>Already have an account? <a href="login">Log In</a></p>
        </form>

    </div>
</nav>
</div>


<?php require('partials/footer.php'); ?>
