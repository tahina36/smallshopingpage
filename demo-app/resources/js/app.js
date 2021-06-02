require('./bootstrap');

$(document).ready(function() {
    $(document).on("click", ".pqt-minus", function() {
        var currentQuantity = $(".product-details-cart-actions #quantity").val();
        if (currentQuantity > 1) {
            currentQuantity = parseInt(currentQuantity) - 1;
        }
        $(".product-details-cart-actions #quantity").val(currentQuantity);
    });

    $(document).on("click", ".pqt-plus", function() {
        var currentQuantity = $(".product-details-cart-actions #quantity").val();
        if (currentQuantity < 99) {
            currentQuantity = parseInt(currentQuantity) + 1;
        }
        $(".product-details-cart-actions #quantity").val(currentQuantity);
    });

    $(document).on("click", "#add-to-cart", function() {
        var currentQuantity = $(".product-details-cart-actions #quantity").val();
        var currentPrice = $(this).attr("data-price");
        var productImage = $(this).attr("data-image");
        var productName = $(this).attr("data-name");

        $(".product-quantity-total").text(currentQuantity);
        $(".product-total-price").text(parseFloat(parseInt(currentQuantity)*parseFloat(currentPrice)).toFixed(2)+"€");
        if (currentQuantity > 0) {
            $(".product-quantity-total").removeClass("hidden");
            var cartRow =  '<div class="row cart-detail">'
                                + '<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">'
                                +     '<img src="'+productImage+'" width="100px" height="100px">'
                                + '</div>'
                                + '<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">'
                                +     '<p>'+productName+'</p>'
                                +     '<span class="price text-info">'+currentPrice+'€</span> <span class="count"> Quantité: '+currentQuantity+'</span>'
                                +     '<button class="btn btn-sm btn-danger remove-product-from-cart">Supprimer</button>'
                                + '</div>'
                            + '</div>';

            $("#cart-product-list").append(cartRow);
        }
        else {
            $(".product-quantity-total").addClass("hidden");
        }
    });

    $(document).on("click", ".remove-product-from-cart", function() {
        $(this).parent().parent().remove();
        $(".product-details-cart-actions #quantity").val(0);
        $(".product-quantity-total").addClass("hidden");
        $(".product-quantity-total").text(0);
        $(".product-total-price").text("0€");
    });
    $(document).on("click", ".thumbnail-product", function() {
        $(".main-product-image").attr("src", $(this).attr("src"));
    });

    $('.dropdown').on('hide.bs.dropdown', function (e) {
        if (e.clickEvent) {
            e.preventDefault();
        }
    });
});
