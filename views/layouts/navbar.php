<?php
include_once('../layouts/header.php');
include_once('../layouts/navbar.php');
include_once('../../classes/User.class.php');
include_once('../../classes/Helper.class.php');

if(isset($_POST["loginName"])){
    if(isset($_POST["email"]) && isset($_POST["password"])){
        $data["email"] = $_POST["email"];
        $data["password"] = $_POST["password"];
        $user = new User();
        $signed_in = isset($_POST["remember_me"]);
        $user->login($data,$signed_in);
    }else{
        Helper::redirect("");
    }  
}

if(isset($_POST["register"])){
    if(isset($_POST["user_name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["phone"])){
      $data["user_name"] = $_POST["user_name"];
      $data["email"] = $_POST["email"];
      $data["password"] = $_POST["password"];
      $data["phone"] = $_POST["phone"];
      $user = new User();
      $user->register($data);
    }else{
      Helper::redirect("");      
    }
}
?>
<!--================ Start Header Menu Area =================-->
<header class="header_area" id="headerDiv">
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
  <main class="site-main">
    <!--Modal: Login / Register Form-->
    <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <br>
    <br>
    <br>
      <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

          <!--Modal cascading tabs-->
          <div class="modal-c-tabs">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                  Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                  Register</a>
              </li>
            </ul>

            <!-- Tab panels -->
            
            <div class="tab-content">
              <!--Panel 7-->
              <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

                <!--Body-->
                <form method="POST">
                <div class="modal-body mb-1">
                    <div class="md-form form-sm mb-5">
                      <i class="fas fa-envelope prefix"></i>
                      <input type="email" name="email" id="email" class="form-control form-control-sm validate">
                      <label data-error="wrong" data-success="right" for="modalLRInput10">Your email</label>
                    </div>
                    <div class="md-form form-sm mb-4">
                      <i class="fas fa-lock prefix"></i>
                      <input type="password" name="password" id="password" class="form-control form-control-sm validate">
                      <label data-error="wrong" data-success="right" for="modalLRInput11">Your password</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="remember_me">
                      <label class="form-check-label">Remember me!</label>
                    </div> 
                    <div class="text-center mt-2">
                      <button type="submit" name="loginName"  class="btn btn-primary" value="submit">Log in<i class="fas fa-sign-in ml-1"></i></button>
                    </div>
                </div>
                </form>
                
                <!--Footer-->
               
                  <div class="modal-footer">
                    <div class="options text-center text-md-right mt-1">
                      <p>Not a member? <a href="#" class="blue-text">Sign Up</a></p>
                      <p>Forgot <a href="#" class="blue-text">Password?</a></p>
                    </div>
                    <button type="button"  class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                  </div>
               
              </div>
              <!--/.Panel 7-->

              <!--Panel 8-->
              <div class="tab-pane fade" id="panel8" role="tabpanel">
              <form method="POST">
                <!--Body-->
                <div class="modal-body">

                <div class="md-form form-sm mb-5">
                    <i class="fas fa-envelope prefix"></i>
                    <input type="text" name="user_name" id="modalLRInput12" class="form-control form-control-sm validate">
                    <label data-error="wrong" data-success="right" for="modalLRInput12">Your Name</label>
                  </div>

                  <div class="md-form form-sm mb-5">
                    <i class="fas fa-envelope prefix"></i>
                    <input type="email" name="email" id="modalLRInput12" class="form-control form-control-sm validate">
                    <label data-error="wrong" data-success="right" for="modalLRInput12">Your email</label>
                  </div>

                  <div class="md-form form-sm mb-5">
                    <i class="fas fa-lock prefix"></i>
                    <input type="password" name="password" id="modalLRInput13" class="form-control form-control-sm validate">
                    <label data-error="wrong" data-success="right" for="modalLRInput13">Your password</label>
                  </div>

                  <div class="md-form form-sm mb-4">
                    <i class="fas fa-lock prefix"></i>
                    <input type="text" name="phone" id="modalLRInput14" class="form-control form-control-sm validate">
                    <label data-error="wrong" data-success="right" for="modalLRInput14">Phone</label>
                  </div>

                  <div class="text-center form-sm mt-2">
                    <button class="btn btn-info" name="register">Sign up<i class="fas fa-sign-in ml-1"></i></button>
                  </div>
               
                </div>
                </form>
                <!--Footer-->
                <div class="modal-footer">
                  <div class="options text-right">
                    <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
                  </div>
                  <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!--/.Panel 8-->
            </div>

          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
    <!--Modal: Login / Register Form-->
</header>
<!--================ End Header Menu Area =================-->
