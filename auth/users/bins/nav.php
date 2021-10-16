<?php
    $session_user = $_SESSION["username"];
    $check_user = mysqli_query($connections, "SELECT * FROM users_tbl WHERE username='$session_user'");
    $get_name = mysqli_fetch_assoc($check_user);
    $name = $get_name["firstName"];
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-primary sticky-top">
    <div>
        <a class="navbar-brand" href="#">&nbsp;&nbsp;<?php echo "Welcome, " . $name; ?></a>
    </div>

    <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="index">Home</a>
    </li>
        
    <li class="nav-item">
      <a class="nav-link" href="profile">My Profile</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="login">Log Out</a>
    </li>

    
  </ul>
  </div>
</nav>
