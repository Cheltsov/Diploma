$(document).ready(function() {
    $('#myTable').tablesorter();
    $('#myTable tbody tr').hover(function() {
        $(this).addClass('backlight');
    }, function() {
        $(this).removeClass('backlight');
    });
    $('#myTable tbody tr').click(function() {
        $(this).toggleClass('selectlines');
    });
});