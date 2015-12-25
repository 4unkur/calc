$('.add').click(function(e) {
    e.preventDefault();

    $('.table .tr:first').clone().appendTo('.table');
});

$('.remove').click(function(e) {
    e.preventDefault();

    if ($('.table .tr').length > 2)
        $('.table .tr:last').remove();
});