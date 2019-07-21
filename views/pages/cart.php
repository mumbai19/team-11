<?php
ob_start();
include_once('../layouts/header.php');
include_once('../layouts/navbar.php');
include_once('../../classes/Products.class.php');
include_once('../../classes/Cart.class.php');
include_once('../../classes/Helper.class.php');

$product = new Products();
$cart = new Cart();
$cart_products = $cart->viewCart();
if(isset($_POST['cart'])){
    for($i=0;$i<count($cart_products);$i++){
        $cart->updateCartProductQuantity($cart_products[$i]['cart_id'],$_POST[$cart_products[$i]['product_id']]);
    }
}

if(isset($_POST['deletebtn'])){
    if(isset($_POST['cart_id'])){
        $cart->deleteProductFromCart($_POST['cart_id']);
    }
}
?>

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
            <form method="POST">
                <?php
                    if($cart_products){
                ?>        
                <table class="table" id="cart_table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Remove Product</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                $sub_total=0;
                                $updated_quantity=array();
                                for($i=0;$i<count($cart_products);$i++){
                                    $product_id = $cart_products[$i]['product_id'];
                                    
                                    $cart_product = $product->viewProduct($product_id);
                            ?>   
                            <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">                                       
                                        <?php echo	'<img class="img-fluid" src="data:image/jpeg;base64,'.base64_encode( $cart_product['product_image'] ).'" style="width:150px;height:100px" alt="">'; ?>
                                    </div>
                                    <div class="media-body">
                                        <p><?php echo $cart_product['product_name']; ?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5><?php echo $cart_product['cost']; ?></h5>
                            </td>
                            <td>
                                <div class="product_count" id="cg">
                                    <input type="number" name=<?php echo $product_id?> id=<?php echo $product_id?> min="0" value=<?php echo $cart_products[$i]['quantity']; ?> title="Quantity:"
                                        class="input-text qty quantity">
                                </div>
                            </td>
                            <td>
                                <h5><?php echo $cart_product['cost']*$cart_products[$i]['quantity'] ;
                                            $sub_total+=$cart_product['cost']*$cart_products[$i]['quantity'];?></h5>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="hideHeader()">Remove from Cart</button>
                            </td>
                            <script>
                                function hideHeader(){
                                    var header = document.getElementById("headerDiv");
                                    if(header.style.display == "none"){
                                        header.style.display = "block";
                                    }else{
                                        header.style.display = "none";
                                    }
                                }
                            </script>
                            <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Remove From Cart</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to remove this item from your cart?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="" method="POST">
                                                <input type="hidden" id="recordID" value=<?php echo $cart_products[$i]['cart_id']; ?> name="cart_id">
                                                    <button type="submit" name="deletebtn" id="deletebtn" class="btn btn-danger" onclick="hideHeader()">YES</button>
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="hideHeader()">NO</button>
                                            </form>
                                            <script>
                                                var number = document.getElementById("recordID").value;
                                                console.log(number);
                                                var btn = document.getElementById("deletebtn");
                                                // console.log(btn);
                                            </script>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php
                                }
                        ?>                          
                        <tr class="bottom_button">
                            <td>
                                <button class="button" name="cart">Update Cart</button>
                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="cupon_text d-flex align-items-center">
                                    <input type="text" placeholder="Coupon Code">
                                    <a class="primary-btn" href="#">Apply</a>
                                    <a class="button" href="#">Have a Coupon?</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5><?php echo $sub_total; ?></h5>
                            </td>
                        </tr>
                        <tr class="shipping_area">
                            <td class="d-none d-md-block">

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Shipping</h5>
                            </td>
                            <td>
                                <div class="shipping_box">
                                    <ul class="list">
                                        <li><a href="#">Flat Rate: $5.00</a></li>
                                        <li><a href="#">Free Shipping</a></li>
                                        <li><a href="#">Flat Rate: $10.00</a></li>
                                        <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                    </ul>
                                    <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                    <select class="shipping_select">
                                        <option value="1">Bangladesh</option>
                                        <option value="2">India</option>
                                        <option value="4">Pakistan</option>
                                    </select>
                                    <select class="shipping_select">
                                        <option value="1">Select a State</option>
                                        <option value="2">Select a State</option>
                                        <option value="4">Select a State</option>
                                    </select>
                                    <input type="text" placeholder="Postcode/Zipcode">
                                    <a class="gray_btn" href="#">Update Details</a>
                                </div>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td class="d-none-l">

                            </td>
                            <td class="">

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="category.php">Continue Shopping</a>
                                    <a class="primary-btn ml-2" href="confirmation.php">Order</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php
                    }
                    ?>
                </form>
                <script>
                // $("input").change(function(event){
                //     console.log(this.id);
                //     console.log(this.value);
                // });
            </script>
            

            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->



<?php
include_once('../layouts/footer.php');
?>