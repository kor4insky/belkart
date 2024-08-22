<!doctype html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-NMX3KPS');</script>
		<!-- End Google Tag Manager -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/css/custom.css?v=<?=rand();?>"/>
		<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/css/fonts.css"/>
		<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
		<meta property="og:type" content="website">
		<meta property="og:site_name" content="ИГРАЕМ НА ВСЕ 100 - рекламная игра от Беларусбанк">
		<meta property="og:url" content="https://igra100.by/">
		<meta property="og:locale" content="by">
		<meta property="og:title" content="ИГРАЕМ НА ВСЕ 100 - рекламная игра от Беларусбанк">
		<meta property="og:description" content="Расплачивайтесь картой Белкарт Беларусбанка и выигрывайте призы">
		<link rel="manifest" href="/site.webmanifest">
		<?=$APPLICATION->ShowHead();?>
		<title><?=$APPLICATION->ShowTitle();?></title>
	</head>
	<body>
		<div id="panel"><?=$APPLICATION->ShowPanel();?></div>

		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NMX3KPS"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->

		<div id="kv" <?if($APPLICATION->GetCurPage()!=="/"):?>style="background:unset!important;"<?endif;?>>
		<div class="container-fluid p-0">
			<div class="container p-4 pt-3">
				<header>
					<div class="row pb-3" style="align-items: center;">
						<div class="col-md-2">
							<a href="/"><img src="/images/belkart.png" class="img-fluid"/></a>
						</div>
						<div class="col-md-3">
							<a href="/"><img src="/images/belarusbank.png" class="img-fluid"/></a>
						</div>
						<div class="col-md-3 col-xl-2 hotline offset-xl-2">
							<div class="tel">
								<img src="/images/tel.svg" class="img-fluid"/>
							</div>
							<div>
								<span>Горячая линия</span><br/>
								<b><a href="tel:+375447791100">+375 44 779 11 00</a></b>
							</div>
						</div>
						<div class="col-md-3 col-xl-3 schedule">
							<div class="tel">
								<img src="/images/clock.svg" class="img-fluid"/>
							</div>
							<div class="text">
								Время работы <br/>горячей линии<br/>
							</div>
							<div>
								<span>10:00 - 18:00 (пн-пт)</span><br/>
								<span>10:00 - 16:00 (сб-вс)</span>
							</div>
						</div>
					</div>
					<div class="row" id="menu">
						<div class="col-md-12">
						</div>
					</div>
				</header>
			</div>
		</div>
		<?
			if(!$USER->isAdmin()) {?>
				<div class="container">
					<h1>Извините, Ведутся технические работы. Повторите попытку позже</h1>
					<?die();?>
				</div>
			<?}
		?>
		