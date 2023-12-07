<?php
$products=$product->getProducts();
shuffle($products);
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['new_phones_submit'])){
        //call addToCart methode
        $cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
}
?>
<!---Start New Phones-->
<section id="new-phones">
    <div class="container">
        <h4 class="font-rubik font-size-20">New Phones</h4>
        <hr>
        <!---Start Owl Carousel-->
        <div class="owl-carousel owl-theme">
            <?php

            foreach ($products as $item){?>
            <div class="item py-2">
                <div class="product font-rale">
                    <a href="<?php echo "product.php?item_id=" . $item['item_id'];?>">
                        <img src="<?php echo $item['item_image'];?>" alt="Product1">
                    </a>
                    <div class="text-center">
                        <h6><?php echo $item['item_name'];?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>

                        </div>
                        <div class="price py-2">
                            <span>$<?php echo $item['item_price'];?></span>
                        </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'];?>">
                            <input type="hidden" name="user_id" value="<?php echo 1;?>">
                            <?php
                            if(in_array($item['item_id'],$cart->getCartId()))
                            {
                                echo '<button type="submit" disabled class="btn-success font-size-12">
                                Already in cart
                            </button>';
                            }else
                            {
                                echo '<button type="submit" name="new_phones_submit" class="btn btn-warning font-size-12">
                                Add to cart
                            </button>';
                            }

                            ?>


                        </form>
                    </div>
                </div>

            </div>
            <?php }?>
        </div>
        <!---Close Owl Carousal-->
    </div>
</section>
<!---Close New Phones-->