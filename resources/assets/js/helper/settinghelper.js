export function init(){
  $('#adminsettings .admin-checkbox>input[type="checkbox"]').on('change', binaryUpdate);
  $('#adminsettings .admin-textbox button[type="button"]').on('click', contentUpdate);
}

export function binaryUpdate(){
  let key = $(this).attr('name');
  let status = $(this).prop('checked') ? 1 : 0;

  $.get('/ajax/settings/'+key, {
    value: ''+parseInt(status)
  }, function(data){
    if(data === 'true'){
      $('<div class="alert alert-success">'+
        'Setting updated'+
        '<button type="button" class="close" aria-label="Close" onclick="$(this).parent().fadeOut();">'+
          '<span aria-hidden="true">&times;</span>'+
        '</button>'+
      '</div>').appendTo('.admin-alert').delay(3000).fadeOut();
    }else{
      $('<div class="alert alert-danger">'+
        'Setting update failed'+
        '<button type="button" class="close" aria-label="Close" onclick="$(this).parent().fadeOut();">'+
          '<span aria-hidden="true">&times;</span>'+
        '</button>'+
      '</div>').appendTo('.admin-alert').delay(3000).fadeOut();
    }
  });
}

export function contentUpdate(){
  let key = $(this).parent().parent().find('input[type="text"]').attr('name');
  let content = $(this).parent().parent().find('input[type="text"]').val();

  $.get('/ajax/settings/'+key, {
    value: ''+content
  }, function(data){
    if(data === 'true'){
      $('<div class="alert alert-success">'+
        'Setting updated'+
        '<button type="button" class="close" aria-label="Close" onclick="$(this).parent().fadeOut();">'+
          '<span aria-hidden="true">&times;</span>'+
        '</button>'+
      '</div>').appendTo('.admin-alert').delay(3000).fadeOut();
    }else{
      $('<div class="alert alert-danger">'+
        'Setting update failed'+
        '<button type="button" class="close" aria-label="Close" onclick="$(this).parent().fadeOut();">'+
          '<span aria-hidden="true">&times;</span>'+
        '</button>'+
      '</div>').appendTo('.admin-alert').delay(3000).fadeOut();
    }
  });
}
