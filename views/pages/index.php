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
              <h1>Browse Our Products</h1>
              <p>Our products combine the arts of delicate hand embroidery and simple but elegant Warli Paintings and Intricate Madhubani paintings. From crafting the products to finishing and packaging all the work is done by women</p>
              <a class="button button-hero" href="category.php">Browse Now</a>
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
    <section style="margin-bottom:0px;" class="section-margin calc-60px">
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

    <!-- ================ Blog section start ================= -->
    <section class="blog">
      <br>
      <div class="container">
        <div class="section-intro pb-60px">
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
