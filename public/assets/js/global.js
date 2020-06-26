$(document).ready(function () {

    function imagesPreview(input, placeToInsertImagePreview) {

        if (input.files) {
            let filesAmount = input.files.length;

            for (let i = 0; i < filesAmount; i++) {
                let reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).attr('class', 'w-25').appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#images-upload').on('change', function() {
        $('div.images-preview').text('');
        imagesPreview(this, 'div.images-preview');
    });

});
