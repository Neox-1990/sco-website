export function initIRloader(){
  $('#loadingIRteam').on('click', loadTeamIrating);
  $('input[type=text].iracingid').on('change', loadDriver);
  $('button[id=newLoadingIR]').on('click', loadNewIrating);

  $('input[type=text].iracingid').trigger('change');
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
  $.post(`/ajax/irating/team`, {'ids': keys}, function(data, status){
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

export function loadDriver(){
  var input = $(this);
  var details = input.parent().next('.driver-signup-details').first();

  details.find('td[data-ir-field=name]').html("");
  details.find('td[data-ir-field=irating]').html("");
  details.find('td[data-ir-field=licence]').html("");

  let id = parseInt($(this).val());
  let ids = [];
  console.log(id);
  if(!isNaN(id)){
    ids[id] = 0;

    details.find('.loader').removeClass('d-none');

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.post('/ajax/irating/team', {'ids': id}, function(data){
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
      let driver = ids[id];
      if(typeof(driver) === 'undefined'){
        details.find('td[data-ir-field=name]').html('<span class="text-danger">Unknown Driver Id</span>');
      }else{
        details.find('td[data-ir-field=name]').html(driver.name);
        details.find('td[data-ir-field=irating]').html(driver.irating);
        details.find('td[data-ir-field=licence]').html(driver.sr1.toUpperCase()+driver.sr2);

      }

    }).fail(function(){
      console.log('fail');
    }).always(function(){
      console.log('always');
      details.find('.loader').addClass('d-none');
    });
  }
}

export function loadNewIrating(){
  let id = parseInt($(this).parent().find('input[id=driveriracingid]').first().val());
  let ids = [];
  let button = this;
  if(id !== ''){
    ids[id] = 0;
  }

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.post(`/ajax/irating/team`, {'ids': id}, function(data, status){
    ids = ids.map(function(el, index){
      if(index in data){
        let name = data[index].driver;
        let irating = data[index].irating;
        let sr = (data[index].safetyrating).split(' ');
        let sr1 = sr[0].toLowerCase();
        let sr2 = parseFloat(sr[1]);
        return {'name': name, 'irating': irating, 'sr1': sr1, 'sr2': sr2};
      }
    })
    setDataNew(ids);
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

export function setDataNew(datarray){
  let fieldsets = $('#newDriverForm');
  fieldsets.each(function(){
    let ir_id = $(this).find('input[id=driveriracingid]').first();
    let driver_name = $(this).find('input[id=drivername]').first();
    let irating = $(this).find('input[id=driverirating]').first();
    let sr_class = $(this).find('select[id=driversr1]').first();
    let sr_value = $(this).find('input[id=driversr2]').first();

    let id = parseInt(ir_id.val());
    if(id in datarray){
      irating.val(datarray[id]['irating']);
      driver_name.val(datarray[id]['name']);
      sr_class.val(datarray[id]['sr1']);
      sr_value.val(datarray[id]['sr2']);
    }

  });
}
