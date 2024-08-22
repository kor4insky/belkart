<?
(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('nc');
$_SERVER['DOCUMENT_ROOT'] = "/home/bitrix/www";
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
global $USER;
CModule::IncludeModule('iblock');
CModule::IncludeModule('studio8.main');
use Studio8\Main\TransactionsTable;
use Bitrix\Main;
use Bitrix\Main\Type;
$dbconn = \Bitrix\Main\Application::getConnection();
//error_reporting(E_ALL);

//transactions
//$transfile = str_replace("/home/bitrix/www/","",glob(__DIR__.'/csv/transactions_*.csv')[0]);

//if($transfile) {
	$curStep = COption::GetOptionString('siterm','last_trans');
	$transactions = $dbconn->Query("SELECT * FROM transactions_temp LIMIT 10000")->FetchAll(); //csvToArray($transfile,";");
//}else{
	//echo("transaction file not found");
//}

foreach($transactions as $n=>$trans) {

	$transDate = strtotime($trans["DATE"]);
	$arr = array(
		"USER_ID"=>$trans["USER_ID"],
		"AMOUNT"=> $trans["AMOUNT"],
		"DATE" => new Type\DateTime(date("d.m.Y H:i:s",$transDate)),
		"TRANS_ID"=>$trans["TRANS_ID"],
	);

	try {

		$newItem = TransactionsTable::Add($arr);
		if($newItem->isSuccess()) {
			//echo $newItem->getId(); 
		}

	} catch(Exception $e) {
		TransactionsTable::Update($trans[3],$arr);
	}

	$arFields = array(
		//"UF_BALANCE"=>$balance,
		"UF_LAST_UPDATE" => $trans['DATE'],
	);
	$player = new CUser;
	$player->Update($trans["USER_ID"],$arFields);
	COption::SetOptionString("siterm","last_trans",$n);
	$dbconn->Query("DELETE FROM transactions_temp WHERE TRANS_ID=".$trans['TRANS_ID']);

}
//finally remove file
//$curStep = COption::GetOptionString('siterm','last_trans');

/*
if(($curStep+2) == count($transactions)) {
	$source = glob(__DIR__.'/csv/transactions_*.csv')[0];
	$dest = str_replace("/home/bitrix/www/csv/","/home/bitrix/www/csv/archived/",$source);
	rename($source,$dest);
	COption::SetOptionString("siterm","last_trans",0);
}
*/