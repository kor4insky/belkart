<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Рекламная игра ОПЯТЬ 25 от Беларусбанк");
?>
<div class="container mb-5 mainpage" data-aos="fade-in">
		<div class="row">
			<div class="col-md-12 text-center mt-2" style="z-index:99;">
				<h2>с 24 июня по 31 августа 2024 года</h2>
			</div>
			<div class="glow"></div>
		</div>
	<br/><br/>
	<div class="row align-items-center">
		<div class="col-md-6 text-center" data-aos="fade-down">
			<h1>ОПЯТЬ</h1>
			<img src="/img/25.png" class="img-fluid" style="max-width:70%"/>
		</div>
		<div class="col-md-6 text-center" data-aos="fade-down">
			<h3>ГЛАВНЫЙ ПРИЗ</h3>
			<div class="d-flex rounded">
				<h3>25000</h3>
				<span>x2<br/>BYN</span>
			</div>
			<br/>
			<div class="d-md-flex align-items-center justify-content-center py-3">
				<div class="d-flex px-5 smallprize" style="border-right:2px #fff solid;">
					<h3>2500</h3>
					<span>x10<br/>BYN</span>
				</div>
				<div class="d-flex px-5 smallprize">
					<h3>250</h3>
					<span>x25<br/>BYN</span>
				</div>
			</div>
			<a href="/register/" class="btn btn-default text-center text-uppercase font-18">Зарегистрироваться</a>
			<div id="gr-bottom-right"></div>
		</div>
		<div class="col-md-12 text-center pt-2" data-aos="zoom-in">
		</div>
	</div>
</div>
</div> <!-- id=kv-->
<div class="container-fluid" id="rules">
	<div class="container">
		<div class="row">
			<div class="col-md-12 pb-5 text-center">
				<h2 class="text-uppercase white">Правила игры</h2>
			</div>
		</div>
		<div class="pravila row">
			<div class="step-block p-4 col-md-4" id="step1" data-aos="fade-right">
				<span class="step"><img src="/img/step1.png" class="img-fluid"/></span>
				<br/><br/>
				<span class="step-name">1. РЕГИСТРИРУЙТЕСЬ</span>
				<span class="step-description">
					Регистрируйтесь на сайте в период с 00:00:00 24 июня 2024 года по 23:59:59 31 августа 2024 года.
					<br/><br/>
					Для регистрации потребуется карта платежной системы "Белкарт", выпущенная ОАО «АСБ Беларусбанк».
				</span>
				<br/><br/><br/>
				<a href="/auth/" class="btn btn-default">ЗАРЕГИСТРИРОВАТЬСЯ</a>
			</div>
			<div class="step-block p-4 col-md-4" id="step2" data-aos="fade-up">
				<span class="step"><img src="/img/step2.png" class="img-fluid"/></span>
				<br/><br/>
				<span class="step-name">2. ИСПОЛЬЗУЙТЕ КАРТУ</span>
				<span class="step-description">
					Расплачивайтесь
					<b>картой Белкарт</b>, выпущенной <b>ОАО «АСБ Беларусбанк»</b>,
					с  00:00:01 24 июня 2024 года <br/>
					по  23:59:59 31 августа 2024 года, <br/>
					и получайте шанс выиграть призы.
				</span>
			</div>
			<div class="step-block p-4 col-md-4" id="step3" data-aos="fade-left">
				<div class="wrap">
					<div class="vm">
						<span class="step"><img src="/img/step3.png" class="img-fluid"/></span>
						<br/><br/>
						<span class="step-name">3. ПОЛУЧАЙТЕ БАЛЛЫ</span>
						<span class="step-description">
							За каждый 1 рубль вы получаете 1 балл в рекламной игре. 
							<div class="balls-table mt-3">
								<div class="ball-amount"><span>50</span> баллов</div>
								<div class="ball-desc">1 шанс на участие в розыгрыше 250 р.</div>
								<div class="ball-amount"><span>400</span> баллов</div>
								<div class="ball-desc">1 шанс на участие в розыгрыше 2500 р.<br/>8 шансов на участие в розыгрыше 250 р.</div>
								<div class="ball-amount"><span>800</span> баллов</div>
								<div class="ball-desc">1 шанс на участие в розыгрыше 25 000 р.<br/>2 шанса на участие в розыгрыше 2500 р.<br/>16 шансов на участие в розыгрыше 250 р.</div>
							</div>
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="pravila row pt-3">
			<div class="step-block p-4 col-md-6" id="step3" data-aos="fade-right">
				<div class="wrap">
					<div class="vm">
						<span class="step"><img src="/img/step4.png" class="img-fluid"/></span>
						<br/><br/>
						<span class="step-name">4. УЧАСТВУЙТЕ В РОЗЫГРЫШЕ ПРИЗОВ</span>

					</div>
				</div>
			</div>
			<div class="step-block p-4 col-md-6" id="step4" data-aos="fade-left">
				<div class="wrap">
					<div class="vm">
						<span class="step text-center">
							<img src="/img/excl.png" class="img-fluid"/>
						</span>
						<br/><br/>
						<span class="step-name">ОБРАТИТЕ ВНИМАНИЕ</span>
						<span class="step-description d-block pb-5">
							При совершении безналичных операций с использованием карточки «Клуб «Бархат» баллы за совершенные операции будут удвоены автоматически. 
							<br/><br/>
							<i>Например, за безналичную операцию, совершенную по карте «Клуб «Бархат»» в 50,00 (пятьдесят) белорусских рублей 00 копеек, Участник получит 100 (сто) баллов.</i>
						</span>
						<a class="btn btn-default" href="/rules.pdf?ver=<?=rand();?>" target="_blank">ПОДРОБНЕЕ О ПРАВИЛАХ</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid text-center p-md-5" id="prizes">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2>ПРИЗЫ РЕКЛАМНОЙ ИГРЫ<br/></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 pb-3" data-aos="zoom-in">
				<img src="/img/prize_1.png" class="img-fluid"/>
			</div>
			<div class="col-md-6 pb-3" data-aos="zoom-in" data-aos-delay="300">
				<img src="/img/prize_2.png" class="img-fluid"/>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 pt-5 text-center animate__pulse animate__animated animate__slow animate__infinite" data-aos="zoom-out" data-aos-delay="800">
				<img src="/img/prize_3.png" class="img-fluid"/>
			</div>
			<div class="col-md-4 offset-md-4 pt-5 text-center">
				<a href="/register/" class="btn btn-default w-100 p-3 font-18">ЗАРЕГИСТРИРОВАТЬСЯ</a>
			</div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
		</div>
	</div>
</div>
<div class="container-fluid" id="faq" style="position:relative;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center white">
				<h2>Вопросы и ответы</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"faq", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MEDIA_PROPERTY" => "",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SEARCH_PAGE" => "/search/",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SLIDER_PROPERTY" => "",
		"SORT_BY1" => "ID",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_RATING" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "faq"
	),
	false
);?>
			</div>
		</div>
	</div>
</div>
</div>

<div id="feedback">
<div class="container-fluid pt-5 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center" style="z-index:1">
				<h2>Задать вопрос</h2>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-6" id="form">
				<?$APPLICATION->IncludeComponent(
				"bitrix:form", 
				"form", 
				array(
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"CACHE_TIME" => "3600",
					"CACHE_TYPE" => "A",
					"CHAIN_ITEM_LINK" => "",
					"CHAIN_ITEM_TEXT" => "",
					"COMPOSITE_FRAME_MODE" => "A",
					"COMPOSITE_FRAME_TYPE" => "AUTO",
					"EDIT_ADDITIONAL" => "N",
					"EDIT_STATUS" => "Y",
					"IGNORE_CUSTOM_TEMPLATE" => "N",
					"NOT_SHOW_FILTER" => array(
						0 => "",
						1 => "",
					),
					"NOT_SHOW_TABLE" => array(
						0 => "",
						1 => "",
					),
					"RESULT_ID" => $_REQUEST['RESULT_ID'],
					"SEF_MODE" => "N",
					"SHOW_ADDITIONAL" => "N",
					"SHOW_ANSWER_VALUE" => "N",
					"SHOW_EDIT_PAGE" => "N",
					"SHOW_LIST_PAGE" => "N",
					"SHOW_STATUS" => "Y",
					"SHOW_VIEW_PAGE" => "N",
					"START_PAGE" => "new",
					"SUCCESS_URL" => "",
					"USE_EXTENDED_ERRORS" => "N",
					"WEB_FORM_ID" => "1",
					"COMPONENT_TEMPLATE" => "form",
					"VARIABLE_ALIASES" => array(
						"action" => "action",
					)
				),
				false
			);?>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>