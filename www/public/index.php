<?php

require_once './keyword.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>

	<meta name="robots" content="noindex">
	
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<!--  SEO  -->
	<meta name="keywords" content="<?php echo $keyword ?>">
	<meta name="description" content="<?php echo $keyword ?>">
	<title>One Plus</title>
	<!-- favicon -->
	<link rel="icon" href="/favicon.ico">
	<!-- FONTS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;700&family=Noto+Sans+JP:wght@400;700;900&family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">
	<!--  CSS  -->
	<link rel="stylesheet" href="./css/reset.min.css">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/slick.css">
	<!--  JQUERY  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="./js/common.js"></script>
	<!-- fontawesome -->
	<link href="https://use.fontawesome.com/releases/v6.1.2/css/all.css" rel="stylesheet">
</head>

<body>

	<header>
		<div class="header_inner flex">
			<h1 class="flex">
				<a href="#"><img src="img/headlogo.png" width="200"></a>
			</h1>
			<button id="spMenu">
			  <span></span>
			  <span></span>
			  <span></span>
			</button>
			<nav id="header_nav">
				<ul class="flex">
					<li><a href="./index.html" class="">HOME</a></li>
					<li><a href="./company.html#profile">会社案内</a></li>
					<li><a href="./company.html#about">取扱製品一覧</a></li>
					<li><a href="./company.html#mail" class="trig-colorbox_iframe">お問い合わせ</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main>
		<section id="main">
			<div class="section_inner">
				<img src="img/cover_topPC.png" alt="世界を超えて、信頼を届ける" class="pc_only">
				<img src="img/cover_topSP.png" alt="世界を超えて、信頼を届ける" class="sp_only">
			</div>
		</section>

		<section id="philosophy">
			<div class="section_inner">
				<h2>世界への架け橋<br>未来を見据えて</h2>
				<p>
					変動する世界情勢を敏感に感じ取り<br class="sp_only">一歩先を行くワンプラス<br>
					経営理念は『革新』<br class="sp_only">新しいイノベーションの挑戦していきます。<br>
					<br>
					日本と中国の関係を軸にして<br>
					世界とのボーダレスな関係を<br class="sp_only">提供していきます。
				</p>
			</div>
		</section>

		<section id="top_service">
			<div class="section_inner">
				<h2>事業内容</h2>
				<p>3つの事業を主軸として活動しています</p>
				<div class="top_service_contents_wrapper flex">
					<div class="top_service_contents flex">
						<img src="img/top_trade.png">
						<ul>
							<p class="top_service_ttl">国際貿易</p>
							<li>環境保全</li>
							<li>リサイクル</li>
							<li>物流</li>
							<li>物流倉庫</li>
							<li>産業廃棄物処理</li>
						</ul>
						<p class="more_btn"><a href="./company.html#trade">MORE</a></p>
					</div>

					<div class="top_service_contents flex">
						<img src="img/top_estate.png">
						<ul>
							<p class="top_service_ttl">不動産</p>
							<li>土木工事</li>
							<li>建設</li>
							<li>不動産仲介</li>
							<li>不動産管理</li>
						</ul>
						<p class="more_btn"><a href="./company.html#estate">MORE</a></p>
					</div>

					<div class="top_service_contents flex">
						<img src="img/top_travel.png">
						<ul>
							<p class="top_service_ttl">旅行業</p>
							<li>個人ツアー</li>
							<li>観光情報の提供</li>
							<li>ホテル経営</li>
						</ul>
						<p class="more_btn"><a href="./company.html#travel">MORE</a></p>
					</div>
				</div>
			</div>
		</section>

		<section id="top_contact">
			<div class="section_inner">
				<div class="contact_info flex">
					<p class="contact_ttl">お問い合わせ</p>
					<p class="contact_txt">
						何か分からないことやご心配なことがございましたら、<br>
						どうぞお気軽にお問い合わせください。
					</p>
					<div class="tel_btn">	
						<a href="tel:03-5817-4203"><span>TEL:</span>03-5817-4203</a>
					</div>
					<div class="mail_btn">
						<a href="./company.html#mail">メールフォームからお問い合わせ</a>
					</div>
				</div>
			</div>
		</section>

		<section id="access">
			<div class="section_inner">
				<div class="info flex">
					<img src="img/logo.png" width="200" height="80" class="pc_only">
					<p>
						本社<br>
						〒121-0816 東京都足立区梅島1-32-6 203号<br>
						TEL:03-5817-4203　FAX:03-5817-4204<br>
					</p>
					<p>
						物流倉庫<br>
						〒344-0032 埼玉県春日部市備後東5-12-48
					</p>
				</div>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3237.0361687405957!2d139.7973533154676!3d35.77448788017271!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601891d8c32595cf%3A0x501dd1dc7469b899!2z44CSMTIxLTA4MTYg5p2x5Lqs6YO96Laz56uL5Yy65qKF5bO277yR5LiB55uu77yT77yS4oiS77yW!5e0!3m2!1sja!2sjp!4v1658214115284!5m2!1sja!2sjp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</section>

	</main>

	<footer>
		<nav id="footer_nav">
			<ul class="flex">
				<li><a href="./index.html">HOME</a></li>
				<li><a href="./company.html#profile">会社案内</a></li>
				<li><a href="./company.html#about">取扱製品一覧</a></li>
				<li><a href="./company.html#mail">お問い合わせ</a></li>
				<li><a href="./privacy.html">プライバシーポリシー</a></li>
			</ul>
		</nav>
		<p id="copyright">Copyright(C) <a href="#">株式会社 ワンプラス</a> All Rights Reserved.</p>
		<p id="pageTop"><i class="fa-solid fa-chevron-up"></i></p>
	</footer>
</body>
</html>
