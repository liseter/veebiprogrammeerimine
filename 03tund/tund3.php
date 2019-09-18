<?php
$username = "Lisete";
$photoDir = "../photos/";
$photoTypesAllowed = ["image/jpeg", "image/png"];
$fullTimeNow = date("d.m.Y. H:i:s");
$hourNow = date ("H");
$partOfDay = "hägune aeg";

if($hourNow < 12) {
	$partOfDay = "hommik" ;
}
if($hourNow >= 12 and $hourNow < 16) {
	$partOfDay = "sobiv aeg veebiprogrammeerimiseks";
}	
if ($hourNow >= 16 and $hourNow < 22) {
	$partOfDay = "vaba aeg";
}
if($hourNow > 22) {
	$partOfDay = "uneaeg";
}

	//info semestri kulgemise kohta
$semesterStart = new Datetime("2019-9-2") ; 
$semesterEnd = new Datetime("2019-12-13") ; 
$semesterDuration = $semesterStart -> diff ($semesterEnd) ;
//echo $semesterStart; //objekti nii näidata ei saa!!!
//var_dump ($semesterStart); 
//echo $semesterStart -> timezone; 
$today = new DateTime("now");
$fromSemesterStart = $semesterStart -> diff($today) ; 
//var_dump ($fromSemesterStart) ; 
//echo $fromSemesterStart -> days ; 
//echo "Päevi: " .$fromSemesterStart -> format ("%r%a");
//<p>Semester on täies hoos: <meter min="0" max="102" value= "16" >17%</meter> </p>
$semesterInfoHTML = "<p>Info semestri kohta pole kättesaadaval.</p>" ;
if ($fromSemesterStart -> format ("%r%a") > 0 and $fromSemesterStart -> format ("%r%a") <= $semesterDuration -> format ("%r%a")) { 
  $semesterInfoHTML = "<p>Semester on täies hoos : " ; 
  $semesterInfoHTML .= '<meter min="0" ' ;
  $semesterInfoHTML .= 'max="' .$semesterDuration -> format ("%r%a"). '" ';
  $semesterInfoHTML .= 'value="' .$fromSemesterStart -> format ("%r%a"). '" > ';
  $semesterInfoHTML .= round($fromSemesterStart -> format ("%r%a") / $semesterDuration -> format ("%r%a") * 100 , 1) ."%" ;
  $semesterInfoHTML .= "/meter></p>" ;
 }
 
 //juhusliku foto kasutamine
 $photoList = [];// array ehk massiiv 
 $allFiles = array_slice(scandir($photoDir),2);
 //var_dump($allFiles);
 //kontrollin, kas on pildid
 foreach($allFiles as $file) {
	 $fileInfo = getimagesize ($photoDir. $file) ;
	 //var_dump ($fileInfo) ; 
	 if(in_array($fileInfo["mime"], $photoTypesAllowed) == true ) {
		 array_push($photoList, $file);
	 }
 
}
 
 //var_dump($photoList);
 //echo $photoList[2];
 $photoCount = count ($photoList); 
 $randomImgHTML = "";
 if ($photoCount > 0) {
 $photoNum = mt_rand(0, $photoCount - 1) ; 
 //echo $photoNum;
 //<img src="../photos/tlu_terra_600x400_1.jpg" alt= "juhuslik foto">
 $randomImgHTML = 'img src="'.$photoDir . $photoList [$photoNum] . '"alt ="juhuslik foto">';
 
 } else {
 $randomImgHTML = "<p> kahjuks pilte pole </p>";
 }

require("header.php") ;

 echo "<h1>" .$username . ", veebiprogrammeerimine 2019</h1>";
?>
<p> See veebileht on valminud õppetöö käigus ning ei sisalda
 mingisugust tõsiseltvõetavat sisu</p>
<?php
 echo $semesterInfoHTML;
 echo"<p>See on minu esimene PHP!</p>";
 echo"<p>Lehe avamise hetkel oli " .$fullTimeNow .",".$partOfDay.".</p>";
?> <hr> 
<?php
 echo $randomImgHTML; 
?>
</body>
</html>
