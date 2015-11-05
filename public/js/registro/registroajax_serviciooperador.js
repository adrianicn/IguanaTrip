
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
                        $('.rowerror').html("@include('partials/error', ['type' => 'danger','message'=>'" + errorString + "'])");

                        }
                        if (data.success) {
                            $('#target').loadingOverlay('remove');
                             window.location.replace(data.redirectto);

                //  $('#containerbase').empty();
                // $('#containerbase').html(data.html);

                        } //success



    });
}



// Custom namespace
var modal = {};
modal.hide = function () {
    $('#overlay').fadeOut();
    $('.dialog').fadeOut();
};

$(document).ready(function () {
    // Open appropriate dialog when clicking on anything with class "dialog-open"
    $('.dialog-open').click(function () {
        modal.id = '#dialog-' + this.id;
        $('#overlay').fadeIn();
        $(modal.id).fadeIn();
    });
    // Close dialog when clicking on the "ok-dialog"
    $('.ok-dialog').click(function () {
        modal.hide();
    });
    // Require the user to click OK if the dialog is classed as "modal"
    $('#overlay').click(function () {
        if ($(modal.id).hasClass('modal')) {
            // Do nothing
        } else {
            modal.hide();
        }
    });
    // Prevent dialog closure when clicking the body of the dialog (overrides closing on clicking overlay)
    $('.dialog').click(function () {
        event.stopPropagation();
    });
});




$(document).ready(function () {



    $(".demo").labelauty({
// Development Mode
// This will activate console debug messages
        development: false,
// Trigger Class
// This class will be used to apply styles
        class: "labelauty",
// Use text label ?
// If false, then only an icon represents the input
        label: true,
// Separator between labels' messages
// If you use this separator for anything, choose a new one
        separator: "|",
// Default Checked Message
// This message will be visible when input is checked
        checked_label: "Checked",
// Default UnChecked Message
// This message will be visible when input is unchecked
        unchecked_label: "Unchecked",
// Minimum Label Width
// This value will be used to apply a minimum width to the text labels
        minimum_width: false,
// Use the greatest width between two text labels ?
// If this has a true value, then label width will be the greatest between labels
        same_width: true
    });
});
