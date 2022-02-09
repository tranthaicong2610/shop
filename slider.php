<!-- slider -->
<br>
<div class="w3-content w3-section" >

  <img class="mySlides w3-animate-fading resize" src="https://image-us.24h.com.vn/upload/4-2021/images/2021-12-23/anh-1-1640243906-582-width650height741.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading resize" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4KFpyTAbxUOUtC1mrtahi2prM757NKVVP6Q&usqp=CAU" style="width:100%">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 9000);    
}
</script>