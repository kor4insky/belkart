<?
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

function sklon($num, $titles,$onlyword=false) {
    $cases = array(2, 0, 1, 1, 1, 2);
	if($onlyword==true) {
		return $titles[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
	}else{
		return $num . " " . $titles[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
	}
}

function csvToArray($csvFile,$separator=";"){
	ini_set('auto_detect_line_endings',TRUE);
	$file_to_read = fopen($csvFile, 'r');
	$lines = [];
	while (($row = fgetcsv($file_to_read, 0, ";")) !== FALSE) {
        $lines[] = $row;
    }
	fclose($file_to_read);
	return $lines;
}

function generateChances($userid,$balls,$showonly=false) {

	CModule::IncludeModule('iblock');
	$chances = array(
		intval($balls/25), 
		intval($balls/50), 
		intval($balls/100),
		intval($balls/400),
	);
	if($showonly==true) {
		return $chances;
	}

	foreach($chances as $c=>$chance) {
		switch($c) {
			case 0: 
				$prize_type = 1; 
				$lastone = CIBlockElement::GetList(["ID"=>"DESC"],["IBLOCK_ID"=>3,"ACTIVE"=>"Y","PROPERTY_PRIZE"=>$prize_type],false,[],["ID","PROPERTY_PRIZE","NAME"])->Fetch();
			break;
			case 1: 
				$prize_type = 2; 
				$lastone = CIBlockElement::GetList(["ID"=>"DESC"],["IBLOCK_ID"=>3,"ACTIVE"=>"Y","PROPERTY_PRIZE"=>$prize_type],false,[],["ID","PROPERTY_PRIZE","NAME"])->Fetch();
			break;
			case 2: 
				$prize_type = 3; 
				$lastone = CIBlockElement::GetList(["ID"=>"DESC"],["IBLOCK_ID"=>3,"ACTIVE"=>"Y","PROPERTY_PRIZE"=>$prize_type],false,[],["ID","PROPERTY_PRIZE","NAME"])->Fetch();
			break;
			case 3: 
				$prize_type = 4; 
				$lastone = CIBlockElement::GetList(["ID"=>"DESC"],["IBLOCK_ID"=>3,"ACTIVE"=>"Y","PROPERTY_PRIZE"=>$prize_type],false,[],["ID","PROPERTY_PRIZE","NAME"])->Fetch();
			break;
		}
		for($i=1;$i<=$chance;$i++) {
			$ch = new CIBlockElement;
			$prop[4] = $userid;
			$prop[5] = $prize_type;
			if($lastone['ID']>0) {
				$name = sprintf("%'.07d\n", (intval($lastone['NAME'])+$i));
			}else{
				$name = sprintf("%'.07d\n", $i);
			}
			$arFields = array(
				"NAME" => $name,
				"CODE" => $name.rand(),
				"ACTIVE" => "Y",
				"PROPERTY_VALUES" => $prop,
				"IBLOCK_ID" => 3,
			);
			if($id = $ch->Add($arFields)) {
				//echo $id;
			}else{
				//echo $ch->LAST_ERROR;
			}
		}
	}
}

?>
