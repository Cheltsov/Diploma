
$(document).ready(function(){

    $('.go_to').click( function(){  // ловим клик по ссылке с классом go_to
	var scroll_el = $(this).attr('href'); // возьмем содержимое атрибута href, должен быть селектором, т.е. например начинаться с # или .
        if ($(scroll_el).length != 0) { // проверим существование элемента чтобы избежать ошибки
	    $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 1500); // анимируем скроолинг к элементу scroll_el
        }

	    return false; // выключаем стандартное действие
    });
});


$.fn.popup = function() {

     //функция для открытия всплывающего окна:
      this.css('position', 'absolute').fadeIn();  //задаем абсолютное позиционирование и эффект открытия
      //махинации с положением сверху:учитывается высота самого блока, экрана и позиции на странице:
      this.css('top', ($(window).height() - this.height()) / 2 + $(window).scrollTop() + 'px');
      //слева задается отступ, учитывается ширина самого блока и половина ширины экрана
      this.css('left', ($(window).width() - this.width()) / 2  + 'px');
      //открываем тень с эффектом:
      $('.backpopup').fadeIn();
    }
    $(document).ready(function(){ //при загрузке страницы:
      $('.open').click(function(){

      document.getElementById('fall').style.display = "block";
     /* document.body.style.overflow = 'hidden';*/
    $("html,body").css("overflow","hidden");

       //событие клик на нашу ссылку
        $('.popup-window').popup(); //запускаем функцию на наш блок с формой
      });
      $('.backpopup,.close').click(function(){
           $("html,body").css("overflow","auto");
            //событие клик на тень и крестик - закрываем окно и тень:
        $('.popup-window').fadeOut();
        $('.backpopup').fadeOut();
      });
    });


$(document).ready ( function(){
    p1=0, p2=0;
    $("#pas1, #pas2").keyup(function() {
        p1 = $("#pas1").val();
        p2 = $("#pas2").val();
        if(p1 == p2 ){
            $("#logUp").prop("disabled", false);
            $("#dificultPas").css({'display':'none'});
        }
        else{
            $("#logUp").prop("disabled", true);
            $("#dificultPas").css({'display':'block'});
        }
    });
});


