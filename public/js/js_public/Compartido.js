
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
        
        sjq(container).append(items)
                .isotope('appended', items)
                        .isotope('layout');;
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
                                .isotope('appended', items)
                                  .isotope('layout');
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



//Javascript para cargar las imagenes via ajax
function GetDataAjaxEventsIndbyCity(url) {
    $(".eventsPromo").html("");
    $(".eventsPromo").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            
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
                    sjq(items).imagesLoaded(function () {
                        sjq(container).append(items)
                                .isotope('appended', items)
                        .isotope('layout');;
                    });
                });
            });
        },
        error: function (data) {
            alert("No results");
            $(".eventsPromo").LoadingOverlay("hide", true);
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
                    sjq(items).imagesLoaded(function () {
                        sjq(container).append(items)
                                .isotope('appended', items)
                        .isotope('layout');;
                    });
                });
            });
        },
        error: function (data) {
           alert("No results");
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
                                .isotope('appended', items)
                                  .isotope('layout');
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
                    sjq(items).imagesLoaded(function () {
                        sjq(container).append(items)
                                .isotope('appended', items).isotope('layout');
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



function GetDataAjaxPromociones(url) {
    $(".promocionesAtraccion").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $(".promocionesAtraccion").LoadingOverlay("hide", true);
            $(".promocionesAtraccion").html(data.promocionesAtraccion);


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

function GetDataAjaxEventos(url) {
    $(".eventosAtraccion").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $(".eventosAtraccion").LoadingOverlay("hide", true);
            $(".eventosAtraccion").html(data.eventosAtraccion);


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

window.current_pageIntern=0;

function GetDataAjaxCloseIntern(url) {
    $(".cercanos").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': window.current_pageIntern + 1 // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageIntern=current_pageIntern+1;
            $(".cercanos").LoadingOverlay("hide", true);
            $(".cercanos").append(data.cercanos);


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



window.current_pageSeCatApp=1;

function GetDataAjaxSearchCatogoriesApp(url) {
    $(".Searchcategorias").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': window.current_pageSeCatApp + 1 // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageSeCatApp=current_pageSeCatApp+1;
            $(".Searchcategorias").LoadingOverlay("hide", true);
            $(".Searchcategorias").append(data.Searchcategorias);


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

window.current_pageSeCat=0;

function GetDataAjaxSearchCatogories(url) {
    $(".Searchcategorias").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': window.current_pageSeCat + 1 // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageSeCat=current_pageSeCat+1;
            $(".Searchcategorias").LoadingOverlay("hide", true);
            $(".Searchcategorias").html(data.Searchcategorias);


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


window.current_pageCat=0;

function GetDataAjaxCatogories(url) {
    $(".categorias").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': window.current_pageCat + 1 // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageCat=current_pageCat+1;
            $(".categorias").LoadingOverlay("hide", true);
            $(".categorias").append(data.categorias);


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


function GetLikes(url) {
    
    $(".likes").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $(".likes").LoadingOverlay("hide", true);
            $(".likes").html(data.likes);


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



window.current_pageReview=0;

function GetReview(url) {
    $(".review").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': window.current_pageReview + 1 // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageReview=current_pageReview+1;
            $(".review").LoadingOverlay("hide", true);
            $(".review").append(data.review);


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




function AjaxContainerRegistro($formulario) {
    $(".btn-compare").LoadingOverlay("show");
    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    
    var posting = $.post(url, {formData: data});
    
    posting.done(function (data) {
        if (data.fail) {
            
            alert("fail");
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("#target").LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            alert("la concha");
            $("#loadingScreen").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success



    });
}

function ajaxajax()
{
    
   
var data = { key: $('#search-query').val() };

$.ajax({
     type: 'POST',
     url: "likesS",
     data: JSON.stringify(data),
     dataType: 'json',
     contentType: 'application/json; charset=utf-8',
     success: function (data) {
          if (data.redirect) {
              window.location.href = data.redirect;
          }
          $('.builder').empty();
          alert("Key Passed Successfully!!!");
     }
});
    
}




//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunBurnURLikes($urlS,$formulario, $id, $load) {
    
    $(".".$load).LoadingOverlay("show");



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id;
    
    var url =$urlS + $id;
    var posting = $.post(url, {formData: data});
    
    posting.done(function (data) {
        
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#" + $formulario).LoadingOverlay("hide", true);
            //$('#error').html(errorString);
        

        }
        if (data.success) {
            $(".".$load).LoadingOverlay("hide", true);
            GetLikes("/IguanaTrip/public/getLikesA/"+$formulario);
        


        } //success
    }); //done

}


//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunBurnURL($urlS,$formulario, $id, $load) {
    
    $(".".$load).LoadingOverlay("show");



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id;
    
    var url =$urlS + $id;
    var posting = $.post(url, {formData: data});
    
    posting.done(function (data) {
        
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#" + $formulario).LoadingOverlay("hide", true);
            //$('#error').html(errorString);
        

        }
        if (data.success) {
            $(".".$load).LoadingOverlay("hide", true);
        


        } //success
    }); //done

}





