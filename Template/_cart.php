<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST['delete_from_cart_submit']))
    {
    $deletedProduct=$cart->deleteItemFromCart($_POST['item_id']);
    }
}
?>
<!---Start Main Section-->
<main id="main-site">
    <!---Start Cart-->
    <section id="cart" class="py-3">
        <div class="container-fluid w-75">
            <h5 class="font-baloo font-size-20">Shopping Cart</h5>
            <div class="row">
                <div class="col-sm-9">
                    <?php foreach ($cart->getCartItems() as $item){?>

                        <!--- start cart item -->
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['item_image'];?>" alt="Product" class="img-fluid"
                                     style="height: 120px;">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo $item['item_name'];?></h5>
                                <small>by <?php echo $item['item_brand'];?></small>
                                <!---start item rating-->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                        <a href="#" class="font-rale font-size-14 px-2">20,534 ratings</a>
                                    </div>
                                </div>
                                <!---close item rating-->
                                <!---start item quantity-->
                                <div class="qty d-flex py-2">
                                    <div class="d-flex font-rale w-100">
                                        <button class="qty-up border bg-light" data-id="<?php echo $item['item_id']; ?>">
                                            <i class="fas fa-angle-up"></i>
                                        </button>
                                        <input type="text" data-id="<?php echo $item['item_id']; ?>" class="qty-input border px-2 w-25 bg-light" disabled
                                               value="1" placeholder="1">
                                        <button class="qty-down border bg-light" data-id="<?php echo $item['item_id' ]  ;?>">
                                            <i class="fas fa-angle-down"></i>
                                        </button>
                                        <form method="post">
                                            <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                            <button type="submit" name="delete_from_cart_submit" class="btn font-baloo font-size-14 px-3 text-danger border-right">
                                                Delete
                                            </button>
                                        </form>
                                        <button type="submit" class="btn font-baloo font-size-14 text-danger">Save
                                            for Later</button>
                                    </div>
                                </div>
                                <!---close item quantity-->

                            </div>
                            <!---start price-->
                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 font-balo text-danger">
                                    $<span class="product-price"><?php echo $item['item_price'];?></span>
                                </div>
                            </div>
                            <!---close price-->
                        </div>
                        <!--- close cart item -->


                    <?php } ?>
                </div>
                <div class="col-sm-3">
                    <div class="sub-total border text-center mt-2">
                        <h6 class="font-rale font-size-12 text-success py-3">
                            <i class="fas fa-check"></i> Your order
                            is eligible for FREE delivery.
                        </h6>
                        <div class="border-top py-4">
                            <h5 class="font-baloo font-size-20">
                                Subtotal ( <?php echo $cart->getNumberOfItemsInCart(); ?> ) <span class="text-danger">$</span><span id="deal-price"
                                                                                             class="text-danger"><?php echo $cart->getSubtotal(); ?> </span>
                            </h5>
                            <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <!---Start Cart-->
</main>