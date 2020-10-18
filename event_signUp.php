<?php

// includes nav template
include ("./inc/header.inc.php"); // header links 
include ("./inc/nav.inc.php"); // navigation 

// database connection
require_once("./config/config.inc.php");

// functions
require_once("./inc/functions.inc.php");

// include class UserService to validate form inputs
require("class/UserService.class.php");
$userService = new UserService();

/* * * * * * * * * * * * * * * * * * * * event sign up * * * * * * * * * * * * * * * * * * * */

  // variables
  $nameValue = $familynameValue = $ageValue = $emailValue = $acceptTerms  = " ";
  $eventName = "Ginastica Natural Zürich at 30.10.2020";
  $output = "";

  // is form sent?
  if (isset($_POST['submit'])) {

  // validate input with class User Service
  $nameValue = $userService -> validateInput($_POST['name'],true,"Name","min_length-1|max_length-100","Must contain minimum 1 letter and maximum 100.");
  $familynameValue =  $userService -> validateInput($_POST['familyname'],true,"Familyname","min_length-1|max_length-100","Must contain minimum 1 letter and maximum 100.");
  $ageValue =  $userService -> validateInput($_POST['age'],true,"Age","age","you must be 18 years old or more");
  $emailValue = $userService -> validateInput($_POST['email'],true,"E-Mail","email","is not a valid Email");
  $acceptTerms = $userService -> validateInput($_POST['terms'],true,"Terms","terms","must be accepted");

  if ($userService -> validationState) {
    // Validation was succecfull
    $output = "<div class=\"feedback_positiv\">";
    $output .= "All inputs are valid.";
    $output .=  "</div>\n";

    // upload form inputs to database
    $stmt = $pdo->prepare("INSERT INTO eventParticipant (participantName, participantFamilyname, participantAge, participantEmail) VALUES (:name, :familyname, :age, :email)");
    $result = $stmt->execute(array('name' => $nameValue, 'familyname' => $familynameValue, 'age' => $ageValue, 'email' => $emailValue,));
      
    // if upload to database was succesfull, leave to login page
    if($result == true)
      {
        $recipient = $emailValue;
        $subject = "Neues Passwort für deinen Account auf www.vave.ch";
        $from = "From: Valeria Verzar <valeria@vavesports.ch>"; 
        $text = 'Hi '.$nameValue.',
          You have signed up succecefully to following Event'.$eventName.'
          Greetings,
          Valeria Verzar';
                  
        mail($recipient, $subject, $text, $from);

      }
      // if upload to database did not work.
      else {
        $output = "<div class=\"feedback_negativ\">";
        $output .= "Upload to database did not work.";
        $output .=  "</div>\n";
      }
    }
  // Validation was NOT succecfull
  else {
    $output = "<div class=\"feedback_negativ\">";
  foreach ($userService -> feedbackArray as $out) {
    $output .=  $out."<br>";
  }
    $output .= "</div>\n";
    }
  }
  else {
    $output = "";
    $nameValue = "";
    $familynameValue = "";
    $ageValue = "";
    $emailValue = "";
    $acceptTerms = "";
  }

/* * * * * * * * * * * * * * * * * * * * html * * * * * * * * * * * * * * * * * * * */
?>

<head>
    <link rel="stylesheet" href="style/parts/privat.style.css">
    <link rel="stylesheet" href="style/elements/form.style.css">
    <link rel="stylesheet" href="style/elements/button.style.css">
    <link rel="stylesheet" href="style/elements/icon.style.css">
    <link rel="stylesheet" href="style/parts/edit.style.css">
    <link rel="stylesheet" href="style/cd/typo.style.css">
  </head>

<body>

  <section class="event">

  <!-- - - - - - - - - - - - - - - - - - - - event sign up - - - - - - - - - - - - - - - - - - -->
  <form action="event_signUp.php" method="post" novalidate>
    <h2>Sign up to this event</h2><br>
		<div>
			<label for="name">Name</label>
			<input type="text" id="name" name="name" value="<?=$nameValue?>"><br><br>
			<label for="familyname">Familyname</label>
			<input type="text" id="familyname" name="familyname" value="<?=$familynameValue?>"><br>
		</div><br>
    <!-- age -->
		<div>
			<label for="age">Age</label>
			<input type="text" id="age" name="age" value="<?=$ageValue?>"><br>
		</div><br>
    <!-- email -->
		<div>
			<label for="email">E-Mail Adresse</label>
			<input type="email" id="email" name="email" value="<?=$emailValue?>">
		</div><br>
    <!-- terms -->
		<div>
			<label for="terms">accept terms</label><br>
			<input type="checkbox" id="terms" name="terms" value="accept">
    </div>

    <!-- output -->
    <?php echo $output; ?>

    <!-- submit -->
		<button type="submit" name="submit">sign up</button>
  
  </form>
  </section>
  </body>
</html>