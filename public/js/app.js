/**
 * Created by illia on 26.03.17.
 */
$(document).ready(function() {

    $('#add-product-form').on('submit', function(e) {
        $.ajax({
            url: "/products",
            type:"POST",
            data: $('#add-product-form').serialize(),
            success: function(data){
                console.log('success');
            },
            error: function (request, status, error) {

            }
        });

        //prevent redirecting
        return false;
    });


});