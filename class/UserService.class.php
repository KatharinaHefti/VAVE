<?php

/**
 * USER SERVICE CLASS
 * --------------------------------------------------------------------------------------
 * 
 * desinfect 
 * minlength
 * maxlenght
 * email
 * password 
 *  
 **/

class UserService {

	// Feedback string for required fields
  private $emptyRequiredFieldsFeedback = "Please fill in required fields";
  
	// Feedback array
  public $feedbackArray = array();
  
	// Validation state properties
  public $validationState = true;
	
	public function validateInput($value,
									$isRequired,
									$elementName="",
									$kind="",
									$feedbackStr="") {
									
		// desinfect inputs
		$cleanValue = $this -> desinfect($value);
		$check = "positive";
		$kindArray = explode("|",$kind);
		if ($isRequired && ($value == "")) {
			$this -> feedbackArray[] = $elementName.": ".$this -> emptyRequiredFieldsFeedback;
			$this -> validationState = false;
		}
		elseif(strlen($value) > 0) {
			if (in_array('email',$kindArray)) {
				if(!$this->emailValidator($value)) {
					$check = "negative";
				}
			}
			if (in_array('password',$kindArray)) {
				if(!$this->passwordValidator($value)) {
					$check = "negative";
				}
			}
			if (in_array('age',$kindArray)) {
				if(!$this->ageValidator($value)) {
					$check = "negative";
				}
			}
			
			$arr1 = preg_grep("/^min_length-\d*/",$kindArray);
			$key1 = key($arr1);
			if (count($arr1) > 0) {
				$parts1 = explode("-",$arr1[$key1]);
				if(!$this->minLength($value,$parts1[1])) {
					$check = "negative";
				}
			}
			
			$arr2 = preg_grep("/^max_length-\d*/",$kindArray);
			$key2 = key($arr2);
			if (count($arr2) > 0) {
				$parts2 = explode("-",$arr2[$key2 ]);
				if(!$this->maxLength($value,$parts2[1])) {
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
	

 /** Desinfect inputs
  * --------------------------------------------------------------------------------------
  * @return Returns clean input
  */
	private function desinfect($str) {
		$cleanStr = filter_var($str, FILTER_SANITIZE_STRING);
		$cleanStr = trim($cleanStr);
		return $cleanStr;
	}

 /** Email Validator
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
	private function emailValidator($str) {
		// Ist die E-Mail-Adresse gültig?
		if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		else {
			return false;
		}
	}

 /** Minimum Length 
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
	private function minLength($str,$length) {
		$anzZeichen = strlen($str);
    	if ($anzZeichen >= $length) {
    		return true;
		}
		else {
			return false;
		}
	}

 /** Maximum Length 
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
	private function maxLength($str,$length) {
		$anzZeichen = strlen($str);
    	if ($anzZeichen <= $length) {
    		return true;
		}
		else {
			return false;
		}
	}

 /** Password Validator
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
	private function passwordValidator($str) {
		$pattern = '#^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$#';
    	if (preg_match($pattern, $str)) {
    		return true;
		}
		else {
			return false;
		}
	}

 /** Age Validator
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
  private function ageValidator($str) {
	$legalAge = '18';
	if ($legalAge <= $str) {
		return true;
	}
	else {
		return false;
	}
}

/** Terms Validator
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
  private function termsValidator($str) {
	$acceptTerms = 'accept';
	if ($acceptTerms >= $str) {
		return true;
	}
	else {
		return false;
	}
}
}
?>