
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});



//se utiliza esta funcion para hacer un append del contenido que llega
window.current_pageSet=1;

function GetDataAjaxSearchTotApp(url) {
    $(".SearchTotalPartial").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': window.current_pageSet + 1 // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageSet=current_pageSet+1;
            
            $(".SearchTotalPartial").append(data.SearchTotalPartial);
            $(".SearchTotalPartial").LoadingOverlay("hide", true);


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



window.current_pageSet=0;

function GetDataAjaxSearchTotal(url) {
    
    $(".SearchTotalPartial").LoadingOverlay("show");
    $.ajax({
        type: 'GET',
        url: url,
            data:{
            'page': window.current_pageSet + 1 // you might need to init that var on top of page (= 0)
            },
        dataType: 'json',
        success: function (data) {
            window.current_pageSet=current_pageSet+1;
            
            $(".SearchTotalPartial").html(data.SearchTotalPartial);
            $(".SearchTotalPartial").LoadingOverlay("hide", true);


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
                          $(".topPlaces").LoadingOverlay("hide", true);
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
            $(".eventsPromo").LoadingOverlay("hide", true);
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
            $(".eventsPromo").LoadingOverlay("hide", true);
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
            $(".topPlaces").LoadingOverlay("hide", true);
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
                        $(".eventsPromo").LoadingOverlay("hide", true);
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
            
            
            $(".promocionesAtraccion").html(data.promocionesAtraccion);
$(".promocionesAtraccion").LoadingOverlay("hide", true);

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
            
            
            $(".eventosAtraccion").html(data.eventosAtraccion);
            $(".eventosAtraccion").LoadingOverlay("hide", true);


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
            
            $(".cercanos").append(data.cercanos);
        $(".cercanos").LoadingOverlay("hide", true);

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
            
            $(".Searchcategorias").append(data.Searchcategorias);
            $(".Searchcategorias").LoadingOverlay("hide", true);


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
            
            $(".Searchcategorias").html(data.Searchcategorias);
            $(".Searchcategorias").LoadingOverlay("hide", true);


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


//Hace la logica y envia el div que se quiere queaparezca el loading page
//funciona para parciales pequeños
function AjaxContainerRegistroWithLoadFilter($formulario, $loadScreen) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    $("."+$loadScreen).LoadingOverlay("show");

    //event.preventDefault();

    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        
        if (data.fail) {
            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';

            $("."+$loadScreen).LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {

            
            $(".Searchcategorias").html(data.sections.Searchcategorias);
                        $("."+$loadScreen).LoadingOverlay("hide", true);

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success



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
            
            $(".categorias").append(data.categorias);
            $(".categorias").LoadingOverlay("hide", true);


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
            
            

            $(".likes").html(data.likes);
            $(".likes").LoadingOverlay("hide", true);


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
            
            $(".review").append(data.review);
            $(".review").LoadingOverlay("hide", true);


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



function AjaxContainerRegistroLoadF($formulario,$load) {
    $("."+$load).LoadingOverlay("show");
    var $form = $('#' + $formulario),
            data = $form.serialize(),
            url = $form.attr("action");
    
    var posting = $.post(url, {formData: data});
    
    posting.done(function (data) {
        if (data.fail) {
            
            $.each(data.errors, function (key, value) {
                
            });
            alert(data.message);
            $("."+$load).LoadingOverlay("hide", true);

        }
        if (data.success) {
            alert(data.message);
            $("."+$load).LoadingOverlay("hide", true);
              
            
        } //success



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
            GetLikes("/getLikesA/"+$formulario);
        


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





