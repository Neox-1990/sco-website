export const toggleTeamTablesInit = function(){
  $('.teamtabletoggle').on('click',toggleTeamTables);
  $('.teamtabletoggle').next().hide();
}

export const toggleTeamTables = function(){
  $(this).find('.toggle-icon i').first().toggleClass('closed').toggleClass('open');
  $(this).next().slideToggle(800);
}
