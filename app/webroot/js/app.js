
$(document).ready(function(){
    $(".tip, .isTooltip").tooltip({html:true,container : 'body'});
    $('.tipPop').mouseover(function() {
        $(this).popover('show');
    })
    $('.tipPop').mouseout(function() {
        $(this).popover('hide');
    });
    $('div.msg').mouseover(function(){
        $(this).find('.btn-del-msg').removeClass('hidden');
    });
    $('div.msg').mouseout(function(){
        $(this).find('.btn-del-msg').addClass('hidden');
    });

    $(".deleteModal").click(function() {
        $(".principal-container .modal-backdrop").remove();
        urlDelte           = $(this).attr("href");
        var confirmMessage = "";
        if(typeof $(this).attr('confirm-message') != "undefined") {
            confirmMessage = $(this).attr('confirm-message')
        }
        bootbox.setLocale('es');
        bootbox.confirm('<br><br><div class="alert alert-danger">'+confirmMessage+'</div>', function(result) {
            if (result == true) {
                window.location.href = urlDelte;
            }
        });
        return false;
    });

    /*Load view in a modal form ta <a href=''>*/
    $(document).on('click', '.load-in-modal', function(){
        $("#principal-container .modal-backdrop").remove();
        var url = $(this).attr("href");
        BOOT = bootbox.alert("<br><br><div id='' class='text-center bootbox-loadInModalContent'>Cargando...</div>");
        $.post(url,{},function(result){
            BOOT.find('.bootbox-body').html(result);
        });
        return false;
    });
});

