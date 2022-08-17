<?php
$usernameEr = "";
$passwordEr = "";
$emailEr = "";
$username="";
$password="";
$email = "";
$counter = 0;
$counter2 = 0;

if(  isset($_POST['password']) ){
$subject = trim($_POST['username']);
$pattern = '/[a-z]{3,}[0-9]{2,}/';
if(!filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
$emailEr = "<span style='color:red'> *Invalid Email </span> ";
$email = $_POST['email'];
$counter++;
}
 preg_match($pattern,$subject,$matches);
if( count($matches) != 1 ){
$username = $_POST['username'];
$usernameEr = "<span style='color:red'> *atleast 3alphabets and 2 numbers </span>";
$counter++;
}

if($counter == 0){
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$doc = new DOMDocument();
$doc->load('database/database.xml');
$doc->preserveWhiteSpace = false;
$users = $doc->getElementsByTagName('user');
$usersSize = count($users);
for($loop = 0;$loop<$usersSize;$loop++){
if( $users[$loop]->getAttribute("id1") == $username){
$counter2++;
}
}
if($counter2 == 0){
$database= $doc->getElementsByTagName('users')[0];
$newUser = $doc->createElement('user','');
$id1 = $newUser->setAttribute('id1',$username);
$id2 = $newUser->setAttribute('id2',$password);
$id3 = $newUser->setAttribute('id3',$email);
$database->appendChild($newUser);
$doc->save("database/database.xml");
header("Location:loginform.php?username=$username&password=$password");
}else{
echo "<script>alert('Username already exists')</script>";
}


}


}




?>

<!DOCTYPE html>
<html>
<head>

<!--<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/w3.css" >
<link rel="stylesheet" href="css/style.css" >

<title>Secret Ville Registration</title>
</head>
<body>
<?php include_once "navigation.php" ?>

<div style="width:100%;text-align:center;margin-top:150px;font-weight:900;" >
SIMPLE ANONYMOUS MESSAGE WEBSITE
</div>

<div class="parentDiv" >
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="w3-container">
<label> USERNAME </label> <?php echo $usernameEr ?><br> 
<input name="username" value="<?php echo $username ?>" min="5" placeholder="minimum 5 characters" class="w3-input" type="text" required > <br>
<br>
<br>
<label> PASSWORD </label><?php echo  $passwordEr ?><br>
<input name="password" value="<?php echo $password ?>" min="5" class="w3-input" type="password" required > <br>
<br>
<br>
<label> EMAIL </label><?php echo $emailEr ?><br>
<input name="email" value="<?php echo $email ?>" placeholder="for recovery purpose" class="w3-input" type="text" required > <br>
<br>
<br>
<button class="w3-btn" type="submit"> REGISTER </button>
<br>
<br>
<br>
<span class="spanForm" > Already have an account? <a style="color:saddlebrown" href="loginform.php"> Click Here</a> </span>
</form>
</div>
<?php include "footer.php" ?>
</body>
</html>