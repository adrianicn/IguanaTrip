
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});


function ajaxajax()
{
    
   
var data = { key: $('#search-query').val() };

$.ajax({
     type: 'POST',
     url: "http://localhost:8080/IguanaTrip/public/likesS",
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

//hace la logica del controller, recibe los datos del formulario y hace un redirect a la pagina enviada desde
//el controller
function AjaxContainerRegistro($formulario) {
    $("#target").LoadingOverlay("show");

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

//Hace la logica y envia el div que se quiere queaparezca el loading page
//funciona para parciales pequeños
function AjaxContainerRegistroWithLoad($formulario, $loadScreen) {

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
            $("."+$loadScreen).LoadingOverlay("hide", true);
            
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success



    });
}




//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunMessagePostParametro($formulario, $id) {
    $('.error').html('');

    $("#target").LoadingOverlay("show");



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&catalogo=' + $id;
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            
            
            window.location.href = data.redirectto;




        } //success
    }); //done

}






//Hace la logica y envia el div que se quiere queaparezca el loading page
//funciona para parciales pequeños
function AjaxContainerRegistroWithLoadCharge($formulario, $loadScreen,$itinerario) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    $("."+$loadScreen).LoadingOverlay("show");

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
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {
            $("."+$loadScreen).LoadingOverlay("hide", true);
            alert("El itinerario ha sido agregado. Puede modificar los campos para agregar un nuevo itinerario")
            
            GetDataAjaxSectionItiner("/IguanaTrip/public/getlistaItinerarios/"+$itinerario);
        } 
    });
}



//Hace la logica y envia el div que se quiere queaparezca el loading page
//funciona para parciales pequeños
function AjaxContainerRegistroWithMessage($formulario, $loadScreen,$message) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    $("."+$loadScreen).LoadingOverlay("show");

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
            $('.rowerrorM').html(errorString);

        }
        if (data.success) {
            $("."+$loadScreen).LoadingOverlay("hide", true);
            alert($message);
            
            
        } 
    });
}



//dado un parcial nombre de la carpeta incluido
//lo materializa en el lugar indicado
function RenderPartialGeneric($idPartial, $id_usuario_servicio) {

callModal('cls');
    var url = "/IguanaTrip/public/render/" + $idPartial;
    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_usuario_servicio').val($id_usuario_servicio);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);
    });
}

//************************************************************************//
//               FUNCION PARA IR AL BOOKING EXTERNO                       //
//************************************************************************//
function RenderBooking($id_usuario_operador, $id_usuario_servicio) {

console.log("Id Usuario Operador "+$id_usuario_operador);
console.log("Id Usuario Servicio "+$id_usuario_servicio);
var url = "/booking/"+$id_usuario_servicio;
console.log(url);
        $.ajax({
        type: 'GET',
        //url: '/booking/'+$id_usuario_servicio,
        url: url,
        data:"",
        success: function (data) {
            console.log(data);
            //console.log(data.redirectto);
            window.open(data.redirectto, '_blank');
            //window.location.href = data.redirectto;
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


//************************************************************************//
//    FUNCION PARA IR AL SETTING DEL CALENDARIO EN EL BOOKING             //
//************************************************************************//
function RenderBookingCalendario($id_usuario_operador, $id_usuario_servicio, $calendar_id) {

console.log("Id Usuario Operador "+$id_usuario_operador);
console.log("Id Usuario Servicio "+$id_usuario_servicio);
console.log("Id del Calendario "+$calendar_id);
var url = "/bookingCalendario/"+$id_usuario_servicio+"/"+$calendar_id;
console.log(url);
        $.ajax({
        type: 'GET',
        //url: '/booking/'+$id_usuario_servicio,
        url: url,
        data:"",
        success: function (data) {
            console.log(data);
            //console.log(data.redirectto);
            window.open(data.redirectto, '_blank');
            //window.location.href = data.redirectto;
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




//
//id_catalogo_fotografia= es el catalogo que tiene la base de datos catalogo fotografia
//id_auxiliar = es el id principal de la tabla que manda a guardar la imagen
function RenderPartialGenericFotografia($idPartial, $id_catalogo_fotografia,$id_usuario_servicio,$id_auxiliar) {

    
callModal('cls');
    var url = "/IguanaTrip/public/render/" + $idPartial;
    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('#id_catalogo_fotografia').val($id_catalogo_fotografia);
        $('#basic-modal-content').find('#id_usuario_servicio').val($id_usuario_servicio);
        $('#basic-modal-content').find('#id_auxiliar').val($id_auxiliar);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);
    });
}




//Renderiza el parcial Map, es una logica diferente ya que hay conflictos
//con el load screen
function RenderPartialGenericMap($idPartial, $itiner) {

    callModalMap('cls');

    var url = "/IguanaTrip/public/render/" + $idPartial;

    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_itinerario').val($itiner);

    });
}


function RenderPartialGenericMapUpdate($idPartial, $itiner, $id_detalle) {

    callModalMap('cls');

    var url = "/IguanaTrip/public/render/" + $idPartial+"/"+$id_detalle;

    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_itinerario').val($itiner);
        $('#basic-modal-content').find('.id_detalle').val($id_detalle);


    });
}


function RenderPartialPadre($idPartial, $id_catalogo_servicio, $id_usuario_operador,$padre) {

    callModalMap('cls');

    var url = "/IguanaTrip/public/render/" + $idPartial+"/"+$padre;

    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_catalogo_servicio').val($id_catalogo_servicio);
        $('#basic-modal-content').find('.id_usuario_operador').val($id_usuario_operador);
        $('#basic-modal-content').find('.id_padre').val($padre);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);


    });
}

function RenderPartial($idPartial, $id_catalogo_servicio, $id_usuario_operador) {

    callModal('cls');

    var url = "/IguanaTrip/public/render/" + $idPartial;

    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_catalogo_servicio').val($id_catalogo_servicio);
        $('#basic-modal-content').find('.id_usuario_operador').val($id_usuario_operador);
        $(".simplemodal-wrap").LoadingOverlay("hide", true);
    });

}

function GetDataAjax(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $('#renderPartial').LoadingOverlay("show");
            $('#renderPartial').html(data.dificultades);
            $('#renderPartial').LoadingOverlay("hide", true);

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

function GetDataAjaxSection(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            $("#renderPartial").LoadingOverlay("show");
            $("#renderPartial").html(data.contentPanel);
            $("#renderPartial").LoadingOverlay("hide", true);

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

function GetDataAjaxSectionEventos(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            $("#renderPartialListaServicios").LoadingOverlay("show");
            $("#renderPartialListaServicios").html(data.contentPanelServicios);
            $("#renderPartialListaServicios").LoadingOverlay("hide", true);

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

function GetDataAjaxImagenes(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $("#renderPartialImagenes").html(data.contentImagenes);
                 

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


function GetDataAjaxProvincias(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            $("#provincias").html(data.provincias);


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


function GetDataAjaxCantones(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $("#canton").html(data.cantones);
            

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

function GetDataAjaxDescripcion(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            $("#descripcionGeografica1").html(data.descripcionGeografica);


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

function GetDataAjaxParroquias(url) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {

            $("#parroquia").html(data.parroquias);


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

function GetDataAjaxSectionItiner(url,$id_usuario_servicio) {

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            $("#renderPartialItinerarios").LoadingOverlay("show");
            $("#renderPartialItinerarios").html(data.contentPanelItinerarios);
            $('#renderPartialItinerarios').find('.id_usuario_servicio').val($id_usuario_servicio);
            $("#renderPartialItinerarios").LoadingOverlay("hide", true);

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







//retorna un mensaje despues de ejecutar la logica del controller
function AjaxSaveDetailsFotografia($formulario, $id) {
    $('.error').html('');

    $("#target").LoadingOverlay("show");



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id + '&actionImage=update';
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            $('.register').fadeOut(); //hiding Reg form
            var successContent = '' + data.message + '';
            




        } //success
    }); //done

}





//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunMessage($formulario, $id) {
    $('.error').html('');

    $("#target").LoadingOverlay("show");



    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id;
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            $('.register').fadeOut(); //hiding Reg form
            var successContent = '' + data.message + '';
            




        } //success
    }); //done

}




//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunBurnURL($urlS,$formulario, $id, $load) {
    $('.error').html('');

    
    $("#".$load).LoadingOverlay("show");

    

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
            $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");

        }
        if (data.success) {
            $("#".$load).LoadingOverlay("hide", true);
        


        } //success
    }); //done

}

//retorna un mensaje despues de ejecutar la logica del controller
function AjaxContainerRetrunBurnURLBooking($urlS,$formulario, $id, $load) {
    $('.error').html('');

    
    $("#".$load).LoadingOverlay("show");
    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id;
    var url =$urlS + $id;
    console.log(data);
    var posting = $.post(url, {formData: data});
    console.log(posting);
    posting.done(function (data) {
        if (data.fail) {

            console.log(data.fail);

            /*var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#" + $formulario).LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");*/

        }
        if (data.success) {
            $("#".$load).LoadingOverlay("hide", true);
        


        } //success
    }); //done

}



//agrega un parametro a la lista de objetos enviados al controller
//hace la misma logica que las funciones anteriores
function AjaxContainerRegistroParametro($formulario, $parametro) {


    $("#loadingScreen").LoadingOverlay("show");
    var $form = $('#' + $formulario),
            data = $form.serialize() + '&ids=' + $id;
    url = $form.attr("action");
    var posting = $.post(url, {formData: data});
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
            $("#" + $formulario).LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#loadingScreen").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success
        
        function GetDataAjaxPromo(url) {
    
    $("#target").LoadingOverlay("show");
    
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $("#target").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

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




function GetDataEditPromo(url) {
    
    $("#target").LoadingOverlay("show");
    
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            $("#target").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

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


function GuardarPromo($formulario, $id) {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
    
    $('.error').html('');

    $("#target").LoadingOverlay("show");

    var $form = $('#' + $formulario),
            data = $form.serialize() + '&catalogo=' + $id;
    url = $form.attr("action");
    //alert(data);
    //alert(url);
    
    var posting = $.post(url, {formData: data});
    posting.done(function (data) {
        if (data.fail) {



            var errorString = '<ul>';
            $.each(data.errors, function (key, value) {
                errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#target").LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $("#target").LoadingOverlay("hide", true);
            //alert(data.redirectto);
            /*if(data.redirectto == '/listarPromocion'){
                
            }else{
                window.location.href = data.redirectto;
            }*/
            window.location.href = data.redirectto;




        } //success
    }); //done

}

function AjaxContainerEdicionServicios($id_usuario_servicio,$id_catalogo) {
    
    //$("#target").LoadingOverlay("show");

    //event.preventDefault();
    var url = "/servicios/serviciooperador1/"+$id_usuario_servicio+"/"+$id_catalogo;
    var id = $id_usuario_servicio;
    //alert(id);
    //alert(url);      
        $.ajax({
        type: 'GET',
        url: url,
        data:"",
        success: function (data) {
            //alert(data.redirectto);
            window.location.href = data.redirectto;
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


function UpdatePermanente(url) {
    
    $("#target").LoadingOverlay("show");
    //alert(url);
   
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            //alert(data.redirectto);
            //window.location.href = "/edicionServicios";
            $("#target").LoadingOverlay("hide", true);
                 

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


function UpdateServicioActivo(url) {
    
    $("#target").LoadingOverlay("show");
    //alert(url);
   
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            //alert(data.redirectto);
            //window.location.href = "/edicionServicios";
            $("#target").LoadingOverlay("hide", true);
                 

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

function GetDataAjaxImagenes2(url) {
    
    $("#testboxForm").LoadingOverlay("show");
    
   $.ajax({
        type: 'GET',
        url: url,
        dataType: 'json',
        success: function (data) {
            
            
            $("#renderPartialImagenes").html(data.contentImagenes);
            //window.location.href = "/edicionServicios";
                 

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



    });
}
