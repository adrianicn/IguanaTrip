
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});





//Funcion para ordenar las tabletas de la pagina de inicio
function masonryBlocks($cont,$item) {

    var container = $('.'+$cont);
    var items = $('.'+$item);
    sjq(container).imagesLoaded( function() {
    // init isotope
    sjq(container).isotope({
    itemSelector: '.'+$item,
    percentPosition: true,
    masonry: {
        columnWidth: '.'+$item
        
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
               setTimeout(function() { masonryBlocks('topPlaces','TopPlace'); }, 500);
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

//Javascript para cargar las imagenes via ajax
function GetDataAjaxEventsInd(url) {
    $(".eventsPromo").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            $(".eventsPromo").LoadingOverlay("hide", true);
            $(".eventsPromo").append(data.eventsPromo);
               setTimeout(function() { masonryBlocks('eventsPromo','eventInd'); }, 500);
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


   window.current_page_e=1;
   

//Javascript para cargar las imagenes via ajax con el botonload more
function GetDataAjaxEventsHome(url) {
    $(".eventsPromo").LoadingOverlay("show");
        $.ajax({
            type: 'GET',
            url: url,
               data:{
            'page': window.current_page_e + 1 // you might need to init that var on top of page (= 0)
            },

            dataType: 'json',
            success: function (data) {
            
            window.current_page_e=current_page_e+1;
            $(".eventsPromo").LoadingOverlay("hide", true);
            var imgs = [];
            $(data.eventsPromo).each(function () {
                var its = $(this).html();
                    imgs.push(its);
            });
            itemsHTML = $.map(imgs, function (src) {
                return src;
            });
            var items = $(itemsHTML.join(''));
            $(function () {
                var container = $('.eventsPromo');
                sjq(container).imagesLoaded(function () {
                    // init isotope
                    sjq(container).isotope({
                        masonry: {
                            columnWidth: '.eventInd'
                        }
                    });
                    // append other items when they are loaded
                    //sjq(items).imagesLoaded(function () {
                        sjq(container).append(items)
                                .isotope('appended', items);
                    //});
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


