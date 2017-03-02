BS3load_func=(typeof BS3load_func=='undefined')?'domReady':BS3load_func+',domReady';
function domReady($) {
  alert($.fn.jquery)
}