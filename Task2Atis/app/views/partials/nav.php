<nav class="navbar navbar-dark bg-dark" style="display: flex; ">
  <a class="navbar-brand" style="font-family: 'Monoton', cursive; flex:1%" href="home">TODO</a>
  <div>
    <div class="">
    <?php
    session_start();
    if (isset($_SESSION['email'])) 
    echo '<a href="logout" >Logout</a>';
    else
    echo '<a href="login" >Login</a>';
    ?>

    </div>
  </div>

</nav>