$("#exit").click(function(){
    $.post(
        "../controlers/control_main_page.php",
        {
            exit : "1"
        },
        function(data){
            location.reload();
        }
    );
});