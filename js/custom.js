
$(document).ready(function() {
       
    $(document).on('click', '.increment-btn', function (e) {
        e.preventDefault();
        
        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
      });


      $(document).on('click', '.decrement-btn', function (e) {
        e.preventDefault();
        
        var qty = $(this).closest('.product_data').find('.input-qty').val();

        var value = parseInt(qty, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
      });

      $(document).on('click', '.addToCartBtn', function (e) {
        e.preventDefault();
        
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "../includes/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope" : "add"

            },

            success: function (response) {
                if (response == 201) 
                {
                    alertify.success("Product added to cart");
                    $('#my-nav').load(location.href + " #my-nav");

                }
                else if(response == "existing")
                {
                    alertify.success("Product already in cart");
                }
                else if(response == 401)
                {
                    alertify.success("Login to Continue");
                }
                else if(response == 500)
                {
                    alertify.success("Something went wrong");
                }
            }

           });
      });


      $(document).on('click', '.updateQty', function () {
        
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();

       
        var prod_id = $(this).closest('.product_data').find('.prodId').val();

        $.ajax({
            method: "POST",
            url: "../includes/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope" : "update"
            },
            success: function (response) {
          
            }
           });
      });

      $(document).on('click', '.deleteItem', function () {
        var cart_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "../includes/handlecart.php",
            data: {
                "cart_id": cart_id,
                "scope" : "delete"
            },
            success: function (response) {
                if (response == 200) 
                {
                    alertify.success("Item deleted successfully");
                    $('#mycart').load(location.href + " #mycart");
                    $('#mycartnav').load(location.href + " #mycartnav");
                }
                else
                {
                    alertify.success(response);
                }
            }
           });

      });




// WISHLIST





      $(document).on('click', '.addToWishlist', function (e) {
        e.preventDefault();
        
        var prod_id = $(this).val();

         $.ajax({
            method: "POST",
            url: "../includes/handlewishlist.php",
            data: {
                "prod_id": prod_id,
                "scope" : "add2"
            },

            success: function (response) {
                if (response == 201) 
                {
                    alertify.success("Product added to wishlist");
                    $('#mycartnav').load(location.href + " #mycartnav");
                    $('#mycart').load(location.href + " #mycart");
                    $('#mywishlist').load(location.href + " #mywishlist");
                }
                else if(response == "existing")
                {
                    alertify.success("Product already in wishlist");
                }
                else if(response == 401)
                {
                    alertify.success("Login to Continue");
                }
                else if(response == 500)
                {
                    alertify.success("Something went wrong");
                }
            }

           });
      });






      $(document).on('click', '.addback', function (e) {
        e.preventDefault();
        
        var prod_id = $(this).val();

         $.ajax({
            method: "POST",
            url: "../includes/handlewishlist.php",
            data: {
                "prod_id": prod_id,
                "scope" : "add3"
            },

            success: function (response) {
                if (response == 201) 
                {
                    alertify.success("Product added to cart");
                    $('#mycartnav').load(location.href + " #mycartnav");
                    $('#mycart').load(location.href + " #mycart");
                    $('#mywishlist').load(location.href + " #mywishlist");
                }
                else if(response == "existing")
                {
                    alertify.success("Product already in cart");
                }
                else if(response == 401)
                {
                    alertify.success("Login to Continue");
                }
                else if(response == 500)
                {
                    alertify.success("Something went wrong");
                }
            }

           });
      });




      $(document).on('click', '.deleteItem2', function () {
        var prod_id = $(this).val();
        $.ajax({
            method: "POST",
            url: "../includes/handlewishlist.php",
            data: {
                "prod_id": prod_id,
                "scope" : "delete2"
            },
            success: function (response) {
                if (response == 200) 
                {
                    alertify.success("Wishlist item deleted successfully");
                    $('#mycartnav').load(location.href + " #mycartnav");
                    $('#mywishlist').load(location.href + " #mywishlist");
                }
                else
                {
                    alertify.success(response);
                }
            }
           });

      });
      
});