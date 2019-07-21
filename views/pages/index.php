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
<style>
.card-img{
  height: 300px;
}
.img-fluid{
  height: 320px;
}
</style>

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
              </div>

              <div class="tab-pane fade" id="panel8" role="tabpanel">
              <form method="POST">
                <!--Body-->
                <div class="modal-body">

                <div class="md-form form-sm mb-5">
                    <i class="fas fa-user prefix"></i>
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
                    <i class="fas fa-phone-square prefix"></i>
                    <input type="text" name="phone" id="modalLRInput14" class="form-control form-control-sm validate">
                    <label data-error="wrong" data-success="right" for="modalLRInput14">Phone</label>
                  </div>

                  <div class="text-center form-sm mt-2">
                    <button class="btn btn-info" name="register">Sign up<i class="fas fa-sign-in ml-1"></i></button>
                  </div>

                </div>
                </form>
              </div>
              <!--/.Panel 8-->
            </div>

          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
    <!--Modal: Login / Register Form-->

<!-- <div class="text-center">
  <a href="" class="btn btn-default btn-rounded my-3" data-toggle="modal" data-target="#modalLRForm">Launch
    Modal LogIn/Register</a>
</div> -->
    <!--================ Hero banner start =================-->
    <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid" src="../img/home/Trishul major.jpg" alt="">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4>Shopping is fun, especially when it helps someone.</h4>
              <h1>Browse Our Product</h1>
              <p>Our products combine the arts of delicate hand embroidery and simple but elegant Warli Paintings and Intricate Madhubani paintings. From crafting the products to finishing and packaging all the work is done by women from lower income communities.
</p>
              <a class="button button-hero" href="#">Browse Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Hero banner start =================-->

    <!--================ Hero Carousel start =================-->
    <section class="section-margin mt-0">
      <div class="owl-carousel owl-theme hero-carousel">
        <div class="hero-carousel__slide">
          <img src="../img/home/slide1.png" alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>BAGS & KEYCHAINS</h3>
            <p>Accessories Item</p>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img src="../img/home/slide2.png" alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>BOOKMARKS & PAPERWEIGHTS</h3>
            <p>Accessories Item</p>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img src="../img/home/slide3.png" alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>GREETING CARDS & CANDLES</h3>
            <p>Accessories Item</p>
          </a>
        </div>
      </div>
    </section>
    <!--================ Hero Carousel end =================-->

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h2>Trending <span class="section-intro__style">Product</span></h2>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="../img/product/product-tr1.png" alt="">
                <ul class="card-product__imgOverlay">

                  <li><button><i class="ti-shopping-cart"></i></button></li>

                </ul>
              </div>
              <div class="card-body">
                <p>Accessories</p>
                <h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
                <p class="card-product__price">$150.00</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="../img/product/product-tr2.png" alt="">
                <ul class="card-product__imgOverlay">

                  <li><button><i class="ti-shopping-cart"></i></button></li>

                </ul>
              </div>
              <div class="card-body">
                <p>Beauty</p>
                <h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
                <p class="card-product__price">$150.00</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="../img/product/product-tr3.png" alt="">
                <ul class="card-product__imgOverlay">

                  <li><button><i class="ti-shopping-cart"></i></button></li>

                </ul>
              </div>
              <div class="card-body">
                <p>Decor</p>
                <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                <p class="card-product__price">$150.00</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="../img/product/product-tr4.png" alt="">
                <ul class="card-product__imgOverlay">

                  <li><button><i class="ti-shopping-cart"></i></button></li>

                </ul>
              </div>
              <div class="card-body">
                <p>Decor</p>
                <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
                <p class="card-product__price">$150.00</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="../img/product/product-tr5.png" alt="">
                <ul class="card-product__imgOverlay">

                  <li><button><i class="ti-shopping-cart"></i></button></li>

                </ul>
              </div>
              <div class="card-body">
                <p>Accessories</p>
                <h4 class="card-product__title"><a href="single-product.html">Man Office Bag</a></h4>
                <p class="card-product__price">$150.00</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="../img/product/product-tr6.png" alt="">
                <ul class="card-product__imgOverlay">

                  <li><button><i class="ti-shopping-cart"></i></button></li>

                </ul>
              </div>
              <div class="card-body">
                <p>Kids Toy</p>
                <h4 class="card-product__title"><a href="single-product.html">Charging Car</a></h4>
                <p class="card-product__price">$150.00</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="../img/product/product-tr7.png" alt="">
                <ul class="card-product__imgOverlay">

                  <li><button><i class="ti-shopping-cart"></i></button></li>

                </ul>
              </div>
              <div class="card-body">
                <p>Accessories</p>
                <h4 class="card-product__title"><a href="single-product.html">Blutooth Speaker</a></h4>
                <p class="card-product__price">$150.00</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card text-center card-product">
              <div class="card-product__img">
                <img class="card-img" src="../img/product/product-tr8.png" alt="">
                <ul class="card-product__imgOverlay">

                  <li><button><i class="ti-shopping-cart"></i></button></li>

                </ul>
              </div>
              <div class="card-body">
                <p>Kids Toy</p>
                <h4 class="card-product__title"><a href="#">Charging Car</a></h4>
                <p class="card-product__price">$150.00</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ trending product section end ================= -->


    <!-- ================ offer section start ================= -->
    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">
      <div class="container">
        <div class="row">
          <div class="col-xl-5">
            <div class="offer__content text-center">
              <h3>Up To 10% Off</h3>
              <h4>Good deed always pay.</h4>
              <p>Share trishul with your friend and get an option to be credited with 10% discount or you can donate that amount for good cause.</p>
              <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ offer section end ================= -->

    <!-- ================ Best Selling item  carousel ================= -->
    <section class="section-margin calc-60px">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h2>Best <span class="section-intro__style">Sellers</span></h2>
        </div>
        <div class="owl-carousel owl-theme" id="bestSellerCarousel">
          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="../img/product/product-tr1.png" alt="">
              <ul class="card-product__imgOverlay">

                <li><button><i class="ti-shopping-cart"></i></button></li>

              </ul>
            </div>
            <div class="card-body">
              <p>Accessories</p>
              <h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
              <p class="card-product__price">$150.00</p>
            </div>
          </div>

          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="../img/product/product-tr2.png" alt="">
              <ul class="card-product__imgOverlay">

                <li><button><i class="ti-shopping-cart"></i></button></li>

              </ul>
            </div>
            <div class="card-body">
              <p>Beauty</p>
              <h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
              <p class="card-product__price">$150.00</p>
            </div>
          </div>

          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="../img/product/product-tr3.png" alt="">
              <ul class="card-product__imgOverlay">

                <li><button><i class="ti-shopping-cart"></i></button></li>

              </ul>
            </div>
            <div class="card-body">
              <p>Decor</p>
              <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
              <p class="card-product__price">$150.00</p>
            </div>
          </div>

          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="../img/product/product-tr4.png" alt="">
              <ul class="card-product__imgOverlay">

                <li><button><i class="ti-shopping-cart"></i></button></li>

              </ul>
            </div>
            <div class="card-body">
              <p>Decor</p>
              <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
              <p class="card-product__price">$150.00</p>
            </div>
          </div>

          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="../img/product/product-tr1.png" alt="">
              <ul class="card-product__imgOverlay">

                <li><button><i class="ti-shopping-cart"></i></button></li>

              </ul>
            </div>
            <div class="card-body">
              <p>Accessories</p>
              <h4 class="card-product__title"><a href="single-product.html">Quartz Belt Watch</a></h4>
              <p class="card-product__price">$150.00</p>
            </div>
          </div>

          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="../img/product/product-tr2.png" alt="">
              <ul class="card-product__imgOverlay">

                <li><button><i class="ti-shopping-cart"></i></button></li>

              </ul>
            </div>
            <div class="card-body">
              <p>Beauty</p>
              <h4 class="card-product__title"><a href="single-product.html">Women Freshwash</a></h4>
              <p class="card-product__price">$150.00</p>
            </div>
          </div>

          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="../img/product/product-tr3.png" alt="">
              <ul class="card-product__imgOverlay">

                <li><button><i class="ti-shopping-cart"></i></button></li>

              </ul>
            </div>
            <div class="card-body">
              <p>Decor</p>
              <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
              <p class="card-product__price">$150.00</p>
            </div>
          </div>

          <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="../img/product/product-tr4.png" alt="">
              <ul class="card-product__imgOverlay">

                <li><button><i class="ti-shopping-cart"></i></button></li>

              </ul>
            </div>
            <div class="card-body">
              <p>Decor</p>
              <h4 class="card-product__title"><a href="single-product.html">Room Flash Light</a></h4>
              <p class="card-product__price">$150.00</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ Best Selling item  carousel end ================= -->

    <!-- ================ Blog section start ================= -->
    <section class="blog">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>Popular Item in the market</p>
          <h2>Latest <span class="section-intro__style">News</span></h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0" src="../img/blog/blog-tr1.png" alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">By Admin</a></li>
                  <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                </ul>
                <h4 class="card-blog__title"><a href="single-blog.html">Volunteering Project - Kajal Sana Karishma</a></h4>
                <p>Project Work done at TLC and TWEP Sneh Project “Freedom to live” Prepared by, Kajal Sangoi Sana Ghodke Karishma Agarwal (S.Y.B.A.) From Maniben Nanavati College Under the guidance</p>
                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0" src="../img/blog/blog-tr2.png" alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">By Admin</a></li>
                  <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                </ul>
                <h4 class="card-blog__title"><a href="single-blog.html">Tree Plantation Program near Wada</a></h4>
                <p>Tree Plantation Program near Wada. 200 Saplings (Indian Fruits and Forest Trees) were planted on June 22nd, 2019 by Bajaj IT Team as part of their CSR Program</p>
                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0" src="../img/blog/blog-tr3.png" alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">By Admin</a></li>
                  <li><a href="#"><i class="ti-comments-smiley"></i> 2 Comments</a></li>
                </ul>
                <h4 class="card-blog__title"><a href="single-blog.html">Employment Generation</a></h4>
                <p>Employment Generation Program: We are also starting employment generation program at TWEP for Graduates; Under Graduates; 12th Pass; 10th Pass or 8th pass. Kindly share your detailed bio-data</p>
                <a class="card-blog__link" href="#">Read More <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ Blog section end ================= -->

    <!-- ================ Subscribe section start ================= -->
    <section class="subscribe-position">
      <div class="container">
        <div class="subscribe text-center">
          <h3 class="subscribe__title">Get Update From Anywhere</h3>
          <p>Bearing Void gathering light light his eavening unto dont afraid</p>
          <div id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
              <div class="form-group ml-sm-auto">
                <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" >
                <div class="info"></div>
              </div>
              <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

            </form>
          </div>

        </div>
      </div>
    </section>
    <!-- ================ Subscribe section end ================= -->
  </main>
<?php
include_once('../layouts/footer.php');
?>
