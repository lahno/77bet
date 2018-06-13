$(document).ready(function(){

  //Плавный скролл
  $("a.scrollto").click(function () {
      var elementClick = '#'+$(this).attr("href").split("#")[1]
      var destination = $(elementClick).offset().top;
      jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 1000);
      return false;
  });

  //niceScroll
  // $("html, body").niceScroll({
  //   horizrailenabled : false,
  //   "verge" : "500"
  // });

 //Отключение niceScroll
  // $(window).on('resize', function() {
  //   if($(window).width < 992) {
  //     $("html, body").data("niceScroll").destroy();
  //   }
  // });

  $('.menu .menu_item a').click(function(){
      $('header .menu .menu_item').removeClass('active');
      $(this).parent().addClass('active');
  });

  //Гамбургер меню
  var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};
    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
        }, false);
      });
    }

  $(".hamburger").click(function(){
    $("nav").slideToggle(300);
  });

  $('nav .hamburger__navigation__items a, nav a.btn__blue.scrollto').click(function(){
    $("nav").slideToggle(300);
    $(".hamburger").toggleClass("is-active");
  });

  //Анимация гамбургер меню
  $(function() {
    $("header nav #hamburger__sidebar .hamburger__navigation__items").animated("bounceInUp");
  });

  //Maskedinput
  $("#tel").mask("7 (999) 999-99-99");

  $('.drop-down-question').click(function() {
    $(this).find('.drop-down-question__answer').slideToggle(300);
     $(this).find('.fa-caret-down').toggleClass('active');
  });

  //Switch settings
  $('.settings li').click(function(){
    $(this).siblings().removeClass('active');
    $(this).addClass('active').find('.forma form input');
  });

  $(document).mouseup(function (e){ // событие клика по веб-документу
      var div = $(".forma"); // тут указываем ID элемента
      if (!div.is(e.target) // если клик был не по нашему блоку
        && div.has(e.target).length === 0) { // и не по его дочерним элементам
          div.parent().removeClass('active'); // скрываем его
        }
  });



  $('.curent-bibs__slider').slick({
    //centerMode: true,
    //dots: true,
    //infinite: true,
    arrows: true, 
    slidesToShow: 3,
    //adaptiveHeight: true,
    slidesToScroll: 1,
    edgeFriction: 0.15,
    //fade: true,
    //cssEase: 'linear',
    //variableWidth: true,
    //focusOnSelect: true,
    //centerPadding: '60px',
    //centerPadding: true,
    prevArrow: '<i class="fa reviews__arrows_prev fa-angle-left" aria-hidden="true"></i>',
    nextArrow: '<i class="fa reviews__arrows_next fa-angle-right" aria-hidden="true"></i>',
    //pauseOnFocus: true,
    //pauseOnHover: true,
    speed: 500,
    // autoplay: true,
    // autoplaySpeed: 2500,
    responsive: [
    {
        breakpoint: 1199,
        settings: {
        arrows: true,
        slidesToShow: 2
      }
     },
     {
        breakpoint: 767,
        settings: {
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1
      }
     },
     {
        breakpoint: 636,
        settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1
      }
     },
    ]
  });

  // $('.upcoming_competitions__slider').slick({
  //   //centerMode: true,
  //   //dots: true,
  //   //infinite: true,
  //   arrows: true,
  //   slidesToShow: 1,
  //   //adaptiveHeight: true,
  //   slidesToScroll: 1,
  //   edgeFriction: 0.15,
  //   //fade: true,
  //   //cssEase: 'linear',
  //   //variableWidth: true,
  //   //focusOnSelect: true,
  //   //centerPadding: '60px',
  //   //centerPadding: true,
  //   prevArrow: '<i class="fa reviews__arrows_prev fa-angle-left" aria-hidden="true"></i>',
  //   nextArrow: '<i class="fa reviews__arrows_next fa-angle-right" aria-hidden="true"></i>',
  //   //pauseOnFocus: true,
  //   //pauseOnHover: true,
  //   speed: 500,
  //   // autoplay: true,
  //   // autoplaySpeed: 2500,
  //   // responsive: [
  //   // {
  //   //    breakpoint: 1399,
  //   //    settings: {
  //   //    arrows: true,
  //   //    slidesToShow: 3
  //   //  }
  //   // },
  //   // {
  //   //     breakpoint: 1199,
  //   //     settings: {
  //   //     arrows: true,
  //   //     slidesToShow: 2
  //   //   }
  //   //  },
  //   //  {
  //   //     breakpoint: 790,
  //   //     settings: {
  //   //     arrows: true,
  //   //     slidesToShow: 2,
  //   //     slidesToScroll: 1
  //   //   }
  //   //  },
  //   //  {
  //   //     breakpoint: 636,
  //   //     settings: {
  //   //     arrows: false,
  //   //     slidesToShow: 1,
  //   //     slidesToScroll: 1
  //   //   }
  //   //  },
  //   // ]
  // });

  $(window).scroll(function(){
    if($(this).scrollTop() > $(this).height()){
      $('.top').addClass('top__active');
    }else{
      $('.top').removeClass('top__active');
    }
  });

  $('.top').click(function(){
    $('html, body').stop().animate({scrollTop:0},"slow","swing");
  });
  

  //Валидация форм
  /*$('[data-submit]').on('click', function(){
        // e.preventDefault();
        $(this).parent('form').submit();
      })
  $.validator.addMethod(
    "regex",
    function(value, element, regexp) {
      var re = new RegExp(regexp);
      return this.optional(element) || re.test(value);
    },
    "Please check your input."
    );
  function valEl(el){
   el.validate({
    rules:{
      tel:{
        required:true,
        regex: '^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$'
      },
      name:{
        required:true
      },
      email:{
        required:true,
        email:true
      },
      confirm_password: {
        required: true,
        minlength: 5,
        equalTo: "#password_register"
      },
    },
    messages:{
      tel:{
        required:'Поле обязательно для заполнения',
        regex:'Телефон может содержать символы + - ()'
      },
      name:{
        required:'Поле обязательно для заполнения!',
      },
      email:{
        required:'Поле обязательно для заполнения!',  
        email:'Неверный формат E-mail'
      }
    },           
    submitHandler: function (form) {
      var $form = $(form);
      $.ajax({
        type: 'POST',
        url: $form.attr('action'),
        data: $form.serialize(),
      })
    }                           
  })
 }                        
 $('.js-form').each(function() {
  valEl($(this)); 
});*/

});

$(window).load(function(){
  setTimeout(function (){
    $(".preloader").delay(800).addClass('loaded').fadeOut('slow');
  },1000);
});