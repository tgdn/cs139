$(document).ready(function(e) {

    $('form#create-form').bind('submit', function(event) {
        event.preventDefault();

        var content = $(this).find('input[name=content]').val();
        var div = $(this).find('div:first');

        div.removeClass('has-error');

        if (content == null || content.length == 0) {
            div.addClass('has-error');
        } else {
            var url = document.origin.concat(document.location.pathname.concat(document.location.search ? document.location.search.concat('&json') : '?json'));
            $.post(url, {
                'content': content
            }, function(resp) {
                if (resp.success) {
                    window.location = url.replace(/\\/g, '/').replace(/\/[^\/]*\/?$/, '').concat('/list_view.php?id=' + resp.list_id);
                }
            })
        }
    });

});
