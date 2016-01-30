
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});





//Funcion para ordenar las tabletas de la pagina de inicio
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


//Javascript para cargar las imagenes via ajax
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


window.current_page=1;
//Javascript para cargar las imagenes via ajax con el botonload more
function GetDataAjaxTopPlacesHome(url) {
   
    $(".topPlaces").LoadingOverlay("show");
        $.ajax({
            type: 'GET',
            url: url,
               data:{
            'page': window.current_page + 1 // you might need to init that var on top of page (= 0)
            },

            dataType: 'json',
            success: function (data) {
            
            window.current_page=current_page+1;
            $(".topPlaces").LoadingOverlay("hide", true);
            var imgs = [];
            $(data.topPlaces).each(function () {
                var its = $(this).html();
                    imgs.push(its);
            });
            itemsHTML = $.map(imgs, function (src) {
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.topPlaces');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: '.TopPlace'
                        }
                    });
                    // append other items when they are loaded
                    sjq(items).imagesLoaded(function () {
                        sjq(container).append(items)
                                .isotope('appended', items);
                    });
                });
            });
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


