<nav>
  <!-- brand -->
  <img class="brand" src="./img/brand.svg" alt="VAVE logo">

  <!-- dropdown menu -->
  <svg id="menuIcon" class="small"><use xlink:href="#icon_menu"></use></svg>
</nav>

<!-- menu wave background picture -->
<img class="waveBg" src="./img/wave/wave1.svg" alt="wave">

<!-- dropdown Menu -->
<ul class="hiddenLinks">
    <li><a href=""></a>link</li>
    <li><a href=""></a>link</li>
    <li><a href=""></a>link</li>
</ul>

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$( '#menuIcon' ).click(function() {
  console.log('clicked');
  $('.hiddenLinks').toggleClass('showLinks');
  $('.waveBg').toggleClass('waveBgDown');
  $('#menuIcon').find("use").attr("xlink:href", "#icon_close");
});


</script>
