<?php 

namespace app\components;


use Yii;
use yii\base\Component;
 
class myFunctions extends Component
{

	/*
	*	this functions calculate age from personel code
	*	according to Estonia National Identification Numbers Algorithm
	*/

	function getAgeFromPersonelCode($personal_code)
	{
		$personal_code = strval($personal_code);

		if($personal_code[0] == 1 || $personal_code[0] == 2){

			return $this->calculateAge(substr($personal_code, 1, 6), '18');

		}elseif ($personal_code[0] == 3 || $personal_code[0] == 4) {

			return $this->calculateAge(substr($personal_code, 1, 6), '19');

		}else{

			return	$this->calculateAge(substr($personal_code, 1, 6), '20');

		}
	}


	function calculateAge($birthday, $century)
	{
		$birthday = $century.$birthday;

		$age =  date("Ymd")-date($birthday);	

		$age =  substr($age, 0, -4);

		if ($age < 0) {
			$age = 0;
		}

		return $age;

	}
}
?>