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
							<img class="img-fluid" src="../img/category/s-p1.jpg" alt="">
						</div>
						<!-- <div class="single-prd-item">
							<img class="img-fluid" src="../img/category/s-p1.jpg" alt="">
						</div>
						<div class="single-prd-item">
							<img class="img-fluid" src="../img/category/s-p1.jpg" alt="">
						</div> -->
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>Faded SkyBlu Denim Jeans</h3>
						<h2>$149.99</h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : Household</a></li>
							<li><a href="#"><span>Availibility</span> : In Stock</a></li>
						</ul>
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
	<!--================ end related Product area =================-->
<?php include_once('../layouts/footer.php') ?>
