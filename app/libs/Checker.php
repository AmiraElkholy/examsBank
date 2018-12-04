<?php 

namespace App\libs;


class Checker {

	//

	public static function display($correctness) {
		if($correctness == 1) {
			echo "Correct Answer";
		} else if($correctness == 0) {
			echo "Wrong Answer";
		}
	}


	public static function displayClass($correctness) {
		if($correctness == 1) {
			echo "green";
		} else if($correctness == 0) {
			echo "red";
		}
	}


}