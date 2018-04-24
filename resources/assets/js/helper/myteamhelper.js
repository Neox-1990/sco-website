export const updateNumbers = function(){
  var car = $('#car').val();
  var selOption = $('#number').val();
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

export const addDriverForm = function(){
  var active = $('div.add-driver-form-active').length;
  if(active<6) $('#driver'+(active+1)).parent().addClass('add-driver-form-active');
}
