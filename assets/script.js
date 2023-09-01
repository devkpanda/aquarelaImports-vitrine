function Submit() {
    var u_advertisement_id = $('#advertisement_id').val();
    var u_name             = $('#name').val();
    var u_description      = $('#description').val();
    var u_price            = $('#price').val();
    var u_category_id      = $('#category_id').val();
    var u_sub_category_id  = $('#sub_category_id').val();
    var u_measurement      = $('#measurement').val();
    var u_size             = $('#size').val();
    var u_videoUrl         = $('#videoUrl').val();

    $.ajax({
        url: 'http://127.0.0.1:5500/Classes/Connection2.php',
        method: 'POST',
        data: {
            advertisement_id: u_advertisement_id,
            name: u_name,
            description: u_description,
            price: u_price,
            category_id: u_category_id,
            sub_category_id: u_sub_category_id,
            measurement: u_measurement,
            size: u_size,
            videoUrl: u_videoUrl
        },
        dataType: 'json',


    }).done(function (result) {
        console.log(result);
    })



}