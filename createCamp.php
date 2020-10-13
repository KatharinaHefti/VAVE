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
  $campHeadline = $campDescription = $campStart = $campEnd = $campLocation = $campPrice = $campPatricipants = $campTickets = $campShortDescription = $output = $campLink = $campButton = $imageName = $imageData = $current = $imageType = $contentCampPage = '';

  // is form sent?
  if (isset($_POST['submit'])) {
    // save inputs to variables
    $campHeadline = $_POST['campHeadline'];
    $campDescription = $_POST['campDescription'];
    $campStart = $_POST['campStart'];
    $campEnd = $_POST['campEnd'];
    $campLocation = $_POST['campLocation'];
    $campPrice = $_POST['campPrice'];
    $campPatricipants = $_POST['campPatricipants'];
    $campTickets = $_POST['campPatricipants'];
    $campShortDescription = $_POST['campShortDescription'];
    $campButton = $_POST['campButton'];
    $output = 'Event has been uploaded.';

/* * * * * * * * * * * * * * * * * * * * camp picture upload * * * * * * * * * * * * * * * * * * * */
  
  // count total files
  $countfiles = count($_FILES['files']['name']);

  // replace space with dash
  $campName = str_replace(" ", "-", $campHeadline);
  // print_r($campName);

  // loop all files
  for($i=0;$i<$countfiles;$i++){

    $imageName = $_FILES['files']['name'];

    // rename folder to campStart-campHeadline
    $folder = $campStart.'-'.$campName;
    // echo 'foldername: ';
    // echo '<pre>';

    // folderpath to new uploaded image
    $folderpath = "img/camp/$folder";
   
		// create new folder
    mkdir("img/camp/".$folder, 0700);
    
    // new file name is like uploaded file name
    $filename = $_FILES['files']['name'][$i];

    // location
    $target_file = 'img/camp/'.$folder.'/'.$filename;
    
    // file extension
    $imageType = pathinfo($target_file, PATHINFO_EXTENSION);
    $imageType = strtolower($imageType);

    // valid image extension
    $valid_extension = array("png","jpeg","jpg");
    if(in_array($imageType, $valid_extension)){

      //move file to folder
      if(move_uploaded_file($_FILES['files']['tmp_name'][$i], $target_file)){

        $imageName = $filename;
        $imageData = 'img/camp/'.$folder.'/'.$filename;
        $campLink = 'camps/'.$campStart.'-'.$campName.'.php';
      }



  // upload information in camps
  $stmt = $pdo->prepare("INSERT INTO camps (
    campHeadline, 
    campDescription,
    campStart,
    campEnd,
    campLocation,
    campPrice,
    campPatricipants,
    campTickets,
    campShortDescription,
    campLink,
    campButton,
    imageName,
    imageData,
    imageType) 
  VALUES (
    :campHeadline, 
    :campDescription,
    :campStart,
    :campEnd,
    :campLocation,
    :campPrice,
    :campPatricipants,
    :campTickets,
    :campShortDescription,
    :campLink,
    :campButton,
    :imageName,
    :imageData,
    :imageType)"
  );

  $data = [
    'campHeadline' => $campHeadline, 
    'campDescription' => $campDescription, 
    'campStart' => $campStart,
    'campEnd' => $campEnd,
    'campLocation' => $campLocation,
    'campPrice' => $campPrice,
    'campPatricipants' => $campPatricipants,
    'campTickets' => $campTickets,
    'campShortDescription' => $campShortDescription,
    'campLink' => $campLink,
    'campButton' => $campButton,
    'imageName' => $imageName,
    'imageData' => $imageData,
    'imageType' => $imageType
  ];
  $result = $stmt->execute($data);

    
  // create new file
    $newPage = fopen('camps/'.$campStart.'-'.$campName.'.php', 'w');
    
    // pass input variables to new file
    $contentCampPage .= '<?php ';
    $contentCampPage .= '$campHeadline = "'.$campHeadline.'";';
    $contentCampPage .= '$campDescription = "'.$campDescription.'";';
    $contentCampPage .= '$campStart = "'.$campStart.'";';
    $contentCampPage .= '$campEnd = "'.$campEnd.'";';
    $contentCampPage .= '$campLocation = "'.$campLocation.'";';
    $contentCampPage .= '$campPrice = "'.$campPrice.'";';
    $contentCampPage .= '$campShortDescription = "'.$campShortDescription.'";';
    $contentCampPage .= '$campPatricipants = "'.$campPatricipants.'";';
    $contentCampPage .= '$campTickets = "'.$campTickets.'";';
    $contentCampPage .= '$campButton = "'.$campButton.'";';
    $contentCampPage .= '$imagedata = "../'.$imageData.'";';
    $contentCampPage .= '$campLink = "joinCamp.php";';
    $contentCampPage .= '$MainCampTicketsLeft = ';

    // content of new file
    $contentCampPage .= '
    include ("../inc/headerCamps.inc.php"); 
    include ("../inc/navCamps.inc.php"); 

    // database connection
    require_once("../config/config.inc.php");
  
    $CampSectionChapterTitle = "Camps";    
  ?>
      <style><?php include "../style/parts/camp.style.css" ?></style>
      <style><?php include "../style/parts/grid.style.css" ?></style>
      <style><?php include "../style/elements/picture.style.css" ?></style>
      
      <section class="event">
        <!-- camp event -->
        <div>
          <h4><?php echo $CampSectionChapterTitle?></h4>
          <br>
          <h1><?php echo $campHeadline?></h1>
          <br>
          <p><?php echo $campDescription?></p>
          <br>
          <!-- icon event -->
          <div class="highlight">
            <svg class="small">
              <use xlink:href="#icon_event"></use>
            </svg>
          <h4 class="paint-turquois">From: <?php echo $campStart?> Until: <?php echo $campEnd?></h4>
          </div>
      
          <!-- icon location -->
          <div class="highlight">
            <svg class="small">
              <use xlink:href="#icon_location"></use>
            </svg>
            <h4 class="paint-turquois"> Location: <?php echo $campLocation?></h4>
          </div>
          <br>
      
          <!-- icon price -->
          <div class="highlight">
            <svg class="small">
              <use xlink:href="#icon_price"></use>
            </svg>
            <h4 class="paint-turquois"> Price: <?php echo $campPrice?> CHF / Pers.</h4>
          </div>
          <br>
      
          <!-- participants -->
          <p><strong>Limit of <?php echo $campPatricipants?> Participants</strong></p>
      
          <!-- short description -->
          <p><?php echo $campShortDescription?></p>
      
          <!-- get your tickets -->
          <div class="flexBtn">
            <button><a class="buttonType" href="<?php echo $campLink?>"><?php echo $campButton?></a></button>
          </div> 
        </div>
      
        <div>
          <img class="flyerPic" src="<?php echo $imagedata ?>" alt="Flyer event">
        </div>
      </section>';
    fwrite($newPage, $contentCampPage);
    }
  }
  
  // feedback
  $output = 'Your camp is created.';
 }   


 
 
/* * * * * * * * * * * * * * * * * * * * html * * * * * * * * * * * * * * * * * * * */
?>
<html>
<body class="dark">
<style><?php include "style/elements/form.style.css" ?></style>

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
      <input type="text" id="campHeadline" name="campHeadline" value="<?=$campHeadline?>"><br><br>

      <!-- description -->
      <label for="campDescription">Camp Description</label>
      <textarea name="campDescription" type="textarea" rows="5" placeholder="This is you Camp description"value="<?=$campDescription?>"></textarea><br><br>

      <!-- start -->
      <label for="campStart">Camp Start</label>
      <input type="date" id="campStart" name="campStart" value="<?=$campStart?>"><br><br>

      <!-- end -->
      <label for="campEnd">Camp End</label>
      <input type="date" id="campEnd" name="campEnd" value="<?=$campEnd?>"><br><br>

      <!-- location -->
      <label for="campLocation">Camp Location</label>
      <input type="text" id="campLocation" name="campLocation" value="<?=$campLocation?>"><br><br>

      <!-- price -->
      <label for="campPrice">Camp Price</label>
      <input type="text" id="campPrice" name="campPrice" value="<?=$campPrice?>"><br><br>

      <!-- patricipants -->
      <label for="campPatricipants">Camp Patricipants</label>
      <input type="text" id="campPatricipants" name="campPatricipants" value="<?=$campPatricipants?>"><br><br>
      
      <!-- short description -->
      <label for="campShortDescription">Camp Short Description</label>
      <textarea name="campShortDescription" type="textarea" rows="3" placeholder="This is a short description of this camp"value="<?=$campShortDescription?>"></textarea><br><br>

      <!-- short description -->
      <label for="campButton">Camp Button</label>
      <input type="text" id="campButton" name="campButton" value="<?=$campButton?>"><br><br>

      <!-- pictures upload -->
      <input type='file' name='files[]' multiple /><br><br>

      <!-- output -->
      <p class="paint-turquois"><?php echo $output;?></p>

      <!-- submit -->
      <div class="center">
        <button class="buttonType" type="submit" name="submit">create new camp</button>
      </div>
      
    </form>
  </main>
</body>
</html>