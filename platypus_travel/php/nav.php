<!-- <div class="logoContainer" href="index.php">
  

</div> -->



<nav class="navbar navbar-expand-lg navbar-center">
  <a class="navbar-brand" href="index.php"><img src="./images/adrian_taylor_logo-02.png" alt="" class="logo" href="index.php">PLATYPUS TRAVEL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="destinations.php">Destinations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customers.php">Customers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_customer.php">New Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="agents.php">Agents</a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link" href="new_agent.php">New Agent</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			  print("<li class='nav-link'><a class='nav-link' href='add_agent.php'>Add Agent</a></li>");
		  }?>
		  <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			  print("<li class='nav-link'><a class='nav-link' href='logout.php'>Log out</a></li>");
		  } else {
			  print("<li class='nav-link'><a class='nav-link' href='login.php'>Log in</a></li>");
		  }?>
    </ul>
  </div>
</nav>