$('.status-id a').on('click', function (e) {
    var tg = e.target
    var targetElementDataValue = $(tg).attr('data-value')
    $(tg).parent('div').siblings('button').find('span').attr('data-value', targetElementDataValue);

    console.log(e.target.text);

    var queryString = '?';
    $('.dropdown-selection').each(function (e) {

        if (!($(this).attr('data-value').trim() == 'select' || $(this).attr('data-value').trim() == 'all')) {
            var data_main = $(this).attr('data-main')
            var data_text = $.trim($(this).attr('data-value'))
            queryString += `${data_main}=${data_text}&`;
        }

    });

    window.location.href = queryString
});
