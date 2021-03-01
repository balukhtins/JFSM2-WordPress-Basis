jQuery(document).ready(function($) {
    let count = 0;
    $('.btn-plus').click(function(){
        $('input[name = phone-2]').removeAttr('disabled').attr('placeholder', 'Телефон в формате (XXX) XXX-XX-XX');
        count = 0;
    });

    $('.btn-delite').click(function(){
        $('input[name = phone-2]').removeAttr('placeholder').val('').attr('disabled', true);
        count = 0;
    });
    $('.phone-left input').bind('cut copy paste', function(e) {
        e.preventDefault();
    }).bind('input', function(e){
        if ($(this).val().length == 0) count = 0;
        if($(this).val().length == 1 && $(this).val() != '(' && count < $(this).val().length){
            count = $(this).val().length + 1;
            $(this).val('(' + $(this).val());
         }
        if($(this).val().length == 4 && count < $(this).val().length){
            count = $(this).val().length + 1;
            $(this).val($(this).val() + ') ');
        }
        if($(this).val().length == 9 && count < $(this).val().length){
            count = $(this).val().length + 1;
            $(this).val($(this).val() + '-');
         }
        if($(this).val().length == 12 && count < $(this).val().length){
            count = $(this).val().length + 1;
            $(this).val($(this).val() + '-');
         }
            });
});