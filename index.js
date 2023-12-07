$(document).ready(function () {
    //Banner Owl Carousal
    $("#banner-area .owl-carousel").owlCarousel({
        dots: true,
        items: 1
    });
    // top sale owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });
    //isotope filter
    var $grid = $(".grid").isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
    });
    //filter items on click button
    $(".button-group").on('click', 'button', function () {
        var filterValue = $(this).attr("data-filter");
        $grid.isotope({ filter: filterValue });
    });
    //New Phones Carousal
    $("#new-phones .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });
    // Blogs Carousal
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
        }
    });
    //quantity value
     $qty_up = $('.qty .qty-up');
    $qty_down = $('.qty .qty-down');
    let $deal_price = $("#deal-price");

    // $qty_input = $('.qty .qty-input');
    $qty_up.click(function (event) {
        let $qty_input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product-price[data-id='${$(this).data("id")}']`);
        $.ajax({url:"template/ajax.php",type:"post",data:{itemid:$(this).data("id")},success:function (result){
                let obj=JSON.parse(result);
                let item_price=obj[0]['item_price'];
        if ($qty_input.val() < 10) {
            $qty_input.val(function (i, old_value) {
                return ++old_value;
            });
            // increase price of the product
            $price.text(parseFloat(item_price * $qty_input.val()).toFixed(2));

            // set subtotal price
            let subtotal = parseFloat($deal_price.text()) + parseFloat(item_price);
            $deal_price.text(subtotal.toFixed(2));
        }},});
     });

    $qty_down.click(function (event) {

        let $qty_input = $(`.qty-input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product-price[data-id='${$(this).data("id")}']`);
        $.ajax({url:"template/ajax.php",type:"post",data:{itemid:$(this).data("id")},success:function (result){
            let obj=JSON.parse(result);
            let item_price=obj[0]['item_price'];
                if ($qty_input.val() > 1) {
                    $qty_input.val(function (i, old_value) {
                        return --old_value;
                    });
                    // increase price of the product
                    $price.text(parseFloat(item_price * $qty_input.val()).toFixed(2));

                    // set subtotal price
                    let subtotal = parseFloat($deal_price.text()) - parseFloat(item_price);
                    $deal_price.text(subtotal.toFixed(2));
            }},});

        },);
});
