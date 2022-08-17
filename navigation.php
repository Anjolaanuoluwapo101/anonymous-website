
<div class="navigation" >

<a class="secretVilleLogo" >
<span style="font-size:40px " > SECRET </span>
<span style="font-family:cursive;font-size:40px" >VILLE</span>
</a>


<a onclick="showMenu()"  style="padding-top:10px;vertical-align:middle;float:right;display:inline-block;margin-right:50px;line-height:90px;">
<i class="fa fa-bars" style="font-size:70px" > </i>
</a>

</div>

<div class="showMenu" >
<a href="index.php">CREATE NEW ACCOUNT</a>
<a>CONTACT DEV</a>
<a> CHECK DEV OTHER WORK <span style="color:red"> &nbsp &nbsp coming soon </span>  </a>

</div>

<script>
function showMenu(){
if(document.getElementsByClassName("showMenu")[0].style.display == "none"){
document.getElementsByClassName("showMenu")[0].style.display = "block";
}else{
document.getElementsByClassName("showMenu")[0].style.display ="none";
}

}

</script>