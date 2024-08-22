<?
//(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('nc');
$_SERVER['DOCUMENT_ROOT'] = "/home/bitrix/www";
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
global $USER;
//ini_set("memory_limit",-1);
//ini_set('output_buffering', 0);
//error_reporting(E_ALL);

$statusfile = str_replace("/home/bitrix/www/","",glob(__DIR__.'/csv/statuses_*.csv')[0]);
if(strlen($statusfile)) {
	echo "start";
	$statuses = csvToArray($statusfile,";");
}else{
	echo("Statuses file not found");
}

if(is_array($statuses) && count($statuses)>0) {
	$curStatus = COption::GetOptionString('siterm','last_status');
	foreach($statuses as $l=>$line) {
		if(strlen($curStatus)<1) {
			$curStatus = 0;
		}
		if($l>=$curStatus && $l<=($curStatus+2000)) {
			$filter = ["ID"=>$line[0]];
			$usr = CUser::GetList(($by="id"), ($order="asc"), $filter)->Fetch();
			if($usr['ID'] == $line[0]) {
				$arFields = array(
					"UF_STATUS" => ($line[1]+1),
				);
				$player = new CUser;
				$player->Update($usr['ID'],$arFields);
				echo $usr['ID'] . ' - done;'.PHP_EOL;
			}
			COption::SetOptionString("siterm","last_status",$l);
		}
	}
	//move to archive
	$curStatus = COption::GetOptionString('siterm','last_status');
	if(($curStatus) == count($statuses)-1) {
		echo "final";
		$source = glob(__DIR__.'/csv/statuses_*.csv')[0];
		if(strlen($source)>0) {
			$dest = str_replace("/home/bitrix/www/csv/","/home/bitrix/www/csv/arch/",$source);
			echo $dest;
			if(rename($source,$dest)) {
				echo "ok";
			}else{
				$error = error_get_last();
				echo "ne ok - ".print_r($error);
			}
			COption::SetOptionString("siterm","last_status",0);
		}
	}
}
?>