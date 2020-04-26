$('.category').each(function (i, elem) {
    $(this).find('#show_content').hide();
});

$('.category').each(function (i, elem) {
    $(elem).find('#activ').on('click', function () {

        $('.category').each(function (i, element) {
            $(element).find('#activ').css({
                transform: 'rotate(-90deg)',
            });
            $(element).find('#take_category').css({
                width: '350px',
            });
            $(element).find('#show_content').hide();
        });

        switch ($(elem).find('#take_category').width()) {
            case 350:
                $(elem).find('#activ').css({
                    transform: 'rotate(90deg)',
                });
                $(elem).find('#take_category').css({
                    width: '370px',
                });
                $(elem).find('#show_content').show();
                break
            case 370:
                $(elem).find('#activ').css({
                    transform: 'rotate(-90deg)',
                });
                $(elem).find('#take_category').css({
                    width: '350px',
                });
                $(elem).find('#show_content').hide();
                break
        }
    });
});

