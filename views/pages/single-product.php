<?php
ob_start();
include_once('../layouts/header.php');
include_once('../layouts/navbar.php');
include_once('../../classes/Products.class.php');
include_once('../../classes/Cart.class.php');
session_start();
$product = new Products();

if(isset($_GET['id'])){
	$result =$product->viewProduct($_GET['id']);
	$_SESSION['product_id']=$_GET['id']; 
}else{
	$result =$product->viewProduct(1);
}

if(isset($_POST['quantity'])){
	$data['quantity'] = $_POST['quantity'];
	$_SESSION['quantity'] = $data['quantity'];  
}

if(isset($_GET['addId'])){
	if(isset($_SESSION['quantity'])){
		$cart = new Cart();
		if(isset($_SESSION['product_id'])){
			$cart->addToCart($_SESSION['product_id'],$_SESSION['quantity']);
			unset($_SESSION['product_id']);
		}else{
			$cart->addToCart(1,$_SESSION['quantity']);
		}
		unset($_SESSION['quantity']);
	}
	Helper::redirect('cart.php');	
}
$class = 'button primary-btn';
?>

<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="owl-carousel owl-theme s_Product_carousel">
						<div class="single-prd-item">
                <?php echo '<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode($result['product_image']).'" style="width:539px;height:583px" alt="">';?>
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $result['product_name'] ?></h3>
						<h2><?php echo "Rs.".$result['cost'] ?></h2>
						<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for
							something that can make your interior look awesome, and at the same time give you the pleasant warm feeling
							during the winter.</p>
						<div class="product_count">
            <input type="number" name="qty" id="qty" min="0"  value="0" title="Quantity:" class="input-text qty" onchange="setQuantity(this.value)">
						<script>
							function setQuantity(val){
								var x = val;
								if(x!==0 && x>0){
									$.ajax({
										url:"single-product.php",
										method: "POST",
										data: {quantity:x},
										dataType: "json",
									});
								}										
							}							
            </script>
            
            <?php if(isset($_SESSION['user_id'])){
							 echo "<a class='$class' href=single-product.php?addId=",$_SESSION['user_id'],">Add to Cart</a>";
						}else{
              ?>
                <a class=button primary-btn href="" data-toggle="modal" data-target="#modalLRForm">Add to Cart</a>	
            <?php
            }
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->
	<br>
	<br>
	<!--================ Start related Product area =================-->
	<section class="related-product-area section-margin--small mt-0">
		<div class="container">
			<div class="section-intro pb-60px">
        <p>Popular Item in the market</p>
        <h2>Top <span class="section-intro__style">Product</span></h2>
      </div>
			<div class="row mt-30">
        <div class="col-sm-6 col-xl-3 mb-4 mb-xl-0">
          <div class="single-search-product-wrapper">
            <div class="single-search-product d-flex">
              <a href="#"><img src="../../img/product/product-sm-1.png" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/product/product-sm-2.png" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/product/product-sm-3.png" alt=""></a>
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
              <a href="#"><img src="../img/product/product-sm-4.png" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/product/product-sm-5.png" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/product/product-sm-6.png" alt=""></a>
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
              <a href="#"><img src="../img/product/product-sm-7.png" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/product/product-sm-8.png" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/product/product-sm-9.png" alt=""></a>
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
              <a href="#"><img src="../img/product/product-sm-1.png" alt=""></a>
              <div class="desc">
                  <a href="#" class="title">Gray Coffee Cup</a>
                  <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/product/product-sm-2.png" alt=""></a>
              <div class="desc">
                <a href="#" class="title">Gray Coffee Cup</a>
                <div class="price">$170.00</div>
              </div>
            </div>
            <div class="single-search-product d-flex">
              <a href="#"><img src="../img/product/product-sm-3.png" alt=""></a>
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
	<!--================ end related Product area =================-->
<?php include_once('../layouts/footer.php') ?>
