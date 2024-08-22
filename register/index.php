<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация участника | Опять 25 - рекламная игра от Беларусбанк");
global $USER;
if($USER->IsAuthorized()) {
	LocalRedirect("/cabinet/");
}
$cpt = new CCaptcha();
$captchaPass = COption::GetOptionString("main", "captcha_password", "");
if(strlen($captchaPass) <= 0) {
	$cname = "captcha_".rand();
	Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID($cname);
		$captchaPass = randString(10);
		COption::SetOptionString("main", "captcha_password", $captchaPass);
	Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID($cname, "");
}
$cpt->SetCodeCrypt($captchaPass);
?>
<style>
	.glow {display:none;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="container">
	<div class="glow"></div>
	<div class="row">
		<div class="col-md-12 text-center pb-3">
			<h1>Регистрация участника</h1>
			<br/>
			<h5 class="alert alert-warning">ОБРАЩАЕМ ВНИМАНИЕ: ФИО НЕОБХОДИМО УКАЗАТЬ НА РУССКОМ ЯЗЫКЕ В СООТВЕТСТВИИ С ДОКУМЕНТОМ, <br/>УДОСТОВЕРЯЮЩИМ ЛИЧНОСТЬ</h5>
		</div>
		<div class="col-md-4 offset-md-4">
			<form class="register" method="POST">
				<label for="lastname">Фамилия</label>
				<input type="text" name="lastname" class="form-control" placeholder="Например, Иванов" id="lastname" value="<?=$_POST['lastname'];?>" required/>
				<br/>
				<label for="name">Имя</label>
				<input type="text" name="name" class="form-control" placeholder="Например, Иван" id="name" value="<?=$_POST['name'];?>" required/>
				<br/>
				<label for="secondname">Отчество <span class="badge alert-warning p-1 my-1">(ОБЯЗАТЕЛЬНО ПРИ НАЛИЧИИ)</span></label>
				<input type="text" name="secondname" class="form-control" placeholder="Например, Иванович" value="<?=$_POST['secondname'];?>" id="secondname"/>
				<br/>
				<label for="phone">Номер телефона в международном формате <br/><span class="badge alert-warning p-1 my-1">НЕОБХОДИМО УКАЗАТЬ НОМЕР, К КОТОРОМУ ПРИВЯЗАНА КАРТА</span></label>
				<input type="tel" name="phone" class="form-control" data-mask="375(99) 999-99-99" value="<?=(isset($_POST['phone'])) ? $_POST['phone'] : "375";?>" id="phone" required>
				<br/>
				<?if($_POST):?>
					<?$usr = \Bitrix\Main\UserTable::getList(array(
						'filter' => array(
							"PERSONAL_PHONE"=>str_replace(["(",")","-"," ","+"],["","","","",""],$_POST['phone']),
						),
						'limit'=>1,
						'select'=>array('*'),
					))->fetch();
					if($usr['ID']>0):?>
						<div class="row">
							<div class="col-md-12 pt-4">
								<div class="alert alert-danger text-center">
									Пользователь с таким номером зарегистрирован.<br/><br/>
									<a href="/auth/" class="btn btn-success w-100">ВОЙТИ</a>
								</div>
							</div>
						</div>
					<?else:?><?if(!$APPLICATION->CaptchaCheckCode($_POST["captcha_word"], $_POST["captcha_code"])) {
						echo "Неверно введены символы с картинки";
					} else {
						//SEND SMS
						$phone = str_replace(["+","(",")","-"," "],["","","","",""],$_POST['phone']);
						$md5 = md5($phone);
						$code = mb_substr(filter_var($md5,FILTER_SANITIZE_NUMBER_INT),0,4);
						$smstext = urlencode("Код для входа в личный кабинет belkart-igra.by: ".$code);
						$sms = file_get_contents("https://userarea.sms-assistent.by/api/v1/send_sms/plain?user=EfSiBi_Bel&password=9Y988762&recipient=".$phone."&message=".$smstext."&sender=igrabelkart");
						$arFields = array(
							"LAST_NAME" => $_POST['lastname'],
							"NAME" => $_POST['name'],
							"SECOND_NAME" => $_POST['secondname'],
							"EMAIL" => $phone."@igra100.by",
							"PERSONAL_PHONE" => $phone,
							"LOGIN" => $phone,
							"PASSWORD" => $code.$code,
							"UF_UID" => $code,
							"UF_BALANCE" => "0",
							"UF_STATUS" => 4,
						);
						$usr = new CUser;
						if($userid = $usr->Add($arFields)) {
							CEventLog::Add(
								array(
								'SEVERITY' => 'INFO',
								'AUDIT_TYPE_ID' => 'USER',
								'MODULE_ID' => 'siterm',
								'ITEM_ID' => "USER_".$userid,
								'DESCRIPTION' => "Отправлена смс на номер ".$phone." - Код для входа в личный кабинет belkart-igra.by: ".$code,
								)
							);
							?>
							<div class="row">
								<div class="col-md-12 pt-4">
									<div class="alert alert-info">
										Мы отправили код для входа в личный кабинет на номер <?=$_POST['phone'];?>
										<br/>
										Пожалуйста, сохраните код для входа в личный кабинет до окончания Игры. 
										<a href="/auth/" class="btn btn-light w-100">Войти</a>
									</div>
								</div>
							</div>
							<script>
								$(document).ready(function() {
									(dataLayer = window.dataLayer || []).push({
									  'eCategory': 'button',
									  'eAction': 'submit_form',
									  'eLabel': '',
									  'event': 'registration'
									});
								});
							</script>
							<?
						}else{
							echo $userid->LAST_ERROR;
							?>
						<?}?>
					<?}?>
				<?endif;?>
				<?endif;?>
				<?if($userid>0):?>
				<?else:?>
					<div class="agreement pb-2">
						<input type="checkbox" name="agree1" id="agree1" class="custom-checkbox" required>
						<label for="agree1">
							Я согласен на участие в проводимой рекламной игре и ознакомлен(-а) с настоящими <a href="/rules.pdf?ver=<?=rand();?>" target="_blank" class="white">Правилами</a> *
						</label>
					</div>
					<div class="agreement pb-2">
						<input type="checkbox" name="agree2" id="agree2" class="custom-checkbox" required>
						<label for="agree2">
							Даю согласие на обработку моих персональных данных в соответствии с предоставленной мне для ознакомления <a href="/agreement.pdf?ver=<?=rand();?>" target="_blank" class="white">информацией об обработке персональных данных.</a> *
						</label>
						* - обязательные к заполнению поля
					</div>
					<input name="captcha_code" value="<?=htmlspecialchars($cpt->GetCodeCrypt());?>" type="hidden">
					<input id="captcha_word" name="captcha_word" type="text" placeholder="цифры на картинке">
					<img src="/bitrix/tools/captcha.php?captcha_code=<?=htmlspecialchars($cpt->GetCodeCrypt());?>">
					<hr/>
					<button class="btn btn-light w-100" type="submit">ЗАРЕГИСТРИРОВАТЬСЯ</button>
					<br/><br/>
					<div class="text-center w-100">
						<span class="white">Уже зарегистрированы? </span><a class="white" href="/auth/">Войти</a>
					</div>
				<?endif;?>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#name').on('keypress', function() {
		  var that = this;
		  setTimeout(function() {
			var res = /[^а-яА-ЯїЇєЄіІёЁ ]/g.exec(that.value);
			that.value = that.value.replace(res, '');
		  }, 0);
		});
		$('#lastname').on('keypress', function() {
		  var that = this;
		  setTimeout(function() {
			var res = /[^а-яА-ЯїЇєЄіІёЁ ]/g.exec(that.value);
			that.value = that.value.replace(res, '');
		  }, 0);
		});
		$('#secondname').on('keypress', function() {
		  var that = this;
		  setTimeout(function() {
			var res = /[^а-яА-ЯїЇєЄіІёЁ ]/g.exec(that.value);
			that.value = that.value.replace(res, '');
		  }, 0);
		});



	});
</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>