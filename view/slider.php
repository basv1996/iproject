<div id="slider">
   <img class="mySlides" src="img/seduce1.jpg" alt="seduce1">
   <img class="mySlides" src="img/seduce2.jpg" alt="seduce2">
   <img class="mySlides" src="img/seduce5.jpg" alt="seduce5">
   <img class="mySlides" src="img/seduce3.jpg" alt="seduce3">
   <img class="mySlides" src="img/seduce6.png" alt="seduce4">
    
</div>


<script>
    var slideIndex = 0;
Slidy();

function Slidy() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1} 
    x[slideIndex-1].style.display = "block"; 
    setTimeout(Slidy, 2000); // Change image every 2 seconds
}
</script>