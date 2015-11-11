
$.ajaxSetup({
    headers: {
            'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    });
 

$('.error').html('');
        function AjaxContainerRegistro($formulario) {
        $('#target').loadingOverlay();
        //event.preventDefault();

            var $form = $('#'+$formulario),
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
                        $('#target').loadingOverlay('remove');
                        //$('.rowerror').html(errorString);
                        $('.rowerror').html( errorString );
                        
                        }
                        if (data.success) {
                            $('#target').loadingOverlay('remove');
                             window.location.href=data.redirectto;

                //  $('#containerbase').empty();
                // $('#containerbase').html(data.html);

                        } //success



    });
}

function AjaxContainerRetrunMessage($formulario,$id) {
$('.error').html('');
    $('#target').loadingOverlay();

      
        
            var $form = $('#'+$formulario),
                data = $form.serialize()+ '&ids=' + $id;
                url = $form.attr("action");
        var posting = $.post(url, {formData: data});
        posting.done(function (data) {
            if (data.fail) {



                var errorString = '<ul>';
                $.each(data.errors, function (key, value) {
                    errorString += '<li>' + value + '</li>';
                });
                errorString += '</ul>';
                $('#target').loadingOverlay('remove');
                //$('#error').html(errorString);
                $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");

            }
            if (data.success) {
                $('#target').loadingOverlay('remove');
                $('.register').fadeOut(); //hiding Reg form
                var successContent = '' + data.message + '';
                $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'" + successContent + "'])");




            } //success
        }); //done
    
    }


    function AjaxContainerRegistroParametro($formulario,$parametro) {
        
        
        $('#target').loadingOverlay();
        //event.preventDefault();

            var $form = $('#'+$formulario),
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
                        $('#target').loadingOverlay('remove');
                        //$('.rowerror').html(errorString);
                        $('.rowerror').html( errorString );
                        
                        }
                        if (data.success) {
                            $('#target').loadingOverlay('remove');
                             window.location.href=data.redirectto;

                //  $('#containerbase').empty();
                // $('#containerbase').html(data.html);

                        } //success



    });
}