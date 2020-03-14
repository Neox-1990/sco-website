export function mainnavInit(){
  $('nav button.nav-toggler').on('click', mainnavToggleMenu);
  $(document).on('keyup', mainnavShortcut);

  $(document).on('click', (event)=>{
    let target = $(event.target);
    let toggle = target.closest('.nav-toggler').length;
    let parentLength = target.closest('#mainnav').length;
    if($('nav').first().hasClass('open') && parentLength == 0 && !toggle){
      mainnavCloseMenu();
    }
  });

  var hammertime = new Hammer(document, {});
  hammertime.on('swipe', (e)=>{
    let deltaX = Math.abs(e.deltaX);
    let deltaY = Math.abs(e.deltaY);
    if(deltaY <= 0.1*deltaX && Math.abs(e.velocity) > 0.8){
      if(e.direction == Hammer.DIRECTION_LEFT){
        setTimeout(mainnavCloseMenu, 100);
      }else{
        setTimeout(mainnavOpenMenu, 100);
      }
    }
  });
}


export function mainnavToggleMenu(){
  $('nav').toggleClass('open');
}

export function mainnavCloseMenu(){
  $('nav').removeClass('open');
}

export function mainnavOpenMenu(){
  $('nav').addClass('open');
}

export function mainnavShortcut(e){
  let alt = e.altKey;
  let ctrl = e.ctrlKey;
  let key = e.key;

  if(alt && ctrl){
    let url = $('a[data-shortcut='+key+']').attr('href');
    if(typeof(url) !== 'undefined'){
      window.location.href = url;
    }
  }else if (key = 'esc') {
    mainnavCloseMenu();
  }
}
