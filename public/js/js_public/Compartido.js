
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});





function getPhotos(callback) {

    $.ajax({
        type: "GET",
        dataType: 'json',
        url: "http://localhost:8080/IguanaTrip/public/getTopPlaces", // this is a variable that holds my route url
        data: {
            'page': window.current_page + 1 // you might need to init that var on top of page (= 0)
        }
    })
            .done(function (response) {
                alert(photosObj);
                var photosObj = $.parseJSON(response.photos);
                console.log(photosObj);

                window.current_page = photosObj.current_page;

                // hide the [load more] button when all pages are loaded
                if (window.current_page == photosObj.last_page) {
                    $('#load-more-photos').hide();
                }

                callback(photosObj);
            })
            .fail(function (response) {
                console.log("Error: " + response);
            });
}
function masonryBlocks() {

    var container = $('.topPlaces');
    var items = $('.TopPlace');
    sjq(container).imagesLoaded( function() {
    // init isotope
    sjq(container).isotope({
    itemSelector: '.TopPlace',
    percentPosition: true,
    masonry: {
        columnWidth: '.TopPlace'
    }
  });
     // append other items when they are loaded
    sjq(items).imagesLoaded( function() {
        sjq(container).isotope( 'appended', items );
    });
  });
}

function GetDataAjaxTopPlaces(url) {
    $(".topPlaces").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            $(".topPlaces").LoadingOverlay("hide", true);
            $(".topPlaces").append(data.topPlaces);
               setTimeout(function() { masonryBlocks(); }, 500);
        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}



function GetDataAjaxregiones(url) {
    $(".regiones").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            $(".regiones").LoadingOverlay("hide", true);
            $(".regiones").html(data.regiones);


        },
        error: function (data) {
            var errors = data.responseJSON;
            if (errors) {
                $.each(errors, function (i) {
                    console.log(errors[i]);
                });
            }
        }
    });
}


