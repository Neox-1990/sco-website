export function init(){
  $('.sco-forms input[type=text],.sco-forms input[type=email],.sco-forms input[type=password]').on('change', fixLabel);
  $('.sco-forms input[type=text],.sco-forms input[type=email],.sco-forms input[type=password]').each(function(index){
    let input = $(this);
    if(String(input.val()) == ''){
      input.next('label').removeClass('filled');
    }else{
      input.next('label').addClass('filled');
    }
  });
}

export function fixLabel(e){
  let input = $(e.target);
  if(String(input.val()) == ''){
    input.next('label').removeClass('filled');
  }else{
    input.next('label').addClass('filled');
  }
}
