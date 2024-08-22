<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Транзакции");
global $USER;
if(!$USER->isAuthorized()) {
	LocalRedirect("/auth/");
}
CModule::IncludeModule("studio8.main");
use Studio8\Main\TransactionsTable;

$nav = new \Bitrix\Main\UI\PageNavigation("list");
$nav->allowAllRecords(false)
	->setPageSize(20)
	->initFromUri();
$trans = TransactionsTable::getList([
	"filter" => ["USER_ID"=>$USER->GetId(),"<=DATE"=>date("d.m.Y H:i:s",strtotime("8 days ago"))],
	"count_total" => true,
	"offset" => $nav->getOffset(),
	"limit" => $nav->getLimit(),
]);
$nav->setRecordCount($trans->getCount());
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h2>Ваши баллы</h2>
			<a href="/cabinet/" class="btn btn-light">ЛИЧНЫЙ КАБИНЕТ </a>
			<br/><br/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<table class="table table-striped table-success">
				<thead>
					<tr>
						<td>Дата операции</td>
						<td>Баллы</td>
					</tr>
				</thead>
				<tbody>
					<?foreach($trans as $t):?>
						<tr>
							<td><?=$t['DATE'];?></td>
							<td><?=$t['AMOUNT'];?></td>
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
					"SEF_MODE" => "Y",
					"COMPONENT_TEMPLATE" => "navi"
				),
				false
			);
			?>
			<div class="text-center">
				<a href="/cabinet/" class="btn btn-light">< ЛИЧНЫЙ КАБИНЕТ</a>
				<br/><br/>
			</div>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>