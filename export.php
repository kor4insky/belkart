<?
(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('ncc');
$_SERVER['DOCUMENT_ROOT'] = "/home/bitrix/www";
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
global $USER;
$filter = ["ACTIVE"=>"Y",">ID"=>0]; //"!UF_STATUS"=>0];
$users = CUser::GetList(($by="id"), ($order="asc"), $filter, ["SELECT" => ["ID","PERSONAL_PHONE","SECOND_NAME","NAME","LAST_NAME","UF_LAST_UPDATE","UF_BALANCE","DATE_REGISTER"]]);
$csv = "\xEF\xBB\xBF";

while($usr = $users->Fetch()) {

	if($usr['SECOND_NAME']=="") {
		$usr['SECOND_NAME'] = "-";
	}

	$usr['NAME_FIX'] = str_replace("ë","ё",$usr['NAME']);
	$usr['LAST_NAME_FIX'] = str_replace("ë","ё",$usr['LAST_NAME']);
	$usr['SECOND_NAME_FIX'] = str_replace("ë","ё",$usr['SECOND_NAME']);

	if(strlen($usr['UF_LAST_UPDATE'])>0) {
		$csv .= str_replace(["+","(",")","-"," "],["","","","",""],$usr['PERSONAL_PHONE']).";".trim($usr['NAME_FIX']).";".trim($usr['LAST_NAME_FIX']).";".trim($usr['SECOND_NAME_FIX']).";".ConvertDateTime($usr['UF_LAST_UPDATE'], "YYYY-MM-DD").";".$usr['ID']."\n";
	}else{
		$csv .= str_replace(["+","(",")","-"," "],["","","","",""],$usr['PERSONAL_PHONE']).";".trim($usr['NAME_FIX']).";".trim($usr['LAST_NAME_FIX']).";".trim($usr['SECOND_NAME_FIX']).";2024-06-24;".$usr['ID']."\n";
	}

}
//p($csv);
file_put_contents("/home/bitrix/www/csv/users_".date("dmY").".csv",$csv);
file_put_contents("/home/bitrix/www/csv/arch/users_".date("dmY").".csv",$csv);

echo "OK";

// SEND TELEGA
$arFilter = [
    "DATE_REGISTER_1" => date("d.m.Y")." 00:00:00",
    "DATE_REGISTER_2" => date("d.m.Y")." 23:59:59"
];
$users = CUser::GetList(($by="id"), ($order="asc"), $arFilter);
$count = $users->SelectedRowsCount();

$text = "Количество новых пользователей за ".date("d.m.Y")." - ".$count;

// SEND TELEGA
$arFilter = ["UF_STATUS"=>1,"ACTIVE"=>"Y"];
$users = CUser::GetList(($by="id"), ($order="asc"), $arFilter);
$count = $users->SelectedRowsCount();

$text.= ". Всего активных участников: ".$count;

$balance = file_get_contents("https://userarea.sms-assistent.by/api/v1/credits/plain?user=EfSiBi_Bel&password=9Y988762");
$text .= ". Баланс SMS: ".$balance;

file_get_contents("https://api.telegram.org/bot6843672339:AAF2NBSO_JTYQX929iQ2ubdrescN5W0znYc/sendMessage?chat_id=-807262716&text=".urlencode($text));
?>