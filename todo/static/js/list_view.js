$(document).ready(function(e) {
    var list = $('#todolist');

    list.find('input[type=checkbox]').change(function(event) {
        var item_id = $(this).parent('li').attr('data-id');
        var list_id = $(this).attr('data-id');

        var checked = $(this).is(":checked") ? true : false;
        var url = document.origin.concat(document.location.pathname.concat(document.location.search));
        var post_url = url.replace(/\\/g, '/').replace(/\/[^\/]*\/?$/, '').concat('/item_update.php?id=' + list_id);

        var data = {
            checked: $(this).is(':checked') ? 1 : 0,
            item_id: item_id
        }
        console.log(data);
        $(this).parent('li').toggleClass('completed');

        $.post(post_url, data);
    })
});
