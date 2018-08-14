$(document).ready(function(){

	// слайдер после шапки
	$('.main-slider__wr').slick({
		
		slidesToShow: 1,
		prevArrow: ".main-slider__btn--prev",
		nextArrow: ".main-slider__btn--next",
		
	});

	// слайдер с проектами
	$('.projects__slider-container').slick({	
		
		slidesToShow: 1,
		prevArrow: ".projects__arrow--prev",
		nextArrow: ".projects__arrow--next",
		
	});

	// слайдер доверия
	$('.trust__slider-container').slick({
		
		slidesToShow: 5,
		prevArrow: ".trust__arrow--prev",
		nextArrow: ".trust__arrow--next",
		responsive: [
	  	{
	  		breakpoint: 1200,
	  		settings: {
	  			slidesToShow: 4,

	  		}
	  	},
	  	{
	  		breakpoint: 1000,
	  		settings: {
	  			
	  			slidesToShow: 3,
	  			// centerMode: true,
	  		}
	  	},
	  	{
	  		breakpoint: 800,
	  		settings: {
	  			slidesToShow: 2,
	  			// centerMode: true,
	  			
	  		}
	  	},
	  	{
	  		breakpoint: 500,
	  		settings: {
	  			slidesToShow: 1,
	  				  			
	  		}
	  	},

	  	{
	  		breakpoint: 380,
	  		settings: {
	  		slidesToShow: 1,

	  		}
	  	},
	  ],
	});

	// заказать звонок десктоп
	$(".order-call").click(function(){
	    $(".order-call__popup").fadeIn();

	  $(".overlay").fadeIn('slow');
	});
	
	// Купить в один клик
	$(".order-buy_one").click(function(){
	    $(".popup--one-click").fadeIn();
    
	  $(".overlay").fadeIn('slow');
	});

	$(".order-call__close").click(function(){
		  $(".popup").fadeOut();

	  $(".overlay").fadeOut('slow');
	});

	$(".header__order-call--m").click(function(){
	   $(".order-call__popup").fadeToggle();

	   $(".overlay").fadeToggle('slow');
	});


	$(".header__phone").click(function(){
		$(".header__phone-drop").toggleClass('slideFromTop', "slow");
		
		if ($(".header__input-wr").hasClass('slideFromTop')) {
			$(".header__input-wr").removeClass('slideFromTop');
		}

		if ($(".basket__drop-m").css({"display" : "block"})) {
			$(".basket__drop-m").toggle();
		}

		if ($(".language__list-m").css({"display" : "block"})) {
			$(".language__list-m").toggle();
		}
	   
	});
	// поиск mobile
	$(".header__search").click(function () {
		
		$(".header__input-wr").toggleClass('slideFromTop');
		
		if ($(".header__phone-drop").hasClass('slideFromTop')) {
			$(".header__phone-drop").removeClass('slideFromTop');
		}

		if ($(".basket__drop-m").css({"display" : "block"})) {
			$(".basket__drop-m").toggle();
		}

		if ($(".language__list-m").css({"display" : "block"})) {
			$(".language__list-m").toggle();
		}
	})

	$(".header__basket").click(function () {
		
		$(".basket__drop-m").fadeToggle();
		
		if ($(".header__phone-drop").hasClass('slideFromTop')) {
			$(".header__phone-drop").removeClass('slideFromTop');
		}

		if ($(".header__input-wr").hasClass('slideFromTop')) {
			$(".header__input-wr").removeClass('slideFromTop');
		}

		if ($(".language__list-m").css({"display" : "block"})) {
			$(".language__list-m").toggle();
		}

		if ($(".catalog__drop").css({"display" : "block"})) {
			$(".catalog__drop").toggle();
		}
	})

	$(".header__catalog").click(function () {
		if ($( window ).width() <= 1024) {
			$(".catalog__drop").fadeToggle();
		}

		if ($(".basket__drop-m").css({"display" : "block"})) {
			$(".basket__drop-m").toggle();
		}

		if ($(".basket__drop").css({"display" : "block"})) {
			$(".basket__drop").toggle();
		}

	})

	$(".basket").click(function () {
		if ($( window ).width() <= 1024) {
			$(".basket__drop").fadeToggle();
		}

		

		if ($(".catalog__drop").css({"display" : "block"})) {
			$(".catalog__drop").toggle();
		}
		
	})
	// переключатель мобильного меню
	$(".headerToggle").click(function() {
		$(".header--mobile").animate({right : 0}, 500);

		$(".overlay").fadeToggle('slow');
		// $(".overlay").css({
		// 	"display": "block",
		// });
	}); 


	// закрытие мобильного меню
	$(".header__close--mobile").click(function() {
		$(".header--mobile").animate({right : -255}, 500);

		$(".overlay").fadeToggle('slow');
	}); 

	

	// кнопка контактов
	$(".contacts__button").click(function(){
	   $(".order-call__popup").fadeToggle();

	    $(".overlay").fadeToggle('slow');
	});
	
	
	$(".overlay").click(function () {
		// let

		display = $(".order-call__popup").css('display');
		$(".overlay").fadeOut('slow');
		$(".popup").fadeOut("slow");
	

		$(".header--mobile").animate({right : -255}, 500);

		
	});

	$(".about__button").click(function () {
		$(".about__text--hidden").toggle("fast");
		$(".about__button").css("display", "none");
	});

	

	

	// смена языка десктоп
	$(".select-placeholder").click(function () {
		$(this).closest('.language').find('.language__list').slideToggle('fast');
	});
	$('.language-list__item').on('click', function(){
		$(this).closest('.language').find('.language-list__item').removeClass('checked');
		$(this).addClass('checked');
		var value = $(this).attr('data-value');
		$(this).closest('.language').find('.select-placeholder').text(value);
		$(this).closest('.language').find('.select-placeholder').attr('data-value', value);
		$(this).closest('.language').find('.language__list').animate({height: 'hide'}, 100); 
	});

	// смена языка на меленьком экране
	$(".select-placeholder-m").click(function () {
		$(this).closest('.header__languages').find('.language__list-m').slideToggle('fast');

		if ($(".header__phone-drop").hasClass('slideFromTop')) {
			$(".header__phone-drop").removeClass('slideFromTop');
		}

		if ($(".header__input-wr").hasClass('slideFromTop')) {
			$(".header__input-wr").removeClass('slideFromTop');
		}

		if ($(".basket__drop-m").css({"display" : "block"})) {
			$(".basket__drop-m").toggle();
		}
	});
	$('.language-list__item-m').on('click', function(){
		$(this).closest('.header__languages').find('.language-list__item-m').removeClass('checked');
		$(this).addClass('checked');
		var value = $(this).attr('data-value');
		$(this).closest('.header__languages').find('.select-placeholder-m').text(value);
		$(this).closest('.header__languages').find('.select-placeholder-m').attr('data-value', value);
		$(this).closest('.header__languages').find('.language__list-m').animate({height: 'hide'}, 100); 
	});

	// выбор товара на странице карточки товара
	$(".product__placeholder").click(function () {
		$(this).closest('.product__selector').find('.product__list').slideToggle('fast');
	});
	$('.product__item').on('click', function(){
		$(this).closest('.product__selector').find('.product__item').removeClass('checked');
		$(this).addClass('checked');

		var value = $(this).attr('data-value');
		var value_id = $(this).attr('data-id');
		
		$(this).closest('.product__selector').find('.product__placeholder').text(value);

        $(this).closest('.product__selector').find('.product__placeholder').attr('data-id', value_id);
		$(this).closest('.product__selector').find('.product__placeholder').attr('data-value', value);
		$(this).closest('.product__selector').find('.product__list').animate({height: 'hide'}, 100); 

		

		if ($('.product__item').text() !== $(this).closest('.product__selector').find('.product__placeholder').text) {
			$('.product__item').removeClass('product__active')
		}

		if ($(this).closest('.product__selector').find('.product__item').text === $(this).closest('.product__selector').find('.product__placeholder').text) {
			$(this).addClass('product__active')
		} 
	}); 
    

    // Выбор описания или типов на страничке товара            
	$('.describe__tab--descr').on('click', function(){
		 if ($(".describe__text--descr").hasClass('describe__text--hidden')) {
		 	$(".describe__text--descr").removeClass('describe__text--hidden'),
		 	$(".describe__text--types").addClass('describe__text--hidden');
		 }	else $(".describe__text--types").addClass('describe__text--hidden');

		 $('.describe__tab--types').removeClass('tab-active'),
		 $('.describe__tab--descr').addClass('tab-active')
	});

	$('.describe__tab--types').on('click', function(){
		 if ($(".describe__text--types").hasClass('describe__text--hidden')) {
		 	$(".describe__text--types").removeClass('describe__text--hidden'),
		 	$(".describe__text--descr").addClass('describe__text--hidden');
		 }	else $(".describe__text--descr").addClass('describe__text--hidden');

		 $('.describe__tab--descr').removeClass('tab-active'),
		 $('.describe__tab--types').addClass('tab-active')
	});

	// слайдер на страничке товара
	$('.buywithit__slider-wr').slick({
		
		slidesToShow: 3,
		prevArrow: ".buywithit__arrow--prev",
		nextArrow: ".buywithit__arrow--next",
		responsive: [
	  	
	  	{
	  		breakpoint: 1100,
	  		settings: {
	  			
	  			slidesToShow: 2,
	  		}
	  	},
	  	{
	  		breakpoint: 750,
	  		settings: {
	  			slidesToShow: 1,
	  			
	  		}
	  	},
	  	{
	  		breakpoint: 500,
	  		settings: {
	  			slidesToShow: 1,
	  			
	  			
	  		}
	  	},
	  	
	  ],
	});

	// изменение количества товара в корзине
	$('.basket__minus').click(function () {
		var $input = $(this).parent().find('.basket__input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		
	});
	$('.basket__plus').click(function () {
		var $input = $(this).parent().find('.basket__input');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
	
	});

	// скролл

	$(function() {
		$(window).scroll(function() {
		  	if($(this).scrollTop() != 0) {
		  		$('.toTop').fadeIn();
		  	} else {
		 		$('.toTop').fadeOut();
		  	}
		});

		$('.toTop').click(function() {
		 	$('body,html').animate({scrollTop:0},700);
		});
	});
	$(function() {
		$('.nav-list__item').click(function() {
			$(this).addClass('header__active').siblings().removeClass('header__active');
		});
	});

	// переключение табов
	$(function (argument) {


		$('.describe__tab').click(function(event) {
			if ($('.describe__tab--descr').hasClass('tab-active')) {
				$('.describe__main').removeClass('active');
				$('.describe__text--descr').addClass('active');
			}	else {
				
				$('.describe__main').addClass('active');
				$('.describe__text--descr').removeClass('active');
			}
		});

		$('.describe__tab--descr').click(function(event) {
			localStorage.setItem('tab', 'first');
		});

		$('.describe__tab--types').click(function(event) {
			localStorage.setItem('tab', 'second');
		});

		$('.product__button').click(function(event) {
			localStorage.setItem('tab', 'second');
			$('.describe__tab--types').addClass('tab-active').siblings().removeClass('tab-active');
			$('.describe__main').addClass('active');
			$('.describe__text--descr').removeClass('active');
		});

		if (localStorage.getItem('tab') === 'second') {
    	$('.describe__main').addClass('active');
    	$('.describe__text--descr').removeClass('active');
    	$('.describe__tab--descr').removeClass('tab-active');
		$('.describe__tab--types').addClass('tab-active');
    }	else {
    		$('.describe__main').removeClass('active');
			$('.describe__text--descr').addClass('active');
			$('.describe__tab--descr').addClass('tab-active');
			$('.describe__tab--types').removeClass('tab-active');
    }
			
	});

	// открытие/скрытие фильтра в моб версии
	$(function () {
		$('.filter__button').click(function () {
			$('.describe__filter').toggleClass('toRight');
		});
	})

	// загрузка поп-апа
	
	   
});


$(document).on('click', '[data-show-more]', function(){
    var btn = $(this);
    var page = btn.attr('data-next-page');
    var id = btn.attr('data-show-more');
    var bx_ajax_id = btn.attr('data-ajax-id');
    var block_id = "#comp_"+bx_ajax_id;

    var data = {
        bxajaxid:bx_ajax_id
    };
    data['PAGEN_'+id] = page;

    $.ajax({
        type: "GET",
        url: window.location.href,
        data: data,
        timeout: 3000,
        success: function(data) {
            $("#btn_"+bx_ajax_id).remove();
            $(block_id).append(data);
        }
    });
});









	

	

