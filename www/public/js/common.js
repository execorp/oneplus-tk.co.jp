// top slider
$(function() {
	var slider = $('.main_slider').slick({
			autoplay: true,
			autoplaySpeed: 5000,
			speed: 2500,
			centerMode: false,
			centerPadding:'25%',
			fade: true,
			arrows: false,
			dots: false,
			prevArrow: '<a class="slick-prev" href="#"><i data-icon="ei-arrow-left" data-size="m"></i></a>',
			nextArrow: '<a class="slick-next" href="#"><i data-icon="ei-arrow-right" data-size="m"></i></a>',
			customPaging: function(slick,index) {
			// スライダーのインデックス番号に対応した画像のsrcを取得
			var targetImage = slick.$slides.eq(index).find('img').attr('src');
			// slick-dots > li　の中に上記で取得した画像を設定
			return '<img src=" ' + targetImage + ' "/>';
			},
			responsive: [
				 {
					breakpoint: 768, //767px以下のサイズに適用
					settings: {
						centerPadding:'8%',
					}
				 }
			 ]
			});
	// リサイズ時 スタイル崩れ軽減
	$(window).on({
		'resize': function(){
			$(function(){
				slider.slick('setPosition');
			});
		}
	});
});

//カレント設定
$(function() {
    $('#header_nav li a').each(function(){
        var $href = $(this).attr('href');
        if(location.href.match($href)) {
            $(this).parent().addClass('current');
        } else {
            $(this).parent().removeClass('current');
        }
    });
});

//ページトップへ
$(function() {
	var topBtn = $('#pageTop');
	//スクロールしてトップ
    topBtn.click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 500);
		return false;
    });
});

/*--- smoothscroll ---*/
$(function(){
	var headerHeight = $('header').outerHeight();
	var urlHash = location.hash;
	if(urlHash) {
	    $('body,html').stop().scrollTop(0);
	    setTimeout(function(){
	        var target = $(urlHash);
	        var position = target.offset().top - headerHeight;
	        $('body,html').stop().animate({scrollTop:position}, 500);
	    }, 100);
	}
	$('a[href^="#"]').click(function() {
	    var href= $(this).attr("href");
	    var target = $(href);
	    var position = target.offset().top - headerHeight;
	    $('body,html').stop().animate({scrollTop:position}, 500);
	});
});

/*--- SP ---*/
$(function(){
var x = 769;
	/*--- menuBtn ---*/
	$("#spMenu").click(function(){
		var w = $(window).width();
		if (w < x) {
		$(this).toggleClass("active");

		if($("#spMenu").hasClass("active")){
			$("#header_nav").fadeIn('normal');
			$('html').addClass('scroll-prevent');
		} else {
			$("#header_nav").fadeOut('normal');
			$('html').removeClass('scroll-prevent');
		}
		}
		});

	$("#header_nav a").click(function(){
		if($("#spMenu").hasClass("active")){
			$("#header_nav").fadeOut('normal');
			$("#spMenu").removeClass("active");
			$('html').removeClass('scroll-prevent');
			};
		});

	var timer = false;
	$(window).resize(function() {
			if (timer !== false) {
					clearTimeout(timer);
			}
			timer = setTimeout(function() {
					console.log('resized');
			 var dw = $(window).width();
			 if (dw >= x) {
				 $("#header_nav").css('display','');
			 }
			}, 100);
	});

});

$(function(){
const button = document.getElementById('button');
button.addEventListener('click', function() {
	const captcha = document.getElementById('captcha');
	captcha.src = './securimage/securimage_show.php?' + Math.random();
}, false);
});

