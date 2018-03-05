$(document).ready(function(){

    $( "#accordion" ).accordion({
        active: 0,
        animate:{
            duration:150,
            easing:'linear'
        },
        classes: {
            "ui-accordion" : 'my_class'
        },
        collapsible: true,
        disabled: false, // вкл/выкл accordion
        event: 'click', //default - click
        header: 'h3', //определить заголовок
        heightStyle: 'content', //высота контента default-auto |fill - высота родителя
        icons: false, //Не работает
    });
    //методы
    $(".but").click(function(){
        /*$( "#accordion" ).accordion("destroy");*/
        /*console.log($( "#accordion" ).accordion("instance")); //получить объект текущего аккордеона
         */
       /* $( "#accordion" ).append( "<h3>qwewqeqeqeeq</h3><div>sfsdfsfdsf</div>" ); //Добавить новый аккордеон по нажатию
        $( "#accordion" ).accordion ("refresh" );*/
    });

});