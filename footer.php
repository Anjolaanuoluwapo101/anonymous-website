<br>
<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>

<br>
<br>
<br>


<script>
let theDeviceIsRotated;
function handlePortraitOrLandscape() {
  setTimeout(afterAnUnnoticableDelay,100); // This solves the wrong-firing-order issue on Samsung Browser.
  function afterAnUnnoticableDelay() {
    if (screen.orientation) { // Mainly for Android (as of 2021)
      // document.getElementById('or7on').innerHTML = screen.orientation.angle; // Returns 0 or 90 or 270 or 180 // Create a div with ID: "or7on" and uncomment to test
      if (screen.orientation.angle == 0)   {document.getElementsByClassName('footer')[0].style.position='sticky';     }
      if (screen.orientation.angle == 90)  {  document.getElementsByClassName('footer')[0].style.position='relative';     }
            if (screen.orientation.angle == 270)  {  document.getElementsByClassName('footer')[0].style.position='relative';     }
      if (screen.orientation.angle == 180)   {document.getElementsByClassName('footer')[0].style.position='sticky';     }
    } else { // Mainly for iOS (as of 2021)
      // document.getElementById('or7on').innerHTML = window.orientation; // Returns 0 or 90 or -90 or 180 // Create a div with ID: "or7on" and uncomment to test
      if (window.orientation == 0)   {    document.getElementsByClassName('footer')[0].style.position='sticky';     }  
      if (window.orientation == 90)  {    document.getElementsByClassName('footer')[0].style.position='relative';     }     
      if (window.orientation == -90) {    document.getElementsByClassName('footer')[0].style.position='relative';     }   
      if (window.orientation == 180) {    document.getElementsByClassName('footer')[0].style.position='sticky';     }     
    }
  }
}
handlePortraitOrLandscape(); // Set for the first time
window.addEventListener("resize",handlePortraitOrLandscape); // Update when change happens
</script>


<div style="position:relative">
<div class="footer">
<span style="text-decoration:underline;font-family: cursive;font-weight:900">CONTACT ME:</span><br><br>
<a href="" ><i class="fa fa-facebook-square"> Facebook </i> </a><br>
<a href="" ><i class="fa fa-twitter"> Twitter </i> </a><br>
<a href="" ><i class="fa fa-whatsapp"> WhatsApp </i> </a>
</div>
</div>