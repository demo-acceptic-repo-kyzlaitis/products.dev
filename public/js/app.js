/**
 * Created by illia on 26.03.17.
 */
$(document).ready(function () {

    var productsTable = $('.products-table');
    var successFullyAdded = $('.hidden-block');
    var emptyMessage = $('.empty-message');

    $('#add-product-form').on('submit', function (e) {
        $.ajax({
            url: "/products",
            type: "POST",
            data: $('#add-product-form').serialize(),
            success: function (data) {


                productsTable.prepend('' +
                    '<tr>' +
                        '<td>' + data.product_name +'</td>' +
                        '<td>' +
                            '<div class="data-holder" data-product-name="' + data.product_name +
                                                    '" data-product-price="' + data.product_price +
                                                    '" data-product-desc="'+ data.product_desc + '"></div>'+
                            '<button class="btn btn-primary btn-xs product-details" data-toggle="tooltip" title="Show product details" >'+
                                '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show details'+
                            '</button>'+
                        '</td>' +
                    '</tr>'
                );

                successFullyAdded.show();
                productsTable.show();

                //hide empty message for case when there are no products in "products" table
                emptyMessage.hide();
            },
            error: function (response, status, error) {

                parseErrors($.parseJSON(response.responseText));
            },
            beforeSend: function () {
                successFullyAdded.hide();

                //resets error fields
                $('.error-product-name').empty();
                $('.error-product-desc').empty();
                $('.error-product-price').empty();
            }
        });

        //prevent redirecting
        return false;
    });

    //hide product table and show details
    $('.table-condensed').on('click', '.product-details', function (e) {

        var buttonContext = this;

        $('.products-table').fadeOut("fast", function () {
            var dataHolder = $(buttonContext).prev('.data-holder');

            var previewTable = $('.preview-product-table');

            previewTable.find('.product_name').text(dataHolder.data('product-name'));
            previewTable.find('.product_price').text(dataHolder.data('product-price'));
            previewTable.find('.product_desc').text(dataHolder.data('product-desc'));
            $('.hidden-get-back-button').toggle();
            previewTable.fadeIn("slow");
        });
    });

    //hide details and show products table
    $('.get-back-button').on('click', function (e) {

        $('.hidden-get-back-button').toggle();

        $('.preview-product-table').fadeOut("fast", function () {
            $('.products-table').fadeIn();
        });

    });

    $('.close').hide();

    function parseErrors(parsedJson) {
        $.each( parsedJson, function( key, value ) {
            console.log(key);
            if(key == 'product_name') {

                $('.error-product-name').empty().append(value);
            }

            if(key == 'product_desc') {
                $('.error-product-desc').empty().append(value);
            }

            if(key == 'product_price') {
                $('.error-product-price').empty().append(value);
            }
        });
    }
});