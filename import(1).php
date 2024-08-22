<?
$_SERVER['DOCUMENT_ROOT'] = "/home/bitrix/www";
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
global $USER;
CModule::IncludeModule('iblock');
CModule::IncludeModule('studio8.main');
use Studio8\Main\TransactionsTable;
use Bitrix\Main\Type;
ini_set('memory_limit', '-1');
//error_reporting(E_ALL);

//transactions

$transfile = str_replace("/home/bitrix/www/","",glob(__DIR__.'/csv/transactions_*.csv')[0]);

$datefile = str_replace(".csv","",explode("_",$transfile)[1]);
$date_final = date_format(date_create_from_format('dmY', $datefile),"d.m.Y");

if($transfile) {
	$transactions = csvToArray($transfile,";");
}else{
	echo("transaction file not found");
}

if(is_array($transactions) && count($transactions)>0) {
	$curStep = COption::GetOptionString('siterm','last_trans');
	foreach($transactions as $n=>$trans) {
		if($trans[0]>0) {
			if(strlen($curStep)<1) {
				$curStep = 0;
			}
			if($n>=$curStep && $n<=($curStep+2000)) {

				$transDate = strtotime($trans[2]);

				$arr = array(
					"USER_ID"=>$trans[0],
					"AMOUNT"=> $trans[1],
					"DATE" => new Type\DateTime(date("d.m.Y H:i:s",$transDate)),
					"TRANS_ID"=>$trans[3],
				);

				try {

					$newItem = TransactionsTable::Add($arr);
					if($newItem->isSuccess()) {
						//echo $newItem->getId(); 
					}

				} catch(Exception $e) {
					TransactionsTable::Update($trans[3],$arr);
				}

				//CALCULATE AND UPDATE BALANCE
				/*
				$balance = 0;
				$tranz = CIBlockElement::GetList(["ID"=>"ASC"],["PROPERTY_USERID"=>$trans[0],"IBLOCK_ID"=>2],false,[],["ID","NAME","CODE","PROPERTY_USERID","PROPERTY_POINTS","PROPERTY_TRANS_ID"]);
				while($t = $tranz->Fetch()) {
					$balance += $t['PROPERTY_POINTS_VALUE'];
				}*/
				$arFields = array(
					//"UF_BALANCE"=>$balance,
					"UF_LAST_UPDATE" => $trans[2],
				);
				$player = new CUser;
				$player->Update($trans[0],$arFields);
				COption::SetOptionString("siterm","last_trans",$n);
			}
		}
	}
	//finally remove file
	$curStep = COption::GetOptionString('siterm','last_trans');
	if(($curStep+2) == count($transactions)) {
		$source = glob(__DIR__.'/csv/transactions_*.csv')[0];
		$dest = str_replace("/home/bitrix/www/csv/","/home/bitrix/www/csv/archived/",$source);
		rename($source,$dest);
		COption::SetOptionString("siterm","last_trans",0);
	}
}?>