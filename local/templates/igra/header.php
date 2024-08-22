<!doctype html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-W7H8PGLW');</script>
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
		<meta property="og:site_name" content="ОПЯТЬ 25 - рекламная игра от Беларусбанк">
		<meta property="og:url" content="https://belkart-igra.by/">
		<meta property="og:locale" content="by">
		<meta property="og:title" content="ОПЯТЬ 25 - рекламная игра от Беларусбанк">
		<meta property="og:description" content="Расплачивайтесь картой Белкарт Беларусбанка и выигрывайте призы">
		<link rel="manifest" href="/site.webmanifest">
		<?=$APPLICATION->ShowHead();?>
		<title><?=$APPLICATION->ShowTitle();?></title>
	</head>
	<body>
		<div id="panel"><?=$APPLICATION->ShowPanel();?></div>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(97647966, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/97647966" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W7H8PGLW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript)-->

		<header class="d-md-none" id="fixedheader">
			<div class="logos row d-md-none d-sm-none">
				<div class="col-5">
					<a href="/"><img src="/images/belkart.png" class="img-fluid"/></a>
				</div>
				<div class="col-5">
					<a href="/"><img src="/images/belarusbank.png" class="img-fluid"/></a>
				</div>
				<div class="col-2">
					<a href="#" class="btn btn-success btn btn-success px-3 py-2 br0 menu-toggle"><i class="fa fa-bars"></i></a>
				</div>
			</div>
			<div class="row" id="menu">
				<div class="col-md-12">
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu", 
						"igra", 
						array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "left",
							"COMPOSITE_FRAME_MODE" => "A",
							"COMPOSITE_FRAME_TYPE" => "AUTO",
							"DELAY" => "N",
							"MAX_LEVEL" => "1",
							"MENU_CACHE_GET_VARS" => array(
								0 => "CLASS",
								1 => "",
							),
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_TYPE" => "N",
							"MENU_CACHE_USE_GROUPS" => "N",
							"ROOT_MENU_TYPE" => "top",
							"USE_EXT" => "N",
							"COMPONENT_TEMPLATE" => "igra",
							"MENU_THEME" => "site"
						),
						false
					);?>
				</div>
			</div>
		</header>

		<div id="kv" <?if($APPLICATION->GetCurPage()!=="/"):?>style="background:unset!important;"<?endif;?>>
		<div class="container-fluid p-0">
			<div id="gr-top-left"></div>
			<div class="container p-4 pt-3" id="headhead">
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
								<b><a href="tel:+375447917711">+375 44 791 77 11</a></b>
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
								<span>13:00 - 16:00 (сб-вс)</span>
							</div>
						</div>
					</div>
					<div class="row" id="menu">
						<div class="col-md-12">
							<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"igra", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
			0 => "CLASS",
			1 => "",
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "igra",
		"MENU_THEME" => "site"
	),
	false
);?>
						</div>
					</div>
				</header>
			</div>
		</div>