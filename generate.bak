<?

(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])) && die('nc');

$_SERVER['DOCUMENT_ROOT'] = "/home/bitrix/www";
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Loader;
use Bitrix\Main\UserTable;
use Bitrix\Main\Application;
use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Entity\ReferenceField;
use Bitrix\Main\Type\Date;
Loader::includeModule('iblock');
Loader::includeModule('studio8.main');
use Studio8\Main\IgraTable;
use Studio8\Main\TransactionsTable;

global $DB;

	if(COption::GetOptionString("siterm","busy")=="1") {
		die('busy!! TRY AGAIN LATER'.PHP_EOL);
	}else{

		COption::SetOptionString("siterm","busy","1");
	
		$filter = ["ACTIVE"=>"Y",">ID"=>0,"UF_STATUS"=>1,"UF_F_STEP"=>""];
		$users = UserTable::getList([
			'select' => ['ID',"NAME","LAST_NAME","SECOND_NAME", "LOGIN"],
			'filter' => $filter,
			'order' => ['ID' => 'ASC'],
			'limit' => 250,
			'cache' => array("ttl"=> 3600)
		]);
		while ($usr = $users->fetch()) {
			$summ = 0;
			echo "time 1 - ".time().PHP_EOL;
	
			$summ = 0;
			$query = TransactionsTable::getList([
				"filter"=> ["USER_ID"=>$usr['ID']],
			]);
			while($q = $query->Fetch()) {
				$summ += $q['AMOUNT'];
			}
			echo $sum;
	
			echo "time 2 - ".time().PHP_EOL;
			if($summ>=50){
				$gen = generateChancesNew($usr['ID'], $summ, false, $usr['LAST_NAME'], $usr['NAME'], $usr['SECOND_NAME'], $usr['LOGIN']);
				echo $gen;
			}
			echo "time 3 - ".time().PHP_EOL;
			$uzr = new CUser;
			$uzr->Update($usr['ID'], ["UF_BALLS_2" => $summ, "UF_F_STEP" => "1"]);
		}

		COption::SetOptionString("siterm","busy","");

	}

/// MY FUNCTION 
function generateChancesNew($userId, $balls, $showonly = false, $familia, $ima, $secondname,$phone)
{
        $chances = [
			intval($balls/50), 
			intval($balls/400), 
			intval($balls/800),
        ];
        if($showonly == true) {
            return $chances;
        }
		$arChances = [];
        foreach($chances as $c => $chance) {
			$prize_type = $c + 1;
            $lastone = IgraTable::getList([
                'select' => ['ID', 'NAME'],
				'filter' => ["PRIZE" => $prize_type],
                'order' => ['ID' => 'DESC'],
                'limit' => 1,
				'cache' => array("ttl"=> 3600)
            ])->fetch();
            for($i = 1; $i <= $chance; $i++) {
                if($lastone['ID'] > 1) {
                    $name = sprintf("%'.07d\n", (intval($lastone['NAME']) + $i));
                } else {
                    $name = sprintf("%'.07d\n", $i);
                }
				$arChances = [
					"NAME" => $name,
					"USERID" => $userId,
					"PRIZE" => $prize_type,
					"FAMILIA" => $familia,
					"IMA" => $ima,
					"SECOND_NAME" => $secondname,
					"PHONE" => $phone,
				];
				IgraTable::Add($arChances);
			}
		}
	return "OK";
}
?>