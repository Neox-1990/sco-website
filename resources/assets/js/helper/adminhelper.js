export const toggleTeamTablesInit = function(){
  $('.teamtabletoggle').on('click',toggleTeamTables);
  $('.teamtabletoggle').next().hide();
}

export const toggleTeamTables = function(){
  $(this).find('.toggle-icon i').first().toggleClass('closed').toggleClass('open');
  $(this).next().slideToggle(800);
}

export const changeTeamStatusInit = function(){
  $('button.teamchangebtn').on('click', changeTeamStatus);
}

export const changeTeamStatus = function(){
  let caller = $(this);
  let teamid = caller.attr('data-team');
  let status = caller.attr('data-status');

  $.get('/ajax/changeTeam/'+teamid, {
    newstatus: ''+status
  }, function(data){
    if(data.success){
      let colors = {
        0: 'bg-danger',
        1: 'bg-primary',
        2: 'bg-warning',
        3: 'bg-info',
        4: 'bg-success'
      };
      caller.parent().parent().find('.teamchangebtn').removeAttr('disabled');
      caller.attr('disabled', 'disabled');
      caller.parent().parent().find('td:first').removeClass();
      caller.parent().parent().find('td:first').addClass(colors[data.status]);
      $('<div class="alert alert-success">'+
        data.response+
        '<button type="button" class="close" aria-label="Close" onclick="$(this).parent().fadeOut();">'+
          '<span aria-hidden="true">&times;</span>'+
        '</button>'+
      '</div>').appendTo('.admin-alert').delay(3000).fadeOut();
    }else{
      $('<div class="alert alert-danger">'+
        data.response+
        '<button type="button" class="close" aria-label="Close" onclick="$(this).parent().fadeOut();">'+
          '<span aria-hidden="true">&times;</span>'+
        '</button>'+
      '</div>').appendTo('.admin-alert').delay(3000).fadeOut();
    }
  });
}
