<?php
if(!isset($_GET['q'])){
http_response_code(404);
die();
}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/w3.css" >
<link rel="stylesheet" href="css/style.css" >
<title></title>
</head>
<body>
<?php include "navigation.php" ?>
<div class="parentDiv">
<?php
$username =$_GET['q'];
if(isset($_COOKIE['usernameSecretVille'])){
$header =<<<HEAD
<div class="textDiv" style="display:block!important;text-align:center;">
<h4>COPY THE LINK BELOW</h4>

Hey guys,say something about me in secret at Secret Ville <br>
Here is my link; <br>
<script>
document.write(window.location.href);
</script>
<br>
<br>
</div>
<br>
<br>
<br>

HEAD;
echo $header;
//if($_COOKIE['usernameSecretVille'] == $username){
$username=$_COOKIE['usernameSecretVille'] ;
$password =$_COOKIE['passwordSecretVille'] ;
$doc = new DOMDocument();
$doc->load('database/database.xml');
$doc->preserveWhiteSpace = false;
$users = $doc->getElementsByTagName('user');
$usersSize = count($users);
for($loop = 0;$loop<$usersSize;$loop++){
if(($users[$loop]->getAttribute("id1") == $username) && ($users[$loop]->getAttribute("id2") == $password)){
$message1=$users[$loop];
$messages =$message1->childNodes;
$msgSize = $messages->length;
for($l=0;$l<$msgSize;$l++){
$text=$messages[$l]->childNodes->item(0)->nodeValue;
$time=$messages[$l]->childNodes->item(1)->nodeValue;
$time=urldecode($time);
$displayMessages =<<<HTML
<div class="messageDiv" >
<div class="textDiv">
$text
</div>
<div class="timeDiv">
Sent on $time
</div>
</div>
<br>
<br>
<br>
HTML;
echo $displayMessages;
}
}
}
//}
}else{
//if(!isset($_COOKIE['usernameSecretVille'])){
$redirect="submitmessage.php";
$date=gmdate("Y-M-D");
$time=gmdate("h:i:s");
$combinedDate=$date." at ".$time;
$combinedDate=urlencode($combinedDate);
$form=<<<HTML
<form method="POST" action=$redirect class="w3-container">
<input type="hidden" name="username" value=$username ><br>
<input name="message" class="w3-input" type="text" style="height:500px;width:100%;border-radius:20px;padding:20px;">
<input type="hidden" name="timeSent" value=$combinedDate ><br>
<br>

<br>
<button style="width:200px" type="submit" > SEND YOUR MESSAGE </button>
</form>
HTML;
echo $form;

}
?>
</div>

<?php include "footer.php" ?>
</body>
</html>