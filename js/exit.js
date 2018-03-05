$("#exit").click(function(){
    $.post("../controlers/exit.php",
        {exit: "1"},
        function(data){
            location.reload(true);
        });
});