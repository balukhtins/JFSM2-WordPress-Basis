jQuery(document).ready(function($) {

    let files;
    $('input[type=file]').on('change', function(){
        files = this.files;
    });

    $('#form-guidance').on ("submit", function (e) {
        e.stopPropagation();
        e.preventDefault();
        let aaa = $('.loaders');
        aaa.toggleClass('loaders-none');

        let data = new FormData(e.target);

        $.each( files, function( key, value ){
            data.append( key, value );
        });
        //data.append( 'photo', files );
        data.append( 'action', 'divit_ajax_response' );
        data.append( 'nonce', DevITAjax.nonce );

        let $reply = $('.ajax-reply');

        $.ajax({
            url         : DevITAjax.ajaxurl,
            type        : 'POST',
            data        : data,
            cache       : false,
            dataType    : 'json',
            processData : false,
            contentType : false,
            // функция успешного ответа сервера
            success     : function( respond, status, jqXHR ){
                // ОК
                if( respond.success ){
                    aaa.toggleClass('loaders-none');
                    setTimeout(() => alert(respond.data),300);
                }
                // error
                else {
                    aaa.toggleClass('loaders-none');
                    setTimeout(() => alert( 'Данные не отправлены: ' + respond.data ),300);
                }

            },
            // функция ошибки ответа сервера
            error: function( jqXHR, status, errorThrown ){
                aaa.toggleClass('loaders-none');
                setTimeout(() => alert( 'Что-то пошло не так...'),300);
            }

        });
    });
});

