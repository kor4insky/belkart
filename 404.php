<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Error 404");
@define("ERROR_404","Y");
$sapi_type = php_sapi_name(); 
if ($sapi_type=="cgi") 
   header("Status: 404"); 
else 
   header("HTTP/1.1 404 Not Found"); 
?>

<div class="container">
	<div class="row">
		<div class="glow"></div>
		<div class="col-md-12 text-center white">
			<h1>ОШИБКА 404</h1>
			<h3>Страница не найдена</h3>
			К сожалению, такой страницы не существует, <a href="/" class="white">вернитесь на главную</a> или воспользуйтесь главным меню
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>