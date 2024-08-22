<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Войти в личный кабинет | ИГРАЕМ НА ВСЕ 100 - Беларусбанк");
global $USER;
if($USER->isAuthorized()) {
	LocalRedirect("/cabinet/");
}
?>

<div class="container" style="min-height:50%;">
	<div class="row">
		<div class="col-md-12 text-center">
			<h1>ВОЙТИ В ЛИЧНЫЙ КАБИНЕТ</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center">
			<form method="POST" class="loginform">
				<input type="hidden" name="sign" value="<?=md5($_SESSION['PHPSESSID']);?>"/>
				<label for="phone">Номер телефона</label>
				<input id="phone" type="tel" name="phone" autocomplete="off" class="form-control" value="<?=($_POST['phone']) ? $_POST['phone'] : '375';?>" data-mask="375999999999" required />
				<a href="#" class="forgot white">Забыли пароль?</a>
				<br/>				<br/>
				<label for="pass">Пароль из смс</label><br/>
				<input id="pass" class="form-control" type="password" placeholder="Пароль из смс" name="pass" value="<?=($_POST['pass']) ? $_POST['pass'] : '';?>" required>
				<br/><br/>
				<div class="alert alert-info">
					SMS-сообщение было направлено вам при регистрации
				</div>
				<br/>
				<button type="submit" class="btn btn-light w-100">ВОЙТИ</button>
				<br/><br/>
				
					<a href="/register/" class="btn btn-light w-100">РЕГИСТРАЦИЯ</a>

				<div class="res p-3"></div>
			</form>
			<?if($_POST) {
			
			$md5 = md5($_POST['phone']);
			$code = mb_substr(filter_var($md5,FILTER_SANITIZE_NUMBER_INT),0,4);

				if($_POST['sign'] && $_POST['phone'] && $_POST['pass']==$code) {
					$filter = ["PERSONAL_PHONE"=>$_POST['phone'],"ACTIVE"=>"Y"];
					$usr = CUser::GetList(($by="id"), ($order="asc"), $filter)->Fetch();
					$USER->Authorize($usr['ID']);
					?>
						<script>
							$(function() {
								(dataLayer = window.dataLayer || []).push({
									'eCategory': 'button',
									'eAction': 'submit_form',
									'eLabel': '',
									'event': 'authorization'
								});
							});
						</script>
					<?
					LocalRedirect("/cabinet/");
				}else{?>
					<hr class="long"/>
					<div class='alert alert-danger'>Неверный номер или код из смс</div>
				<?}
			}?>

		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>