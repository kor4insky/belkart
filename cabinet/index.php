<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
use Bitrix\Main\Loader;
use Bitrix\Main\UserTable;
use Bitrix\Main\Application;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\Type\Date;
Loader::includeModule('iblock');
Loader::includeModule('studio8.main');
use Studio8\Main\TransactionsTable;

global $DB;

$APPLICATION->SetTitle("Личный кабинет участника - ОПЯТЬ 25 от Беларусбанк");

global $USER;
if(!$USER->IsAuthorized()) {
	LocalRedirect("/login/");
}
$usr = CUSer::GetByID($USER->GetId())->Fetch();

if($_POST['LAST_NAME']) {
	$arFields = array(
		"LAST_NAME" => $_POST['LAST_NAME'],
		"NAME" => $_POST['NAME'],
		"SECOND_NAME" => $_POST['SECOND_NAME'],
		"UF_STATUS" => 4,
	);
	$user = new CUser;
	$user->Update($usr['ID'], $arFields);
	LocalRedirect("/cabinet/");
}?>
<div class="container pt-5" style="overflow:hidden;min-height:60vh;">
	<div class="row">
		<div class="col-md-6 text-center">
			<h2>Личный кабинет</h2>
			<div class="personal p-5">
				<?if($usr['UF_STATUS']>1):?>
					<form method="POST">
						<div class="form-control">
							<label for="lastname">Фамилия</label>
							<input type="text" id="lastname" name="LAST_NAME" placeholder="Введите фамилию" class="w-100" value="<?=$USER->GetLastName();?>" required/>
						</div>
						<div class="form-control">
							<label for="name">Имя</label>
							<input type="text" id="name" name="NAME" placeholder="Введите Имя" class="w-100" value="<?=$USER->GetFirstName();?>" required/>
						</div>
						<div class="form-control">
							<label for="secondname">Отчество</label>
							<input type="text" id="secondname" name="SECOND_NAME" class="w-100" value="<?=$USER->GetSecondName();?>" placeholder="Введите Отчество"/>
						</div>
						<span><b>Номер телефона: </b><?=$usr['PERSONAL_PHONE'];?></span><br/><br/>
						<button type="submit" class="btn btn-default w-100">СОХРАНИТЬ</button>
					</form>
				<?else:?>
					<span><b>Фамилия: </b><?=$USER->GetLastName();?></span><br/>
					<span><b>Имя: </b><?=$USER->GetFirstName();?></span><br/>
					<span><b>Отчество: </b><?=$USER->GetSecondName();?></span><br/>
					<span><b>Номер телефона: </b><?=$usr['PERSONAL_PHONE'];?></span><br/>
				<?endif;?>
				<hr/>
				<button class="btn btn-light m-2 userstatus-btn">
					<?switch($usr['UF_STATUS']) {
						case 1: echo "ПОДТВЕРЖДЕН"; $hint = "Проверка данных, указанных Вами, успешно пройдена."; break;
						case 2: echo "НЕТ КАРТЫ БЕЛКАРТ"; $hint = "К сожалению, данные, указанные Вами при регистрации, не прошли проверку. Обратитесь в учреждение банка для актуализации данных."; break;
						case 3: echo "НЕ ЯВЛЯЕТСЯ КЛИЕНТОМ БАНКА"; $hint = "К сожалению, данные, указанные Вами при регистрации, не прошли проверку. Обратитесь в учреждение банка для актуализации данных."; break;
						case 4: echo "ОЖИДАЕТ ПОДТВЕРЖДЕНИЯ"; $hint = "Информация, указанная Вами при регистрации, проходит проверку (проверка может занять до 5 дней). Баллы за покупки будут начислены после успешного прохождения проверки."; break;
					}?>
				</button>
				<a href="/?logout=yes" class="btn btn-warning m-2"><i class="fa fa-sign-out"></i> ВЫЙТИ</a>
				<br/>
				<div class="badge bg-secondary col-md-9 rounded-pill p-3 w-100 text-uppercase" style="white-space:normal;line-height:normal;"><?=$hint;?></div>
			</div>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-5 balance text-center">
<div class="glow"></div>
			<?
			$balls = 0;
			$trans = TransactionsTable::GetList([
				"filter" => ["USER_ID"=>$USER->GetId(),"<=DATE"=>date("d.m.Y H:i:s",strtotime("8 days ago"))],
			]);
			foreach ($trans as $t) {
				$balls += $t['AMOUNT'];
			}?>
			<h1 class="ballsbalance w-100 text-center pt-5">
				<?=$balls;?>
				<small><?=sklon($balls,["БАЛЛ","БАЛЛА","БАЛЛОВ"],true);?></small>
			</h1>
			<br/>

			<!-- Vertically centered modal -->
			<br/><br/>
			<div class="col-md-12 legend">

				<div class="alert alert-warning">
					Баллы обновляются на 8-ой календарный день после совершения безналичной операции.
				</div>

				<a href="/cabinet/transactions/" class="btn btn-default w-100 text-uppercase">ПОСМОТРЕТЬ СВОИ БАЛЛЫ</a>
				<br/><br/>
				<?/*
				<a href="/cabinet/chances/" class="btn btn-default w-100 text-uppercase">Игровые шансы</a>
				*/?>

			</div>

		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>