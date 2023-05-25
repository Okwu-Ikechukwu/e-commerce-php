$(document).ready(function () {
 
        $(document).on('click', '.delete_product_btn', function (e) {
         e.preventDefault();
        
        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
               $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'product_id':id,
                    'delete_product_btn':true

                },

                success: function (response) {
                    if (response == 200) 
                    {
                        swal("Success!", "product deleted successfully!", "success");
                        $("#products_table").load(location.href + " #products_table");
                    }
                    elseif(response == 500)
                    {
                        swal("Error!", "Something went wrong!", "error");
                    }
                }

               });
            }
          });
    });
    

    $(document).on('click', '.delete_user_btn', function (e) {
        e.preventDefault();
       
         var id = $(this).val();
       swal({
           title: "Are you sure?",
           text: "Once deleted, you will not be able to recover ",
           icon: "warning",
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
              $.ajax({
               method: "POST",
               url: "code.php",
               data: {
                   'user_id':id,
                   'delete_user_btn':true

               },

               success: function (response) {
                   if (response == 200) 
                   {
                       swal("Success!", "user deleted successfully!", "success");
                       $("#products_table").load(location.href + " #products_table");
                   }
                   elseif(response == 500)
                   {
                       swal("Error!", "Something went wrong!", "error");
                   }
               }

              });
           }
         });
   });


    $(document).on('click', '.delete_category_btn', function (e) {
        e.preventDefault();
        
        var id = $(this).val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
               $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'category_id':id,
                    'delete_category_btn':true

                },

                success: function (response) {
                    if (response == 200) 
                    {
                        swal("Success!", "product deleted successfully!", "success");
                        $("#category_table").load(location.href + " #category_table");
                    }
                    elseif(response == 500)
                    {
                        swal("Error!", "Something went wrong!", "error");
                    }
                }

               });
            }
          });
    });
    
});

