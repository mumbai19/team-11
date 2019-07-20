<?php
ob_start();
?>
<!--================ Start Header Menu Area =================-->
<header class="header_area">
  <div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand logo_h" href="index.php"><img style="height:60px;width:250px" src="../img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
          <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
            <li class="nav-item"><a class="nav-link" href="http://localhost/Trishul/team-11/views/pages/index.php">Home</a></li>
            <li class="nav-item submenu dropdown">
              <a href="http://localhost/Trishul/team-11/views/pages/category.php" class="nav-link dropdown-toggle" role="button" aria-haspopup="true"
                aria-expanded="false">Shop</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="http://localhost/Trishul/team-11/views/pages/category.php">Shop Category</a></li>
                  <li class="nav-item"><a class="nav-link" href="http://localhost/Trishul/team-11/views/pages/single-product.php">Product Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
                  <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                </ul>
            </li>
            <li class="nav-item submenu dropdown">
              <a href="../donation_module/payment.php" class="nav-link dropdown-toggle" aria-haspopup="true"
                aria-expanded="false">Donate</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
          </ul>

          <ul class="nav-shop">
            <li class="nav-item"><button><i class="ti-search"></i></button></li>
            <li class="nav-item"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></button> </li>
            <li class="nav-item"><a class="button button-header" href="" data-toggle="modal" data-target="#modalLRForm" >Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>
<!--================ End Header Menu Area =================-->
