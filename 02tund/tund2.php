<?php
$username = "Lisete";
$fulltimenow = date("d.m.Y. H:i:s");
$hournow = date ("H");
$partofday = "h�gune aeg";

if($hournow <8) {
	}
?>
<!DOCTYPE html>
<html lang="et">
<head>
 <meta charset="utf-8">
 <title>
 <?php
echo $username;
?>
 programmeerib veebi </title>
</head>
<body>
<?php 
echo "<h1>" .$username . ", veebiprogrammeerimine 2019</h1>";
?>
 <p> See veebileht on valminud �ppet�� k�igus ning ei sisalda mingisugust t�siseltv�etavat sisu</p>
<?php
echo"<p>See on minu esimene PHP!</p>";
echo"<p>Lehe avamise hetkel oli " .$fulltimenow .",".$partofday.".</p>";
?>
</body>
</html>
