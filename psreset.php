<?php

$username ="";
$usernameEr ="";

if(isset($_POST['username'])){
$username =$_POST['username'];
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$encryption_iv = '3002200330022003';
$encryption_key = "secretville";
$encrypted = openssl_encrypt($username, $ciphering,$encryption_key, $options, $encryption_iv);


$doc = new DOMDocument();
$doc->load('database/database.xml');
$doc->preserveWhiteSpace = false;
$users = $doc->getElementsByTagName('user');
$usersSize = count($users);
for($loop = 0;$loop<$usersSize;$loop++){
if($users[$loop]->getAttribute("id1") == $username){
$counter++;
$url = $_SERVER['HTTP_HOST']."/psrset.php?q=$encrypted";
$reciever = $users[$loop]->getAttribute("id3");
$to = $reciever;
$subject = ' SECRET VILLE Email Reset';
$message = $url;
$headers = 'From: anjolaakinsoyinu@gmail.com' . "\r\n" .'Reply-To: anjolaakinsoyinu@gmail.com' . "\r\n" .'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
echo "<script>alert('Email Sent Check INBOX or SPAM FOLDER')</script>";
}
}
if($counter==0){
$usernameEr="<span style='color:red'> Username doesn't exist </span>";
$username=$_POST['username'];
}
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/w3.css" >
<link rel="stylesheet" href="css/style.css" >

<title>PASSWORD RESET</title>
</head>
<body>
<?php include "navigation.php" ?>
<div class="parentDiv" >
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="w3-container">
<label> USERNAME </label> <?php echo $usernameEr ?><br> 
<input name="username" value="<?php echo $username ?>" min="5" placeholder="minimum 5 characters" class="w3-input" type="text" required > <br>
<br>
<br>
<button class="w3-btn" type="submit"> LOGIN </button>
<br>
</form>
</div>
</body>
</html>