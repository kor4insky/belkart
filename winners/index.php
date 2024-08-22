<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Победители розыгрыша рекламной игры ОПЯТЬ 25 от Беларусбанк");
CModule::IncludeModule('iblock');

$winners1 = CIBlockElement::GetList(["PROPERTY_FAMILIA"=>"ASC","PROPERTY_PRIZE"=>"ASC"],["IBLOCK_ID"=>5],false,[],["ID","NAME","PROPERTY_FAMILIA","PROPERTY_IMA","PROPERTY_SECONDNAME","PROPERTY_PRIZE"]);
?>

<div class="container">

	<div class="row">
		<div class="col-md-12 text-center">
			<h2>Победители розыгрыша</h2>
		</div>
		<div class="col-md-10 offset-md-1 text-center">
			<table class="table table-light table-striped table-hover table-bordered text-center">
				<thead>
					<tr>
						<th>Фамилия</th>
						<th>Имя</th>
						<th>Отчество</th>
						<th>Приз</th>
					</tr>
				</thead>
				<tbody>
					<?while($win1 = $winners1->Fetch()):?>
					<tr>
						<td><?=$win1['PROPERTY_FAMILIA_VALUE'];?></td>
						<td><?=$win1['PROPERTY_IMA_VALUE'];?></td>
						<td><?=$win1['PROPERTY_SECONDNAME_VALUE'];?></td>
						<td><?=$win1['PROPERTY_PRIZE_VALUE'];?></td>
					</tr>
					<?endwhile;?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>