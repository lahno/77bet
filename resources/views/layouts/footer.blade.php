@php
	if ($settings){
        $phone = str_replace(['(',')','-', ' '], "", $settings->phone);
    }else{
        $phone = 0;
    }
@endphp
<!-- Footer -->
<footer id="footer">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="logo">
					<img src="{{asset('img/logo.png')}}" alt="logo" class="img-responsive">
					<div class="logo-caption">77bet</div>
				</div>
				<p class="copyright text-center text-lg-left text-md-left text-sm-left text-xl-left ">Copyright © Tennis Pro My Diary 2018</p>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6 col-12 text-center text-md-right text-lg-left text-md-right text-sm-right">
				<ul class="footer-menu">
					<li><a href="#current_bids">Ставки</a></li>
					<li><a href="#upcoming_competitions">Анонасы</a></li>
					<li><a href="#more_information">Информация</a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12 text-center text-md-left text-sm-left ">
				<div class="telegram-news">
					<p>Больше новостей на нашем</p>
					<a href="{{($settings)?$settings->telegram_link:''}}"><i class="fab fa-telegram-plane"></i>&nbsp;Telegram-канале</a>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12 text-center text-md-right text-sm-right">
				<a class="footer-phone" href="tel:{{$phone}}"><i class="fas fa-phone"></i>&nbsp;{{($settings)?$settings->phone:''}}</a>
				<div class="socials">
					<a href="{{($settings)?$settings->fb_link:''}}"><i class="fab fa-facebook-f"></i></a>
					<a href="{{($settings)?$settings->vk_link:''}}"><i class="fab fa-vk"></i></a>
					<a href="{{($settings)?$settings->instagram_link:''}}"><i class="fab fa-instagram"></i></a>
				</div>
			</div>
		</div>
	</div>
</footer>