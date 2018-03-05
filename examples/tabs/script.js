$(document).ready(function(){
    $( "#tabs" ).tabs({
        active: 1,
        event: "click",
        heightStyle: 'content',
    });
    $( "#tabs" ).tabs( "disable", 2 );
});