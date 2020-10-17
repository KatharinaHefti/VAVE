<?php

/**
 * USER SERVICE CLASS
 * --------------------------------------------------------------------------------------
 * 
 * desinfect 
 * email
 * password 
 * minlength
 * maxlenght
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

			// name
			if (in_array('name',$kindArray)) {
				if(!$this->nameValidator($value)) {
					$check = "negative";
				}
			}

			// email
			if (in_array('email',$kindArray)) {
				if(!$this->emailValidator($value)) {
					$check = "negative";
				}
			}

			// phone
			if (in_array('phone',$kindArray)) {
				if(!$this->phoneValidator($value)) {
					$check = "negative";
				}
			}

			// street
			if (in_array('street',$kindArray)) {
				if(!$this->streetValidator($value)) {
					$check = "negative";
				}
			}

			// city
			if (in_array('city',$kindArray)) {
				if(!$this->cityValidator($value)) {
					$check = "negative";
				}
			}
			// password
			if (in_array('password',$kindArray)) {
				if(!$this->passwordValidator($value)) {
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

/* ------------------------------------------------ METHODS -------------------------------------

/** Desinfect inputs
  * --------------------------------------------------------------------------------------
  * @return Returns clean input
  */
	public function desinfect($str) {
		$cleanStr = filter_var($str, FILTER_SANITIZE_STRING);
		$cleanStr = trim($cleanStr);
		return $cleanStr;
	}
	
/** Name Validator
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
  public function nameValidator($str) {
	// Is name valid?s
	$pattern = "/^[a-zA-Z-' ]*$/";
	if (preg_match($pattern, $str)) {
		return true;
   }else {
		return false;
	}
}

/** Email Validator
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
	public function emailValidator($str) {
		// Ist die E-Mail-Adresse gültig?
		if (filter_var($str, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		else {
			return false;
		}
	}

/** Phone Validator
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
	public function phoneValidator($str) {
		// Ist die Telefonnr. gültig?
			$pattern = '/^(\+41|0041|0){1}(\(0\))?[0-9]{9}$/';
    	if (preg_match($pattern, $str)) {
    		return true;
		}
		else {
			return false;
		}
	}

/** Street Validator
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
	public function streetValidator($str) {
		// Ist die Telefonnr. gültig?		
		$pattern = '/^[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-Z1-9À-ÖØ-öø-ÿ]+\.?)*$/';
		if (preg_match($pattern, $str)) {
			return true;
		}
		else {
			return false;
		}
	}

/** City Validator
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
	public function cityValidator($str) {
		$pattern = '/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/';
		// Ist die City gültig?

		if (preg_match($pattern, $str)) {
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
		$strLenght = strlen($str);
    	if ($strLenght >= $length) {
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


/** Title Validator
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
  private function titleValidator($length,$str) {
		$strLenght = strlen($str);
    	if ($strLenght <= $length) {
    		return true;
		}
		else {
			return false;
		}
	}

/** Text Validator
  * --------------------------------------------------------------------------------------
  * @return Returns true or false
  */
  private function textValidator($str) {
		
		return false;
	}
	



}
?>