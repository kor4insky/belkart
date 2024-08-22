<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("manager");
CModule::IncludeModule("studio8.main");
use Studio8\Main\TransactionsTable;

if($_POST['ph']) {
	$usr = CUser::GetByLogin($_POST['ph'])->Fetch();
}

$nav = new \Bitrix\Main\UI\PageNavigation("list");
$nav->allowAllRecords(false)
	->setPageSize(99999999)
	->initFromUri();
$trans = TransactionsTable::getList([
	"filter" => ["USER_ID"=>$usr['ID']],
	"count_total" => true,
	'order' => ["DATE"=>"ASC"],
	"offset" => $nav->getOffset(),
	"limit" => $nav->getLimit(),
]);
$nav->setRecordCount($trans->getCount());
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="POST">
				<input type="text" name="ph" class="form-control" placeholder="Номер телефона, только цифры" value="<?=$_POST['ph'];?>">
				<input type="password" name="p" class="form-control" value="<?=$_POST['p'];?>" placeholder="password"/>
				<br/><br/>
				<input type="submit" class="btn btn-success d-block w-100" value="Поиск"/>
			</form>
			<hr/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<?if($_POST['p']==5589):?>
			<?	
				$arrState = [
					1 => "Участник",
					2 => "Клиент без карты",
					3 => "Не участник",
					4 => "Ожидает активации",
				];
				$status = $arrState[$usr['UF_STATUS']];?>
			<h5><?=$usr['LAST_NAME'];?> <?=$usr['NAME'];?> <?=$usr['SECOND_NAME'];?> (ID: <?=$usr['ID'];?> - <?=$status;?>)</h5>
			<table class="table table-striped table-success">
				<thead>
					<tr>
						<td>Номер транзакции</td>
						<td>Дата операции</td>
						<td>Сумма</td>
					</tr>
				</thead>
				<tbody>
					<?foreach($trans as $t):?>
						<tr>
							<td><?=$t['TRANS_ID'];?></td>
							<td><?=$t['DATE'];?></td>
							<td><?=$t['AMOUNT'];?> BYN</td>
						</tr>
					<?endforeach;?>
				</tbody>
			</table>
			<?
			$APPLICATION->IncludeComponent(
				"bitrix:main.pagenavigation", 
				"navi", 
				array(
					"NAV_OBJECT" => $nav,
					"SEF_MODE" => "N",
					"AJAX_MODE"=>"N",
					"COMPONENT_TEMPLATE" => "navi"
				),
				false
			);
			?>
			<?else:?>
				<h5>wrong password</h5>
			<?endif;?>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>