<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Игровые шансы");
global $USER;
if(!$USER->isAuthorized()) {
	LocalRedirect("/auth/");
}
CModule::IncludeModule("studio8.main");
use Studio8\Main\IgraTable;

$nav = new \Bitrix\Main\UI\PageNavigation("transaction-page");
$nav->allowAllRecords(false)
	->setPageSize(20)
	->initFromUri();
$trans = IgraTable::getList([
	"filter" => ["USERID"=>$USER->GetId()],
	"count_total" => true,
	"offset" => $nav->getOffset(),
	"limit" => $nav->getLimit(),
]);
$nav->setRecordCount($trans->getCount());
?>

<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h2>Ваши игровые шансы</h2>
			<a href="/cabinet/" class="btn btn-light">< ЛИЧНЫЙ КАБИНЕТ</a>
			<br/><br/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<table class="table table-striped table-success">
				<thead>
					<tr>
						<td>Номер шанса</td>
						<td>Тип приза</td>
					</tr>
				</thead>
				<tbody>
					<?foreach($trans as $t):?>
						<tr>
							<td><?=$t['NAME'];?></td>
							<td><?=$t['PRIZE_TYPE'];?> BYN</td>
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