<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вход / Регистрация");
global $USER;
if($USER->IsAuthorized()) {
	LocalRedirect("/cabinet/");
}
?>

<div class="container" style="min-height:50%;padding-bottom:335px;">
	<div class="row">
		<div class="col-md-12 text-center pb-5">
			<h1>ВХОД / РЕГИСТРАЦИЯ</h1>
		</div>
		<div class="col-md-4 offset-md-2 text-center p-3 pt-5">
			<h3>Я уже зарегистрирован</h3>
			<a href="/auth/" class="btn btn-light p-3 w-100">ЛИЧНЫЙ КАБИНЕТ</a>
		</div>
		<div class="col-md-4 text-center p-3 pt-5">
			<h3>Я хочу зарегистрироваться</h3>
			<a href="/register/" class="btn btn-light p-3 w-100">РЕГИСТРАЦИЯ</a>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>