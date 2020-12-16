$(document).ready(function () {

    // $(".alert-success").fadeTo(2000, 500).slideUp(500, function () {
    //     $(".alert-success").slideUp(500);
    // });

    $('#addToCartBtn').on('click', function () {


        if ($(this).text() == 'ADD TO CART') {
            $(this).text('Added to Cart');
            $(this).attr('class', 'btn btn-success mr-0 mr-sm-1 mb-1 mb-sm-0');

            const name = $('#name').text();
            const color = $('#color').val();
            const quantity = $('#quantity').val();
            const price = $('#price').text();
            axios({
                method: 'post',
                url: 'http://127.0.0.1:8000/addToCart',
                data: {
                    id: productId,
                    name: name,
                    color: color,
                    quantity: quantity,
                    price: price,
                },
            }).then(function (response) {
               //alert(response);
               return false;
                location.reload();

            });


        } else {
            $(this).text('Added to Cart');
            $(this).attr('class', 'btn btn-success mr-0 mr-sm-1 mb-1 mb-sm-0');
        }
    });
});
