<?php
/*
This Class Will Be Used For Calculation Of Points

*/

class Points {


	/**
	* Function | Check Player eligibility To Play Game 
	* @param <type> $totalPoints,$gamePoints
    * @return <type> true,false
	*/
	public function checkEligibility($totalPoints,$gamePoints){
		if($totalPoints && $gamePoints){
			if($totalPoints>=$gamePoints){
				return true;
			}else{
				return false;
			}			
		}else{
			return false;
		}	
	}

	/**
	* Function | Debit Points of Player 
	* @param <type> $totalPoints,$gamePoints
    * @return <type> remaining points
	*/
	public function debitPoints($totalPoints,$gamePoints){
		if($totalPoints && $gamePoints){
			$remainingPoints = $totalPoints - $gamePoints;				
			return $remainingPoints;
		}else{
			return false;
		}	

	}

}##EOF

?>