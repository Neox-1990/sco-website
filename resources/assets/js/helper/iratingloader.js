export function initIRloader(){
  $('#loadingIRteam').on('click', loadTeamIrating);
  $('button[id^=loadingIR]').on('click', loadDriverIrating);
}

export function loadTeamIrating(){
  let IDinputs = $('input[id$=iracingid]');
  let ids = [];
  IDinputs.each(function(){
    let value = $(this).val();
    if(value !== ''){
      ids[parseInt(value)] = 0;
    }
  });
  let keys = (Object.keys(ids)).join(',');
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  let jqxhr = $.post(`/ajax/irating/team/`, {'ids': keys}, function(data, status, jq){
    ids = ids.map(function(el, index){
      if(index in data){
        let name = data[index].driver;
        let irating = data[index].irating;
        let sr = (data[index].safetyrating).split(' ');
        let sr1 = sr[0].toLowerCase();
        let sr2 = parseFloat(sr[1]);
        return {'name': name, 'irating': irating, 'sr1': sr1, 'sr2': sr2};
      }
    });
    setDataTeam(ids);
  },'json');
}

export function loadDriverIrating(){
  let id = parseInt($(this).parent().find('input[id$=iracingid]').first().val());
  let ids = [];
  if(id !== ''){
    ids[id] = 0;
  }

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  let jqxhr = $.post(`/ajax/irating/team/`, {'ids': id}, function(data, status, jq){
    ids = ids.map(function(el, index){
      if(index in data){
        let name = data[index].driver;
        let irating = data[index].irating;
        let sr = (data[index].safetyrating).split(' ');
        let sr1 = sr[0].toLowerCase();
        let sr2 = parseFloat(sr[1]);
        return {'name': name, 'irating': irating, 'sr1': sr1, 'sr2': sr2};
      }
    });
    setDataTeam(ids);
  },'json');
}

export function setDataTeam(datarray){
  let fieldsets = $('fieldset[id^=driver]');
  fieldsets.each(function(){
    let ir_id = $(this).find('input[id$=iracingid]').first();
    let driver_name = $(this).find('input[id$=name]').first();
    let irating = $(this).find('input[id$=irating]').first();
    let sr_class = $(this).find('select[id$=sr1]').first();
    let sr_value = $(this).find('input[id$=sr2]').first();

    let id = parseInt(ir_id.val());
    if(id in datarray){
      irating.val(datarray[id]['irating']);
      driver_name.val(datarray[id]['name']);
      sr_class.val(datarray[id]['sr1']);
      sr_value.val(datarray[id]['sr2']);
    }

  });
}
