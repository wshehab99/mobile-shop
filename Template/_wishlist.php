<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(isset($_POST['delete_from_wishlist_submit']))
    {
        $deletedProduct=$wishlist->deleteProductFromWishList($_POST['item_id']);

    }
    elseif (isset($_POST['add_to_cart_submit']))
    {
        $cart->addToCart($_POST['user_id'],$_POST['item_id']);
        $deletedProduct=$wishlist->deleteProductFromWishList($_POST['item_id']);

    }


}

?>
<!---Start Main Section-->
<main id="main-site">
    <!---Start Cart-->
    <section id="cart" class="py-3">
        <div class="container-fluid w-75">
            <h5 class="font-baloo font-size-20">Wishlist</h5>
            <div class="row">
                <div class="col-sm-9">
                    <?php foreach ($wishlist->getWishlistItems() as $item){?>

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
                                        <form method="post">
                                            <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">

                                            <button type="submit" name="delete_from_wishlist_submit" class="btn font-baloo font-size-14 px-3 text-danger border-right">
                                                Delete from wishlist
                                            </button>


                                            <?php
                                            if(in_array($item['item_id'],$cart->getCartId()))
                                            {
                                                echo '<button type="submit" disabled name="add_to_cart_submit" class="btn font-baloo font-size-14 text-danger">
                                                                Already in cart
                                                                </button>';
                                            }
                                            else
                                            {
                                                echo '<button type="submit" name="add_to_cart_submit" class="btn font-baloo font-size-14 text-danger">
                                                                Add to cart
                                                                </button>';
                                            }

                                            ?>
                                        </form>

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

            </div>
        </div>


    </section>
    <!---Start Cart-->
</main>