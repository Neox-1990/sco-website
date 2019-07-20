export const resultToggleInit = function(){
  $('#results_controlbox_class>button').on('click',resultToggle);
}

export const resultToggle = function(){
  var carClass = $(this).attr('data-class');
  var season = $(this).attr('data-season');
  $('#results_controlbox_class>button').each(function(){
    var subClass = $(this).attr('data-class');
    var subSeason = $(this).attr('data-season');
    $(this).removeClass('class-btn-background-'+subClass+subSeason);
    $(this).addClass('class-btn-background-outline-'+subClass+subSeason);
  });
  $(this).removeClass('class-btn-background-outline-'+carClass+season);
  $(this).addClass('class-btn-background-'+carClass+season);
  $('table.result-table').addClass('d-none');
  $('table#'+carClass+'-result').removeClass('d-none');
}
