<?php
$username = $_POST['username'];
$msg =$_POST['message'];
$time =$_POST['timeSent'];
$doc = new DOMDocument();
$doc->load('database/database.xml');
$doc->preserveWhiteSpace = false;
$users = $doc->getElementsByTagName('user');
$usersSize = count($users);
for($loop = 0;$loop<$usersSize;$loop++){
if($users[$loop]->getAttribute('id1') == $username){
$message =$doc->createElement('message','');
$message->setAttribute('id1',$username);
$text=$doc->createElement('text',$msg);
$time =$doc->createElement('time',$time);
$message->appendChild($text);
$message->appendChild($time);
$firstChild = $users[$loop]->firstChild;
$users[$loop]->insertBefore($message,$firstChild);
$doc->save("database/database.xml");
echo "<script>alert('Message Sent');function redirect(){history.back();}; redirect();</script>";
}
}
if(isset($_COOKIE['usernameSecretVille'])){
setcookie('usernameSecretVille','',time()-300000);
setcookie('passwordSecretVille','',time()-300000);
}




?>