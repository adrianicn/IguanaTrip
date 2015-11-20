
$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});



function AjaxContainerRegistro($formulario) {
    $("#loadingScreen").LoadingOverlay("show");

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

            $("#loadingScreen").LoadingOverlay("hide", true);
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


function AjaxContainerRegistroWithLoad($formulario,$loadScreen) {
    $(".loadModal").LoadingOverlay("show");

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

            $(".loadModal").LoadingOverlay("hide", true);
            //$('.rowerror').html(errorString);
            $('.rowerror').html(errorString);

        }
        if (data.success) {
            $(".loadModal").LoadingOverlay("hide", true);
            window.location.href = data.redirectto;

            //  $('#containerbase').empty();
            // $('#containerbase').html(data.html);

        } //success



    });
}


function RenderPartialGeneric($idPartial, $id_usuario_operador) {

    callModal('cls');
    
    var url = "/IguanaTrip/public/render/" + $idPartial;

    $.ajax({
        type: "GET",
        url: url,
        data: {
        }}).done(function (newHtml) {

        /* output the javascript object to HTML */
        $('#basic-modal-content').html(newHtml.newHtml);
        $('#basic-modal-content').find('.id_usuario_operador').val($id_usuario_operador);
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
            $("#renderPartial").LoadingOverlay("show");    
                    $("#renderPartial").append(data.contentPanel); 
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



function AjaxContainerRetrunMessage($formulario, $id) {
    $('.error').html('');

    $("#loadingScreen").LoadingOverlay("show");



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
            $("#" + $formulario).LoadingOverlay("hide", true);
            //$('#error').html(errorString);
            $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");

        }
        if (data.success) {
            $("#loadingScreen").LoadingOverlay("hide", true);
            $('.register').fadeOut(); //hiding Reg form
            var successContent = '' + data.message + '';
            $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'" + successContent + "'])");




        } //success
    }); //done

}


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



    });
}