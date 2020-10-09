<?php

  session_start();
    
  // database connection
  require_once("./config/config.inc.php");

  // include class UserService to validate form inputs
  require("class/UserService.class.php");
  $userService = new UserService();

/* * * * * * * * * * * * * * * * * * * * header and navigation * * * * * * * * * * * * * * * * * * * */

 include ("./inc/header.inc.php"); 
 include ("./inc/navPrivat.inc.php"); 

/* * * * * * * * * * * * * * * * * * * * camp information * * * * * * * * * * * * * * * * * * * */

  // camp variables
  $campHeadline = $campDescription = $campStart = $campEnd = $campLocation = $campPrice = $campPatricipants = $campShortDescription = $output = $campLink = $campButton ='';

  // is form sent?
  if (isset($_POST['submit'])) {
    // save inputs to variables
    $campHeadline = $_POST['campHeadline'];
    $campDescription = $_POST['campDescription'];
    $campStart = $_POST['campStart'];
    $campEnd = $_POST['campEnd'];
    $campLocation = $_POST['campLocation'];
    $campPrice = $_POST['campPrice'];
    $campShortDescription = $_POST['campShortDescription'];
    $campPatricipants = $_POST['campPatricipants'];
    $campLink = 'camps/'.$campStart.'-'.$campHeadline.'.php';
    $campButton = $_POST['campButton'];
    $campTicketsLeft = '';
    $output = 'Event has been uploaded.';

    // upload form inputs to database
    $stmt = $pdo->prepare("INSERT INTO camps (campHeadline, campDescription, campStart, campEnd, campLocation, campPrice, campPatricipants, campShortDescription, campLink, campButton ) VALUES ( :campHeadline, :campDescription, :campStart, :campEnd, :campLocation, :campPrice, :campPatricipants, :campShortDescription, :campLink, :campButton)");
		$result = $stmt->execute(array('campHeadline' => $campHeadline, 'campDescription' => $campDescription, 'campStart' => $campStart, 'campEnd' => $campEnd, 'campLocation' => $campLocation, 'campPrice' => $campPrice, 'campPatricipants' => $campPatricipants, 'campShortDescription' => $campShortDescription, 'campLink' => $campLink, 'campButton' => $campButton));
		
  /* * * * * * * * * * * * * * * * * * * * camp picture upload * * * * * * * * * * * * * * * * * * * */
  
  // count total files
  $countfiles = count($_FILES['files']['name']);
 
  // upload information in camps
  $query = "UPDATE camps SET imageName = :imageName, imageData = :imageData, imageType = :imageType WHERE id = :id=? ";
  $stmt = $pdo->prepare($query);

  // loop all files
  for($i=0;$i<$countfiles;$i++){

    // rename folder to campStart-campHeadline
    $folder = $campStart.'-'.$campHeadline;

    echo 'foldername: ';
    echo '<pre>';
    print_r($folder);
    
    $folderpath = "img/camp/$folder";
    echo '<pre>';
    echo 'folderpath: ';
    echo '<pre>';
    print_r($folderpath);

		// new folder
    mkdir("img/camp/".$folder, 0700);
    
    // file name
    $filename = $_FILES['files']['name'][$i];
    print_r($filename);

    // new file
    $newPage = fopen('camps/'.$campStart.'-'.$campHeadline.'.php', 'w');
    echo '<pre>';
    echo 'newPage: ';
    print_r($newPage);


    // location
    $target_file = 'img/camp/'.$folder.'/'.$filename;
    echo 'file location: ';
    echo '<pre>';
    print_r($target_file);

    // file extension
    $imageType = pathinfo($target_file, PATHINFO_EXTENSION);
    $imageType = strtolower($imageType);

    // valid image extension
    $valid_extension = array("png","jpeg","jpg");
    if(in_array($imageType, $valid_extension)){

      //move file to folder
      if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)){

      // upload file
	    $stmt->execute(array('imageName' => $filename, 'imageData' => $target_file, 'imageType' => $imageType ));
       }
    }
  }
  // feedback
  $output = 'Your camp is created.';
 }   

 /* * * * * * * * * * * * * * * * * * * * body * * * * * * * * * * * * * * * * * * * */
?>
<html>
<body class="dark">

  <!-- - - - - - - - - - - - - - - - - - - - create new camp - - - - - - - - - - - - - - - - - - -->
  <main>
    <form action="createCamp.php" method="post" enctype="multipart/form-data">
      <h4>create camp</h4>
      <h2>Upload</h2>
      <br>
      <h4>Create a new camp</h4>
      <br>
      <p>Please fill in the information and add a flyer to the camp.
        It creates a new Camp Page and will link in the camp agenda.</p>
      <br><br>
      <!-- name -->
      <label for="campHeadline">Camp Name</label>
      <input type="text" id="campHeadline" name="campHeadline" value="<?=$campHeadline?>"><br>
      <br>
      <!-- description -->
      <label for="campDescription">Camp Description</label>
      <input type="textarea" id="campDescription" name="campDescription" value="<?=$campDescription?>"><br>
      <br>
      <!-- start -->
      <label for="campStart">Camp Start</label>
      <input type="date" id="campStart" name="campStart" value="<?=$campStart?>"><br>
      <br>
      <!-- end -->
      <label for="campEnd">Camp End</label>
      <input type="date" id="campEnd" name="campEnd" value="<?=$campEnd?>"><br>
      <br>
      <!-- location -->
      <label for="campLocation">Camp Location</label>
      <input type="text" id="campLocation" name="campLocation" value="<?=$campLocation?>"><br>
      <br>
      <!-- price -->
      <label for="campPrice">Camp Price</label>
      <input type="text" id="campPrice" name="campPrice" value="<?=$campPrice?>"><br>
      <br>
      <!-- patricipants -->
      <label for="campPatricipants">Camp Patricipants</label>
      <input type="textarea" id="campPatricipants" name="campPatricipants" value="<?=$campPatricipants?>"><br>
      <br>
      <!-- short description -->
      <label for="campShortDescription">Camp Short Description</label>
      <input type="textarea" id="campShortDescription" name="campShortDescription"
        value="<?=$campShortDescription?>"><br>
      <br>
      <!-- short description -->
      <label for="campButton">Camp Button</label>
      <input type="text" id="campButton" name="campButton" value="<?=$campButton?>"><br>
      <br>
      <!-- pictures upload -->
      <input type='file' name='files[]' multiple />
      <br>
      <!-- output -->
      <br>
      <p class="paint-turquois"><?php echo $output;?></p>
      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="submit">create new camp</button>
      </div>
    </form>
  </main>
</body>
</html>