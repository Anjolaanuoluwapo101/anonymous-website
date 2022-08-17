<?php
if(isset($_COOKIE['usernameSecretVille'])){
setcookie('usernameSecretVille','',time()-300000);
setcookie('passwordSecretVille','',time()-300000);
}
$username="";
$password="";
$usernameEr="";
$passwordEr="";
if(isset($_GET['username'])){
$username=$_GET['username'];
$password =$_GET['password'];
}

if(isset($_POST['username'])){
$username=$_POST['username'];
$password=$_POST['password'];
$counter = 0;
$doc = new DOMDocument();
$doc->load('database/database.xml');
$doc->preserveWhiteSpace = false;
$users = $doc->getElementsByTagName('user');
$usersSize = count($users);
for($loop = 0;$loop<$usersSize;$loop++){
if(($users[$loop]->getAttribute("id1") == $username) && ($users[$loop]->getAttribute("id2") == $password)){
setcookie("usernameSecretVille",$username,time()+30000);
setcookie("passwordSecretVille",$password,time()+30000);
header("Location:l.php?q=$username");
}else{
     $counter++;
}
}
if($counter != 0){
     $passwordEr = "<span style='color:red'> *Wrong password </span>";
}
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

<?php include_once "navigation.php" ;
sleep(1);
if(isset($_GET['username'])){
echo "<script>alert('New Account Created')</script>";
}

?>
<script>
let theDeviceIsRotated;
function handlePortraitOrLandscape() {
  setTimeout(afterAnUnnoticableDelay,100); // This solves the wrong-firing-order issue on Samsung Browser.
  function afterAnUnnoticableDelay() {
    if (screen.orientation) { // Mainly for Android (as of 2021)
      // document.getElementById('or7on').innerHTML = screen.orientation.angle; // Returns 0 or 90 or 270 or 180 // Create a div with ID: "or7on" and uncomment to test
      if (screen.orientation.angle == 0)   {document.getElementsByClassName('footer')[0].style.position='fixed';     }
      if (screen.orientation.angle == 90)  {  document.getElementsByClassName('footer')[0].style.position='relative';     }
            if (screen.orientation.angle == 270)  {  document.getElementsByClassName('footer')[0].style.position='relative';     }
      if (screen.orientation.angle == 180) {    theDeviceIsRotated="upsideDown";     }
    } else { // Mainly for iOS (as of 2021)
      // document.getElementById('or7on').innerHTML = window.orientation; // Returns 0 or 90 or -90 or 180 // Create a div with ID: "or7on" and uncomment to test
      if (window.orientation == 0)   {    theDeviceIsRotated="no";     }
      if (window.orientation == 90)  {    theDeviceIsRotated="toTheLeft";     }
      if (window.orientation == -90) {    theDeviceIsRotated="toTheRight";     }
      if (window.orientation == 180) {    theDeviceIsRotated="upsideDown";     }
    }
  }
}
handlePortraitOrLandscape(); // Set for the first time
window.addEventListener("resize",handlePortraitOrLandscape); // Update when change happens
</script>


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
<button class="w3-btn" type="submit"> LOGIN </button>
<br>
<br>
<br>
<br>
 <a style="text-decoration:none;display:block;text-align:center;color:saddlebrown" href="psreset.php"> Forgot Password?</a> 
<br>
<span class="spanForm" > Don't have an account? <a style="color:saddlebrown" href="index.php"> Click Here</a> </span>
</form>
</div>
<?php include "footer.php" ?>
</body>
</html>