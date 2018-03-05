	$('.left').on('click', function() {
  //var count = $('.container div').length;
  var count =10;
  var columns = 2;
  var columnWidth = 106 / columns;

  if (count <= columns) return;

  var leftItem = $('.container').data('left item');
  if (typeof leftItem === "undefined") {
    leftItem = 0;
  }

  leftItem = leftItem - 1;
  if (leftItem < 0) leftItem = 0;
  $('.container').data('left item', leftItem);

  $('.container').css('margin-left', -columnWidth * leftItem + '%');

});

$('.right').on('click', function() {
  //var count = $('.container div').length;
  var count=10;
  var columns = 2;
  var columnWidth = 106 / columns;

  if (count <= columns) return;

  var leftItem = $('.container').data('left item');
  if (typeof leftItem === "undefined") {
    leftItem = 0;
  }

  leftItem = leftItem + 1;
  if ((leftItem + columns) > count) leftItem = count - columns;
  $('.container').data('left item', leftItem);

  $('.container').css('margin-left', -columnWidth * leftItem + '%');

});



$('.left_two').on('click', function() {
  var count = $('.container_two div').length;
  var columns = 1;
  var columnWidth = 100 / columns;

  if (count <= columns) return;

  var leftItem = $('.container_two').data('left item');
  if (typeof leftItem === "undefined") {
    leftItem = 0;
  }

  leftItem = leftItem - 1;
  if (leftItem < 0) leftItem = 0;
  $('.container_two').data('left item', leftItem);

  $('.container_two').css('margin-left', -columnWidth * leftItem + '%');

});

$('.right_two').on('click', function() {
  var count = $('.container_two div').length;
  var columns = 1;
  var columnWidth = 100 / columns;

  if (count <= columns) return;

  var leftItem = $('.container_two').data('left item');
  if (typeof leftItem === "undefined") {
    leftItem = 0;
  }

  leftItem = leftItem + 1;
  if ((leftItem + columns) > count) leftItem = count - columns;
  $('.container_two').data('left item', leftItem);

  $('.container_two').css('margin-left', -columnWidth * leftItem + '%');

});








$.fn.popup = function() {

      this.css('position', 'absolute').fadeIn();
      this.css("top", (($(window).height() - this.outerHeight()) / 2)  + "px");
      this.css("left", (($(window).width() - this.outerWidth()) / 2)  + "px");
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



/*
$.fn.popup_two = function() {

      this.css('position', 'absolute').fadeIn();
      this.css("top", (($(window).height() - this.outerHeight()) / 2)  + "px");
      this.css("left", (($(window).width() - this.outerWidth()) / 2)  + "px");
      //открываем тень с эффектом:
      $('.backpopup_two').fadeIn();
    }
    $(document).ready(function(){ //при загрузке страницы:
      $('.open_two').click(function(){

      document.getElementById('fall_two').style.display = "block";
    $("html,body").css("overflow","hidden");

       //событие клик на нашу ссылку
        $('.popup-window_two').popup_two(); //запускаем функцию на наш блок с формой
      });
      $('.backpopup_two,.close_two').click(function(){
           $("html,body").css("overflow","auto");
            //событие клик на тень и крестик - закрываем окно и тень:
        $('.popup-window_two').fadeOut();
        $('.backpopup_two').fadeOut();
      });
    });
*/