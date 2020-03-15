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
  var max = $('div.add-driver-form').length;
  if(active<max) $('#driver'+(active+1)).parent().addClass('add-driver-form-active');
}

export const clearDriver = function(){
  let frame = $(this).parent().parent();
  let id = frame.attr('data-driver');
  //console.log(frame);
  frame.find('#driver'+id+'name').val('');
  frame.find('#driver'+id+'iracingid').val('');
  frame.find('#driver'+id+'irating').val('5000');
  frame.find('#driver'+id+'sr1').val('a');
  frame.find('#driver'+id+'sr2').val('2.00');
  if(!frame.hasClass('add-driver-form-mandatory')){
    frame.removeClass('add-driver-form-active');
  }
}

export const loadOldTeam = function(){
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.post('/ajax/formerteam/'+$('#old_team').val(),{},
  function(data, status){
    $('.add-driver-form').each(function(i){
      let driver = data[i];
      i++;
      if(typeof driver === 'undefined'){
        if($('#driver'+i+'iracingid').val() == ''){
          $(this).removeClass('add-driver-form-active');
        }
      }else{
        $(this).addClass('add-driver-form-active')
        $('#driver'+i+'iracingid').val(driver.iracing_id);
      }
      $(this).find('input.iracingid').trigger('change');
    });
  });
}
