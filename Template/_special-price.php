<?php
$brands=array_unique(array_map(function ($prod){
    return $prod['item_brand'];
},$products));
sort($brands);
shuffle($products);
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['special_price_submit'])){
        //call addToCart methode
        $cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
}
?>
<!---Start Special Price-->
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <hr>
        <div id="filter" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checkd" data-filter="*">All Brands</button>
            <?php

            array_map(function($brand){ ?>
            <button class="btn" data-filter="<?php echo ".".$brand;?>"><?php echo $brand?></button>
            <?php },$brands);?>
        </div>
        <div class="grid">
            <?php array_map(function ($item) use($cart){?>
            <div class="grid-item border <?php echo $item['item_brand'];?>">
                <div class="item py-2" style="width:  200px">
                    <div class="product font-rale">
                        <a href="<?php echo "product.php?item_id=" . $item['item_id'];?>">
                            <img src="<?php echo $item['item_image'];?>" alt="Product1" class="img-fluid">
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

            </div>
            <?php },$products);?>

        </div>
    </div>
</section>
<!---Close Special Price-->