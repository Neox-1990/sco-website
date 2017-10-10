export const resultToggleInit = function(){
  $('#results_controlbox_class>button').on('click',resultToggle);
}

export const resultToggle = function(){
  var carClass = $(this).attr('data-class');
  $('#results_controlbox_class>button').each(function(){
    var subClass = $(this).attr('data-class');
    $(this).removeClass('btn-'+subClass);
    $(this).addClass('btn-outline-'+subClass);
  });
  $(this).removeClass('btn-outline-'+carClass).addClass('btn-'+carClass);
  $('table.result-table').addClass('d-none');
  $('table#'+carClass+'-result').removeClass('d-none');
}
