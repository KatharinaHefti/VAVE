<?php
class ValidateForm {

	// Feedback for empty form inputs
  private $emptyRequiredFieldsFeedback = "This is a required field and must not be empty";
  public $feedbackArray = array();
  
	// Validation Status
	public $validationState = true;
  
  // Valtidate Form Function
	public function validateElement($value,
									$isRequired,
									$elementName="",
									$kind="",
									$feedbackStr="") {
									
		// Desinfect form input
		$cleanValue = $this -> desinfect($value);
		$check = "positive";
		$kindArray = explode("|",$kind);
		if ($isRequired && ($value == "")) {
			$this -> feedbackArray[] = $elementName.": ".$this -> emptyRequiredFieldsFeedback;
			$this -> validationState = false;
		}
		elseif(strlen($value) > 0) {
			if (in_array('email',$kindArray)) {
				if(!$this->isEmail($value)) {
					$check = "negative";
				}
			}
			if (in_array('plz',$kindArray)) {
				if(!$this->isPLZ($value)) {
					$check = "negative";
				}
			}
			if (in_array('pw',$kindArray)) {
				if(!$this->isValidPassword($value)) {
					$check = "negative";
				}
			}
			
			$arr1 = preg_grep("/^min_length-\d*/",$kindArray);
			$key1 = key($arr1);
			if (count($arr1) > 0) {
				$parts1 = explode("-",$arr1[$key1]);
				if(!$this->isMinLength($value,$parts1[1])) {
					$check = "negative";
				}
			}
			
			$arr2 = preg_grep("/^max_length-\d*/",$kindArray);
			$key2 = key($arr2);
			if (count($arr2) > 0) {
				$parts2 = explode("-",$arr2[$key2 ]);
				if(!$this->isMaxLength($value,$parts2[1])) {
					$check = "negative";
				}
			}
		}
		
		if ($check == "negative") {
			$this -> feedbackArray[] = $elementName.": ".$feedbackStr;
			$this -> validationState = false;
		}
		
		return $cleanValue;
	}
	
	private function desinfect($str) {
		$cleanStr = filter_var($str, FILTER_SANITIZE_STRING);
		$cleanStr = trim($cleanStr);
		return $cleanStr;
	}
  
  // Is Email valid?
	private function isEmail($str) {
		if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		else {
			return false;
		}
	}
  
  // Is input length valid?
	private function isMinLength($str,$length) {
		$anzZeichen = strlen($str);
    	if ($anzZeichen >= $length) {
    		return true;
		}
		else {
			return false;
		}
  }
	private function isMaxLength($str,$length) {
		$anzZeichen = strlen($str);
    	if ($anzZeichen <= $length) {
    		return true;
		}
		else {
			return false;
		}
	}

  // Is password valid?
	private function isValidPassword($str) {
		$suchmuster = '/^(?=./*d).{4,8}$/';
    	if (preg_match($suchmuster, $suchmuster)) {
    		return true;
		}
		else {
			return false;
		}
	}
}
?>