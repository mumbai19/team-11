<?php
include_once('../layouts/header.php');
include_once('../layouts/navbar.php');
include_once('../../classes/Products.class.php');

$product = new Products();

$limit = 3;

if (isset($_GET["page"])) {
  $pn = $_GET["page"];
}else {
  $pn=1;
};

$start_from = ($pn-1) * $limit;
if(isset($_POST["search"]) && isset($_POST['keywords'])){
  $product_details = $product->viewProductsBySearch($_POST['keywords']," LIMIT $start_from, $limit");
}else{
  $product_details = $product->viewAllProducts("LIMIT $start_from, $limit");
}

$total_records = count($product_details);
$total_pages = ceil($total_records / $limit);
$k = (($pn+4>$total_pages)?$total_pages-4:(($pn-4<1)?5:$pn));

?>
<style>
.card-img{
  height: 300px;
}
</style>
	<!-- ================ category section start ================= -->
  <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head">Browse Categories</div>
            <ul class="main-categories">
              <li class="common-filter">
                <form action="#">
                  <ul>
                    <li class="filter-list"><input class="pixel-radio" type="radio" id="men" name="brand"><label for="men">Bags & Keychains</label></li>
                    <li class="filter-list"><input class="pixel-radio" type="radio" id="women" name="brand"><label for="women">Paperweights</label></li>
                    <li class="filter-list"><input class="pixel-radio" type="radio" id="accessories" name="brand"><label for="accessories">Greeting cards & Candles</label></li>
                    <li class="filter-list"><input class="pixel-radio" type="radio" id="footwear" name="brand"><label for="footwear">Jewellery & Stones</label></li>
                    <li class="filter-list"><input class="pixel-radio" type="radio" id="footwear" name="brand"><label for="footwear">All</label></li>
                  </ul>
                </form>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          <div class="filter-bar d-flex flex-wrap align-items-center">
            <div class="sorting">
              <select>
                <option value="1">Popularity</option>
                <option value="1">Price</option>
              </select>
            </div>
            <div class="mr-auto"></div>
            <form action="#" method="POST">
            <div>
                <div class="input-group filter-bar-search">
                  <input type="text" placeholder="Search" name="keywords">
                  <div class="input-group-append">
                    <button type="submit" name="search"><i class="ti-search"></i></button>
                  </div>
                </div>
            </div>
            </form>
          </div>
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">
            <?php
                for($i=0;$i<count($product_details);$i++){
            ?>
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                <?php echo "<a href=single-product.php?id=",$product_details[$i]['product_id'],">";?>
                  <div class="card-product__img">
                  <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $product_details[$i]['product_image'] ).'" style="width:255px;height:271px"/>';?>
                    <ul class="card-product__imgOverlay">
                        <li><button><i class="ti-shopping-cart"></i></button></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p>Accessories</p>
                    <h4 class="card-product__title"><a href=""><?php echo $product_details[$i]['product_name']?></a></h4>
                    <p class="card-product__price"><?php echo "Rs.".$product_details[$i]['cost']?></p>
                  </div>
                </div>
              </div>
              <?php
                }
              ?>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                  <?php
                  if($pn>=2){
                    ?>
                    <li class=page-item><a class=page-link href=<?php echo "category.php?page=".($pn-1);?> tabindex="-1">Previous</a></li>
                  <?php
                  }else{
                    ?>
                    <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                  </li>
                  <?php
                  }
                  for($i=1;$i<=3;$i++){?>
                  <li class="page-item"><a class="page-link" href=<?php echo "category.php?page=".$i; ?>><?php echo $i;?></a></li>
                  <?php
                  }
                  ?>
                  <?php
                  if($pn<$total_pages){
                  ?>
                    <li class="page-item">
                    <a class="page-link" href=<?php echo "category.php?page=".($pn+1); ?>>Next</a>
                  </li>
                  <?php
                  }else{
                  ?>
                    <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Next</a>
                  </li>
                  <?php
                  }
                  ?>
                </ul>
              </nav>
          </section>
          <!-- End Best Seller -->

        </div>

      </div>

    </div>
  </section>
	<!-- ================ category section end ================= -->

	<!-- ================ top product area start ================= -->
	<section class="related-product-area">
		<div class="container">
			<div class="section-intro pb-60px">
        <p>Popular Item in the market</p>
        <h2>Top <span class="section-intro__style">Product</span></h2>
      </div>
			<div class="row mt-30">
        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/images/tr1.jpg" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/images/tr2.jpg" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/images/tr3.jpg" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/images/tr4.jpg" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/images/tr5.jpg" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/images/tr6.jpg" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/images/tr7.jpg" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/images/tr8.jpg" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/images/tr3.jpg" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/images/tr1.jpg" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/images/tr2.jpg" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/images/tr3.jpg" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>
	</section>
	<!-- ================ top product area end ================= -->

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
  <?php
  include_once('../layouts/footer.php');
  ?>
