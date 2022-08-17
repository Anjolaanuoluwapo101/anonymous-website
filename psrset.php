<?php

if((!isset($_GET['q'])) && (!isset($_POST['password']))){
http_response_code(404);
die();
}

if(isset($_GET['q'])){
$username =$_GET['q'];
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '3002200330022003';
$encryption_key = "secretville";
$decrypted = openssl_decrypt($username, $ciphering,$encryption_key, $options, $encryption_iv);
}

$password ="";
$passwordEr ="";

if(isset($_POST['password'])){
$password =$_POST['password'];
$username=$_POST['decrypted'];
$doc = new DOMDocument();
$doc->load('database/database.xml');
$doc->preserveWhiteSpace = false;
$users = $doc->getElementsByTagName('user');
$usersSize = count($users);
for($loop = 0;$loop<$usersSize;$loop++){
if($users[$loop]->getAttribute("id1") == $username){
//$remove=$users[$loop]->removeAttribute("id2");
$update = $users[$loop]->setAttribute("id2",$password);
echo "<script>alert('Reset complete'); function redirect(){window.location.href='loginform.php';};redirect();</script>";
$doc->save("database/database.xml");
break;
}
}
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" >
<link rel="stylesheet" href="css/w3.css" >
<link rel="stylesheet" href="css/style.css" >

<title>PASSWORD RESET</title>
</head>
<body>
<?php include "navigation.php" ?>
<div class="parentDiv" >
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="w3-container">
<label> Type in new password </label> <?php echo $passwordEr ?><br> 
<input name="password" value="<?php echo $password ?>" min="5" placeholder="minimum 5 characters" class="w3-input" type="text" required > <br>
<input type="hidden" name="decrypted" value="<?php echo $decrypted ?>" >
<br>
<br>
<button class="w3-btn" type="submit"> CONFIRM </button>
<br>
</form>
</div>

</body>
</html>