<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
use \Bitrix\Main;
use \Bitrix\Main\UserTable;
global $USER;
//SEND SMS

if($_POST['phone']) {

	$usr = \Bitrix\Main\UserTable::getList(array(
		'filter' => array(
			"PERSONAL_PHONE"=>$_POST['phone'],
		),
		'limit'=>1,
		'select'=>array('*'),
	))->fetch();

	if($usr['ID']>0) {

		$md5 = md5($_POST['phone']);
		$code = mb_substr(filter_var($md5,FILTER_SANITIZE_NUMBER_INT),0,4);
		$smstext = urlencode("Код для входа в личный кабинет belkart-igra.by: ".$code);
		$sms = file_get_contents("https://userarea.sms-assistent.by/api/v1/send_sms/plain?user=EfSiBi_Bel&password=9Y988762&recipient=".$_POST['phone']."&message=".$smstext."&sender=igrabelkart");
		echo '<div class="alert alert-success d-block">Ваш пароль был отправлен на номер '.$_POST['phone'].'</div>';

	} else {

		echo "Вы не зарегистрированы в рекламной игре. Пройдите <a href='/register/' class='white'>регистрацию</a>, чтобы принять участие";

	}

}?>