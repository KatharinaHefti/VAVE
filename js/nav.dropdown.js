
$( '#menuIcon' ).click(function() {
  console.log('clicked');
  $('.hiddenLinks').toggleClass('showLinks');
  $('.waveBg').toggleClass('waveBgDown');
  $('#menuIcon').find("use").attr("xlink:href", "#icon_close");
});

