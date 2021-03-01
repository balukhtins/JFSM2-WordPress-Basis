jQuery(function($){
    /*
     * действие при нажатии на кнопку загрузки изображения
     */
    $('.upload_image_button').click(function(){
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);
        wp.media.editor.send.attachment = function(props, attachment) {
            $(button).parent().prev().attr('src', attachment.url);
            $(button).prev().val(attachment.id);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open(button);
        return false;
    });
    /*
     * удаляем значение произвольного поля
     * если быть точным, то мы просто удаляем value у input type="hidden"
     */
    $('.remove_image_button').click(function(){
        var r = confirm("Уверены?");
        if (r == true) {
            var src = $(this).parent().prev().attr('data-src');
            $(this).parent().prev().attr('src', src);
            $(this).prev().prev().val('');
        }
        return false;
    });

    /*
    * Запись в src при смене иконки
    * */

    for(let i=0; i<4; i++){
        $('#social-networks img').get(i).addEventListener('load', function(event) {
            if ($(event.target));
            let src = this.getAttribute('src');
            console.log(this.nextElementSibling.nextElementSibling.value = src);
        }, true);
    }

});