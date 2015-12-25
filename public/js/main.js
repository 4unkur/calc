$('.add').click(function(e) {
    e.preventDefault();

    $('.table .tr:first').clone().appendTo('.table');
});

$('.remove').click(function(e) {
    e.preventDefault();

    if ($('.table .tr').length > 2)
        $('.table .tr:last').remove();
});

$('.clear').click(function(e) {
    e.preventDefault();

    $('.input').val('').removeClass('alert-danger');
    $('.errors').css('display', 'none');
});