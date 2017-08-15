
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function(){
  $('#flash_message').delay(200).fadeIn(500,function(){
    $(this).delay(5000).fadeOut(500,function(){
      $(this).remove();
    });
  });
  if(typeof(numbers) !== 'undefined'){
    updateNumbers();
    $('#car').on('change', updateNumbers);
  }

});

function updateNumbers(){
  var selOption = $('#number').val();
  var car = $('#car').val();
  var oldCheck = false;
  $('#number').empty();
  for (var key in numbers[car]) {
    if (numbers[car].hasOwnProperty(key)) {
      if(numbers[car][key] == selOption) oldCheck = true;
      $('#number').append('<option value="'+numbers[car][key]+'">'+numbers[car][key]+'</option>');
    }
  }
  if(oldCheck) $('#number').val(selOption);
}
