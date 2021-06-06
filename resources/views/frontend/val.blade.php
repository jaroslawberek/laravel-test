@extends('layouts.frontend')
@section('content')
<script>
$(document).ready(function(){
//    $(".waga").keydown(function() {
//        var n = $(".waga").val();
//        $("#tablica").html($("#tablica").html() +", n:"+n+"  "+event.keyCode);
//        if(+event.keyCode==32){
//           event.preventDefault();
//            event.stopPropagation();
//   //$(".waga").val( $(".waga").val()+String.fromCharCode(39));
//  }
//        
//    });
//     $(".waga").keydown(function() {
//         var n = $(".waga").val();
//         $("#tablica2").html($("#tablica2").html() +n+",");
//     })
function dodaj(val , sc){
    IMask(val, {
  mask: Number,  // enable number mask
lazy: true,
  // other options are optional with defaults below
  scale: sc,  // digits after point, 0 for integers
  signed: false,  // disallow negative
  thousandsSeparator: '',  // any single char
  padFractionalZeros: true,  // if true, then pads zeros at end to the length of scale
  normalizeZeros: true,  // appends or removes zeros at ends
  radix: ',',  // fractional delimiter
  mapToRadix: ['.'] , // symbols to process as radix

  // additional number interval options (e.g.)
  min: -10000,
  max: 10000
});
}
$(document).ready(function(){
    dodaj(waga1,2);
    dodaj(waga2,3);
});
})
</script>
<div id="tablica"></div>
<div id="tablica2"></div>
<form id="forma" method="get" >
    <input id="waga1" type="text" name="waga3" class="waga4">
    <input id="waga2" type="text" name="waga3" class="waga4">
</form>
    
@endsection