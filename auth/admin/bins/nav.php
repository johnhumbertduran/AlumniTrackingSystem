<?php
    $session_user = $_SESSION["username"];
    $check_user = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user'");
    $get_name = mysqli_fetch_assoc($check_user);
    $name = $get_name["first_name"];
?>
<nav class="navbar navbar-expand-sm navbar-dark sticky-top" style="background-color:rgb(112, 173, 70);">
  <div class="container-fluid">
    <a class="navbar-brand" href="../admin">Alumni Tracking System</a>
    <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
      </button>
  

      <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../admin">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="alumni">Alumni</a>
        </li>
<!-- 
        <li class="nav-item">
          <a class="nav-link" href="archive">Archive</a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link" href="payment">Payment</a>
        </li>

        <li class="nav-item d-flex justify-content-end">
          <a class="nav-link" href="logout">Log Out</a>
        </li>

    
      </ul>
      
    </div>
  </div>
</nav>
